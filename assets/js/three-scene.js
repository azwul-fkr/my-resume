/**
 * ==============================================================================
 * IT NETWORK & SOFTWARE ARCHITECTURE 3D VISUALIZATION - THREE.JS
 * EGI AZWUL FIKRI | PERSONAL PORTFOLIO
 * ==============================================================================
 * Visualisasi arsitektur sistem komputasi terdistribusi, topologi jaringan,
 * relasi basis data, dan transmisi paket data (data pulses) secara real-time.
 * 
 * Posisi: Latar belakang penuh (Full-screen background backdrop)
 * Responsif terhadap pergerakan kursor mouse dan scrolling pengguna.
 */

(function () {
  'use strict';

  const CONFIG = {
    containerId: 'hero-network-canvas',
    fallbackId: 'hero-network-fallback',

    // Kecepatan rotasi idle normal
    idleSpeedY: 0.0012,
    idleSpeedX: 0.0004,

    // Sensitivitas respons terhadap kursor mouse
    pointerSensitivity: 0.5,
    pointerLerp: 0.05,

    // Sensitivitas respons terhadap scroll halaman
    scrollSensitivity: 0.002,
    scrollLerp: 0.06,

    // Jumlah paket data aktif yang mengalir di jaringan
    dataPulseCount: 16,
    dataPulseSpeed: 0.010,

    // Palet Warna Arsitektur Bersih & Berwibawa
    colors: {
      coreNode: 0x0f172a,         // Obsidian Core Server
      databaseNodes: 0x2563eb,    // Royal Blue (Database Relasional)
      apiGatewayNodes: 0x475569,  // Slate (API Gateways & Microservices)
      clientNodes: 0x059669,      // Emerald Green (Client Endpoints)
      connectionLines: 0x94a3b8,  // Hairline Data Links (Lembut)
      activePulse: 0x2563eb,      // Paket data aktif (Biru)
      activePulseSuccess: 0x10b981 // Paket data respon (Hijau)
    }
  };

  let scene, camera, renderer, animFrameId;
  let networkGroup, nodesArray = [], connectionsArray = [], pulsesArray = [];
  let container = null;
  let isPageVisible = true;
  let prefersReducedMotion = false;

  let pointer = { currentX: 0, currentY: 0, targetX: 0, targetY: 0 };
  let scrollState = { current: 0, target: 0 };
  let baseRotationY = 0;
  let baseRotationX = 0;

  function checkWebGL() {
    try {
      const c = document.createElement('canvas');
      return !!(window.WebGLRenderingContext && 
        (c.getContext('webgl') || c.getContext('experimental-webgl')));
    } catch (e) {
      return false;
    }
  }

  function init() {
    container = document.getElementById(CONFIG.containerId);
    const fallback = document.getElementById(CONFIG.fallbackId);
    if (!container) return;

    // Deteksi Preferensi Pengurangan Gerakan
    const motionMedia = window.matchMedia('(prefers-reduced-motion: reduce)');
    prefersReducedMotion = motionMedia.matches;
    motionMedia.addEventListener('change', (e) => {
      prefersReducedMotion = e.matches;
    });

    if (!checkWebGL() || typeof THREE === 'undefined') {
      if (fallback) fallback.style.display = 'block';
      return;
    }
    if (fallback) fallback.style.display = 'none';

    // 1. Scene
    scene = new THREE.Scene();

    // 2. Camera (Disesuaikan untuk jangkauan layar lebar)
    const width = container.clientWidth || window.innerWidth;
    const height = container.clientHeight || window.innerHeight;
    camera = new THREE.PerspectiveCamera(46, width / height, 0.1, 100);
    camera.position.set(0, 0, 7.8);

    // 3. Renderer Transparan
    renderer = new THREE.WebGLRenderer({
      alpha: true,
      antialias: true,
      powerPreference: 'high-performance'
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);

    // 4. Pencahayaan Lembut Arsitektural
    const ambientLight = new THREE.AmbientLight(0xffffff, 1.4);
    scene.add(ambientLight);

    const dirLight1 = new THREE.DirectionalLight(0xffffff, 1.5);
    dirLight1.position.set(6, 8, 6);
    scene.add(dirLight1);

    const dirLight2 = new THREE.DirectionalLight(0x94a3b8, 0.9);
    dirLight2.position.set(-6, -5, -4);
    scene.add(dirLight2);

    // 5. Bangun Topologi Arsitektur Jaringan (IT Network) Luas
    buildNetworkTopology();

    // 6. Siapkan Pulsa Aliran Data (Data Flow Packets)
    setupDataPulses();

    // 7. Event Listeners (Resize, Mousemove, Scroll)
    setupEvents();

    // 8. Mulai Animasi Loop
    animate();
  }

  function buildNetworkTopology() {
    networkGroup = new THREE.Group();
    nodesArray = [];
    connectionsArray = [];

    // Distribusi Node Arsitektur Luas Memenuhi Layar (Left, Center, Right, Depth)
    const nodeDefinitions = [
      // Core Primary Servers (Pusat Sistem)
      { pos: new THREE.Vector3(0, 0.2, 0), radius: 0.42, color: CONFIG.colors.coreNode, type: 'core' },
      { pos: new THREE.Vector3(-1.8, 1.1, -0.6), radius: 0.28, color: CONFIG.colors.apiGatewayNodes, type: 'gateway' },
      { pos: new THREE.Vector3(1.9, 0.9, -0.5), radius: 0.26, color: CONFIG.colors.apiGatewayNodes, type: 'gateway' },

      // Database Relasional Clusters (Cylindrical Data Nodes)
      { pos: new THREE.Vector3(2.4, -1.2, 0.8), radius: 0.30, color: CONFIG.colors.databaseNodes, type: 'database' },
      { pos: new THREE.Vector3(3.5, -0.4, -0.4), radius: 0.24, color: CONFIG.colors.databaseNodes, type: 'database' },
      { pos: new THREE.Vector3(1.2, -1.6, -0.8), radius: 0.22, color: CONFIG.colors.databaseNodes, type: 'database' },

      // Backend Services & Microservices (Area Kiri & Bawah)
      { pos: new THREE.Vector3(-2.8, -0.6, 0.6), radius: 0.26, color: CONFIG.colors.apiGatewayNodes, type: 'gateway' },
      { pos: new THREE.Vector3(-3.8, 0.8, -0.5), radius: 0.22, color: CONFIG.colors.coreNode, type: 'gateway' },
      { pos: new THREE.Vector3(-1.4, -1.5, -0.4), radius: 0.20, color: CONFIG.colors.apiGatewayNodes, type: 'gateway' },

      // Peripheral Endpoints & Client Terminals (Area Luar Tersebar)
      { pos: new THREE.Vector3(-4.6, -1.3, 0.2), radius: 0.17, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(-3.2, 2.1, -1.0), radius: 0.16, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(-0.6, 2.3, -0.8), radius: 0.17, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(1.2, 2.2, 0.5), radius: 0.16, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(3.6, 1.8, -0.7), radius: 0.18, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(4.5, 0.2, 0.5), radius: 0.16, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(4.0, -1.8, -0.3), radius: 0.15, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(-0.2, -2.4, 0.4), radius: 0.16, color: CONFIG.colors.clientNodes, type: 'client' },
      { pos: new THREE.Vector3(-3.4, -2.1, -0.7), radius: 0.15, color: CONFIG.colors.clientNodes, type: 'client' },
    ];

    // Buat Mesh Fisik untuk Setiap Node
    nodeDefinitions.forEach((def, index) => {
      let geometry;
      if (def.type === 'core') {
        geometry = new THREE.IcosahedronGeometry(def.radius, 1);
      } else if (def.type === 'database') {
        geometry = new THREE.CylinderGeometry(def.radius, def.radius, def.radius * 1.3, 16);
      } else {
        geometry = new THREE.SphereGeometry(def.radius, 18, 18);
      }

      const material = new THREE.MeshStandardMaterial({
        color: def.color,
        roughness: 0.3,
        metalness: def.type === 'core' ? 0.7 : 0.4,
        flatShading: def.type === 'core'
      });

      const mesh = new THREE.Mesh(geometry, material);
      mesh.position.copy(def.pos);

      // Cincin orbital tipis penanda node aktif
      const ringGeo = new THREE.RingGeometry(def.radius * 1.35, def.radius * 1.45, 32);
      const ringMat = new THREE.MeshBasicMaterial({
        color: def.color,
        side: THREE.DoubleSide,
        transparent: true,
        opacity: 0.3
      });
      const ringMesh = new THREE.Mesh(ringGeo, ringMat);
      ringMesh.rotation.x = Math.PI / 2;
      mesh.add(ringMesh);

      networkGroup.add(mesh);
      nodesArray.push({ mesh, position: def.pos, type: def.type });
    });

    // Definisi Topologi Hubungan Antar Node (Data Links)
    const links = [
      [0, 1], [0, 2], [1, 2],       // Core ke Gateway Utama
      [0, 3], [0, 4], [3, 4], [3, 5], // Core ke Database Clusters
      [0, 6], [1, 7], [6, 7], [0, 8], // Core ke Backend Services
      [6, 9], [7, 10], [1, 11],       // Edge Link Sisi Kiri
      [2, 12], [2, 13], [4, 14],      // Edge Link Sisi Kanan Atas
      [3, 15], [5, 16], [8, 16],      // Link Bawah
      [6, 17], [8, 17], [9, 17],      // Perimeter Bawah
      [11, 12], [13, 14], [4, 15]     // Cross-cluster Links
    ];

    // Bangun Garis Koneksi Antar Node (Hairline Lines Bersih & Transparan)
    links.forEach(([fromIdx, toIdx]) => {
      if (!nodesArray[fromIdx] || !nodesArray[toIdx]) return;
      const fromPos = nodesArray[fromIdx].position;
      const toPos = nodesArray[toIdx].position;

      const lineGeo = new THREE.BufferGeometry().setFromPoints([fromPos, toPos]);
      const lineMat = new THREE.LineBasicMaterial({
        color: CONFIG.colors.connectionLines,
        transparent: true,
        opacity: 0.28,
        linewidth: 1
      });
      const line = new THREE.Line(lineGeo, lineMat);
      networkGroup.add(line);

      connectionsArray.push({
        from: fromPos,
        to: toPos,
        fromIdx,
        toIdx
      });
    });

    scene.add(networkGroup);
  }

  function setupDataPulses() {
    pulsesArray = [];
    const pulseGeometry = new THREE.SphereGeometry(0.05, 12, 12);

    for (let i = 0; i < CONFIG.dataPulseCount; i++) {
      if (connectionsArray.length === 0) break;
      const conn = connectionsArray[i % connectionsArray.length];
      const isSuccess = i % 2 === 0;
      const pulseMaterial = new THREE.MeshBasicMaterial({
        color: isSuccess ? CONFIG.colors.activePulseSuccess : CONFIG.colors.activePulse,
        transparent: true,
        opacity: 0.75
      });

      const pulseMesh = new THREE.Mesh(pulseGeometry, pulseMaterial);
      networkGroup.add(pulseMesh);

      pulsesArray.push({
        mesh: pulseMesh,
        connection: conn,
        progress: Math.random(),
        speed: CONFIG.dataPulseSpeed * (0.8 + Math.random() * 0.5),
        forward: Math.random() > 0.5
      });
    }
  }

  function setupEvents() {
    window.addEventListener('resize', onResize, { passive: true });

    // Pointer Movement (Responsif terhadap pergerakan kursor di seluruh layar)
    window.addEventListener('mousemove', (e) => {
      const normX = (e.clientX / window.innerWidth) - 0.5;
      const normY = (e.clientY / window.innerHeight) - 0.5;
      pointer.targetX = normX * CONFIG.pointerSensitivity;
      pointer.targetY = normY * CONFIG.pointerSensitivity;
    }, { passive: true });

    // Scroll Movement (Responsif terhadap scrolling pengguna dengan efek 3D Parallax)
    window.addEventListener('scroll', () => {
      const scrollY = window.pageYOffset || document.documentElement.scrollTop;
      scrollState.target = scrollY * CONFIG.scrollSensitivity;
    }, { passive: true });

    // Touch Support untuk Tablet & Mobile
    window.addEventListener('touchmove', (e) => {
      if (e.touches.length > 0) {
        const touch = e.touches[0];
        const normX = (touch.clientX / window.innerWidth) - 0.5;
        const normY = (touch.clientY / window.innerHeight) - 0.5;
        pointer.targetX = normX * 0.35;
        pointer.targetY = normY * 0.35;
      }
    }, { passive: true });

    // Visibility Lifecycle
    document.addEventListener('visibilitychange', () => {
      isPageVisible = !document.hidden;
      if (isPageVisible && !animFrameId) {
        animate();
      }
    });
  }

  function onResize() {
    if (!container || !renderer || !camera) return;
    const width = container.clientWidth || window.innerWidth;
    const height = container.clientHeight || window.innerHeight;
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
  }

  function animate() {
    if (!isPageVisible) {
      animFrameId = null;
      return;
    }
    animFrameId = requestAnimationFrame(animate);

    if (networkGroup) {
      // Interpolasi kursor mouse halus (Lerp)
      pointer.currentX += (pointer.targetX - pointer.currentX) * CONFIG.pointerLerp;
      pointer.currentY += (pointer.targetY - pointer.currentY) * CONFIG.pointerLerp;

      // Interpolasi scrolling halus (Scroll Parallax)
      scrollState.current += (scrollState.target - scrollState.current) * CONFIG.scrollLerp;

      if (!prefersReducedMotion) {
        // Rotasi idle kontinu
        baseRotationY += CONFIG.idleSpeedY;
        baseRotationX += CONFIG.idleSpeedX;

        // Kombinasi rotasi idle + respons kursor mouse + respons scrolling
        networkGroup.rotation.y = baseRotationY + (pointer.currentX * 0.4) + (scrollState.current * 0.8);
        networkGroup.rotation.x = baseRotationX - (pointer.currentY * 0.3) - (scrollState.current * 0.3);

        // Pergeseran posisi parallax saat scrolling (terasa melayang di latar belakang)
        networkGroup.position.y = -scrollState.current * 0.8;

        // Update Pulsa Transmisi Data (Data Flow Simulation)
        pulsesArray.forEach(p => {
          p.progress += p.speed;
          if (p.progress > 1.0) {
            p.progress = 0;
            p.connection = connectionsArray[Math.floor(Math.random() * connectionsArray.length)];
            p.forward = Math.random() > 0.5;
          }

          const t = p.forward ? p.progress : (1.0 - p.progress);
          p.mesh.position.lerpVectors(p.connection.from, p.connection.to, t);
        });

        // Rotasi perlahan cincin orbital node
        nodesArray.forEach(n => {
          if (n.mesh.children[0]) {
            n.mesh.children[0].rotation.z += 0.006;
          }
        });
      }
    }

    renderer.render(scene, camera);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

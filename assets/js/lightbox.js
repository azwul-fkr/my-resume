/**
 * ==============================================================================
 * LIGHTBOX & IMAGE DETAIL VIEWER - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 * Komponen Lightbox Modal berfitur lengkap:
 * - Zoom In & Zoom Out (+ tombol dan scroll wheel mouse)
 * - Drag / Pan saat gambar diperbesar
 * - Navigasi Prev / Next antar item
 * - Keyboard Support: Escape (Tutup), Panah Kiri/Kanan, +, -
 * - Touch & Mobile Gestures
 * - Aksesibilitas ARIA & Scroll Lock
 * 
 * UBAH ZOOM: Atur batas zoom minimum, maksimum, dan step di CONFIG di bawah ini.
 */

(function () {
  'use strict';

  // UBAH ZOOM: Konfigurasi batas pembesaran gambar
  const CONFIG = {
    minScale: 1.0,      // Skala awal gambar (100%)
    maxScale: 3.5,      // Batas maksimum perbesaran (350%)
    zoomStep: 0.25,     // Langkah perbesaran per klik tombol (+ / -)
    wheelSensitivity: 0.0015 // Sensitivitas scroll wheel mouse
  };

  // State
  let galleryItems = [];
  let currentIndex = 0;
  let isOpen = false;
  let currentScale = 1.0;
  let panX = 0;
  let panY = 0;
  let isDragging = false;
  let startDragX = 0;
  let startDragY = 0;
  let lastActiveElement = null;

  // DOM Elements
  let modalEl, backdropEl, imgContainerEl, imgEl;
  let titleEl, counterEl, closeBtn, zoomInBtn, zoomOutBtn, resetZoomBtn;
  let prevBtn, nextBtn, viewportEl;

  function init() {
    modalEl = document.getElementById('lightbox-modal');
    if (!modalEl) return;

    backdropEl = modalEl.querySelector('.lightbox-backdrop');
    viewportEl = modalEl.querySelector('.lightbox-viewport');
    imgContainerEl = modalEl.querySelector('.lightbox-image-container');
    imgEl = modalEl.querySelector('.lightbox-img');
    titleEl = modalEl.querySelector('.lightbox-title');
    counterEl = modalEl.querySelector('.lightbox-counter');
    closeBtn = modalEl.querySelector('#lightbox-btn-close');
    zoomInBtn = modalEl.querySelector('#lightbox-btn-zoomin');
    zoomOutBtn = modalEl.querySelector('#lightbox-btn-zoomout');
    resetZoomBtn = modalEl.querySelector('#lightbox-btn-reset');
    prevBtn = modalEl.querySelector('#lightbox-btn-prev');
    nextBtn = modalEl.querySelector('#lightbox-btn-next');

    collectGalleryItems();
    bindEvents();
  }

  // Mengumpulkan seluruh elemen gambar portfolio yang dapat dizoom
  function collectGalleryItems() {
    const triggerElements = document.querySelectorAll('[data-lightbox]');
    galleryItems = [];

    triggerElements.forEach((el, index) => {
      const src = el.getAttribute('data-lightbox-src') || el.getAttribute('src');
      const title = el.getAttribute('data-lightbox-title') || el.getAttribute('alt') || 'Detail Gambar Proyek';
      const category = el.getAttribute('data-lightbox-category') || '';

      if (src) {
        galleryItems.push({
          src: src,
          title: title,
          category: category,
          element: el
        });

        // Set index untuk klik langsung
        const itemIdx = galleryItems.length - 1;
        el.style.cursor = 'zoom-in';
        el.addEventListener('click', (e) => {
          e.preventDefault();
          openLightbox(itemIdx);
        });
      }
    });
  }

  // Buka Lightbox pada indeks tertentu
  function openLightbox(index) {
    if (index < 0 || index >= galleryItems.length) return;

    lastActiveElement = document.activeElement;
    currentIndex = index;
    isOpen = true;

    // Kunci scroll halaman utama
    document.body.style.overflow = 'hidden';

    // Reset posisi transform
    resetZoom();

    // Muat data gambar
    renderCurrentItem();

    // Tampilkan modal
    modalEl.classList.add('active');
    modalEl.setAttribute('aria-hidden', 'false');

    if (closeBtn) closeBtn.focus();
  }

  // Tutup Lightbox
  function closeLightbox() {
    if (!isOpen) return;

    isOpen = false;
    modalEl.classList.remove('active');
    modalEl.setAttribute('aria-hidden', 'true');

    // Kembalikan scroll halaman utama
    document.body.style.overflow = '';

    resetZoom();

    if (lastActiveElement && typeof lastActiveElement.focus === 'function') {
      lastActiveElement.focus();
    }
  }

  // Tampilkan gambar pada currentIndex
  function renderCurrentItem() {
    const item = galleryItems[currentIndex];
    if (!item) return;

    imgEl.src = item.src;
    imgEl.alt = item.title;

    if (titleEl) {
      titleEl.textContent = item.title;
    }

    if (counterEl) {
      counterEl.textContent = `${currentIndex + 1} / ${galleryItems.length}`;
    }

    // Update status tombol prev / next
    if (prevBtn) prevBtn.style.display = galleryItems.length > 1 ? 'flex' : 'none';
    if (nextBtn) nextBtn.style.display = galleryItems.length > 1 ? 'flex' : 'none';
  }

  function showNext() {
    if (galleryItems.length <= 1) return;
    currentIndex = (currentIndex + 1) % galleryItems.length;
    resetZoom();
    renderCurrentItem();
  }

  function showPrev() {
    if (galleryItems.length <= 1) return;
    currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
    resetZoom();
    renderCurrentItem();
  }

  // Kontrol Zoom & Pan Transform
  function applyTransform() {
    if (!imgContainerEl) return;
    imgContainerEl.style.transform = `translate(${panX}px, ${panY}px) scale(${currentScale})`;

    if (currentScale > 1.0) {
      viewportEl.classList.add('is-zoomed');
    } else {
      viewportEl.classList.remove('is-zoomed');
    }
  }

  function setZoom(newScale) {
    currentScale = Math.min(Math.max(newScale, CONFIG.minScale), CONFIG.maxScale);
    if (currentScale === 1.0) {
      panX = 0;
      panY = 0;
    }
    applyTransform();
  }

  function resetZoom() {
    currentScale = 1.0;
    panX = 0;
    panY = 0;
    isDragging = false;
    if (viewportEl) {
      viewportEl.classList.remove('is-zoomed', 'is-dragging');
    }
    applyTransform();
  }

  function zoomIn() {
    setZoom(currentScale + CONFIG.zoomStep);
  }

  function zoomOut() {
    setZoom(currentScale - CONFIG.zoomStep);
  }

  // Bind Event Listeners
  function bindEvents() {
    // Tombol Kontrol
    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    if (backdropEl) backdropEl.addEventListener('click', closeLightbox);
    if (zoomInBtn) zoomInBtn.addEventListener('click', zoomIn);
    if (zoomOutBtn) zoomOutBtn.addEventListener('click', zoomOut);
    if (resetZoomBtn) resetZoomBtn.addEventListener('click', resetZoom);
    if (nextBtn) nextBtn.addEventListener('click', showNext);
    if (prevBtn) prevBtn.addEventListener('click', showPrev);

    // Keyboard Shortcuts
    window.addEventListener('keydown', (e) => {
      if (!isOpen) return;

      switch (e.key) {
        case 'Escape':
          e.preventDefault();
          closeLightbox();
          break;
        case 'ArrowRight':
          e.preventDefault();
          showNext();
          break;
        case 'ArrowLeft':
          e.preventDefault();
          showPrev();
          break;
        case '+':
        case '=':
          e.preventDefault();
          zoomIn();
          break;
        case '-':
        case '_':
          e.preventDefault();
          zoomOut();
          break;
        case '0':
          e.preventDefault();
          resetZoom();
          break;
      }
    });

    // Mouse Wheel Zoom
    if (viewportEl) {
      viewportEl.addEventListener('wheel', (e) => {
        if (!isOpen) return;
        e.preventDefault();
        const delta = -e.deltaY * CONFIG.wheelSensitivity;
        setZoom(currentScale + delta);
      }, { passive: false });

      // Drag / Pan Events saat zoomed
      viewportEl.addEventListener('mousedown', (e) => {
        if (currentScale <= 1.0) return;
        if (e.button !== 0) return; // Hanya klik kiri
        isDragging = true;
        startDragX = e.clientX - panX;
        startDragY = e.clientY - panY;
        viewportEl.classList.add('is-dragging');
        e.preventDefault();
      });

      window.addEventListener('mousemove', (e) => {
        if (!isDragging || !isOpen) return;
        panX = e.clientX - startDragX;
        panY = e.clientY - startDragY;
        applyTransform();
      });

      window.addEventListener('mouseup', () => {
        if (isDragging) {
          isDragging = false;
          if (viewportEl) viewportEl.classList.remove('is-dragging');
        }
      });

      // Touch Gestures untuk Mobile (Swipe & Drag)
      let touchStartX = 0;
      let touchStartY = 0;
      let touchInitialDist = 0;

      viewportEl.addEventListener('touchstart', (e) => {
        if (!isOpen) return;
        if (e.touches.length === 1) {
          touchStartX = e.touches[0].clientX - panX;
          touchStartY = e.touches[0].clientY - panY;
          isDragging = currentScale > 1.0;
        } else if (e.touches.length === 2) {
          // Pinch Zoom
          touchInitialDist = Math.hypot(
            e.touches[0].clientX - e.touches[1].clientX,
            e.touches[0].clientY - e.touches[1].clientY
          );
        }
      }, { passive: true });

      viewportEl.addEventListener('touchmove', (e) => {
        if (!isOpen) return;
        if (e.touches.length === 1 && isDragging) {
          panX = e.touches[0].clientX - touchStartX;
          panY = e.touches[0].clientY - touchStartY;
          applyTransform();
        } else if (e.touches.length === 2 && touchInitialDist > 0) {
          const currentDist = Math.hypot(
            e.touches[0].clientX - e.touches[1].clientX,
            e.touches[0].clientY - e.touches[1].clientY
          );
          const ratio = currentDist / touchInitialDist;
          setZoom(currentScale * ratio);
          touchInitialDist = currentDist;
        }
      }, { passive: true });

      viewportEl.addEventListener('touchend', (e) => {
        if (e.touches.length === 0) {
          isDragging = false;
          touchInitialDist = 0;
        }
      });
    }
  }

  // Expose API jika dibutuhkan
  window.EgiPortfolioLightbox = {
    open: openLightbox,
    close: closeLightbox,
    reload: collectGalleryItems,
    openCertificate: function (src, title, category) {
      const existingIdx = galleryItems.findIndex(item => item.src === src);
      if (existingIdx !== -1) {
        openLightbox(existingIdx);
      } else {
        galleryItems.push({ src, title, category });
        openLightbox(galleryItems.length - 1);
      }
    }
  };

  // Jalankan saat DOM siap
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

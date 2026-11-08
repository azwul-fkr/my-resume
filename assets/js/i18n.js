/**
 * ==============================================================================
 * LOCALIZATION (I18N) - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 * Sistem terjemahan bilingual (Indonesia & English) instan tanpa reload halaman.
 * Menyimpan preferensi ke localStorage dan mengupdate seluruh string antarmuka,
 * atribut aksesibilitas, data proyek, sertifikat, dan metadata.
 */

(function () {
  'use strict';

  const STORAGE_KEY = 'portfolio_lang';
  const DEFAULT_LANG = 'id';

  // Kamus terjemahan untuk seluruh string statis antarmuka
  const DICTIONARY = {
    id: {
      'nav.work': 'PORTFOLIO',
      'nav.certificates': 'SERTIFIKAT',
      'nav.videos': 'VIDEO',
      'nav.about': 'TENTANG',
      'nav.experience': 'PENGALAMAN',
      'nav.contact': 'KONTAK',
      'nav.available': 'TERSEDIA UNTUK BEKERJA',

      'hero.status': 'STATUS: TERSEDIA // WEB DEVELOPER // SPESIALIS LARAVEL & DATABASE',
      'hero.role': 'Web Developer',
      'hero.headline': 'Egi Azwul Fikri — Web Developer & Database Specialist.',
      'hero.bio': 'Saya adalah Web Developer profesional yang berdedikasi dalam perancangan dan implementasi aplikasi web berkinerja tinggi berbasis PHP dan Laravel. Terbiasa membangun arsitektur sistem yang modular, pengelolaan basis data relasional yang efisien, standardisasi kode bersih, serta antarmuka fungsional yang intuitif. Memiliki rekam jejak dalam koordinasi proyek teknis dan kepemimpinan komunitas pengembang.',
      'hero.cta_work': 'LIHAT PORTFOLIO',
      'hero.cta_contact': 'HUBUNGI SAYA',
      'hero.location_label': 'LOKASI SAAT INI',
      'hero.stack_label': 'CORE TECH STACK',

      'work.section_num': '[ 01 // KARYA TERPILIH ]',
      'work.heading': 'Solusi Web Berstandar Arsitektur',
      'work.lead': 'Aplikasi web, sistem database, dan platform digital yang dibangun dengan struktur bersih, fungsionalitas teruji, dan performa tinggi.',
      'work.btn_demo': 'KUNJUNGI WEBSITE',
      'work.btn_demo_disabled': 'DEMO TIDAK TERSEDIA',
      'work.btn_view_detail': 'DETAIL & SPESIFIKASI PROYEK',
      'work.zoom_hint': 'PERBESAR DETAIL',

      'certificates.section_num': '[ 02 // SERTIFIKASI & PELATIHAN ]',
      'certificates.heading': 'Sertifikat & Kualifikasi Resmi',
      'certificates.lead': 'Dokumentasi pelatihan teknis resmi, sertifikasi profesi basis data, dan verifikasi kualifikasi yang telah diselesaikan untuk memperkuat kapabilitas rekayasa perangkat lunak.',
      'certificates.btn_credential': 'VERIFIKASI KREDENSIAL',
      'certificates.btn_view_cert': 'PERBESAR DOKUMEN SERTIFIKAT',
      'certificates.zoom_hint': 'PERBESAR DOKUMEN',

      'videos.section_num': '[ 03 // MULTIMEDIA & STORYTELLING ]',
      'videos.heading': 'Produksi Video & Narasi Visual',
      'videos.lead': 'Karya video editing, visual storytelling, dan dokumentasi institusi yang memadukan ritme tempo dinamis, color grading sinematik, dan audio berkarakter.',
      'videos.btn_watch': 'TONTON DI GOOGLE DRIVE',
      'videos.btn_link_disabled': 'LINK BELUM TERSEDIA',
      'videos.zoom_hint': 'PERBESAR THUMBNAIL',

      'about.section_num': '[ 04 // TENTANG & KEAHLIAN ]',
      'about.heading': 'Rekayasa dengan Disiplin Struktural',
      'about.lead': 'Pendekatan rekayasa perangkat lunak berbasis arsitektur modular, efisiensi database relasional, dan kode yang terorganisasi untuk menghasilkan aplikasi yang andal dan mudah dirawat.',
      'about.narrative_title': 'Fondasi Backend Kuat & Presisi Relasional',
      'about.academic_label': 'FONDASI AKADEMIS',
      'about.modules_label': 'MODUL',

      'experience.section_num': '[ 05 // KARIER & PENGALAMAN ]',
      'experience.heading': 'Rekam Jejak Profesional',
      'experience.lead': 'Riwayat keterlibatan dalam proyek pengembangan web, kolaborasi tim rekayasa, dan implementasi sistem nyata di industri.',
      'experience.badge': 'PROFESIONAL',

      'contact.section_num': '[ 06 // KONTAK & KERJASAMA ]',
      'contact.heading': 'Memiliki proyek atau peluang kerja sama?',
      'contact.lead': 'Terbuka untuk posisi full-time, proyek lepas (freelance), maupun kolaborasi teknis yang membutuhkan kejelasan arsitektur perangkat lunak.',
      'contact.btn_cv': 'UNDUH CURRICULUM VITAE (PDF)',
      'contact.email_label': 'SURAT ELEKTRONIK (EMAIL)',
      'contact.repo_label': 'REPOSITORI KODE (GITHUB)',
      'contact.location_label': 'LOKASI / ZONA WAKTU',
      'contact.rights': 'Hak cipta dilindungi undang-undang.',
      'contact.back_to_top': 'KEMBALI KE ATAS',

      'lightbox.hint': 'PETUNJUK: Scroll mouse untuk zoom · Drag saat diperbesar · Tekan ESC untuk tutup',
      'lightbox.zoom_in': 'Perbesar Gambar',
      'lightbox.zoom_out': 'Perkecil Gambar',
      'lightbox.reset': 'Kembalikan Ukuran Asli',
      'lightbox.close': 'Tutup (Esc)',
      'lightbox.prev': 'Sebelumnya',
      'lightbox.next': 'Selanjutnya'
    },

    en: {
      'nav.work': 'WORK',
      'nav.certificates': 'CERTIFICATES',
      'nav.videos': 'VIDEOS',
      'nav.about': 'ABOUT',
      'nav.experience': 'EXPERIENCE',
      'nav.contact': 'CONTACT',
      'nav.available': 'AVAILABLE FOR HIRE',

      'hero.status': 'STATUS: AVAILABLE // WEB DEVELOPER // LARAVEL & DB SPECIALIST',
      'hero.role': 'Web Developer',
      'hero.headline': 'Egi Azwul Fikri — Web Developer & Database Specialist.',
      'hero.bio': 'I am a professional Web Developer specializing in the design and deployment of high-performance web applications using PHP and Laravel. Experienced in building modular system architectures, efficient relational database management, clean code standards, and intuitive functional interfaces. Proven track record in technical project coordination and developer community leadership.',
      'hero.cta_work': 'EXPLORE SELECTED WORK',
      'hero.cta_contact': 'GET IN TOUCH',
      'hero.location_label': 'CURRENT LOCATION',
      'hero.stack_label': 'CORE TECH STACK',

      'work.section_num': '[ 01 // SELECTED WORK ]',
      'work.heading': 'Engineered Web Solutions',
      'work.lead': 'Selected web applications, databases, and digital platforms built with purpose, enabled workflows, and clean architectural design.',
      'work.btn_demo': 'VIEW LIVE DEMO',
      'work.btn_demo_disabled': 'DEMO UNAVAILABLE',
      'work.btn_view_detail': 'VIEW SPECIFICATIONS / FULL IMAGE',
      'work.zoom_hint': 'ZOOM DETAIL',

      'certificates.section_num': '[ 02 // CERTIFICATES & CREDENTIALS ]',
      'certificates.heading': 'Certificates & Credentials',
      'certificates.lead': 'Verified technical training completions, official database certifications, and formal qualifications demonstrating software engineering standards.',
      'certificates.btn_credential': 'VIEW CREDENTIAL',
      'certificates.btn_view_cert': 'INSPECT CERTIFICATE',
      'certificates.zoom_hint': 'ZOOM DOCUMENT',

      'videos.section_num': '[ 03 // MULTIMEDIA & STORYTELLING ]',
      'videos.heading': 'Motion & Video Production',
      'videos.lead': 'Video editing, visual storytelling, and institutional media coordination with structured pacing and cinematic color grading.',
      'videos.btn_watch': 'WATCH ON GOOGLE DRIVE',
      'videos.btn_link_disabled': 'LINK UNAVAILABLE',
      'videos.zoom_hint': 'ZOOM PREVIEW',

      'about.section_num': '[ 04 // ABOUT & SKILLS ]',
      'about.heading': 'Engineering with Structural Discipline',
      'about.lead': 'Dedicated to crafting resilient, robust, and well-architected systems with a focus on maintainability, database integrity, and clear interface workflows.',
      'about.narrative_title': 'Focused Backend Foundations & Relational Precision',
      'about.academic_label': 'ACADEMIC FOUNDATION',
      'about.modules_label': 'MODULES',

      'experience.section_num': '[ 05 // CAREER & EDUCATION ]',
      'experience.heading': 'Professional Trajectory',
      'experience.lead': 'Chronological record of web application development, team collaboration, and real-world system deployments.',
      'experience.badge': 'PROFESSIONAL',

      'contact.section_num': '[ 06 // CONTACT & INQUIRIES ]',
      'contact.heading': 'Have a project in mind?',
      'contact.lead': 'Available for freelance engineering, full-time opportunities, and collaborative technical projects requiring structural clarity.',
      'contact.btn_cv': 'DOWNLOAD CURRICULUM VITAE (PDF)',
      'contact.email_label': 'ELECTRONIC MAIL',
      'contact.repo_label': 'CODE REPOSITORY (GITHUB)',
      'contact.location_label': 'LOCATION / TIMEZONE',
      'contact.rights': 'All rights reserved.',
      'contact.back_to_top': 'BACK TO TOP',

      'lightbox.hint': 'HINT: Mouse scroll to zoom · Drag when zoomed · Press ESC to close',
      'lightbox.zoom_in': 'Zoom In',
      'lightbox.zoom_out': 'Zoom Out',
      'lightbox.reset': 'Reset Zoom',
      'lightbox.close': 'Close (Esc)',
      'lightbox.prev': 'Previous',
      'lightbox.next': 'Next'
    }
  };

  let currentLang = DEFAULT_LANG;

  function setLanguage(lang) {
    if (!DICTIONARY[lang]) return;
    currentLang = lang;

    // 1. Update atribut lang pada tag <html>
    document.documentElement.lang = lang;

    // 2. Simpan ke localStorage
    try {
      localStorage.setItem(STORAGE_KEY, lang);
    } catch (e) {
      // Ignore private browsing storage restriction
    }

    // 3. Update status tombol language selector
    const langButtons = document.querySelectorAll('[data-lang-btn]');
    langButtons.forEach(btn => {
      const targetLang = btn.getAttribute('data-lang-btn');
      const isActive = targetLang === lang;
      btn.classList.toggle('active', isActive);
      btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
    });

    // 4. Update seluruh elemen dengan data-i18n
    const translatableElements = document.querySelectorAll('[data-i18n]');
    translatableElements.forEach(el => {
      const key = el.getAttribute('data-i18n');
      if (DICTIONARY[lang] && DICTIONARY[lang][key]) {
        el.textContent = DICTIONARY[lang][key];
      }
    });

    // 5. Update elemen dinamis dengan atribut data-i18n-id dan data-i18n-en
    const dynamicElements = document.querySelectorAll('[data-i18n-id][data-i18n-en]');
    dynamicElements.forEach(el => {
      const content = el.getAttribute(`data-i18n-${lang}`);
      if (content) {
        el.textContent = content;
      }
    });

    // 6. Update tooltips dan title attribute
    const attrElements = document.querySelectorAll('[data-i18n-title]');
    attrElements.forEach(el => {
      const key = el.getAttribute('data-i18n-title');
      if (DICTIONARY[lang] && DICTIONARY[lang][key]) {
        el.setAttribute('title', DICTIONARY[lang][key]);
        el.setAttribute('aria-label', DICTIONARY[lang][key]);
      }
    });

    // Dispatch event untuk komponen lain (Three.js / Lightbox) jika diperlukan
    window.dispatchEvent(new CustomEvent('languageChanged', { detail: { lang } }));
  }

  function init() {
    // Muat bahasa tersimpan atau gunakan default ID
    let savedLang = DEFAULT_LANG;
    try {
      savedLang = localStorage.getItem(STORAGE_KEY) || DEFAULT_LANG;
    } catch (e) {
      savedLang = DEFAULT_LANG;
    }

    // Bind event klik pada tombol switcher
    const langButtons = document.querySelectorAll('[data-lang-btn]');
    langButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const selected = btn.getAttribute('data-lang-btn');
        if (selected && selected !== currentLang) {
          setLanguage(selected);
        }
      });
    });

    // Terapkan bahasa
    setLanguage(savedLang);
  }

  // Expose ke global window
  window.EgiPortfolioI18n = {
    setLanguage: setLanguage,
    getCurrentLanguage: () => currentLang
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

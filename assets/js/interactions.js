/**
 * ==============================================================================
 * UI INTERACTIONS - NAVIGATION, SCROLL SPY, SCROLL REVEAL & PORTRAIT MOTION
 * EGI AZWUL FIKRI | PERSONAL PORTFOLIO
 * ==============================================================================
 * Ringan, cepat, dan sepenuhnya memanfaatkan GPU Hardware Acceleration.
 */

(function () {
  'use strict';

  function initInteractions() {
    const header = document.querySelector('.site-header');
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const navLinksContainer = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');
    const backToTopBtn = document.querySelector('#back-to-top-btn');

    // 1. Header Scroll Effect
    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }, { passive: true });

    // 2. Mobile Menu Toggle
    if (mobileToggle && navLinksContainer) {
      mobileToggle.addEventListener('click', () => {
        const isOpen = navLinksContainer.classList.toggle('mobile-open');
        mobileToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });

      // Tutup menu mobile ketika salah satu link diklik
      navLinks.forEach(link => {
        link.addEventListener('click', () => {
          navLinksContainer.classList.remove('mobile-open');
          if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
        });
      });
    }

    // 3. Scroll Spy (Highlight active nav link)
    function onScrollSpy() {
      const scrollPos = window.scrollY + 120;

      sections.forEach(section => {
        const top = section.offsetTop;
        const height = section.offsetHeight;
        const id = section.getAttribute('id');

        if (scrollPos >= top && scrollPos < top + height) {
          navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href === `#${id}`) {
              link.classList.add('active');
            } else {
              link.classList.remove('active');
            }
          });
        }
      });
    }

    window.addEventListener('scroll', onScrollSpy, { passive: true });

    // 4. Back To Top Button
    if (backToTopBtn) {
      backToTopBtn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    }

    // 5. Animasi Fade-In & Fade-Out Teks Saat Scroll (IntersectionObserver - Super Ringan)
    initScrollReveal();

    // 6. Animasi Responsif & Dinamis pada Foto Profil
    initPortraitMotion();
  }

  /**
   * Scroll Reveal & Fade-In/Out Effect
   * Menggunakan API bawaan browser IntersectionObserver.
   * Efisiensi 60 FPS, tanpa library eksternal, tidak memberatkan CPU/RAM.
   */
  function initScrollReveal() {
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return;
    }

    const revealSelectors = [
      '.site-section-header',
      '.project-split',
      '.certificate-card',
      '.video-card',
      '.about-grid',
      '.trajectory-item',
      '.footer-cta-grid'
    ];

    const elements = document.querySelectorAll(revealSelectors.join(', '));
    if (elements.length === 0) return;

    elements.forEach(el => el.classList.add('scroll-reveal'));

    if (!('IntersectionObserver' in window)) {
      elements.forEach(el => el.classList.add('reveal-visible'));
      return;
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Fade-in mulus saat elemen masuk ke viewport
          entry.target.classList.add('reveal-visible');
        } else {
          // Fade-out lembut saat elemen keluar dari batas bawah viewport
          const rect = entry.target.getBoundingClientRect();
          if (rect.top > window.innerHeight) {
            entry.target.classList.remove('reveal-visible');
          }
        }
      });
    }, {
      root: null,
      rootMargin: '0px 0px -40px 0px',
      threshold: 0.08
    });

    elements.forEach(el => observer.observe(el));
  }

  /**
   * Portrait Interactive 3D Parallax Tilt
   * Memberikan efek dinamis elegan saat kursor mouse bergerak di atas kartu profil.
   */
  function initPortraitMotion() {
    const card = document.querySelector('.hero-portrait-card');
    if (!card) return;

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return;
    }

    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      // Kemiringan halus maksimal 4.5 derajat
      const rotateX = ((centerY - y) / centerY) * 4.5;
      const rotateY = ((x - centerX) / centerX) * 4.5;

      card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.015)`;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initInteractions);
  } else {
    initInteractions();
  }
})();

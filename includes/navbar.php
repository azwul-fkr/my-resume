<?php
/**
 * ==============================================================================
 * NAVBAR INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 * Dilengkapi pengalih bahasa (ID / EN) di area kanan atas bilah navigasi.
 */
?>
<header class="site-header" id="site-header">
  <div class="site-container">
    <div class="nav-wrapper">
      
      <!-- Brand Logo / Identity -->
      <a href="#hero" class="nav-brand" aria-label="Beranda Egi Azwul Fikri">
        <span class="nav-brand-title"><?= htmlspecialchars($profile['name']) ?></span>
        <span class="nav-brand-subtitle">WEB DEVELOPER & ARCHITECT</span>
      </a>

      <!-- Navigation Links (Bilingual with data-i18n) -->
      <nav class="nav-links" id="nav-links" aria-label="Navigasi Utama">
        <a href="#portfolio-websites" class="nav-link" data-i18n="nav.work">PORTFOLIO</a>
        <a href="#certificates" class="nav-link" data-i18n="nav.certificates">SERTIFIKAT</a>
        <a href="#portfolio-videos" class="nav-link" data-i18n="nav.videos">VIDEO</a>
        <a href="#about" class="nav-link" data-i18n="nav.about">TENTANG</a>
        <a href="#experience" class="nav-link" data-i18n="nav.experience">PENGALAMAN</a>
        <a href="#contact" class="nav-link" data-i18n="nav.contact">KONTAK</a>
      </nav>

      <!-- Nav Actions (Language Selector, Status Indicator & Mobile Toggle) -->
      <div class="nav-actions">
        
        <!-- Language Selector Control (ID / EN) -->
        <div class="lang-switcher" role="group" aria-label="Pengalih Bahasa / Language Selector">
          <button 
            type="button" 
            class="lang-btn active" 
            data-lang-btn="id" 
            aria-pressed="true"
            title="Bahasa Indonesia"
          >ID</button>
          <span class="lang-divider" aria-hidden="true">/</span>
          <button 
            type="button" 
            class="lang-btn" 
            data-lang-btn="en" 
            aria-pressed="false"
            title="English Language"
          >EN</button>
        </div>

        <!-- Status Indicator -->
        <div class="status-badge" title="Status Ketersediaan Proyek">
          <span class="status-indicator" aria-hidden="true"></span>
          <span data-i18n="nav.available">TERSEDIA UNTUK BEKERJA</span>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button class="mobile-nav-toggle" id="mobile-nav-toggle" aria-label="Buka Menu Navigasi" aria-expanded="false" aria-controls="nav-links">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>

      </div>

    </div>
  </div>
</header>

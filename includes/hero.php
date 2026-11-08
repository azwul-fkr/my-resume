<?php
/**
 * ==============================================================================
 * HERO SECTION - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 * Hero section dengan visualisasi 3D IT Network responsif di latar belakang
 * dan kartu profil potret utama yang elegan di latar depan.
 */
?>
<section class="site-section hero-section" id="hero">
  
  <!-- 3D IT Network & Architecture Background Visualization (Full-Width Responsive Backdrop) -->
  <div 
    class="hero-bg-threejs" 
    id="hero-network-canvas" 
    aria-hidden="true"
  >
    <div id="hero-network-fallback" style="display: none;"></div>
  </div>

  <div class="site-container">
    <div class="hero-grid">
      
      <!-- Kolom Kiri: Biodata, Visi, & Tombol Aksi -->
      <div class="hero-content">
        
        <!-- Status & Role -->
        <div class="hero-status-tag">
          <span class="bullet" aria-hidden="true">●</span>
          <span data-i18n="hero.status"><?= htmlspecialchars($profile['hero_tag']['id']) ?></span>
        </div>

        <!-- Main Display Headline (Bilingual with data-i18n) -->
        <h1 class="hero-title" data-i18n="hero.headline"><?= htmlspecialchars($profile['headline']['id']) ?></h1>

        <!-- Short Description -->
        <p class="hero-description" data-i18n="hero.bio"><?= htmlspecialchars($profile['short_bio']['id']) ?></p>

        <!-- Action Buttons -->
        <div class="hero-actions">
          <a href="#portfolio-websites" class="btn btn-primary">
            <span data-i18n="hero.cta_work">LIHAT PORTFOLIO</span>
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <line x1="7" y1="17" x2="17" y2="7"></line>
              <polyline points="7 7 17 7 17 17"></polyline>
            </svg>
          </a>
          <a href="#contact" class="btn btn-outline">
            <span data-i18n="hero.cta_contact">HUBUNGI SAYA</span>
          </a>
        </div>

        <!-- Metadata (Lokasi & Core Stack) -->
        <div class="hero-meta-row">
          <div class="hero-meta-item">
            <div class="meta-label" data-i18n="hero.location_label">LOKASI SAAT INI</div>
            <div class="meta-value"><?= htmlspecialchars($site['location']) ?> (<?= htmlspecialchars($site['timezone']) ?>)</div>
          </div>
          <div class="hero-meta-item">
            <div class="meta-label" data-i18n="hero.stack_label">CORE TECH STACK</div>
            <div class="meta-value"><?= htmlspecialchars($profile['core_stack_tag']) ?></div>
          </div>
        </div>

      </div>

      <!-- Kolom Kanan: Potret Profil Utama -->
      <div class="hero-visual-column">
        
        <!-- Kartu Potret Profil Utama (Prominent & Jelas) -->
        <div class="hero-portrait-card">
          <div class="hero-portrait-img-wrap">
            <img 
              src="<?= htmlspecialchars($profile['profile_image']) ?>" 
              alt="Foto Profil <?= htmlspecialchars($profile['name']) ?>" 
              class="hero-portrait-img"
              width="600" 
              height="750"
              loading="eager"
            >
          </div>
          <div class="hero-portrait-caption">
            <span class="hero-portrait-name"><?= htmlspecialchars($profile['name']) ?></span>
            <span class="hero-portrait-role" data-i18n="hero.role"><?= htmlspecialchars($profile['role']['id']) ?></span>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

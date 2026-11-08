<?php
/**
 * ==============================================================================
 * PORTFOLIO WEBSITES INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 * Bagian proyek website dengan dukungan pelokalan bilingual dinamis (ID & EN).
 */
?>
<section class="site-section" id="portfolio-websites">
  <div class="site-container">
    
    <!-- Section Header (Bilingual via data-i18n) -->
    <div class="site-section-header">
      <div class="section-label" data-i18n="work.section_num">[ 01 // KARYA TERPILIH ]</div>
      <h2 class="section-heading" data-i18n="work.heading">Solusi Web Berstandar Arsitektur</h2>
      <p class="section-lead" data-i18n="work.lead">
        Aplikasi web, sistem database, dan platform digital yang dibangun dengan struktur bersih, fungsionalitas teruji, dan performa tinggi.
      </p>
    </div>

    <!-- Alternating Split Projects Container -->
    <div class="projects-container">
      <?php foreach ($websites as $index => $project): ?>
        <article class="project-split" id="project-<?= htmlspecialchars($project['id']) ?>">
          
          <!-- Media Column (Browser Mockup Frame) -->
          <div class="project-media-col">
            <div class="browser-mockup">
              
              <!-- Browser Header Chrome -->
              <div class="browser-bar">
                <div class="browser-dots" aria-hidden="true">
                  <span class="browser-dot"></span>
                  <span class="browser-dot"></span>
                  <span class="browser-dot"></span>
                </div>
                <div class="browser-url">
                  https://app.portfolio.internal/<?= htmlspecialchars($project['id']) ?>
                </div>
              </div>

              <!-- Browser Viewport with Lightbox Zoom Trigger -->
              <div 
                class="browser-viewport"
                data-lightbox="true"
                data-lightbox-src="<?= htmlspecialchars($project['image']) ?>"
                data-lightbox-title="<?= htmlspecialchars($project['title']) ?> — <?= htmlspecialchars(is_array($project['subtitle']) ? $project['subtitle']['id'] : $project['subtitle']) ?>"
                data-lightbox-category="<?= htmlspecialchars(is_array($project['category']) ? $project['category']['id'] : $project['category']) ?>"
                tabindex="0"
                role="button"
                aria-label="Perbesar gambar <?= htmlspecialchars($project['title']) ?>"
              >
                <img 
                  src="<?= htmlspecialchars($project['image']) ?>" 
                  alt="Tampilan antarmuka proyek <?= htmlspecialchars($project['title']) ?>" 
                  class="browser-img"
                  loading="lazy"
                  width="800"
                  height="500"
                >
                <div class="zoom-overlay-hint">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    <line x1="11" y1="8" x2="11" y2="14"></line>
                    <line x1="8" y1="11" x2="14" y2="11"></line>
                  </svg>
                  <span data-i18n="work.zoom_hint">PERBESAR DETAIL</span>
                </div>
              </div>

            </div>
          </div>

          <!-- Info Column -->
          <div class="project-info-col">
            
            <div class="project-meta-top">
              <span 
                class="badge badge-category"
                data-i18n-id="<?= htmlspecialchars(is_array($project['category']) ? $project['category']['id'] : $project['category']) ?>"
                data-i18n-en="<?= htmlspecialchars(is_array($project['category']) ? $project['category']['en'] : $project['category']) ?>"
              >
                <?= htmlspecialchars(is_array($project['category']) ? $project['category']['id'] : $project['category']) ?>
              </span>
              <?php if (!empty($project['year'])): ?>
                <span class="project-year">// <?= htmlspecialchars($project['year']) ?></span>
              <?php endif; ?>
            </div>

            <h3 class="project-title"><?= htmlspecialchars($project['title']) ?></h3>
            
            <?php if (!empty($project['subtitle'])): ?>
              <div 
                class="project-subtitle"
                data-i18n-id="<?= htmlspecialchars(is_array($project['subtitle']) ? $project['subtitle']['id'] : $project['subtitle']) ?>"
                data-i18n-en="<?= htmlspecialchars(is_array($project['subtitle']) ? $project['subtitle']['en'] : $project['subtitle']) ?>"
              >
                <?= htmlspecialchars(is_array($project['subtitle']) ? $project['subtitle']['id'] : $project['subtitle']) ?>
              </div>
            <?php endif; ?>

            <p 
              class="project-description"
              data-i18n-id="<?= htmlspecialchars(is_array($project['description']) ? $project['description']['id'] : $project['description']) ?>"
              data-i18n-en="<?= htmlspecialchars(is_array($project['description']) ? $project['description']['en'] : $project['description']) ?>"
            >
              <?= htmlspecialchars(is_array($project['description']) ? $project['description']['id'] : $project['description']) ?>
            </p>

            <!-- Key Features / Highlights -->
            <?php if (!empty($project['highlights'])): ?>
              <div class="project-highlights">
                <?php 
                  $hlId = is_array($project['highlights']) && isset($project['highlights']['id']) ? $project['highlights']['id'] : (is_array($project['highlights']) ? $project['highlights'] : []);
                  $hlEn = is_array($project['highlights']) && isset($project['highlights']['en']) ? $project['highlights']['en'] : $hlId;
                  foreach ($hlId as $hIndex => $highlight): 
                ?>
                  <div class="project-highlight-item">
                    <span 
                      data-i18n-id="<?= htmlspecialchars($highlight) ?>"
                      data-i18n-en="<?= htmlspecialchars($hlEn[$hIndex] ?? $highlight) ?>"
                    >
                      <?= htmlspecialchars($highlight) ?>
                    </span>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- Tech Stack Tags -->
            <div class="tech-stack-pills">
              <?php foreach ($project['technologies'] as $tech): ?>
                <span class="badge badge-tech"><?= htmlspecialchars($tech) ?></span>
              <?php endforeach; ?>
            </div>

            <!-- Action Buttons: Demo Website & Detail Lightbox -->
            <div class="project-actions">
              <?php 
                $demoUrl = trim($project['demoUrl'] ?? '');
                $hasValidDemo = !empty($demoUrl) && filter_var($demoUrl, FILTER_VALIDATE_URL) && !preg_match('/^javascript:/i', $demoUrl);
              ?>

              <?php if ($hasValidDemo): ?>
                <a 
                  href="<?= htmlspecialchars($demoUrl) ?>" 
                  target="_blank" 
                  rel="noopener noreferrer" 
                  class="btn btn-primary btn-sm"
                >
                  <span data-i18n="work.btn_demo">KUNJUNGI WEBSITE</span>
                  <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="7" y1="17" x2="17" y2="7"></line>
                    <polyline points="7 7 17 7 17 17"></polyline>
                  </svg>
                </a>
              <?php else: ?>
                <!-- Tombol dinonaktifkan secara aman jika URL demo belum tersedia -->
                <button class="btn btn-disabled btn-sm" type="button" title="URL demo langsung belum dipublikasikan atau beroperasi di lingkungan internal">
                  <span data-i18n="work.btn_demo_disabled">DEMO TIDAK TERSEDIA</span>
                </button>
              <?php endif; ?>

              <!-- Tombol Zoom Gambar Detail -->
              <button 
                type="button" 
                class="btn btn-secondary btn-sm"
                onclick="window.EgiPortfolioLightbox && window.EgiPortfolioLightbox.open(<?= $index ?>)"
                aria-label="Lihat gambar penuh proyek <?= htmlspecialchars($project['title']) ?>"
              >
                <span data-i18n="work.btn_view_detail">DETAIL & SPESIFIKASI PROYEK</span>
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="7" y1="17" x2="17" y2="7"></line>
                  <polyline points="7 7 17 7 17 17"></polyline>
                </svg>
              </button>

            </div>

          </div>

        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

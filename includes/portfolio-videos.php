<?php
/**
 * ==============================================================================
 * PORTFOLIO VIDEOS INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 */
?>
<section class="site-section" id="portfolio-videos">
  <div class="site-container">
    
    <!-- Section Header (Bilingual via data-i18n) -->
    <div class="site-section-header">
      <div class="section-label" data-i18n="videos.section_num">[ 03 // MULTIMEDIA & STORYTELLING ]</div>
      <h2 class="section-heading" data-i18n="videos.heading">Produksi Video & Narasi Visual</h2>
      <p class="section-lead" data-i18n="videos.lead">
        Karya video editing, visual storytelling, dan dokumentasi institusi yang memadukan ritme tempo dinamis, color grading sinematik, dan audio berkarakter.
      </p>
    </div>

    <!-- Video Cards Grid -->
    <div class="videos-grid">
      <?php foreach ($videos as $video): ?>
        <article class="video-card" id="<?= htmlspecialchars($video['id']) ?>">
          
          <!-- Thumbnail Media Wrap with Zoom Lightbox Trigger -->
          <div 
            class="video-thumb-wrap"
            data-lightbox="true"
            data-lightbox-src="<?= htmlspecialchars($video['thumbnail']) ?>"
            data-lightbox-title="<?= htmlspecialchars(is_array($video['title']) ? $video['title']['id'] : $video['title']) ?>"
            data-lightbox-category="<?= htmlspecialchars(is_array($video['category']) ? $video['category']['id'] : $video['category']) ?>"
            tabindex="0"
            role="button"
            aria-label="Perbesar thumbnail video"
          >
            <img 
              src="<?= htmlspecialchars($video['thumbnail']) ?>" 
              alt="Thumbnail karya video <?= htmlspecialchars(is_array($video['title']) ? $video['title']['id'] : $video['title']) ?>" 
              class="video-thumb-img"
              loading="lazy"
              width="600"
              height="338"
            >

            <!-- Play Icon Overlay -->
            <div class="video-play-overlay" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                <polygon points="5 3 19 12 5 21 5 3"></polygon>
              </svg>
            </div>

            <!-- Duration Tag -->
            <?php if (!empty($video['duration'])): ?>
              <div class="video-duration-tag">
                <?= htmlspecialchars($video['duration']) ?>
              </div>
            <?php endif; ?>

            <div class="zoom-overlay-hint">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
              <span data-i18n="videos.zoom_hint">PERBESAR THUMBNAIL</span>
            </div>
          </div>

          <!-- Video Info Content -->
          <div class="video-info">
            
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem;">
              <span 
                class="badge badge-category"
                data-i18n-id="<?= htmlspecialchars(is_array($video['category']) ? $video['category']['id'] : $video['category']) ?>"
                data-i18n-en="<?= htmlspecialchars(is_array($video['category']) ? $video['category']['en'] : $video['category']) ?>"
              >
                <?= htmlspecialchars(is_array($video['category']) ? $video['category']['id'] : $video['category']) ?>
              </span>
              <?php if (!empty($video['year'])): ?>
                <span class="project-year">// <?= htmlspecialchars($video['year']) ?></span>
              <?php endif; ?>
            </div>

            <h3 
              class="video-title"
              data-i18n-id="<?= htmlspecialchars(is_array($video['title']) ? $video['title']['id'] : $video['title']) ?>"
              data-i18n-en="<?= htmlspecialchars(is_array($video['title']) ? $video['title']['en'] : $video['title']) ?>"
            >
              <?= htmlspecialchars(is_array($video['title']) ? $video['title']['id'] : $video['title']) ?>
            </h3>
            
            <p 
              class="video-desc"
              data-i18n-id="<?= htmlspecialchars(is_array($video['description']) ? $video['description']['id'] : $video['description']) ?>"
              data-i18n-en="<?= htmlspecialchars(is_array($video['description']) ? $video['description']['en'] : $video['description']) ?>"
            >
              <?= htmlspecialchars(is_array($video['description']) ? $video['description']['id'] : $video['description']) ?>
            </p>

            <!-- Software Used Tags -->
            <?php if (!empty($video['software']) && is_array($video['software'])): ?>
              <div style="display: flex; flex-wrap: wrap; gap: 0.4rem; margin-bottom: 1.25rem;">
                <?php foreach ($video['software'] as $tool): ?>
                  <span class="badge badge-tech" style="font-size: 0.68rem;"><?= htmlspecialchars($tool) ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- Action: Watch on Google Drive Button -->
            <div class="video-actions">
              <?php 
                $driveUrl = trim($video['demoUrl'] ?? '');
                $hasValidDrive = !empty($driveUrl) && filter_var($driveUrl, FILTER_VALIDATE_URL) && !preg_match('/^javascript:/i', $driveUrl);
              ?>

              <?php if ($hasValidDrive): ?>
                <a 
                  href="<?= htmlspecialchars($driveUrl) ?>" 
                  target="_blank" 
                  rel="noopener noreferrer" 
                  class="btn btn-primary btn-sm"
                >
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                  </svg>
                  <span data-i18n="videos.btn_watch">TONTON DI GOOGLE DRIVE</span>
                  <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="7" y1="17" x2="17" y2="7"></line>
                    <polyline points="7 7 17 7 17 17"></polyline>
                  </svg>
                </a>
              <?php else: ?>
                <!-- Tombol disabled secara aman jika URL belum tersedia -->
                <button class="btn btn-disabled btn-sm" type="button" title="Tautan Google Drive untuk video ini belum dipublikasikan">
                  <span data-i18n="videos.btn_link_disabled">LINK BELUM TERSEDIA</span>
                </button>
              <?php endif; ?>

              <span style="font-family: var(--font-mono); font-size: 0.7rem; color: var(--color-text-dim);">
                SOURCE: GOOGLE DRIVE
              </span>
            </div>

          </div>

        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

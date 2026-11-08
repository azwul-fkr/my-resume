<?php
/**
 * ==============================================================================
 * CERTIFICATES & CREDENTIALS INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 * Urutan hierarkis: Tingkat Internasional (atas), Tingkat Nasional (tengah), Umum (bawah).
 */
?>
<section class="site-section" id="certificates">
  <div class="site-container">
    
    <!-- Section Header (Bilingual Support via data-i18n) -->
    <div class="site-section-header">
      <div class="section-label" data-i18n="certificates.section_num">[ 02 // SERTIFIKASI & PELATIHAN ]</div>
      <h2 class="section-heading" data-i18n="certificates.heading">Sertifikat & Kualifikasi Resmi</h2>
      <p class="section-lead" data-i18n="certificates.lead">
        Dokumentasi pelatihan teknis resmi, sertifikasi profesi basis data, dan verifikasi kualifikasi yang telah diselesaikan untuk memperkuat kapabilitas rekayasa perangkat lunak.
      </p>
    </div>

    <!-- Certificates Grid (Tata letak responsif & rapi) -->
    <div class="certificates-grid">
      <?php foreach ($certificates as $index => $cert): ?>
        <article class="certificate-card" id="<?= htmlspecialchars($cert['id']) ?>">
          
          <!-- Document Preview Wrap with Lightbox Trigger -->
          <div 
            class="certificate-media-wrap"
            data-lightbox="true"
            data-lightbox-src="<?= htmlspecialchars($cert['image']) ?>"
            data-lightbox-title="<?= htmlspecialchars($cert['title']['id']) ?>"
            data-lightbox-category="<?= htmlspecialchars($cert['issuer']['id']) ?>"
            tabindex="0"
            role="button"
            aria-label="Perbesar sertifikat <?= htmlspecialchars($cert['title']['id']) ?>"
          >
            <img 
              src="<?= htmlspecialchars($cert['image']) ?>" 
              alt="Dokumen sertifikat <?= htmlspecialchars($cert['title']['id']) ?>" 
              class="certificate-img"
              loading="lazy"
              width="700"
              height="490"
            >
            <div class="zoom-overlay-hint">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                <line x1="11" y1="8" x2="11" y2="14"></line>
                <line x1="8" y1="11" x2="14" y2="11"></line>
              </svg>
              <span data-i18n="certificates.zoom_cert_hint">PERBESAR DOKUMEN</span>
            </div>
          </div>

          <!-- Certificate Content Info -->
          <div class="certificate-info">
            
            <div class="certificate-meta-top">
              <span 
                class="badge badge-category"
                data-i18n-id="<?= htmlspecialchars($cert['grade']['id']) ?>"
                data-i18n-en="<?= htmlspecialchars($cert['grade']['en']) ?>"
              >
                <?= htmlspecialchars($cert['grade']['id']) ?>
              </span>
              <span 
                class="project-year"
                data-i18n-id="<?= htmlspecialchars($cert['period']['id']) ?>"
                data-i18n-en="<?= htmlspecialchars($cert['period']['en']) ?>"
              >
                <?= htmlspecialchars($cert['period']['id']) ?>
              </span>
            </div>

            <h3 
              class="certificate-title"
              data-i18n-id="<?= htmlspecialchars($cert['title']['id']) ?>"
              data-i18n-en="<?= htmlspecialchars($cert['title']['en']) ?>"
            >
              <?= htmlspecialchars($cert['title']['id']) ?>
            </h3>

            <div 
              class="certificate-issuer"
              data-i18n-id="<?= htmlspecialchars($cert['issuer']['id']) ?>"
              data-i18n-en="<?= htmlspecialchars($cert['issuer']['en']) ?>"
            >
              <?= htmlspecialchars($cert['issuer']['id']) ?>
            </div>

            <p 
              class="certificate-desc"
              data-i18n-id="<?= htmlspecialchars($cert['description']['id']) ?>"
              data-i18n-en="<?= htmlspecialchars($cert['description']['en']) ?>"
            >
              <?= htmlspecialchars($cert['description']['id']) ?>
            </p>

            <!-- Skills Covered Tags -->
            <?php if (!empty($cert['skills']) && is_array($cert['skills'])): ?>
              <div class="certificate-skills">
                <?php foreach ($cert['skills'] as $skill): ?>
                  <span class="badge badge-tech" style="font-size: 0.68rem;"><?= htmlspecialchars($skill) ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- Action Buttons -->
            <div class="certificate-actions">
              <?php 
                $credUrl = trim($cert['credentialUrl'] ?? '');
                $hasValidCred = !empty($credUrl) && filter_var($credUrl, FILTER_VALIDATE_URL) && !preg_match('/^javascript:/i', $credUrl);
                $credId = trim($cert['credentialId'] ?? '');
              ?>

              <?php if (!empty($credId)): ?>
                <span class="mono-tag" style="font-size: 0.72rem; color: var(--color-text-muted);">
                  NO: <?= htmlspecialchars($credId) ?>
                </span>
              <?php endif; ?>

              <?php if ($hasValidCred): ?>
                <a 
                  href="<?= htmlspecialchars($credUrl) ?>" 
                  target="_blank" 
                  rel="noopener noreferrer" 
                  class="btn btn-primary btn-sm"
                >
                  <span data-i18n="certificates.btn_credential">VERIFIKASI KREDENSIAL</span>
                  <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="7" y1="17" x2="17" y2="7"></line>
                    <polyline points="7 7 17 7 17 17"></polyline>
                  </svg>
                </a>
              <?php endif; ?>

              <!-- Tombol Zoom Dokumen Penuh -->
              <button 
                type="button" 
                class="btn btn-secondary btn-sm"
                onclick="window.EgiPortfolioLightbox && window.EgiPortfolioLightbox.openCertificate('<?= htmlspecialchars($cert['image']) ?>', '<?= htmlspecialchars(addslashes($cert['title']['id'])) ?>', '<?= htmlspecialchars(addslashes($cert['issuer']['id'])) ?>')"
                aria-label="Perbesar dokumen sertifikat"
              >
                <span data-i18n="certificates.btn_view_cert">PERBESAR DOKUMEN SERTIFIKAT</span>
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </button>

            </div>

          </div>

        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

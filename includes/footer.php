<?php
/**
 * ==============================================================================
 * FOOTER & CONTACT INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 */
?>
<footer class="site-footer" id="contact">
  <div class="site-container">
    
    <div class="site-section-header" style="margin-bottom: 2rem;">
      <div class="section-label" data-i18n="contact.section_num">[ 06 // KONTAK & KERJASAMA ]</div>
    </div>

    <!-- Main Footer Contact Grid (Sesuai Referensi Image 5) -->
    <div class="footer-cta-grid">
      
      <!-- Kolom Kiri: CTA & CV Download -->
      <div>
        <h2 
          style="font-size: clamp(2.4rem, 4.5vw, 3.6rem); font-weight: 800; color: var(--color-text-primary); line-height: 1.1; margin-bottom: 1.25rem; letter-spacing: -0.03em;"
          data-i18n="contact.heading"
        >
          Memiliki proyek atau peluang kerja sama?
        </h2>
        <p 
          style="font-size: 1.05rem; color: var(--color-text-secondary); max-width: 52ch; line-height: 1.65; margin-bottom: 2.5rem;"
          data-i18n="contact.lead"
        >
          Terbuka untuk posisi full-time, proyek lepas (freelance), maupun kolaborasi teknis yang membutuhkan kejelasan arsitektur perangkat lunak.
        </p>

        <!-- Download CV Button -->
        <a 
          href="<?= htmlspecialchars($site['contact']['cv_download']) ?>" 
          target="_blank"
          rel="noopener noreferrer"
          class="btn btn-primary"
          id="btn-download-cv"
        >
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="3"></line>
          </svg>
          <span data-i18n="contact.btn_cv">UNDUH CURRICULUM VITAE (PDF)</span>
        </a>
      </div>

      <!-- Kolom Kanan: Detail Kontak Profesional -->
      <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        
        <!-- Email -->
        <div style="padding-bottom: 1.25rem; border-bottom: 1px solid var(--color-border-subtle);">
          <div class="mono-tag" style="margin-bottom: 0.35rem;" data-i18n="contact.email_label">SURAT ELEKTRONIK (EMAIL)</div>
          <?php if (!empty($site['contact']['email'])): ?>
            <a 
              href="mailto:<?= htmlspecialchars($site['contact']['email']) ?>" 
              style="font-size: 1.1rem; font-weight: 600; color: var(--color-text-primary); display: inline-flex; align-items: center; gap: 0.5rem;"
            >
              <span><?= htmlspecialchars($site['contact']['email']) ?></span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="7" y1="17" x2="17" y2="7"></line>
                <polyline points="7 7 17 7 17 17"></polyline>
              </svg>
            </a>
          <?php else: ?>
            <span style="color: var(--color-text-dim); font-size: 0.95rem;">[ Email belum dipublikasikan ]</span>
          <?php endif; ?>
        </div>

        <!-- Code Repository / GitHub -->
        <div style="padding-bottom: 1.25rem; border-bottom: 1px solid var(--color-border-subtle);">
          <div class="mono-tag" style="margin-bottom: 0.35rem;" data-i18n="contact.repo_label">REPOSITORI KODE (GITHUB)</div>
          <?php if (!empty($site['contact']['github'])): ?>
            <a 
              href="<?= htmlspecialchars($site['contact']['github']) ?>" 
              target="_blank" 
              rel="noopener noreferrer" 
              style="font-size: 1.05rem; font-weight: 600; color: var(--color-text-primary); display: inline-flex; align-items: center; gap: 0.5rem;"
            >
              <span><?= htmlspecialchars($site['contact']['github']) ?></span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="7" y1="17" x2="17" y2="7"></line>
                <polyline points="7 7 17 7 17 17"></polyline>
              </svg>
            </a>
          <?php else: ?>
            <span style="color: var(--color-text-dim); font-size: 0.95rem;">[ GitHub belum ditautkan ]</span>
          <?php endif; ?>
        </div>

        <!-- Location & Timezone -->
        <div>
          <div class="mono-tag" style="margin-bottom: 0.35rem;" data-i18n="contact.location_label">LOKASI / ZONA WAKTU</div>
          <div style="font-size: 0.95rem; color: var(--color-text-primary); font-weight: 500;">
            <?= htmlspecialchars($site['location']) ?> (<?= htmlspecialchars($site['timezone']) ?>)
          </div>
        </div>

      </div>

    </div>

    <!-- Bottom Bar (Copyright & Back to Top) -->
    <div class="footer-bottom">
      <div>
        &copy; <?= date('Y') ?> <?= htmlspecialchars($profile['name']) ?>. <span data-i18n="contact.rights">Hak cipta dilindungi undang-undang.</span>
      </div>
      <div>
        <a href="#hero" id="back-to-top-btn" style="display: inline-flex; align-items: center; gap: 0.4rem; color: var(--color-text-muted); font-family: var(--font-mono); font-size: 0.78rem;">
          <span data-i18n="contact.back_to_top">KEMBALI KE ATAS</span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="19" x2="12" y2="5"></line>
            <polyline points="5 12 12 5 19 12"></polyline>
          </svg>
        </a>
      </div>
    </div>

  </div>
</footer>
</body>
</html>

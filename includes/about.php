<?php
/**
 * ==============================================================================
 * ABOUT & SKILLS INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 */
?>
<section class="site-section" id="about">
  <div class="site-container">
    
    <!-- Section Header (Bilingual via data-i18n) -->
    <div class="site-section-header">
      <div class="section-label" data-i18n="about.section_num">[ 04 // TENTANG & KEAHLIAN ]</div>
      <h2 class="section-heading" data-i18n="about.heading">Rekayasa dengan Disiplin Struktural</h2>
      <p class="section-lead" data-i18n="about.lead">
        Pendekatan rekayasa perangkat lunak berbasis arsitektur modular, efisiensi database relasional, dan kode yang terorganisasi untuk menghasilkan aplikasi yang andal dan mudah dirawat.
      </p>
    </div>

    <div class="about-grid">
      
      <!-- Kolom Kiri: Narasi Profil & Riwayat Pendidikan -->
      <div class="about-narrative">
        <h3 
          style="font-size: 1.35rem; margin-bottom: 1rem; color: var(--color-text-primary); font-weight: 700;"
          data-i18n="about.narrative_title"
        >
          Fondasi Backend Kuat & Presisi Relasional
        </h3>
        
        <p 
          style="margin-bottom: 1.25rem; line-height: 1.7; color: var(--color-text-secondary);"
          data-i18n-id="<?= htmlspecialchars($profile['short_bio']['id']) ?>"
          data-i18n-en="<?= htmlspecialchars($profile['short_bio']['en']) ?>"
        >
          <?= htmlspecialchars($profile['short_bio']['id']) ?>
        </p>

        <p 
          style="margin-bottom: 2rem; line-height: 1.7; color: var(--color-text-muted);"
          data-i18n-id="<?= htmlspecialchars($profile['about_extended']['id']) ?>"
          data-i18n-en="<?= htmlspecialchars($profile['about_extended']['en']) ?>"
        >
          <?= htmlspecialchars($profile['about_extended']['id']) ?>
        </p>

        <!-- Academic Foundation Cards -->
        <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 1.5rem;">
          <div 
            class="mono-tag" 
            style="color: var(--color-text-primary); font-weight: 700; margin-bottom: 0.25rem;"
            data-i18n="about.academic_label"
          >
            FONDASI AKADEMIS
          </div>

          <?php foreach ($profile['education'] as $edu): ?>
            <div style="background-color: var(--color-surface); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-md); padding: 1.25rem; box-shadow: var(--shadow-subtle);">
              <div style="display: flex; align-items: baseline; justify-content: space-between; margin-bottom: 0.35rem;">
                <span style="font-weight: 700; color: var(--color-text-primary); font-size: 0.95rem;">
                  <?= htmlspecialchars($edu['institution']) ?>
                </span>
                <span 
                  class="badge badge-tech" 
                  style="font-size: 0.72rem; font-weight: 600;"
                  data-i18n-id="<?= htmlspecialchars(is_array($edu['score']) ? $edu['score']['id'] : $edu['score']) ?>"
                  data-i18n-en="<?= htmlspecialchars(is_array($edu['score']) ? $edu['score']['en'] : $edu['score']) ?>"
                >
                  <?= htmlspecialchars(is_array($edu['score']) ? $edu['score']['id'] : $edu['score']) ?>
                </span>
              </div>
              <div 
                style="font-family: var(--font-mono); font-size: 0.78rem; color: var(--color-text-secondary); margin-bottom: 0.5rem; font-weight: 500;"
                data-i18n-id="<?= htmlspecialchars(is_array($edu['program']) ? $edu['program']['id'] : $edu['program']) ?>"
                data-i18n-en="<?= htmlspecialchars(is_array($edu['program']) ? $edu['program']['en'] : $edu['program']) ?>"
              >
                <?= htmlspecialchars(is_array($edu['program']) ? $edu['program']['id'] : $edu['program']) ?>
              </div>
              <p 
                style="font-size: 0.85rem; color: var(--color-text-muted); line-height: 1.55;"
                data-i18n-id="<?= htmlspecialchars(is_array($edu['notes']) ? $edu['notes']['id'] : $edu['notes']) ?>"
                data-i18n-en="<?= htmlspecialchars(is_array($edu['notes']) ? $edu['notes']['en'] : $edu['notes']) ?>"
              >
                <?= htmlspecialchars(is_array($edu['notes']) ? $edu['notes']['id'] : $edu['notes']) ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>

      </div>

      <!-- Kolom Kanan: Skill Matrix Berdasarkan Kategori -->
      <div class="skills-stack-grid">
        <?php foreach ($profile['technical_skills'] as $categoryName => $skillsList): ?>
          <div class="skill-category-block">
            <div class="skill-category-header">
              <span class="skill-category-title"><?= htmlspecialchars($categoryName) ?></span>
              <span class="mono-tag"><?= count($skillsList) ?> <span data-i18n="about.modules_label">MODUL</span></span>
            </div>

            <div class="skill-items-list">
              <?php foreach ($skillsList as $skill): ?>
                <div class="skill-item">
                  <span style="font-weight: 500;"><?= htmlspecialchars($skill['name']) ?></span>
                  <span class="skill-level-badge"><?= htmlspecialchars($skill['level']) ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
</section>

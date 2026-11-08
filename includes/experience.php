<?php
/**
 * ==============================================================================
 * EXPERIENCE / TRAJECTORY INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 */
?>
<section class="site-section" id="experience">
  <div class="site-container">
    
    <!-- Section Header (Bilingual via data-i18n) -->
    <div class="site-section-header">
      <div class="section-label" data-i18n="experience.section_num">[ 05 // KARIER & PENGALAMAN ]</div>
      <h2 class="section-heading" data-i18n="experience.heading">Rekam Jejak Profesional</h2>
      <p class="section-lead" data-i18n="experience.lead">
        Riwayat keterlibatan dalam proyek pengembangan web, kolaborasi tim rekayasa, dan implementasi sistem nyata di industri.
      </p>
    </div>

    <!-- Chronological Trajectory List -->
    <div class="trajectory-list">
      <?php foreach ($profile['experience'] as $exp): ?>
        <div class="trajectory-item">
          
          <!-- Period / Year -->
          <div class="traj-year-col">
            <div style="font-family: var(--font-mono); font-size: 1.15rem; font-weight: 700; color: var(--color-text-primary);">
              <?= htmlspecialchars($exp['period']) ?>
            </div>
            <div class="mono-tag" style="margin-top: 0.25rem;" data-i18n="experience.badge">
              PROFESIONAL
            </div>
          </div>

          <!-- Role & Description -->
          <div class="traj-content-col">
            <h3 
              style="font-size: 1.25rem; font-weight: 700; color: var(--color-text-primary); margin-bottom: 0.25rem;"
              data-i18n-id="<?= htmlspecialchars(is_array($exp['role']) ? $exp['role']['id'] : $exp['role']) ?>"
              data-i18n-en="<?= htmlspecialchars(is_array($exp['role']) ? $exp['role']['en'] : $exp['role']) ?>"
            >
              <?= htmlspecialchars(is_array($exp['role']) ? $exp['role']['id'] : $exp['role']) ?>
            </h3>
            
            <div style="font-family: var(--font-mono); font-size: 0.85rem; color: var(--color-text-secondary); margin-bottom: 0.75rem; font-weight: 600;">
              <?= htmlspecialchars($exp['company']) ?>
            </div>
            
            <p 
              style="font-size: 0.92rem; color: var(--color-text-secondary); line-height: 1.6;"
              data-i18n-id="<?= htmlspecialchars(is_array($exp['description']) ? $exp['description']['id'] : $exp['description']) ?>"
              data-i18n-en="<?= htmlspecialchars(is_array($exp['description']) ? $exp['description']['en'] : $exp['description']) ?>"
            >
              <?= htmlspecialchars(is_array($exp['description']) ? $exp['description']['id'] : $exp['description']) ?>
            </p>
          </div>

          <!-- Tech Stack Tags -->
          <div class="traj-tags-col" style="display: flex; flex-wrap: wrap; gap: 0.4rem; justify-content: flex-end;">
            <?php foreach ($exp['stack'] as $item): ?>
              <span class="badge badge-tech" style="font-size: 0.7rem;"><?= htmlspecialchars($item) ?></span>
            <?php endforeach; ?>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

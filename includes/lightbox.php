<?php
/**
 * ==============================================================================
 * LIGHTBOX MODAL INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 */
?>
<div 
  id="lightbox-modal" 
  class="lightbox-modal" 
  role="dialog" 
  aria-modal="true" 
  aria-hidden="true" 
  aria-label="Tampilan Detail Gambar Portfolio"
>
  <!-- Backdrop Blur Overlay -->
  <div class="lightbox-backdrop" id="lightbox-backdrop"></div>

  <!-- Header Bar: Info Judul, Counter & Tombol Kontrol -->
  <div class="lightbox-header">
    <div class="lightbox-info">
      <div class="lightbox-title" id="lightbox-title">Detail Gambar Proyek</div>
      <div class="lightbox-counter" id="lightbox-counter">1 / 1</div>
    </div>

    <!-- Toolbar Zoom & Navigasi -->
    <div class="lightbox-controls">
      <!-- Zoom Out (-) -->
      <button 
        type="button" 
        class="lightbox-btn" 
        id="lightbox-btn-zoomout" 
        title="Zoom Out (-)" 
        aria-label="Perkecil Gambar"
      >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          <line x1="8" y1="11" x2="14" y2="11"></line>
        </svg>
      </button>

      <!-- Zoom In (+) -->
      <button 
        type="button" 
        class="lightbox-btn" 
        id="lightbox-btn-zoomin" 
        title="Zoom In (+)" 
        aria-label="Perbesar Gambar"
      >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          <line x1="11" y1="8" x2="11" y2="14"></line>
          <line x1="8" y1="11" x2="14" y2="11"></line>
        </svg>
      </button>

      <!-- Reset Zoom (100%) -->
      <button 
        type="button" 
        class="lightbox-btn" 
        id="lightbox-btn-reset" 
        title="Reset Zoom (0)" 
        aria-label="Kembalikan Ukuran Asli"
      >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
          <path d="M3 3v5h5"></path>
        </svg>
      </button>

      <!-- Close Button (X / ESC) -->
      <button 
        type="button" 
        class="lightbox-btn" 
        id="lightbox-btn-close" 
        title="Tutup (Esc)" 
        aria-label="Tutup Tampilan Penuh"
      >
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
  </div>

  <!-- Viewport Area Utama Gambar -->
  <div class="lightbox-viewport" id="lightbox-viewport">
    
    <!-- Previous Arrow Button -->
    <button 
      type="button" 
      class="lightbox-nav-arrow lightbox-prev" 
      id="lightbox-btn-prev" 
      title="Gambar Sebelumnya (Panah Kiri)" 
      aria-label="Gambar Sebelumnya"
    >
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="15 18 9 12 15 6"></polyline>
      </svg>
    </button>

    <!-- Image Container with Zoom & Pan Transforms -->
    <div class="lightbox-image-container">
      <img 
        src="" 
        alt="Preview Gambar Detail" 
        class="lightbox-img" 
        id="lightbox-img"
      >
    </div>

    <!-- Next Arrow Button -->
    <button 
      type="button" 
      class="lightbox-nav-arrow lightbox-next" 
      id="lightbox-btn-next" 
      title="Gambar Selanjutnya (Panah Kanan)" 
      aria-label="Gambar Selanjutnya"
    >
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="9 18 15 12 9 6"></polyline>
      </svg>
    </button>

  </div>

  <!-- Footer Info & Keyboard Hints -->
  <div class="lightbox-footer">
    <span>PETUNJUK: Scroll mouse untuk zoom · Drag mouse saat zoomed · Tombol ESC untuk tutup</span>
    <span>HIGH-FIDELITY PREVIEW</span>
  </div>
</div>

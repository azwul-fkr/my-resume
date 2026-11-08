<?php
/**
 * ==============================================================================
 * KONFIGURASI SITUS - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 * File ini mengatur konfigurasi global website.
 * UBAH DATA: Sesuaikan nama situs, email, status ketersediaan kerja, dan tautan sosial.
 */

return [
    // UBAH IDENTITAS SITUS
    'site_name'        => 'Egi Azwul Fikri | Web Developer Portfolio',
    'site_title'       => 'Egi Azwul Fikri — Web Developer & Database Management',
    'site_description' => 'Portfolio profesional Egi Azwul Fikri: Web Developer spesialis Laravel, PHP, dan Database Management. Membangun aplikasi web terstruktur, fungsional, dan scalable.',
    'site_author'      => 'Egi Azwul Fikri',
    'site_version'     => '1.0.2',
    'site_url'         => '', // Kosongkan untuk deteksi otomatis URL lokal / hosting

    // UBAH STATUS KETERSEDIAAN (Badge di Header / Hero)
    // Contoh status: 'AVAILABLE FOR HIRE / COLLABORATION', 'OPEN TO OPPORTUNITIES'
    'availability_status' => 'AVAILABLE FOR HIRE / COLLABORATION',

    // UBAH LOKASI DAN ZONA WAKTU
    'location'  => 'Tasikmalaya, Jawa Barat, Indonesia',
    'timezone'  => 'Asia/Jakarta (GMT+7)',
    'coordinates' => 'LAT: -7.3274 / LNG: 108.2207',

    // UBAH KONTAK & MEDIA SOSIAL
    // CATATAN: Masukkan URL sebenarnya saat sudah tersedia. Biarkan kosong jika belum ada.
    'contact' => [
        'email'       => 'azwlvkry361@gmail.com', // UBAH EMAIL: Ganti dengan alamat email Anda
        'phone'       => '', // Kosongkan jika tidak ingin dipublikasikan
        'github'      => 'https://github.com/azwul-fkr', // UBAH GITHUB: Ganti URL profil GitHub Anda
        'linkedin'    => 'https://linkedin.com/in/egiazwulfikri', // UBAH LINKEDIN: Ganti URL profil LinkedIn Anda
        'instagram'   => '', // Opsional
        'cv_download' => 'https://drive.google.com/file/d/10ba9hlGSZjIcMroP-hhGrKb3Xc292Vvr/view?usp=sharing', // Tautan CV Google Drive resmi
    ],

    // UBAH FITUR TAMPILAN
    'features' => [
        'enable_threejs' => true,  // Set false jika ingin mematikan elemen 3D Three.js
        'enable_lightbox' => true, // Set false jika ingin mematikan fitur zoom gambar
        'dark_mode_only' => true,  // Desain default adalah dark modern technical seperti referensi
    ],
];

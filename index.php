<?php
/**
 * ==============================================================================
 * PORTFOLIO ENTRY POINT - EGI AZWUL FIKRI
 * ==============================================================================
 * Web Developer | Laravel, PHP & Database Management
 * 
 * Arsitektur modular:
 * 1. config/site.php           -> Pengaturan umum website
 * 2. data/profile.php          -> Data biodata, keahlian, dan riwayat (Bilingual)
 * 3. data/websites.php         -> Data portfolio website (Bilingual)
 * 4. data/certificates.php     -> Data sertifikat dan kualifikasi resmi (Bilingual)
 * 5. data/videos.php           -> Data portfolio video (Bilingual)
 * 6. data/translations.php     -> Kamus terjemahan bilingual (ID & EN)
 * 7. includes/                 -> Komponen template HTML/PHP
 */

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '0');

// 1. Muat Konfigurasi & Data
$site         = require __DIR__ . '/config/site.php';
$profile      = require __DIR__ . '/data/profile.php';
$websites     = require __DIR__ . '/data/websites.php';
$certificates = require __DIR__ . '/data/certificates.php';
$videos       = require __DIR__ . '/data/videos.php';
$translations = require __DIR__ . '/data/translations.php';

// 2. Render Komponen Modular (Urutan: Hero -> Website -> Certificates -> Video -> About -> Experience -> Contact)
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/navbar.php';
require __DIR__ . '/includes/hero.php';
require __DIR__ . '/includes/portfolio-websites.php';
require __DIR__ . '/includes/certificates.php';
require __DIR__ . '/includes/portfolio-videos.php';
require __DIR__ . '/includes/about.php';
require __DIR__ . '/includes/experience.php';
require __DIR__ . '/includes/lightbox.php';
require __DIR__ . '/includes/footer.php';

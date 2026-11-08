<?php
/**
 * ==============================================================================
 * HEAD INCLUDE - EGI AZWUL FIKRI PORTFOLIO
 * ==============================================================================
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!-- SEO Meta Tags -->
  <title><?= htmlspecialchars($translations['id']['meta']['title']) ?></title>
  <meta name="description" content="<?= htmlspecialchars($translations['id']['meta']['desc']) ?>">
  <meta name="author" content="<?= htmlspecialchars($site['site_author']) ?>">
  <meta name="robots" content="index, follow">
  
  <!-- Open Graph / Social -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= htmlspecialchars($translations['id']['meta']['title']) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($translations['id']['meta']['desc']) ?>">
  <meta property="og:image" content="assets/images/websites/exploresantanamekar.jpg">

  <!-- Favicon Monogram -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230f172a'/><text x='50%' y='68%' font-family='sans-serif' font-weight='900' font-size='56' fill='%23ffffff' text-anchor='middle'>E</text></svg>">

  <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="assets/css/main.css?v=<?= htmlspecialchars($site['site_version']) ?>">
  <link rel="stylesheet" href="assets/css/layout.css?v=<?= htmlspecialchars($site['site_version']) ?>">
  <link rel="stylesheet" href="assets/css/components.css?v=<?= htmlspecialchars($site['site_version']) ?>">
  <link rel="stylesheet" href="assets/css/responsive.css?v=<?= htmlspecialchars($site['site_version']) ?>">

  <!-- Three.js (Hanya dimuat jika fitur Three.js aktif di config/site.php) -->
  <?php if (!empty($site['features']['enable_threejs'])): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
    <script src="assets/js/three-scene.js?v=<?= htmlspecialchars($site['site_version']) ?>" defer></script>
  <?php endif; ?>

  <!-- Scripts Interaksi, I18n & Lightbox -->
  <script src="assets/js/interactions.js?v=<?= htmlspecialchars($site['site_version']) ?>" defer></script>
  <script src="assets/js/i18n.js?v=<?= htmlspecialchars($site['site_version']) ?>" defer></script>
  <script src="assets/js/lightbox.js?v=<?= htmlspecialchars($site['site_version']) ?>" defer></script>
  <script src="assets/js/main.js?v=<?= htmlspecialchars($site['site_version']) ?>" defer></script>
</head>
<body>

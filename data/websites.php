<?php
/**
 * ==============================================================================
 * DATA PORTFOLIO WEBSITE - EGI AZWUL FIKRI
 * ==============================================================================
 * Struktur data bilingual (ID & EN) untuk proyek website.
 * UBAH DATA: Sesuaikan teks bahasa Indonesia ('id') dan bahasa Inggris ('en').
 */

return [
    // -------------------------------------------------------------------------
    // PROYEK 1: EXPLORESANTANAMEKAR
    // -------------------------------------------------------------------------
    [
        'id'           => 'exploresantanamekar',
        'title'        => 'ExploreSantanaMekar',
        'subtitle'     => [
            'id' => 'Sistem Informasi Wisata Desa & Pemetaan GIS Interaktif',
            'en' => 'Tourism Information System & Interactive GIS Mapping',
        ],
        'category'     => [
            'id' => 'Pengembangan Web / Sistem Informasi Pariwisata',
            'en' => 'Web Development / Tourism Information System',
        ],
        'description'  => [
            'id' => 'Website informasi wisata Desa Santanamekar yang menyajikan informasi destinasi curug unggulan, peta geografis interaktif, profil desa, statistik pengunjung, serta direktori fasilitas publik untuk mendukung promosi wisata berkelanjutan.',
            'en' => 'A comprehensive tourism portal for Santanamekar Village showcasing natural waterfall attractions, interactive geographical mapping, village statistics, and public facility directories to promote sustainable local tourism.',
        ],
        'image'        => 'assets/images/websites/exploresantanamekar.jpg',
        'demoUrl'      => '', // UBAH DEMO: Masukkan link demo website jika sudah aktif
        'technologies' => ['Laravel', 'PHP', 'MySQL', 'JavaScript', 'GIS Mapping', 'Responsive CSS'],
        'featured'     => true,
        'year'         => '2024 - 2025',
        'highlights'   => [
            'id' => [
                'Pemetaan interaktif destinasi wisata desa dengan koordinat akurat',
                'Dashboard statistik wilayah dan data kunjungan wisatawan desa',
                'Tampilan antarmuka responsif yang ramah perangkat seluler',
            ],
            'en' => [
                'Interactive GIS mapping of village tourism destinations with precise coordinates',
                'Statistical analytics dashboard for demographic and visitor records',
                'Fully responsive web architecture optimized for mobile devices',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // PROYEK 2: AGROMART
    // -------------------------------------------------------------------------
    [
        'id'           => 'agromart',
        'title'        => 'AgroMart',
        'subtitle'     => [
            'id' => 'Marketplace Komoditas Pertanian & Ekosistem Petani',
            'en' => 'Agricultural Commodity Marketplace & Farmer Platform',
        ],
        'category'     => [
            'id' => 'Aplikasi Web / Platform Pertanian Digital',
            'en' => 'Web Application / Agricultural Digital Platform',
        ],
        'description'  => [
            'id' => 'Platform digital sektor pertanian yang dirancang untuk mendukung hubungan langsung antara petani, penjual pupuk/alat, dan pembeli hasil panen dengan manajemen inventori stok komoditas dan tren harga pasar.',
            'en' => 'A digital agricultural platform connecting farmers, agricultural suppliers, and commodity buyers with real-time inventory management and seasonal market price analytics.',
        ],
        'image'        => 'assets/images/websites/agromart.jpg',
        'demoUrl'      => '',
        'technologies' => ['Laravel', 'PHP', 'MySQL', 'JavaScript', 'REST API', 'Data Analytics'],
        'featured'     => true,
        'year'         => '2024',
        'highlights'   => [
            'id' => [
                'Manajemen listing komoditas pertanian dan kategori hasil panen',
                'Pencatatan volume transaksi dan analisis tren harga musiman',
                'Panel dashboard pengguna terstruktur untuk petani dan pembeli',
            ],
            'en' => [
                'Structured crop listings and commodity category inventory',
                'Transaction volume tracking and seasonal market trend insights',
                'Dedicated user dashboard for farmers and bulk commodity buyers',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // PROYEK 3: SISTEM PENILAIAN KINERJA GURU (SIMPEG APP)
    // -------------------------------------------------------------------------
    [
        'id'           => 'simpeg-app',
        'title'        => 'SIMPEG APP — Penilaian Kinerja Guru',
        'subtitle'     => [
            'id' => 'Sistem Evaluasi Kinerja Guru & Pendukung Keputusan (AHP)',
            'en' => 'Teacher Performance Evaluation & Decision Support System (AHP)',
        ],
        'category'     => [
            'id' => 'Aplikasi Web / Sistem Pendukung Keputusan',
            'en' => 'Web Application / Decision Support System',
        ],
        'description'  => [
            'id' => 'Aplikasi evaluasi dan penilaian kinerja guru berbasis web dengan implementasi kriteria bertingkat (Analytical Hierarchy Process / AHP). Dilengkapi manajemen evaluator, matriks rubrik penilaian, upload bukti eviden fisik, dan analitik performa terperinci.',
            'en' => 'A structured web-based evaluation platform utilizing the Analytical Hierarchy Process (AHP) methodology. Features evaluator assignments, multi-criteria scoring rubrics, digital evidence uploads, and longitudinal performance analytics.',
        ],
        'image'        => 'assets/images/websites/simpeg-app.jpg',
        'demoUrl'      => '',
        'technologies' => ['Laravel', 'PHP', 'MySQL', 'Flutter Integration', 'AHP Algorithm'],
        'featured'     => true,
        'year'         => '2025',
        'highlights'   => [
            'id' => [
                'Sistem penilaian terstruktur dengan pembobotan kriteria dan kompetensi',
                'Pengorganisasian berkas eviden bukti dukung penilaian secara digital',
                'Visualisasi grafik performa periode evaluasi guru secara berkala',
            ],
            'en' => [
                'Multi-criteria scoring model with weighted competency benchmarks',
                'Digital assessment evidence repository and document verification',
                'Performance progress charting across academic evaluation periods',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // PROYEK 4: ACTRA BIOMETRICS
    // -------------------------------------------------------------------------
    [
        'id'           => 'actra-biometrics',
        'title'        => 'ACTRA — Smart Attendance System',
        'subtitle'     => [
            'id' => 'Sistem Presensi Berbasis Validasi GPS & Verifikasi Face ID',
            'en' => 'Attendance Management with GPS & Face ID Verification',
        ],
        'category'     => [
            'id' => 'Sistem Manajemen Presensi / Otomasi Lapangan',
            'en' => 'Attendance Management System / Field Automation',
        ],
        'description'  => [
            'id' => 'Sistem presensi mutakhir yang memadukan validasi titik koordinat GPS geofencing dan verifikasi pengenalan wajah (Face ID). Menjamin integritas data absensi kehadiran tenaga lapangan secara real-time dan bebas kecurangan.',
            'en' => 'An enterprise attendance management system combining real-time GPS geofencing with facial recognition (Face ID) verification to ensure tamper-proof on-site presence tracking.',
        ],
        'image'        => 'assets/images/websites/actra.jpg',
        'demoUrl'      => '',
        'technologies' => ['Laravel', 'Face ID API', 'GPS Geolocation', 'MySQL', 'RESTful API'],
        'featured'     => true,
        'year'         => '2026',
        'highlights'   => [
            'id' => [
                'Deteksi dan validasi lokasi koordinat GPS secara presisi real-time',
                'Verifikasi wajah biometrik untuk memastikan keaslian presensi',
                'Integrasi REST API terenkripsi untuk dashboard rekapitulasi kehadiran',
            ],
            'en' => [
                'Precise GPS geofence boundary validation in real-time',
                'Biometric face matching to prevent attendance spoofing',
                'Encrypted RESTful API pipeline serving administrative dashboard',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // PROYEK 5: SIAKO
    // -------------------------------------------------------------------------
    [
        'id'           => 'siako-system',
        'title'        => 'SIAKO — Administrasi Perceraian Online',
        'subtitle'     => [
            'id' => 'Sistem Informasi Administrasi Perkara & Notifikasi Terpadu',
            'en' => 'Case Administration Information System & Digital Workflow',
        ],
        'category'     => [
            'id' => 'Administrasi Publik / Layanan Digital Terpadu',
            'en' => 'Public Administration / Integrated Digital Services',
        ],
        'description'  => [
            'id' => 'Platform sistem informasi terpadu untuk menyederhanakan proses pendaftaran perkara perdata, verifikasi berkas administrasi secara digital, pelacakan alur sidang berjenjang, dan transparansi audit log pengadilan.',
            'en' => 'An integrated legal workflow platform designed to streamline case submission, digital document verification, proceeding tracking, and administrative audit logging.',
        ],
        'image'        => 'assets/images/websites/siako.jpg',
        'demoUrl'      => '',
        'technologies' => ['Laravel', 'PHP', 'MySQL', 'Role-Based Access Control', 'Audit Logs'],
        'featured'     => false,
        'year'         => '2025',
        'highlights'   => [
            'id' => [
                'Pendaftaran digital dan penelusuran status pengajuan secara mandiri',
                'Manajemen dokumen perkara dengan pembagian hak akses terproteksi',
                'Laporan komprehensif dan monitoring uptime layanan administrasi',
            ],
            'en' => [
                'Self-service digital case filing and milestone application tracking',
                'Secure role-based document management for administrative staff',
                'Operational uptime monitoring and automated administrative reporting',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // PROYEK 6: ICIH
    // -------------------------------------------------------------------------
    [
        'id'           => 'icih-system',
        'title'        => 'ICIH — Sistem Pencatatan Keuangan Mikro',
        'subtitle'     => [
            'id' => 'Aplikasi Pembukuan Kas & Arus Keuangan Organisasi',
            'en' => 'Small-Scale Financial Ledger & Organizational Cash Flow System',
        ],
        'category'     => [
            'id' => 'Manajemen Keuangan / Aplikasi Web Pembukuan',
            'en' => 'Financial Management / Web Bookkeeping Application',
        ],
        'description'  => [
            'id' => 'Solusi digital sederhana dan efektif untuk pencatatan kas masuk, pengeluaran berpos anggaran, pemantauan saldo sisa kas, serta visualisasi arus kas bulanan yang transparan untuk organisasi dan kepanitiaan.',
            'en' => 'A clean bookkeeping application designed for student groups, communities, and committees to log revenue, categorize expenditure, monitor budget burn rates, and visualize cash flow trends.',
        ],
        'image'        => 'assets/images/websites/icih.jpg',
        'demoUrl'      => '',
        'technologies' => ['Laravel', 'PHP', 'MySQL', 'Data Visualization', 'Export PDF/Excel'],
        'featured'     => false,
        'year'         => '2025',
        'highlights'   => [
            'id' => [
                'Pencatatan real-time pemasukan dan pengeluaran per kategori anggaran',
                'Visualisasi grafik arus kas dan distribusi pos biaya organisasi',
                'Ringkasan neraca kas transparan yang dapat diakses anggota',
            ],
            'en' => [
                'Real-time cash in/out entry mapped to budget line items',
                'Interactive monthly cash flow charts and expenditure distribution',
                'Transparent organizational balance summaries with export capabilities',
            ],
        ],
    ],
];

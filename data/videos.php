<?php
/**
 * ==============================================================================
 * DATA PORTFOLIO VIDEO - EGI AZWUL FIKRI
 * ==============================================================================
 * Struktur data bilingual untuk portofolio video.
 */

return [
    // -------------------------------------------------------------------------
    // VIDEO 1: SHOWREEL & VIDEO PRODUCTION SHOWCASE
    // -------------------------------------------------------------------------
    [
        'id'          => 'video-editing-showreel',
        'title'       => [
            'id' => 'Creative Video Editing & Motion Showreel',
            'en' => 'Creative Video Editing & Motion Showreel',
        ],
        'category'    => [
            'id' => 'Editing Video & Visual Storytelling',
            'en' => 'Video Editing & Visual Storytelling',
        ],
        'duration'    => 'Full HD / Cinematic',
        'year'        => '2024 - 2025',
        'description' => [
            'id' => 'Kompilasi karya video editing yang mengedepankan ritme tempo dinamis, color grading sinematik, transisi mulus, dan perpaduan audio sound design yang membangkitkan emosi cerita penonton.',
            'en' => 'A curated montage of editing projects demonstrating dynamic pacing, cinematic color grading, seamless scene transitions, and audio soundscapes crafted to evoke narrative resonance.',
        ],
        'thumbnail'   => 'assets/images/videos/showreel.jpg',
        'demoUrl'     => '', // UBAH LINK GOOGLE DRIVE: Masukkan URL share Google Drive Anda di sini
        'software'    => ['Adobe Premiere Pro', 'DaVinci Resolve', 'Sound Design'],
    ],

    // -------------------------------------------------------------------------
    // VIDEO 2: COMPANY PROFILE & DOCUMENTARY PROJECT
    // -------------------------------------------------------------------------
    [
        'id'          => 'video-company-profile',
        'title'       => [
            'id' => 'Narrative & Institutional Video Project',
            'en' => 'Narrative & Institutional Video Project',
        ],
        'category'    => [
            'id' => 'Dokumentasi & Profil Institusi',
            'en' => 'Documentary & Institutional Profile',
        ],
        'duration'    => 'Institutional Feature',
        'year'        => '2024',
        'description' => [
            'id' => 'Produksi video dokumenter dan profil institusi yang mengintegrasikan wawancara terarah, footage b-roll terencana, storytelling alur kegiatan, dan narasi informatif yang menginspirasi.',
            'en' => 'Institutional documentary production featuring structured on-camera interviews, targeted b-roll cinematography, organizational storytelling, and clear informative voiceover direction.',
        ],
        'thumbnail'   => 'assets/images/videos/company-profile-video.jpg',
        'demoUrl'     => '', // UBAH LINK GOOGLE DRIVE: Masukkan URL share Google Drive Anda di sini
        'software'    => ['Storyboarding', 'Video Editing', 'Color Correction'],
    ],
];

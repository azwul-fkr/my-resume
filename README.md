# Portfolio Website — Egi Azwul Fikri
> **Web Developer | Laravel, PHP & Database Management**

Website portfolio pribadi profesional, elegan, interaktif, responsif, dan ringan yang dibangun dengan arsitektur modular PHP, CSS Vanilla (Design Tokens), JavaScript modern, Three.js 3D IT Network Topology Visualization, Sistem Pelokalan Bilingual (ID & EN), dan Lightbox Document Detail Viewer.

---

## 📁 Struktur Direktori

```text
new-portfolio/
├── index.php                      # Entry point utama aplikasi
├── index.html                     # Export statis HTML
├── README.md                      # Dokumentasi & panduan kustomisasi
├── config/
│   └── site.php                   # Pengaturan situs, meta, kontak, & fitur
├── data/
│   ├── profile.php                # Biodata, keahlian, pendidikan, & pengalaman (Bilingual)
│   ├── websites.php               # Data portfolio website (Bilingual)
│   ├── certificates.php           # Data sertifikat dan kualifikasi resmi (Bilingual)
│   ├── videos.php                 # Data portfolio video (Bilingual)
│   └── translations.php           # Kamus terjemahan bilingual (ID & EN)
├── includes/
│   ├── head.php                   # Tag meta SEO, Google Fonts, & stylesheets
│   ├── navbar.php                 # Navigasi sticky, language selector, & status ketersediaan
│   ├── hero.php                   # Hero section (potret profil + kanvas 3D IT network)
│   ├── portfolio-websites.php     # Section 01: Solusi Web Berstandar Arsitektur
│   ├── certificates.php           # Section 02: Sertifikat & Kualifikasi Resmi
│   ├── portfolio-videos.php       # Section 03: Produksi Video & Narasi Visual
│   ├── about.php                  # Section 04: Rekayasa dengan Disiplin Struktural
│   ├── experience.php             # Section 05: Rekam Jejak Profesional
│   ├── lightbox.php               # Modal zoom & detail preview dokumen/gambar
│   └── footer.php                 # Section 06: Kontak, CV download, & footer
└── assets/
    ├── css/
    │   ├── main.css               # Design tokens, variabel warna, tipografi
    │   ├── layout.css             # Grid, container, section spacing, flex
    │   ├── components.css         # Tombol, kartu browser mockup, badges, kartu sertifikat, lightbox
    │   └── responsive.css         # Breakpoint 320px s.d. 2560px, accessibility
    ├── js/
    │   ├── main.js                # Console banner & bootstrap
    │   ├── interactions.js        # Navigasi scroll spy, mobile menu, back-to-top
    │   ├── i18n.js                # Sistem switching bahasa bilingual instan (ID & EN)
    │   ├── lightbox.js            # Zoom (+/-), pan/drag, navigasi keyboard & touch
    │   └── three-scene.js         # Visualisasi arsitektur 3D IT Network & transmisi data
    └── images/
        ├── profile/               # Foto potret profil (profile.webp & profile.jpg)
        ├── websites/              # Screenshot mockup proyek website
        ├── certificates/          # Dokumen sertifikat resmi (database-administrator.webp, dll.)
        └── videos/                # Thumbnail video showcase
```

---

## 🚀 Panduan Kustomisasi & Edit Data

Semua file data dan aset telah diberi komentar `//` dan `/* */` yang jelas untuk memudahkan modifikasi:

### 1. Menambahkan / Mengubah Sertifikat
- Simpan file gambar atau scan sertifikat asli ke folder:
  `assets/images/certificates/nama-file-sertifikat.webp` (atau format `.jpg` / `.png`).
- Buka file `data/certificates.php`.
- Salin satu blok array item untuk menambahkan sertifikat baru:
  ```php
  [
      'id'            => 'cert-nama-unik',
      'title'         => [
          'id' => 'Judul Sertifikat dalam Bahasa Indonesia',
          'en' => 'Certificate Title in English',
      ],
      'issuer'        => [
          'id' => 'Nama Lembaga Penerbit',
          'en' => 'Issuing Organization Name',
      ],
      'period'        => [
          'id' => 'Tahun 2026',
          'en' => 'Year 2026',
      ],
      'grade'         => [
          'id' => 'Predikat: Mahir',
          'en' => 'Proficiency: Advanced',
      ],
      'description'   => [
          'id' => 'Deskripsi kompetensi yang dipelajari dan diuji.',
          'en' => 'Description of competencies studied and tested.',
      ],
      'image'         => 'assets/images/certificates/nama-file-sertifikat.webp',
      'credentialUrl' => 'https://verification-link.com/id', // Kosongkan '' jika belum ada URL
      'credentialId'  => 'NOMOR-REGISTRASI', // Opsional
      'skills'        => ['Skill 1', 'Skill 2', 'Skill 3'],
  ],
  ```
- *Catatan:* Ketika gambar sertifikat diklik, dokumen akan terbuka dalam ukuran besar dengan rasio proporsional aslinya (`object-fit: contain`), lengkap dengan fitur zoom (+/-), pan/drag, dan keyboard navigasi.

### 2. Pengalih Bahasa (Indonesian & English Localization)
- Pengalih bahasa terletak di kanan atas navbar (`[ ID | EN ]`).
- Pilihan bahasa otomatis tersimpan di `localStorage` browser dan langsung memperbarui teks halaman secara instan tanpa perlu reload.
- Untuk menambah atau mengubah terjemahan antarmuka umum, buka `data/translations.php` dan `assets/js/i18n.js`.
- Untuk konten dinamis proyek, sertifikat, dan biodata, format bilingual menggunakan array:
  ```php
  'title' => [
      'id' => 'Teks Bahasa Indonesia',
      'en' => 'English Text',
  ],
  ```

### 3. Mengubah Parameter Visualisasi 3D IT Network
- Buka file `assets/js/three-scene.js`.
- Objek `CONFIG` di bagian atas mengatur parameter visual:
  ```javascript
  const CONFIG = {
    idleRotationY: 0.0016,       // Kecepatan rotasi horizontal
    idleRotationX: 0.0006,       // Kecepatan rotasi vertikal
    pointerSensitivity: 0.45,    // Kepekaan respon pointer kursor
    dataPulseCount: 8,           // Jumlah sinyal data aktif yang mengalir
    dataPulseSpeed: 0.012,       // Kecepatan aliran paket data
  };
  ```

### 4. Menambahkan / Mengubah Portfolio Website
- Buka file `data/websites.php`.
- Setiap proyek memiliki properti `id`, `title`, `subtitle`, `category`, `description`, `highlights`, `image`, `demoUrl`, dan `technologies`.
- Jika `'demoUrl'` dikosongkan (`''`), tombol demo otomatis berstatus aman "DEMO TIDAK TERSEDIA / DEMO UNAVAILABLE" tanpa tautan palsu.

### 5. Mengganti Foto Profil
- Simpan file foto Anda di:
  `assets/images/profile/profile.webp` (atau format `.jpg`).
- Foto akan otomatis tampil di kartu potret utama pada Hero Section.

---

## 💻 Menjalankan Website Secara Lokal

### Menggunakan Laragon (Rekomendasi)
Karena proyek ini berada di `c:\laragon\www\new-portfolio`:
1. Buka aplikasi **Laragon**.
2. Klik **"Start All"** (Apache & PHP).
3. Buka browser di `http://localhost/new-portfolio/` atau `http://new-portfolio.test/`.

### Menggunakan PHP Built-in Server
Buka PowerShell di direktori proyek dan jalankan:
```bash
php -S localhost:8000
```
Lalu akses `http://localhost:8000`.

---

## 🌐 Deployment ke Hosting

1. **Hosting PHP (cPanel / InfinityFree / Shared Hosting):** Upload seluruh file proyek ke folder `public_html/`. Website langsung bekerja tanpa perlu konfigurasi database MySQL.
2. **Hosting Statis (GitHub Pages / Cloudflare Pages / Vercel):** Gunakan file `index.html` yang telah diexport dan disinkronkan bersama folder `assets/`.

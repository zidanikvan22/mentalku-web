<div align="center">
  <h1>🧠 Mentalku-Web</h1>
  <p><em>Platform Evaluasi Diri Kesehatan Mental Berbasis AI — Interaktif, Privat, dan Ramah Pengguna</em></p>

  <!-- Badges -->
  <p>
    <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12" />
    <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
    <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Tailwind_CSS-4.1-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="Tailwind CSS" />
    <img src="https://img.shields.io/badge/DaisyUI-5.5-5A0EF8?style=for-the-badge&logo=daisyui&logoColor=white" alt="DaisyUI" />
    <img src="https://img.shields.io/badge/Vite-7.0-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite" />
    <img src="https://img.shields.io/badge/Docker-Ready-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker" />
  </p>
</div>

---

<!-- Poster / Banner -->
<div align="center">
  <img src="public\assets\img\illustrations\Poster_MentalKU.png" alt="Mentalku Banner" width="100%" />
</div>

<br>

## 📖 Deskripsi Umum

**Mentalku-Web** adalah platform aplikasi berbasis web yang dirancang untuk menjadi *"sahabat pertama"* bagi individu dalam mengenali dan mengevaluasi kondisi kesehatan mental mereka secara mandiri. Platform ini menyediakan proses skrining psikologis yang interaktif, privat, dan ramah pengguna — ditujukan terutama untuk **generasi Z, mahasiswa, dan pekerja** yang ingin memahami kondisi emosional mereka tanpa tekanan.

Mentalku-Web menggunakan instrumen **DASS-21** (*Depression, Anxiety, Stress Scales*) yang telah tervalidasi secara ilmiah, dikombinasikan dengan fitur **venting** (curhat terstruktur) yang diproses oleh **Machine Learning** dan **Gemini AI** untuk menghasilkan evaluasi yang komprehensif serta rekomendasi personal.

> [!NOTE]
> **Disclaimer:** Mentalku-Web berfungsi sebagai alat deteksi dini dan wadah refleksi diri. Hasil evaluasi ini **tidak menggantikan** diagnosis resmi dari tenaga profesional (psikolog atau psikiater).

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|:------|:----------|
| 🔐 **Autentikasi Aman** | Registrasi dan login dengan validasi ketat (usia minimal 17 tahun, kebijakan password kuat). Semua data tersimpan secara privat. |
| 📝 **Evaluasi Diri (DASS-21)** | 21 pertanyaan terstruktur berbasis instrumen psikometri standar yang mengukur tiga indikator: **Depresi**, **Kecemasan**, dan **Stres**. |
| 💭 **Ruang Venting (Curhat Terstruktur)** | Setelah menyelesaikan kuesioner, pengguna **wajib** menuliskan keluh kesah sebelum melihat hasil — berfungsi sebagai *catharsis* sekaligus data kualitatif untuk AI. |
| 🤖 **Integrasi AI & Machine Learning** | Data kuesioner dan teks venting dikirim ke **ML API** eksternal untuk klasifikasi sentimen dan diperkaya dengan rekomendasi dari **Gemini AI**. |
| 📊 **Hasil Evaluasi Komprehensif** | Menampilkan skor DASS per kategori, label klasifikasi ML, level keparahan, dan rekomendasi tindak lanjut yang personal. |
| 📈 **Riwayat & Pelacakan Progres** | Pantau perkembangan kondisi mental dari waktu ke waktu melalui riwayat evaluasi dengan filter dan sorting. |
| 📚 **Pusat Edukasi** | Akses artikel, video, dan jurnal yang dikategorikan berdasarkan topik: Depresi, Stres, Kecemasan, dan Rawat Diri. Rekomendasi konten disesuaikan dengan hasil evaluasi. |
| 👤 **Profil Personal** | Kelola informasi pribadi, upload foto profil, dan lihat ringkasan riwayat tes. |

---

## 🏗️ Arsitektur & Alur Kerja

Berikut alur penggunaan **Mentalku-Web** dari awal hingga mendapatkan hasil:

```
┌──────────────┐     ┌──────────────────┐     ┌─────────────────────┐
│  Registrasi  │────▶│  Isi Kuesioner   │────▶│   Sesi Venting      │
│  & Login     │     │  DASS-21 (3 hal) │     │   (Curhat Wajib)    │
└──────────────┘     └──────────────────┘     └──────────┬──────────┘
                                                         │
                                                         ▼
                                              ┌─────────────────────┐
                                              │  Kirim ke ML API    │
                                              │  (Jawaban + Venting)│
                                              └──────────┬──────────┘
                                                         │
                              ┌───────────────────────────┼───────────────────────────┐
                              ▼                           ▼                           ▼
                   ┌────────────────────┐    ┌────────────────────┐    ┌────────────────────┐
                   │  Skor DASS-21      │    │  Klasifikasi ML    │    │  Rekomendasi       │
                   │  (D / A / S)       │    │  (Sentimen Label)  │    │  Gemini AI         │
                   └────────────────────┘    └────────────────────┘    └────────────────────┘
                              │                           │                           │
                              └───────────────────────────┼───────────────────────────┘
                                                         ▼
                                              ┌─────────────────────┐
                                              │  Halaman Hasil      │
                                              │  + Artikel Edukasi  │
                                              └─────────────────────┘
```

### Dual-Modality Recommendation Engine

Sistem rekomendasi Mentalku menggabungkan **dua modalitas data** untuk menghasilkan saran yang presisi:

1. **Data Kuantitatif** — Skor DASS-21 dari 21 jawaban kuesioner pilihan ganda
2. **Data Kualitatif** — Teks venting yang dianalisis sentimen-nya oleh model ML

Berdasarkan tingkat keparahan tertinggi dan label sentimen ML, sistem secara otomatis mengambil konten edukasi yang paling relevan dari database.

---

## 🔗 Repositori Terkait

Proyek Mentalku-Web terintegrasi dengan **ML API** yang merupakan layanan microservice terpisah untuk pemrosesan Machine Learning dan Gemini AI:

| Repositori | Deskripsi |
|:-----------|:----------|
| 🤖 [**mentalku-ml-api**](https://github.com/zidanikvan22/mentalku-ml-api) | Python ML API — endpoint evaluasi yang menerima data kuesioner & teks venting, melakukan klasifikasi sentimen, dan menghasilkan rekomendasi via Gemini AI. |

> [!IMPORTANT]
> **ML API harus berjalan** agar fitur evaluasi dapat berfungsi dengan baik. Pastikan service ML API aktif di `http://127.0.0.1:8001` atau sesuaikan variabel `ML_API_URL` pada file `.env`.

---

## 🛠️ Tech Stack

### Backend
| Teknologi | Versi | Keterangan |
|:----------|:------|:-----------|
| [PHP](https://www.php.net/) | ^8.2 | Bahasa pemrograman server-side |
| [Laravel](https://laravel.com/) | 12.0 | Framework backend utama |
| [MySQL](https://www.mysql.com/) | - | Relational database |
| [Composer](https://getcomposer.org/) | - | Dependency manager PHP |

### Frontend
| Teknologi | Versi | Keterangan |
|:----------|:------|:-----------|
| [Blade Templates](https://laravel.com/docs/blade) | - | Template engine bawaan Laravel |
| [Tailwind CSS](https://tailwindcss.com/) | 4.1 | Utility-first CSS framework |
| [DaisyUI](https://daisyui.com/) | 5.5 | Komponen UI berbasis Tailwind CSS |
| [Vite](https://vitejs.dev/) | 7.0 | Build tool & dev server |
| [Axios](https://axios-http.com/) | 1.11 | HTTP client untuk request API |

### DevOps & Deployment
| Teknologi | Keterangan |
|:----------|:-----------|
| [Docker](https://www.docker.com/) | Containerization (`php:8.3-fpm`) |
| [Nginx](https://nginx.org/) | Reverse proxy dengan SSL (HTTPS) |
| [Let's Encrypt](https://letsencrypt.org/) | Sertifikat SSL gratis |

---

## 🚀 Panduan Instalasi

### Prasyarat

Pastikan perangkat lunak berikut sudah terinstal di komputer Anda:

- [PHP](https://www.php.net/) versi **8.2** atau lebih baru
- [Composer](https://getcomposer.org/) — dependency manager PHP
- [Node.js & NPM](https://nodejs.org/) — runtime JavaScript & package manager
- **MySQL** — bisa menggunakan [Laragon](https://laragon.org/), XAMPP, atau MAMP
- [Git](https://git-scm.com/) — version control

### Langkah-Langkah Instalasi

**1. Clone Repositori**

```bash
git clone https://github.com/zidanikvan22/mentalku-web.git
cd mentalku-web
```

**2. Instal Dependensi**

```bash
# Instal dependensi PHP
composer install

# Instal dependensi Node.js
npm install
```

**3. Konfigurasi Environment**

```bash
# Salin file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

**4. Konfigurasi Database**

Buat database MySQL kosong (misalnya: `mentalku_web`), lalu buka file `.env` dan sesuaikan konfigurasi berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mentalku_web
DB_USERNAME=root
DB_PASSWORD=
```

**5. Konfigurasi ML API** *(Opsional)*

Jika Anda menjalankan [mentalku-ml-api](https://github.com/zidanikvan22/mentalku-ml-api) secara lokal, pastikan endpoint berikut sudah sesuai. Tambahkan variabel ini di file `.env` jika belum ada:

```env
ML_API_URL=http://127.0.0.1:8001/api/v1/evaluate
```

**6. Jalankan Migrasi & Seeder Database**

```bash
# Buat tabel-tabel database
php artisan migrate

# (Opsional) Isi data awal artikel edukasi
php artisan db:seed --class=EducationSeeder
```

**7. Buat Symbolic Link untuk Storage**

```bash
php artisan storage:link
```

---

## ▶️ Menjalankan Aplikasi

Jalankan kedua perintah berikut secara bersamaan di terminal terpisah:

```bash
# Terminal 1 — Jalankan server Laravel
php artisan serve

# Terminal 2 — Jalankan Vite dev server (compile assets)
npm run dev
```

Atau gunakan satu perintah dengan `concurrently`:

```bash
npm run dev & php artisan serve
```

Aplikasi siap diakses di: **http://127.0.0.1:8000**

> [!TIP]
> Pastikan **MySQL** sudah berjalan dan **ML API** aktif di `http://127.0.0.1:8001` sebelum menggunakan fitur evaluasi.

---

## 🐳 Deployment dengan Docker

Proyek ini sudah menyertakan konfigurasi Docker untuk deployment production:

```bash
# Build Docker image
docker build -t mentalku-web .

# Jalankan container
docker run -d -p 9000:9000 mentalku-web
```

Konfigurasi Nginx dengan SSL (Let's Encrypt) tersedia di `docker/nginx/default.conf`, yang secara otomatis melakukan redirect HTTP ke HTTPS.

---

## 📁 Struktur Proyek

```
mentalku-web/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php          # Autentikasi (login, register, logout)
│   │   ├── EvaluationController.php    # Alur evaluasi, integrasi ML API
│   │   ├── ProfileController.php       # Manajemen profil & riwayat tes
│   │   └── EducationController.php     # Katalog konten edukasi
│   └── Models/
│       ├── User.php                    # Model pengguna
│       ├── EvaluationResult.php        # Model hasil evaluasi
│       └── Education.php               # Model konten edukasi
├── database/
│   ├── migrations/                     # Skema tabel database
│   ├── seeders/                        # Seeder data awal
│   └── data/
│       └── education.json              # Dataset artikel edukasi
├── resources/views/
│   ├── auth/                           # Halaman login & register
│   ├── user/                           # Halaman utama aplikasi
│   ├── component/                      # Komponen UI (navbar, sidebar, footer)
│   └── layout/                         # Layout template utama
├── routes/
│   └── web.php                         # Definisi seluruh route aplikasi
├── docker/
│   └── nginx/default.conf              # Konfigurasi Nginx + SSL
├── Dockerfile                          # Konfigurasi Docker container
├── composer.json                       # Dependensi PHP
├── package.json                        # Dependensi Node.js
├── vite.config.js                      # Konfigurasi Vite build tool
└── .env.example                        # Template variabel environment
```

---

## 📄 Halaman Aplikasi

| Halaman | Route | Deskripsi |
|:--------|:------|:----------|
| Landing Page | `/` | Halaman utama & form login |
| Registrasi | `/register-process` | Form pendaftaran akun baru |
| Dashboard | `/dashboard` | Beranda pengguna setelah login |
| Cover Evaluasi | `/self-evaluation-cover` | Halaman pengantar sebelum memulai tes |
| Kuesioner | `/question/{1-3}` | 3 halaman kuesioner DASS-21 (7 soal per halaman) |
| Venting | `/venting` | Halaman curhat terstruktur |
| Hasil Evaluasi | `/result/{id}` | Laporan hasil tes & rekomendasi AI |
| Riwayat Aktivitas | `/activity-history/{id}` | Detail riwayat evaluasi sebelumnya |
| Profil | `/profile` | Profil pengguna & riwayat tes |
| Edit Profil | `/profile/edit` | Form edit informasi profil |
| Edukasi | `/education` | Katalog artikel & materi edukasi |

---

## ⚙️ Variabel Environment

| Variabel | Deskripsi | Contoh |
|:---------|:----------|:-------|
| `APP_NAME` | Nama aplikasi | `Mentalku` |
| `APP_ENV` | Environment aplikasi | `local` / `production` |
| `APP_KEY` | Kunci enkripsi (auto-generate) | `base64:...` |
| `APP_URL` | URL dasar aplikasi | `http://127.0.0.1:8000` |
| `DB_CONNECTION` | Driver database | `mysql` |
| `DB_HOST` | Host database | `127.0.0.1` |
| `DB_PORT` | Port database | `3306` |
| `DB_DATABASE` | Nama database | `mentalku_web` |
| `DB_USERNAME` | Username database | `root` |
| `DB_PASSWORD` | Password database | *(kosong untuk default)* |
| `ML_API_URL` | Endpoint ML API | `http://127.0.0.1:8001/api/v1/evaluate` |

---

## 🤝 Berkontribusi

Kontribusi sangat terbuka! Jika Anda menemukan *bug*, memiliki saran perbaikan, atau ingin menambahkan fitur baru:

1. **Fork** repositori ini
2. Buat **branch** baru (`git checkout -b fitur/fitur-baru`)
3. **Commit** perubahan Anda (`git commit -m "Menambahkan fitur baru"`)
4. **Push** ke branch (`git push origin fitur/fitur-baru`)
5. Buat **Pull Request**

---

## 📜 Lisensi

Proyek ini dikembangkan untuk keperluan akademis dan edukasi.

---

<div align="center">
  <br>
  <p>Dibuat dengan ❤️ untuk Kesehatan Mental yang Lebih Baik</p>
  <br>
  <h3>👨‍💻 Pengembang</h3>
  <p><strong>Zidan Muhammad Ikvan</strong></p>
  <br>
</div>

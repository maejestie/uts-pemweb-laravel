# UTS Pemrograman Web Service - Manajemen Biodata Kelompok

Aplikasi web manajemen biodata anggota kelompok berbasis **Laravel** dan **Bootstrap 5** untuk Ujian Tengah Semester (UTS) Pemrograman Web Service.

---

## 👥 Data Anggota Tim
1. **Ketua / Master**:
   - **Nama**: MAEJESTIE WAHYU PRAJA PATI
   - **NIM**: 24010110170
   - **Tugas**: Mengerjakan Front-end dan manajemen repository GitHub

2. **Anggota / Pegawai**:
   - **Nama**: FATHURRAHMAN
   - **NIM**: 24010110167
   - **Tugas**: Mengerjakan Back-end (Database, Migration, Controller, Seeder)

---

## 🛠️ Teknologi yang Digunakan
- **Framework**: Laravel 13 (PHP 8.2+)
- **Database**: SQLite (Bawaan siap pakai tanpa perlu konfigurasi MySQL tambahan)
- **Frontend**: Bootstrap 5 (via CDN, tanpa CSS eksternal tambahan)
- **Template Engine**: Blade

---

## 🚀 Panduan Menjalankan Proyek (Untuk Dosen / Evaluator)

1. **Clone repository ini**:
   ```bash
   git clone https://github.com/maejestie/uts-pemweb-laravel.git
   cd uts-pemweb-laravel/uts
   ```
   *(atau langsung masuk ke folder proyek `uts` jika di-download berupa ZIP)*

2. **Install dependency composer** (jika clone fresh):
   ```bash
   composer install
   ```

3. **Setup environment file**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Jalankan migrasi dan seeder database**:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *(Data biodata anggota dan foto default akan langsung terisi secara otomatis)*

5. **Jalankan local development server**:
   ```bash
   php artisan serve
   ```

6. **Buka di Browser**:
   Akses: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📌 Fitur Aplikasi
- Menampilkan daftar kartu biodata anggota kelompok beserta foto, nama, NIM, dan peran/tugas.
- Menambahkan data anggota baru (CRUD Create) dengan upload foto.
- Mengubah/edit biodata anggota (CRUD Update) dan memperbarui foto.
- Menghapus data anggota (CRUD Delete).
- Notifikasi alert dinamis saat data berhasil ditambah, diedit, atau dihapus.
- Tampilan responsif dengan Bootstrap 5.

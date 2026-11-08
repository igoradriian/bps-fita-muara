# LMS BPS Kabupaten Muara Enim — Laravel 12

Ini adalah **source code aplikasi Laravel** dengan Blade, Eloquent, MySQL, login, registrasi, absensi berbasis server, materi, riwayat, profil, dan halaman admin. **Bukan website statis untuk Netlify.**

## Cara instalasi (Windows / Laragon)

Prasyarat: PHP >= 8.2, Composer, MySQL, ekstensi PHP yang dibutuhkan Laravel. Laragon bisa digunakan.

1. Ekstrak ZIP ke `C:\laragon\www\lms-bps-laravel` (atau folder proyek lain).
2. Buka terminal pada folder proyek, lalu jalankan `composer install`.
3. Salin `.env.example` menjadi `.env` (`copy .env.example .env` di CMD).
4. Buat database MySQL kosong bernama `lms_bps` melalui phpMyAdmin/HeidiSQL.
5. Sesuaikan `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env`.
6. Jalankan `php artisan key:generate`.
7. Jalankan `php artisan migrate --seed`.
8. Jalankan `php artisan serve`.
9. Buka `http://127.0.0.1:8000`.

Akun DEMO setelah seeding:
- Admin: `admin@bps-demo.test` / `ChangeMe123!`
- Peserta: `peserta@bps-demo.test` / `ChangeMe123!`

**Penting:** Ganti atau hapus kedua akun demo dan kata sandinya sebelum aplikasi dipublikasikan. Registrasi peserta saat ini terbuka; batasi akses sesuai kebijakan organisasi. Kegiatan dan materi seed hanya contoh. Pengguna yang mendaftar tidak otomatis menjadi admin.

## Lokasi file untuk diedit
- `resources/views/pages/dashboard.blade.php` — Dashboard
- `resources/views/pages/materi.blade.php` dan `materi-detail.blade.php` — Materi
- `resources/views/pages/absensi.blade.php` — Absensi
- `resources/views/pages/riwayat.blade.php` — Riwayat
- `resources/views/pages/profil.blade.php` — Profil
- `resources/views/pages/admin.blade.php` — Admin
- `resources/views/auth/` — Login/Registrasi
- `resources/views/layouts/app.blade.php` — Header/sidebar
- `public/assets/css/laravel.css` — Styling Laravel
- `app/Http/Controllers/` — Proses bisnis
- `app/Models/` — Model database
- `routes/web.php` — Routing
- `database/migrations/` — Struktur database

## Fitur dan batasan
- Autentikasi Laravel (session + password hash + CSRF)
- Absensi server-side sesuai jam buka/tutup kegiatan, dengan constraint unik peserta/kegiatan
- Materi, penyelesaian materi, profil, filter riwayat, admin membuat kegiatan dan ekspor CSV
- Belum ada fitur izin dengan persetujuan, pengelolaan materi melalui admin, QR dinamis, reset password, pendaftaran peserta per kegiatan, atau manajemen role yang lebih rinci. Belum diuji end-to-end dengan database karena Composer tidak tersedia di lingkungan pembuatan arsip.
- Data absensi hanya dapat dipercaya setelah autentikasi, konfigurasi timezone, dan kebijakan pendaftaran peserta diterapkan. Untuk produksi tambahkan verifikasi email, audit log, otorisasi yang lebih rinci, backup, dan HTTPS.

## Deploy
Netlify tidak mendukung runtime Laravel PHP/MySQL langsung. Gunakan layanan hosting yang mendukung PHP 8.2+, Composer, dan database MySQL. Set document root ke folder `public`, gunakan `APP_DEBUG=false` dan `APP_ENV=production`.

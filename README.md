# LMS BPS Kabupaten Muara Enim — Demo Terstruktur

Website demo dari file HTML asli, dipecah menurut fitur agar mudah diedit. **Ini bukan proyek Laravel PHP yang sebenarnya**; ini frontend statis dengan struktur terinspirasi Laravel (`public`, `resources`, `routes`). Seluruh fitur demo tetap menggunakan `localStorage` di browser dan bukan autentikasi/database sungguhan.

## Menjalankan

Buka `public/index.html` di browser. Untuk Netlify Drop, **unggah folder `public` saja**, bukan folder induk. Tidak diperlukan PHP, Composer, Node, atau database.

## Mengedit

- `resources/js/pages/dashboard.js`: dashboard
- `resources/js/pages/materi.js`: daftar dan detail materi
- `resources/js/pages/absensi.js`: presensi dan tombol absensi
- `resources/js/pages/riwayat.js`: tabel dan riwayat
- `resources/js/pages/profil.js`: profil peserta
- `resources/js/components/auth.js`: login/daftar
- `resources/js/components/layout.js`: header, sidebar, modal
- `resources/js/core/state.js`: data awal dan state
- `resources/js/core/helpers.js`: fungsi umum
- `public/assets/css/app.css`: tampilan semua halaman
- `resources/js/app.js`: navigasi dan render

**Penting:** Untuk menjaga demo dapat langsung dibuka dan diunggah ke Netlify tanpa proses build, setiap file JavaScript di `resources/js/` juga memiliki salinan identik di `public/assets/js/`. Setelah mengedit file di `resources/js`, jalankan `python sync_assets.py` dari folder proyek agar perubahan muncul di website. Alternatif termudah: edit langsung file di `public/assets/js/` (tidak perlu sinkronisasi).

## Jika ingin Laravel asli

Untuk Laravel sesungguhnya, perlu instal PHP, Composer, Laravel, routing backend, Blade, database, dan autentikasi server. Netlify Drop tidak menjalankan aplikasi Laravel PHP. Struktur demo ini mempermudah pemisahan fitur sebelum migrasi ke Laravel.

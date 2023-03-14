<h1 align="center">Selamat datang di Nic CMS!</h1>

<p></p>

<h4 align="center">Nicely Created CMS (Nic CMS) adalah sebuah aplikasi CMS dengan fitur - fitur tambahan yang dibuat dengan <a href="https://laravel.com/" target="_blank">Laravel</a>.
</h4>

<p></p>

<p align="center">
  <a href="#tentang">Tentang Project</a> •
  <a href="#fitur">Fitur</a> •
  <a href="#download">Download & Install</a> •
  <a href="#akun">Akun Default</a> •
  <a href="#lisensi">Lisensi</a>
</p>

<p></p>

<h2 id="tentang">Tentang Nic CMS</h2>

Website ini berperan sebagai aplikasi CMS sebagaimana mestinya yang masih dikembangkan dan digunakan oleh saya sendiri sebagai blog pribadi.

<p></p>

<h2 id="fitur">Fitur Tersedia</h2>

-   Modul Blog
    -   Tambah, Update dan Delete Data Kategori
    -   Tambah, Update dan Delete Data Tag
    -   Tambah, Update dan Delete Data Post / Artikel
-   Modul Konfigurasi Email
    -   Konfigurasi SMTP
    -   Test Kirim Email
-   Modul User
    -   Tambah, Update dan Delete Data User
    -   Tambah, Update dan Delete Data Role / Hak Akses
-   Dan masih banyak lagi yang akan dikembangkan.
<p></p>

<h2 id="demo">Halaman Demo</h2>

Tidak ada halaman demo akan tetapi bisa mengunjungi blog pribadi saya yang menggunakan Nic CMS dapat anda akses di https://haireno.my.id/ mungkin ada berbagai keterbatasan role untuk melihat fitur - fitur tertentu, oleh karena itu baiknya anda coba di local.

<p></p>

<h2 id="akun">Daftar Akun Tersedia</h2>

Berikut adalah daftar akun untuk keperluan testing saat anda mencoba aplikasi pertama kali, nemun anda harus melakukan seed terlebih dahulu dengan panduan dibawah

| Role        | Email          | Password | URL                    |
| ----------- | -------------- | -------- | ---------------------- |
| Super Admin | admin@mail.com | password | http://localhost/login |

<p></p>

<h2 id="syarat">Prasyarat yang Diperlukan</h2>

Berikut adalah daftar layanan dan aplikasi yang wajib dan diperlukan selama anda menjalankan aplikasi ini jika anda belum menginstall nya maka disarankan untuk menginstall nya terlebih dahulu

-   PHP 8.1.x & Web Server [XAMPP, LAMPP, MAMP, Laragon(Rekomendasi)]
-   Web Browser [Chrome, Firefox, Safari & Opera]
-   Internet [Sebagian besar / hampir semua plugin tambahan yang di perlukan disimpan di local internet hampir tidak di perlukan untuk testing di local]

<p></p>

<h2 id="download">Panduan Menjalankan & Install Aplikasi</h2>

Untuk menjalankan aplikasi atau web ini kamu harus install Laragon atau web server lain dan mempunyai setidaknya satu web browser yang terinstall di komputer anda.

```bash
# Clone repository ini atau download di
$ git clone https://github.com/nugrahadevelopers/nic-cms.git

# Kemudian jalankan command composer install, ini akan menginstall resources yang laravel butuhkan
$ composer install

# Kemudian jalankan command npm install package nodejs yang di butuhkan sekaligus mengcompilenya
$ npm install && npm run dev

# Jalankan command ini untuk mengcompilenya (dibutuhkan untuk production)
$ npm run build

# Lakukan copy .env dengan cara ketik command seperti dibawah
$ cp .env.example .env

# Generate key juga jangan lupa dengan command dibawah
$ php artisan key:generate

# Jangan lupa migrate database dengan cara membuat database di phpmyadmin atau aplikasi lainnya yang kalian pakai,
# lalu jangan lupa untuk mengganti variable DB_DATABASE di file .env yang di folder project
$ php artisan migrate:fresh --seed

# Lalu jalankan aplikasi kalian dengan command dibawah
$ php artisan serve

# Selamat aplikasi dapat anda nikmati di local!
```

<p></p>

<h2 id="lisensi">📝 Lisensi</h2>

-   Copyright © 2023
-   Nic CMS adalah aplikasi web open-source yang berlisensi dibawah lisensi MIT

<h2 id="lisensi">✨ Special Thanks</h2>

-   <a href="https://laravel.com/"> Laravel </a> for the great framework ever!

---

**<p align="center">Made with ❤️ by Reno Nugraha</p>**

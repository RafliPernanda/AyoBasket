# AyoBasket

AyoBasket adalah platform berbasis web yang dirancang untuk memudahkan para pecinta bola basket dalam menemukan dan menyewa lapangan basket secara online. Proyek ini dibangun menggunakan PHP native dan database MySQL.

## Fitur Utama

Platform ini memiliki dua bagian utama, yaitu untuk pengguna umum dan administrator.

**Fitur Pengguna:**
- **Beranda:** Menampilkan informasi umum dan daftar lapangan yang tersedia.
- **Reservasi Online:** Pengguna dapat memesan lapangan pada tanggal dan jam yang diinginkan.
- **Pendaftaran Lapangan:** Pengguna dapat mendaftarkan lapangan baru untuk disewakan.
- **Tentang Kami:** Halaman informasi mengenai platform AyoBasket.

**Fitur Admin:**
- **Dashboard Modern:** Tampilan ringkasan data dengan statistik kunci (Total Reservasi, Reservasi Aktif, Total Lapangan).
- **Manajemen Reservasi:** Admin dapat melakukan operasi CRUD (Create, Read, Update, Delete) untuk semua data reservasi.
- **Pencarian & Paginasi:** Memudahkan admin dalam mengelola data dalam jumlah besar.
- **Desain Responsif:** Antarmuka admin yang dapat diakses dengan baik di berbagai perangkat.

## Kebutuhan Sistem

- **PHP** versi 7.4 atau lebih tinggi.
- **Web Server** seperti Apache, Nginx, atau sejenisnya (proyek ini dikembangkan menggunakan XAMPP).
- **Database** MySQL atau MariaDB.
- **Web Browser** modern seperti Chrome, Firefox, atau Edge.

## Cara Instalasi dan Konfigurasi

1.  **Clone Repositori:**
    ```bash
    git clone https://github.com/RafliPernanda/AyoBasket.git
    ```
2.  **Database:**
    - Buat database baru di phpMyAdmin atau _client_ database Anda.
    - Impor file `ayobasket.sql` yang ada di _root_ proyek ke dalam database yang baru Anda buat.

3.  **Konfigurasi Koneksi:**
    - Buka file `config/database.php`.
    - Sesuaikan nilai `host`, `dbname`, `username`, dan `password` sesuai dengan konfigurasi database Anda.

4.  **Jalankan Proyek:**
    - Pindahkan folder proyek ke dalam direktori _root_ web server Anda (misalnya `htdocs/` jika menggunakan XAMPP).
    - Buka browser dan akses alamat proyek (contoh: `http://localhost/ayobasket`).

## Struktur Folder

```
d:\BASKET\
├─── about.php
├─── ayobasket.sql
├─── daftarkan-lapangan.php
├─── index.php
├─── reservasi.php
├─── README.md
├─── _partials\
│   ├─── footer_admin.php
│   ├─── footer.php
│   ├─── header_admin.php
│   └─── header.php
├─── admin\
│   ├─── delete.php
│   ├─── edit.php
│   ├─── index.php
│   └─── tambah.php
├─── assets\
│   └─── css\
│       ├─── style.css
│       └─── admin_style.css
├─── config\
│   └─── database.php
└─── uploads\
    └─── (berisi file gambar lapangan yang di-upload)
```

## Contoh Konfigurasi (`config/database.php`)

```php
<?php
// Konfigurasi Database

$config = [
    'host' => 'localhost', // Host database Anda
    'dbname' => 'ayobasket', // Nama database Anda
    'username' => 'root',      // Username database Anda
    'password' => ''          // Password database Anda
];

try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['dbname']}", 
        $config['username'], 
        $config['password']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
```

## Screenshot Aplikasi

**Tampilan Dashboard Admin**

![Tampilan Landing Page AyoBasket](tampilan%20AyoBasket.png)

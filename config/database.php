<?php
// File: config/database.php

// Konfigurasi koneksi database
// Sesuaikan dengan environment Anda
define('DB_HOST', 'localhost');
define('DB_NAME', 'ayobasket');
define('DB_USER', 'root');
define('DB_PASS', ''); // Kosongkan jika tidak ada password

// Inisialisasi koneksi PDO
$pdo = null;

try {
    // Buat Data Source Name (DSN)
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    // Opsi untuk koneksi PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Melempar exception jika ada error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Mengembalikan hasil sebagai associative array
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Menggunakan native prepared statements
    ];

    // Buat instance PDO
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

} catch (PDOException $e) {
    // Tangani error koneksi
    // Di environment produksi, sebaiknya log error ini dan tampilkan pesan generik
    die("Koneksi ke database gagal: " . $e->getMessage());
}

// Koneksi $pdo siap digunakan di file lain
?>
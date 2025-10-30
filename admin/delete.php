<?php
session_start();
require_once '../config/database.php';

// 1. Validasi ID dari URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    try {
        // 2. Siapkan dan jalankan query DELETE
        $sql = "DELETE FROM reservasi WHERE id_reservasi = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        // Set pesan sukses (opsional, jika ingin menampilkan notifikasi di index.php)
        $_SESSION['message'] = "Data reservasi berhasil dihapus.";

    } catch (PDOException $e) {
        // Set pesan error (opsional)
        $_SESSION['error'] = "Gagal menghapus data: " . $e->getMessage();
    }
}

// 3. Redirect kembali ke halaman utama admin
header("Location: index.php");
exit;
?>

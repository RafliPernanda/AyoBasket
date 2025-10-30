<?php
// File: reservasi.php
session_start();
require_once 'config/database.php';

$page_title = 'Reservasi Lapangan - AyoBasket';
$lapangan_list = [];
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_lapangan = filter_input(INPUT_POST, 'id_lapangan', FILTER_VALIDATE_INT);
    $nama_pemesan = filter_input(INPUT_POST, 'nama_pemesan', FILTER_SANITIZE_STRING);
    $no_telepon = filter_input(INPUT_POST, 'no_telepon', FILTER_SANITIZE_STRING);
    $tanggal_main = filter_input(INPUT_POST, 'tanggal_main', FILTER_SANITIZE_STRING);
    $jam_mulai = filter_input(INPUT_POST, 'jam_mulai', FILTER_SANITIZE_STRING);
    $jam_selesai = filter_input(INPUT_POST, 'jam_selesai', FILTER_SANITIZE_STRING);
    if (empty($id_lapangan) || empty($nama_pemesan) || empty($no_telepon) || empty($tanggal_main) || empty($jam_mulai) || empty($jam_selesai)) {
        $error = 'Semua kolom wajib diisi.';
    } elseif (strtotime($jam_selesai) <= strtotime($jam_mulai)) {
        $error = 'Jam selesai harus setelah jam mulai.';
    } else {
        try {
            $sql = "INSERT INTO reservasi (id_lapangan, nama_pemesan, no_telepon, tanggal_main, jam_mulai, jam_selesai, status_reservasi) VALUES (?, ?, ?, ?, ?, ?, 'Aktif')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_lapangan, $nama_pemesan, $no_telepon, $tanggal_main, $jam_mulai, $jam_selesai]);
            $message = 'Reservasi Anda berhasil dibuat! Silakan tunggu konfirmasi selanjutnya.';
        } catch (PDOException $e) {
            $error = 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.';
        }
    }
}
try {
    $stmt = $pdo->query("SELECT id_lapangan, nama_lapangan, harga_per_jam FROM lapangan ORDER BY nama_lapangan");
    $lapangan_list = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = 'Tidak dapat memuat data lapangan.';
}

require_once '_partials/header.php';
?>

<main>
    <div class="form-container">
        <h2 class="section-title">Formulir Reservasi</h2>
        
        <?php if (!empty($message)): ?>
            <div class="message success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="reservasi.php" method="POST">
            <div class="form-group">
                <label for="id_lapangan">Pilih Lapangan</label>
                <select id="id_lapangan" name="id_lapangan" required>
                    <option value="">-- Pilih Lapangan --</option>
                    <?php foreach ($lapangan_list as $lapangan): ?>
                        <option value="<?= $lapangan['id_lapangan'] ?>">
                            <?= htmlspecialchars($lapangan['nama_lapangan']) ?> (Rp <?= number_format($lapangan['harga_per_jam'], 0, ',', '.') ?>/jam)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_pemesan">Nama Lengkap</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon</label>
                <input type="tel" id="no_telepon" name="no_telepon" required>
            </div>
            <div class="form-group">
                <label for="tanggal_main">Tanggal Main</label>
                <input type="date" id="tanggal_main" name="tanggal_main" required min="<?= date('Y-m-d') ?>">
            </div>
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" required>
            </div>
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" id="jam_selesai" name="jam_selesai" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim Reservasi</button>
        </form>
    </div>
</main>

<?php require_once '_partials/footer.php'; ?>
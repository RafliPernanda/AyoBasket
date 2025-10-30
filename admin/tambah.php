<?php
session_start();
require_once '../config/database.php';

$page_title = 'Tambah Reservasi';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... (form processing logic remains the same)
    $id_lapangan = filter_input(INPUT_POST, 'id_lapangan', FILTER_VALIDATE_INT);
    $nama_pemesan = filter_input(INPUT_POST, 'nama_pemesan', FILTER_SANITIZE_STRING);
    $no_telepon = filter_input(INPUT_POST, 'no_telepon', FILTER_SANITIZE_STRING);
    $tanggal_main = filter_input(INPUT_POST, 'tanggal_main', FILTER_SANITIZE_STRING);
    $jam_mulai = filter_input(INPUT_POST, 'jam_mulai', FILTER_SANITIZE_STRING);
    $jam_selesai = filter_input(INPUT_POST, 'jam_selesai', FILTER_SANITIZE_STRING);
    $status_reservasi = filter_input(INPUT_POST, 'status_reservasi', FILTER_SANITIZE_STRING);

    if (empty($id_lapangan) || empty($nama_pemesan) || empty($tanggal_main) || empty($jam_mulai) || empty($jam_selesai) || empty($status_reservasi)) {
        $error = 'Semua kolom wajib diisi.';
    } else {
        try {
            $sql = "INSERT INTO reservasi (id_lapangan, nama_pemesan, no_telepon, tanggal_main, jam_mulai, jam_selesai, status_reservasi) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_lapangan, $nama_pemesan, $no_telepon, $tanggal_main, $jam_mulai, $jam_selesai, $status_reservasi]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $error = 'Gagal menyimpan data: ' . $e->getMessage();
        }
    }
}

// Fetch court list
try {
    $stmt = $pdo->query("SELECT id_lapangan, nama_lapangan FROM lapangan ORDER BY nama_lapangan");
    $lapangan_list = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = 'Tidak dapat memuat data lapangan.';
}

$page_title = 'Tambah Reservasi';
require_once '../_partials/header_admin.php';
?>

<div class="form-section">
    <h2>Tambah Reservasi Baru</h2>

    <?php if ($error): ?>
        <div class="message error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="tambah.php" method="POST">
        <div class="form-group">
            <label for="id_lapangan">Lapangan</label>
            <select id="id_lapangan" name="id_lapangan" required>
                <option value="">-- Pilih Lapangan --</option>
                <?php foreach ($lapangan_list as $lapangan): ?>
                    <option value="<?= $lapangan['id_lapangan'] ?>"><?= htmlspecialchars($lapangan['nama_lapangan']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_pemesan">Nama Pemesan</label>
            <input type="text" id="nama_pemesan" name="nama_pemesan" required>
        </div>
        <div class="form-group">
            <label for="no_telepon">No. Telepon</label>
            <input type="text" id="no_telepon" name="no_telepon" required>
        </div>
        <div class="form-group">
            <label for="tanggal_main">Tanggal Main</label>
            <input type="date" id="tanggal_main" name="tanggal_main" required>
        </div>
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" id="jam_mulai" name="jam_mulai" required>
        </div>
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" id="jam_selesai" name="jam_selesai" required>
        </div>
        <div class="form-group">
            <label for="status_reservasi">Status</label>
            <select id="status_reservasi" name="status_reservasi" required>
                <option value="Aktif">Aktif</option>
                <option value="Selesai">Selesai</option>
                <option value="Batal">Batal</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php require_once '../_partials/footer_admin.php'; ?>
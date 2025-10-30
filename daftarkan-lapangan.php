<?php
session_start();
require_once 'config/database.php';

$page_title = 'Daftarkan Lapangan Anda - AyoBasket';
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lapangan = filter_input(INPUT_POST, 'nama_lapangan', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $jenis = filter_input(INPUT_POST, 'jenis', FILTER_SANITIZE_STRING);
    $harga_per_jam = filter_input(INPUT_POST, 'harga_per_jam', FILTER_VALIDATE_FLOAT);
    $gambar_url = null;
    if (empty($nama_lapangan) || empty($alamat) || empty($jenis) || empty($harga_per_jam)) {
        $error = 'Semua kolom wajib diisi.';
    } else {
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $file_tmp_path = $_FILES['gambar']['tmp_name'];
            $file_name = $_FILES['gambar']['name'];
            $file_size = $_FILES['gambar']['size'];
            $file_type = $_FILES['gambar']['type'];
            $file_name_parts = explode('.', $file_name);
            $file_ext = strtolower(end($file_name_parts));
            $allowed_exts = ['jpg', 'jpeg', 'png'];
            if (in_array($file_ext, $allowed_exts)) {
                if ($file_size < 2000000) {
                    $new_file_name = 'lapangan_' . time() . '_' . uniqid('', true) . '.' . $file_ext;
                    $upload_dir = 'uploads/';
                    $dest_path = $upload_dir . $new_file_name;
                    if(move_uploaded_file($file_tmp_path, $dest_path)) {
                        $gambar_url = $dest_path;
                    } else {
                        $error = 'Gagal memindahkan file yang di-upload.';
                    }
                } else {
                    $error = 'Ukuran file terlalu besar. Maksimal 2MB.';
                }
            } else {
                $error = 'Format file tidak diizinkan. Hanya JPG, JPEG, dan PNG.';
            }
        } else {
            $error = 'Gambar lapangan wajib diunggah.';
        }
        if (empty($error)) {
            try {
                $sql = "INSERT INTO lapangan (nama_lapangan, alamat, jenis, harga_per_jam, gambar_url) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nama_lapangan, $alamat, $jenis, $harga_per_jam, $gambar_url]);
                $message = 'Lapangan baru berhasil didaftarkan! Terima kasih.';
            } catch (PDOException $e) {
                $error = 'Gagal menyimpan data ke database: ' . $e->getMessage();
            }
        }
    }
}

require_once '_partials/header.php';
?>

<main>
    <div class="form-container">
        <div class="text-center mb-2">
            <h2>Daftarkan Lapangan Anda</h2>
            <p>Miliki lapangan basket? Bergabunglah dengan jaringan kami.</p>
        </div>

        <?php if (!empty($message)): ?>
            <div class="message success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="daftarkan-lapangan.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_lapangan">Nama Lapangan</label>
                <input type="text" id="nama_lapangan" name="nama_lapangan" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Lapangan</label>
                <select id="jenis" name="jenis" required>
                    <option value="Indoor">Indoor</option>
                    <option value="Outdoor">Outdoor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga_per_jam">Harga Sewa per Jam (Rp)</label>
                <input type="number" id="harga_per_jam" name="harga_per_jam" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar Lapangan (Maks 2MB)</label>
                <input type="file" id="gambar" name="gambar" accept="image/png, image/jpeg" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftarkan Lapangan Saya</button>
        </form>
    </div>
</main>

<?php require_once '_partials/footer.php'; ?>
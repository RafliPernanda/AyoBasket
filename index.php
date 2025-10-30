<?php 
$page_title = 'AyoBasket - Sewa Lapangan Basket Jadi Mudah';
require_once 'config/database.php';
require_once '_partials/header.php';

// Ambil SEMUA data lapangan dari database
$lapangan_list = [];
try {
    $stmt = $pdo->query("SELECT id_lapangan, nama_lapangan, alamat, harga_per_jam, jenis, gambar_url FROM lapangan ORDER BY created_at DESC");
    $lapangan_list = $stmt->fetchAll();
} catch (PDOException $e) {
    // error_log($e->getMessage());
}

?>

<main>
    <section class="hero-section">
        <h1>Temukan & Booking Lapangan Basket Impianmu</h1>
        <p>Jangan biarkan lapangan kosong menghalangi semangatmu. Cari, pesan, dan mainkan permainan terbaikmu hari ini!</p>
        <a href="reservasi.php" class="btn btn-primary">Mulai Reservasi</a>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="section-title">Kenapa Memilih AyoBasket?</h2>
            <div class="features-grid">
                <div class="card feature-card">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <h3>Pencarian Cepat</h3>
                    <p>Temukan ratusan lapangan di seluruh Indonesia dengan filter pencarian yang mudah digunakan.</p>
                </div>
                <div class="card feature-card">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </div>
                    <h3>Booking Instan</h3>
                    <p>Pesan jadwalmu secara real-time. Tidak perlu lagi menelepon atau menunggu konfirmasi lama.</p>
                </div>
                <div class="card feature-card">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                    </div>
                    <h3>Pembayaran Aman</h3>
                    <p>Kami menyediakan berbagai metode pembayaran online yang aman, cepat, dan terverifikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($lapangan_list)): ?>
    <section id="lapangan" class="section">
        <div class="container">
            <h2 class="section-title">Semua Lapangan Tersedia</h2>
            <div class="lapangan-grid">
                <?php foreach ($lapangan_list as $lapangan): ?>
                <div class="card lapangan-card">
                    <img src="<?= htmlspecialchars($lapangan['gambar_url']) ?>" alt="<?= htmlspecialchars($lapangan['nama_lapangan']) ?>" class="card-image">
                    <div class="card-content">
                        <span class="card-badge"><?= htmlspecialchars($lapangan['jenis']) ?></span>
                        <h3 class="card-title"><?= htmlspecialchars($lapangan['nama_lapangan']) ?></h3>
                        <p class="card-address"><?= htmlspecialchars($lapangan['alamat']) ?></p>
                        <p class="card-price">Rp <?= number_format($lapangan['harga_per_jam'], 0, ',', '.') ?> / jam</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php require_once '_partials/footer.php'; ?>

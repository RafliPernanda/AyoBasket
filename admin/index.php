<?php
// File: admin/index.php
session_start();
require_once '../config/database.php';

$page_title = 'Dashboard Reservasi';

// Pagination logic
$limit = 10; // More data per page for admin
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page > 0) ? ($page - 1) * $limit : 0;

// Search logic
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Count query
$countSql = "SELECT COUNT(*) FROM reservasi r WHERE r.nama_pemesan LIKE ?";
$countStmt = $pdo->prepare($countSql);
$countStmt->execute(["%$search%"]);
$totalRows = $countStmt->fetchColumn();
$totalPages = ceil($totalRows / $limit);

// Main data query
$sql = "SELECT r.*, l.nama_lapangan FROM reservasi r JOIN lapangan l ON r.id_lapangan = l.id_lapangan WHERE r.nama_pemesan LIKE ? ORDER BY r.created_at DESC LIMIT ? OFFSET ?";
$stmt = $pdo->prepare($sql);
$searchParam = "%$search%";
$stmt->bindParam(1, $searchParam, PDO::PARAM_STR);
$stmt->bindParam(2, $limit, PDO::PARAM_INT);
$stmt->bindParam(3, $offset, PDO::PARAM_INT);
$stmt->execute();
$reservations = $stmt->fetchAll();

require_once '../_partials/header_admin.php';

// Summary data queries
try {
    $totalReservasiStmt = $pdo->prepare("SELECT COUNT(*) FROM reservasi");
    $totalReservasiStmt->execute();
    $totalReservasi = $totalReservasiStmt->fetchColumn();

    $reservasiAktifStmt = $pdo->prepare("SELECT COUNT(*) FROM reservasi WHERE status_reservasi = ?");
    $reservasiAktifStmt->execute(['Aktif']);
    $reservasiAktif = $reservasiAktifStmt->fetchColumn();

    $totalLapanganStmt = $pdo->prepare("SELECT COUNT(*) FROM lapangan");
    $totalLapanganStmt->execute();
    $totalLapangan = $totalLapanganStmt->fetchColumn();
} catch (PDOException $e) {
    $totalReservasi = 'N/A';
    $reservasiAktif = 'N/A';
    $totalLapangan = 'N/A';
}

?>

<!-- Summary Cards -->
<div class="summary-grid">
    <div class="summary-card">
        <h3>Total Reservasi</h3>
        <p><?= $totalReservasi ?></p>
    </div>
    <div class="summary-card">
        <h3>Reservasi Aktif</h3>
        <p><?= $reservasiAktif ?></p>
    </div>
    <div class="summary-card">
        <h3>Total Lapangan</h3>
        <p><?= $totalLapangan ?></p>
    </div>
</div>

<!-- Data Table Section -->
<div class="data-table-section">
    <div class="card-header">
        <h2>Manajemen Reservasi</h2>
        <div class="controls">
            <form action="index.php" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Cari nama pemesan..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <a href="tambah.php" class="btn btn-primary">+ Tambah Reservasi</a>
        </div>
    </div>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pemesan</th>
                    <th>Lapangan</th>
                    <th>Tanggal Main</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($reservations)): ?>
                    <tr><td colspan="6" style="text-align: center;">Tidak ada data.</td></tr>
                <?php else: ?>
                    <?php foreach ($reservations as $row): ?>
                    <tr>
                        <td><?= $row['id_reservasi'] ?></td>
                        <td><?= htmlspecialchars($row['nama_pemesan']) ?></td>
                        <td><?= htmlspecialchars($row['nama_lapangan']) ?></td>
                        <td><?= htmlspecialchars(date('d M Y', strtotime($row['tanggal_main']))) ?></td>
                        <td><span class="status-badge status-<?= strtolower($row['status_reservasi']) ?>"><?= htmlspecialchars($row['status_reservasi']) ?></span></td>
                        <td class="action-buttons">
                            <a href="edit.php?id=<?= $row['id_reservasi'] ?>" class="btn-edit">Edit</a>
                            <a href="delete.php?id=<?= $row['id_reservasi'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if ($totalPages > 1): ?>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="index.php?page=<?= $i ?>&search=<?= urlencode($search) ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>

<?php require_once '../_partials/footer_admin.php'; ?>
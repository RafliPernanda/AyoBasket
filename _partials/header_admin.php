<?php 
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'Admin Dashboard' ?> - AyoBasket</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css">
</head>
<body>

<div class="dashboard-layout">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h1 class="sidebar-brand">🏀 AyoBasket Admin</h1>
        </div>
        <nav class="sidebar-nav">
            <a href="index.php" class="nav-item <?= ($current_page == 'index.php') ? 'active' : '' ?>">📊 Dashboard</a>
            <a href="tambah.php" class="nav-item <?= ($current_page == 'tambah.php') ? 'active' : '' ?>">➕ Tambah Reservasi</a>
            <a href="../index.php" class="nav-item" target="_blank">🔗 Lihat Situs</a>
        </nav>
    </aside>

    <div class="main-content">
        <header class="main-header">
            <button class="sidebar-toggle" id="sidebar-toggle">☰</button>
            <h2 class="header-title"><?= isset($page_title) ? htmlspecialchars($page_title) : 'Dashboard' ?></h2>
        </header>

        <main class="content-wrapper">

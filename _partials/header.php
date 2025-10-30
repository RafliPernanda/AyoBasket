<?php 
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'AyoBasket' ?></title>
    
    <!-- Google Fonts: Poppins & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="main-header">
    <div class="container">
        <nav class="main-nav">
            <a href="index.php" class="nav-brand">AyoBasket</a>
            <div class="nav-links" id="nav-links">
                <a href="index.php" class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">Home</a>
                <a href="reservasi.php" class="<?= ($current_page == 'reservasi.php') ? 'active' : '' ?>">Reservasi</a>
                <a href="about.php" class="<?= ($current_page == 'about.php') ? 'active' : '' ?>">Tentang Kami</a>
                <a href="daftarkan-lapangan.php" class="<?= ($current_page == 'daftarkan-lapangan.php') ? 'active' : '' ?>">Daftarkan Lapangan</a>
            </div>
            <button class="hamburger-btn" id="hamburger-btn" aria-label="Toggle Menu">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
        </nav>
    </div>
</header>

<div class="container page-content">
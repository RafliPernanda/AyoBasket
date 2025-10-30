<?php 
$page_title = 'Tentang Kami - AyoBasket';
require_once '_partials/header.php'; 
?>

<style>
    .section {
        padding: 2rem 0;
    }
    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
    }
    /* Timeline for Our Story */
    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }
    .timeline::after {
        content: '';
        position: absolute;
        width: 3px;
        background-color: var(--primary-color);
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -1.5px;
    }
    .timeline-item {
        padding: 1rem 2.5rem;
        position: relative;
        width: 50%;
    }
    .timeline-item:nth-child(odd) { left: 0; }
    .timeline-item:nth-child(even) { left: 50%; }
    .timeline-item::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        right: -10px;
        background-color: white;
        border: 4px solid var(--primary-color);
        top: 24px;
        border-radius: 50%;
        z-index: 1;
    }
    .timeline-item:nth-child(even)::after { left: -10px; }
    .timeline-content {
        padding: 1.5rem;
        background: var(--card-bg);
        border-radius: 8px;
        box-shadow: 0 4px 15px var(--shadow-color);
    }
    .timeline-content h4 { color: var(--primary-color); }

    /* Values Grid */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }
    .value-card { text-align: center; }
    .value-card .icon { color: var(--primary-color); margin-bottom: 1rem; }

    @media (max-width: 768px) {
        .timeline::after { left: 10px; }
        .timeline-item { width: 100%; padding-left: 40px; padding-right: 0; }
        .timeline-item:nth-child(even) { left: 0; }
        .timeline-item::after { left: 1px; }
    }
</style>

<main>
    <div class="section">
        <h2 class="section-title">Kisah Kami</h2>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>2023 - Ide Lahir</h4>
                    <p>Berawal dari kesulitan kami sendiri mencari lapangan basket yang tersedia di akhir pekan, tercetuslah ide untuk sebuah platform yang bisa menyelesaikan masalah ini untuk semua orang.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Awal 2024 - Riset & Pengembangan</h4>
                    <p>Tim kecil kami mulai melakukan riset pasar, berbicara dengan pemilik lapangan dan pemain, serta merancang prototipe pertama dari aplikasi AyoBasket.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Pertengahan 2024 - Peluncuran Beta</h4>
                    <p>Kami meluncurkan versi beta untuk beberapa komunitas terpilih. Masukan dari mereka sangat berharga untuk penyempurnaan platform.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Hari Ini - Untuk Anda</h4>
                    <p>AyoBasket resmi diluncurkan! Kami bersemangat untuk terus bertumbuh, menghubungkan lebih banyak lapangan, dan membangun komunitas basket terbesar di Indonesia.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Nilai-Nilai Kami</h2>
        <div class="values-grid">
            <div class="card value-card">
                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
                <h4>Komunitas</h4>
                <p>Kami percaya pada kekuatan olahraga untuk menyatukan orang. Kami membangun lebih dari sekadar platform, kami membangun rumah bagi para pebasket.</p>
            </div>
            <div class="card value-card">
                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
                <h4>Kesehatan</h4>
                <p>Kami berkomitmen untuk mendukung gaya hidup aktif dan sehat dengan mempermudah setiap orang untuk berolahraga dan tetap bugar.</p>
            </div>
            <div class="card value-card">
                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                <h4>Aksesibilitas</h4>
                <p>Teknologi harus memberi kemudahan. Platform kami dirancang agar intuitif, cepat, dan dapat diandalkan oleh siapa saja, di mana saja.</p>
            </div>
        </div>
    </div>

</main>

<?php require_once '_partials/footer.php'; ?>

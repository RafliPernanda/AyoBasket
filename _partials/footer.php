</div> <!-- .page-content -->

<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h4>Tentang AyoBasket</h4>
                <p>Platform digital untuk mempermudah para pecinta bola basket dalam menemukan dan menyewa lapangan secara online.</p>
            </div>
            <div class="footer-column">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="reservasi.php"><i class="fas fa-calendar-alt"></i>Reservasi</a></li>
                    <li><a href="about.php"><i class="fas fa-info-circle"></i>Tentang Kami</a></li>
                    <li><a href="daftarkan-lapangan.php"><i class="fas fa-plus-circle"></i>Daftarkan Lapangan</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Hubungi Kami</h4>
                <p><i class="fas fa-envelope"></i> contact@ayobasket.com</p>
                <p><i class="fas fa-phone"></i> +62 812 3456 7890</p>
                <div class="footer-socials">
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> AyoBasket. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script>
    // JavaScript untuk Hamburger Menu
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const navLinks = document.getElementById('nav-links');

    if (hamburgerBtn && navLinks) {
        hamburgerBtn.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            hamburgerBtn.classList.toggle('open');
        });
    }
</script>

</body>
</html>

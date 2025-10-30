        </main>

        <footer class="main-footer">
            <p>&copy; <?= date('Y') ?> AyoBasket Admin. All Rights Reserved.</p>
        </footer>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const layout = document.querySelector('.dashboard-layout');

    if (sidebarToggle && layout) {
        sidebarToggle.addEventListener('click', function() {
            layout.classList.toggle('sidebar-collapsed');
        });
    }
});
</script>

</body>
</html>

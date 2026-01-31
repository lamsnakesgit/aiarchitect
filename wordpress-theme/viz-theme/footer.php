<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-info">
                <h3>
                    <?php bloginfo('name'); ?>
                </h3>
                <p>
                    <?php bloginfo('description'); ?>
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy;
                <?php echo date('Y'); ?>
                <?php bloginfo('name'); ?>. Все права защищены.
            </p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
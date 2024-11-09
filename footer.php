<?php wp_footer(); ?>
<script>
    var menuIcon = "<?php echo get_stylesheet_directory_uri(); ?>/img/svg/menu.svg";
    var closeIcon = "<?php echo get_stylesheet_directory_uri(); ?>/img/svg/close-white.svg";
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/scripts.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        buttons: [
            "zoom",
            "close",
            "fullscreen", // добавьте полноэкранный режим
        ],
        zoom: {
            enabled: true,
            duration: 300,
        },
        // Убедитесь, что у вас есть другие параметры
        transitionEffect: "tube", // Например, можно добавить эффект перехода
    });
</script>

</body>
</html>

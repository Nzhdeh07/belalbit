<div class="grid grid-cols-[317px_1fr] tabletLandscape:grid-cols-1 min-h-full">
    <!-- Сайдбар -->
    <div class="flex flex-col tabletLandscape:hidden  bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar(); ?>
    </div>

    <!--    Основной раздел-->
    <div class="flex flex-col gap-2.5">

        <!-- Шапка для десктопа -->
        <div id="header" class="block mobileLandscape:hidden">
            <?php get_header();?>
        </div>

        <!-- Шапка  для мобильных устройств-->
        <div id="header-mobile" class="hidden mobileLandscape:flex">
            <?php get_header('mobile');?>
        </div>


        <div class="flex-grow">
            <?php get_template_part('module/mainContent', null, array()); ?>
        </div>

        <!-- Футер для десктопа -->
        <footer id="footer" class="block mobileLandscape:hidden">
            <?php get_footer();?>
        </footer>
        <!-- Футер для мобильных устройств -->
        <footer id="footer" class="hidden mobileLandscape:block">
            <?php get_footer('mobile');?>
        </footer>

    </div>
</div>


<?php
//
//get_header();
//get_template_part('module/widgetes/banner', null, array());
//get_template_part('module/mainContent', null, array());

//?>


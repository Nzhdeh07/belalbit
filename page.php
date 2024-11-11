<?php get_header(); ?>


<div class="grid grid-cols-[317px_1fr] tabletLandscape:grid-cols-1 min-h-full">
    <!-- Сайдбар -->
    <div class="flex flex-col tabletLandscape:hidden  bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar(); ?>
    </div>

    <!--    Основной раздел-->
    <div class="flex flex-col">

        <!-- Шапка для десктопа -->
        <div id="header" class="block mobileLandscape:hidden">
            <?php get_template_part('module/header', null, array()); ?>
        </div>
        <!-- Шапка  для мобильных устройств-->
        <div id="header-mobile" class="hidden mobileLandscape:flex">
            <?php get_template_part('module/header-mobile', null, array()); ?>
        </div>

        <!-- Основной контент -->
        <div class="flex-grow flex-1">
            <?php get_template_part('module/mainContent', null, array()); ?>
        </div>



        <!-- Футер для десктопа -->
        <div id="footer" class="block mobileLandscape:hidden">
            <?php get_template_part('module/footer', null, array()); ?>
        </div>
        <!-- Футер для мобильных устройств -->
        <div id="footer-mobile" class="hidden mobileLandscape:block ">
            <?php get_template_part('module/footer-mobile', null, array()); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>


<?php get_header(); ?>
<div class="grid grid-cols-[317px_1fr] tabletLandscape:grid-cols-1 min-h-full">

    <!-- Сайдбар -->
    <div class="flex flex-col tabletLandscape:hidden  bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar(); ?>
    </div>

    <!--    Основной раздел-->
    <div class="flex flex-col gap-2.5">

        <!-- Шапка для десктопа -->
        <header id="header" class="block mobileLandscape:hidden">
            <?php get_template_part('module/header', null, array()); ?>
        </header>
        <!-- Шапка  для мобильных устройств-->
        <header id="header-mobile" class="hidden mobileLandscape:flex">
            <?php get_template_part('module/header-mobile', null, array()); ?>
        </header>

        <!-- Основной контент -->
        <div class="flex-grow pt-10">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'entry' ); ?>
                <?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
            <?php endwhile; endif; ?>
            <footer class="footer">
                <?php get_template_part( 'nav', 'below-single' ); ?>
        </div>

        <!-- Футер для десктопа -->
        <footer id="footer" class="block mobileLandscape:hidden">
            <?php get_template_part('module/footer', null, array()); ?>
        </footer>
        <!-- Футер для мобильных устройств -->
        <footer id="footer-mobile" class="hidden mobileLandscape:block ">
            <?php get_template_part('module/footer-mobile', null, array()); ?>
        </footer>
    </div>
</div>
<?php get_footer(); ?>


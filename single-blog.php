<?php get_header(); ?>
<div class="grid grid-cols-[317px_1fr] tabletLandscape:grid-cols-1 min-h-full">

    <!-- Сайдбар -->
    <div class="flex flex-col tabletLandscape:hidden  bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar(); ?>
    </div>

    <!--    Основной раздел-->
    <div class="flex flex-col ">

        <!-- Шапка для десктопа -->
        <header id="header" class="block mobileLandscape:hidden">
            <?php get_template_part('module/header', null, array()); ?>
        </header>
        <!-- Шапка  для мобильных устройств-->
        <header id="header-mobile" class="hidden mobileLandscape:flex">
            <?php get_template_part('module/header-mobile', null, array()); ?>
        </header>

        <!-- Основной контент -->
        <div class="flex flex-col flex-grow gap-10 pt-10 mobileLandscape:pt-5 pb-10">
            <div class="px-5 mobileLandscape:px-2.5">
                <?php $background_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <div class="relative flex flex-col  items-center justify-center gap-2.5 py-10 rounded-md bg-cover bg-center"
                     style="background-image: url('<?php echo esc_url($background_image); ?>');">
                    <div class="absolute z-10 inset-0 bg-[hsla(0,0%,85%,0.8)] rounded-md pointer-events-none"></div>
                    <h2 class="text-center z-50 font-medium text-[36px] leading-[54px] text-black"><?php echo get_the_title(); ?></h2>

                    <!-- Хлебные крошки (Yoast SEO) -->
                    <?php if (function_exists('yoast_breadcrumb')): ?>
                        <div class="z-50 font-normal text-[14px] leading-5 text-breadcrumb text-center">
                            <?php yoast_breadcrumb('<p  class="breadcrumbs-text last-gray underscore">', '</p>'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part('entry-blog'); ?>
                <?php if (comments_open() && !post_password_required()) {
                    comments_template('', true);
                } ?>
            <?php endwhile; endif; ?>

            <footer class="footer">
                <div class="px-5 mobileLandscape:px-2.5">
                    <div class="flex justify-between ">
                        <!-- Предыдущая запись (оставить место даже если нет записи) -->
                        <div class="previous-post  py-2 px-4 rounded-md bg-customGreen-normal font-medium text-[14px] leading-6 text-white cursor-pointer <?php if (!get_previous_post()) echo 'invisible'; ?>">
                            <?php previous_post_link('%link', 'Предыдущая запись'); ?>
                        </div>

                        <!-- Следующая запись (оставить место даже если нет записи) -->
                        <div class="next-post  py-2 px-4 rounded-md bg-customGreen-normal font-medium text-[14px] leading-6 text-white cursor-pointer <?php if (!get_next_post()) echo 'invisible'; ?>">
                            <?php next_post_link('%link', 'Следующая запись'); ?>
                        </div>
                    </div>
                </div>


                <?php get_template_part('nav', 'below-single'); ?>
            </footer>
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




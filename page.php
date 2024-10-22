<div class="grid grid-cols-[317px_1fr] tabletLandscape:grid-cols-1 min-h-full">
    <!-- Сайдбар -->
    <div class="flex flex-col tabletLandscape:hidden  bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar();?>
    </div>

<!--    Основной раздел-->
    <div class="flex flex-col gap-2.5">
        <?php get_header();?>

        <div class="flex-grow">
            <?php get_template_part('module/mainContent', null, array());?>
        </div>

        <?php get_footer();?>
    </div>
</div>




<?php
//
//get_header();
//get_template_part('module/widgetes/banner', null, array());
//get_template_part('module/mainContent', null, array());

//?>


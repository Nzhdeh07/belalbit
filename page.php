<div class="min-h-screen flex">
    <!-- Сайдбар -->
    <div class="flex flex-col w-[16%] h-[80vh] bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar();?>
    </div>

<!--    Основной раздел-->
    <div class="w-[84%] flex flex-col gap-2.5">
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


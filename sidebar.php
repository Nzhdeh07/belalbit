<div class="flex flex-col gap-[30px] px-5 pb-[30px] ">
    <div class="flex flex-col logo gap-[30px] cursor-pointer">
        <a href="<?php echo home_url(); ?>">
            <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>"
                 alt="Logo">
        </a>
        <?php get_search_form(); ?>
    </div>


    <div class="flex flex-col gap-2.5">
        <a href="/catalog" class="font-roboto text-[14px] font-normal leading-4 text-black/80">
            Каталог
        </a>


        <?php get_template_part('module/widgetes/catalog', null, array()); ?>
    </div>
</div>







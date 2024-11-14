<div class="flex flex-col w-full bg-white z-100">
    <?php get_template_part('searchform-mobile', null, array()); ?>

    <div class="flex justify-between p-2.5 gap-[5px]  h-full">
        <!-- Первый блок - Контакты -->
        <div class="flex  flex-col flex-1 justify-center items-center  gap-[5px] ">
            <div class="flex gap-[5px] items-center">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/call.svg'; ?>" alt="call">
                <p class="font-semibold text-[14px] leading-5 text-customGray"><?php echo get_field('contact-1', 'options') ?></p>
            </div>

            <div class="flex gap-[5px] items-center">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/mobile.svg'; ?>" alt="mobile">
                <p class="font-semibold text-[14px] leading-5 text-customGray"><?php echo get_field('contact-2', 'options') ?></p>
            </div>
        </div>

        <!-- Вертикальный разделитель -->
        <div id="sl" class=" flex items-center">
            <div class=" border border-mGreen border-solid h-full"></div>
        </div>

        <!-- Второй блок - Почта  -->
        <div class="flex flex-col flex-1 justify-center  gap-[5px] font-semibold text-[14px] leading-5 text-customGray">
            <p class="">Почта для заявок:</p>
            <p><?php echo get_field('mail', 'options') ?></p>
        </div>
    </div>

    <div id="men" class="flex justify-between h-full bg-customGreen-normal transition-all duration-300">
        <!-- Первый блок - Каталог -->
        <button id="catalog-button" class="flex flex-1 justify-center items-center gap-[5px] p-2.5 ">
            <img id="catalog-icon" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/menu.svg'; ?>" alt="call">
            <p class="font-medium text-[14px] leading-5 text-white">Каталог</p>
        </button>

        <!-- Вертикальный разделитель -->
        <div class=" flex items-center">
            <div class=" border border-customGreen border-solid h-full"></div>
        </div>

        <!-- Второй блок - Меню  -->
        <button id="menu-button"  class="flex flex-1 justify-center items-center gap-[5px] p-2.5">
            <img id="menu-icon" class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/menu.svg'; ?>" alt="call">
            <p class="font-medium text-[14px] leading-5 text-white">Меню</p>
        </button>
    </div>
    <div id="catalog-dropdown" class="hidden py-5">
        <?php get_template_part('module/widgetes/catalog', null, array()); ?>
    </div>
    <div id="menu-dropdown" class="hidden py-5">
        <div class="flex flex-col justify-around gap-2.5 items-center">
            <?php foreach (get_field('site-menu', 'options') as $menu) : ?>
                <a href="<?php echo $menu['menu-link']['url']; ?>"
                   class="font-medium text-[16px] leading-[24px]  py-1.5">
                    <?php echo $menu['menu-link']['title']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

</div>


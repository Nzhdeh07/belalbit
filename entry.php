<div class="grid gap-10 px-5 mobileLandscape:px-2.5">

    <!--Карточка товара-->
    <div class="grid gap-2.5">

        <!-- Хлебные крошки (Yoast SEO) -->
        <?php if (function_exists('yoast_breadcrumb')): ?>
            <div class="font-normal text-[14px] leading-5 text-breadcrumb">
                <?php yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>'); ?>
            </div>
        <?php endif; ?>

        <!--Название товара-->
        <h2 class="font-medium text-4xl leading-[54px] text-black"><?php the_title(); ?></h2>

        <!--Картинки и описание товара-->
        <div
                id="post-<?php the_ID(); ?>" <?php post_class('grid grid-cols-[572px_1fr] tabletLandscape:grid-cols-1 gap-[20px] rounded-lg'); ?>>

            <!-- Основное изображение и миниатюры -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="grid grid-cols-[400px_1fr] grid-rows-[400px]  p-2.5 gap-2.5 bg-white rounded-md overflow-hidden  ">

                    <!-- Основное изображение -->
                    <div class=" bg-white ">
                        <a data-fancybox="gallery"
                           href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>">
                            <img class="h-full w-full object-cover"
                                 src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                                 alt="<?php the_title(); ?>">
                        </a>
                    </div>

                    <!-- Дополнительные миниатюры справа с прокруткой -->
                    <div class="flex flex-col gap-2.5 p-2.5 overflow-y-auto">
                        <!-- Ограничиваем высоту и добавляем прокрутку -->
                        <?php
                        $gallery_images = get_field('post-images');
                        if ($gallery_images):
                            foreach ($gallery_images as $image): ?>
                                <a data-fancybox="gallery" href="<?php echo esc_url($image['url'], 'full'); ?>">
                                    <img class="w-full h-full object-cover rounded-md"
                                         src="<?php echo esc_url($image['sizes']['thumbnail'], 'full'); ?>"
                                         alt="<?php echo esc_attr($image['alt']); ?>">
                                </a>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>

                </div>
            <?php endif; ?>


            <div class="flex flex-col gap-14">
                <?php if (get_the_content()) : ?>
                <div class="grid max-w-[770px] ">
                    <h3 class="font-medium text-[20px] leading-[30px] text-black">Описание</h3>
                    <p class="font-normal text-[14px] leading-6 text-customGray-description"><?php echo wp_kses_post(get_the_content()); ?></p>
                </div>
                <?php endif; ?>
                <div class="flex flex-col gap-2.5">
                    <div class="flex gap-10 wideDesktop:flex-col wideDesktop:gap-2.5">
                        <div class="flex  items-center gap-1">
                            <?php $primary_category_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true); ?>
                            <?php if ($primary_category_id) { ?>
                                <h3 class="font-bold text-[16px] leading-5 text-customGray-breadcrumb">Категория:</h3>
                                <?php $primary_category = get_category($primary_category_id); ?>
                                <?php if ($primary_category) { ?>
                                    <a class="font-normal text-[16px] leading-5 text-customGreen-normal"
                                       href="<?php echo esc_url(get_category_link($primary_category->term_id)); ?>">
                                        <?php echo wp_kses_post($primary_category->name); ?>
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div class="flex items-center gap-1">
                            <?php $article = get_field('post-article'); ?>
                            <?php if ($article) { ?>
                                <img class=""
                                     src="<?php echo get_stylesheet_directory_uri() . '/img/svg/barCode.svg'; ?>"
                                     alt="barCode">
                                <h3 class="font-normal  text-[16px] leading-5 text-customGray-breadcrumb">Aртикул <span
                                            class="font-bold">:</span>
                                </h3>
                                <p class="font-bold text-[16px] leading-5 text-customGray-breadcrumb">
                                    <?php echo $article ?>
                                </p>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="flex gap-10   items-center wideDesktop:items-start py-2.5 px-[20px] rounded-md bg-white ">
                        <?php $price = get_field('post-price'); ?>
                        <?php $discount_price = get_field('post-discounted-price'); ?>
                        <?php if ($price): ?>

                            <button class="buy-button py-3 px-[18px] rounded-md bg-customGreen-normal"
                                    data-fancybox="buy" data-src="#buy" href="javascript:;"
                                    data-price="<?php echo esc_attr($discount_price ? $discount_price : $price); ?>"
                                    data-ptitle="<?php the_title(); ?>"
                                    data-url="<?php echo esc_url(get_permalink()); ?>">
                                <p class="font-medium text-[16px] leading-6 text-white">Заказать</p>
                            </button>
                            <div class="flex gap-2.5 items-center wideDesktop:flex-col wideDesktop:gap-2.5 wideDesktop:items-start">
                                <p class="font-medium text-2xl leading-9 text-black"><?php echo esc_html($price); ?></p>
                                <del class="font-medium text-2xl leading-9 text-customGray-bright"><?php echo esc_html($discount_price); ?></del>
                            </div>

                        <?php else: ?>
                            <button class="price-button py-3 px-[18px] rounded-md bg-customGray" data-fancybox="price"
                                    data-src="#price" href="javascript:;"
                                    data-ptitle="<?php the_title(); ?>"
                                    data-url="<?php echo esc_url(get_permalink()); ?>">

                                <p class="font-medium text-[16px] leading-6 text-white">Узнать цену</p>
                            </button>
                            <p class="font-medium text-[24px] leading-9 text-black">По запросу</p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Технические характеристики товара-->
    <?php if (have_rows('specifications')) : ?>
        <div class="flex flex-col gap-2.5 py-2.5 ">
            <p class="font-medium text-xl leading-[30px] text-black">Технические характеристики</p>
            <?php while (have_rows('specifications')) : the_row(); ?>
                <?php $spec_title = get_sub_field('specification-title'); ?>
                <?php $spec_value = get_sub_field('specification-value'); ?>
                <div class="grid grid-cols-2  border-b border-dotted border-customGreen-dotted">
                    <p class="font-normal text-[19px] leading-[34px] text-customGray-black text-left">
                        <?php echo wp_kses_post($spec_title); ?>
                    </p>
                    <p class="break-words whitespace-normal  font-normal text-[19px] leading-[34px] text-customGray-black text-left ">
                        <?php echo wp_kses_post($spec_value); ?>
                    </p>
                </div>
            <?php endwhile; ?>
        </div>

    <?php endif; ?>

    <!--Блок Похожие товары-->
    <div class="grid gap-2.5 ">
        <div class="font-medium text-[32px] leading-[48px]" itemprop="name">
            Похожие товары
        </div>
        <?php get_template_part('module/widgetes/products-slider', null, array()); ?>
    </div>


    <!--Блок Преимущества -->
    <div class="advantages  flex flex-col gap-5 py-10 tabletPortrait:py-5  px-5 tabletPortrait:px-2.5  rounded-md bg-white">
        <div class="font-medium text-[32px] leading-[48px]">Преимущества</div>

        <div class="grid grid-cols-4 ultraWideDesktop:grid-cols-2 tabletPortrait:grid-cols-1 gap-5 tabletPortrait:gap-[30px] ">

            <?php if (have_rows('preimushhestva', 'options')): ?>
                <?php while (have_rows('preimushhestva', 'options')): the_row(); ?>
                    <?php
                    // Получаем значения для каждого элемента в повторителе
                    $title = get_sub_field('zagolovok');          // Заголовок
                    $description = get_sub_field('tekst');        // Описание
                    $icon = get_sub_field('ikonka');              // Иконка (массив с URL и alt-текстом)
                    ?>

                    <div class="flex gap-[29px] items-center">
                        <?php if (!empty($icon)): ?>
                            <img class="w-[70px] h-[70px] object-contain"
                                 src="<?php echo esc_url($icon['url']); ?>"
                                 alt="<?php echo esc_attr($icon['alt']); ?>">
                        <?php endif; ?>
                        <div class="flex flex-col gap-1.5">
                            <h3 class="font-bold text-[18px] leading-6 text-black"><?php echo esc_html($title); ?></h3>
                            <p class="font-normal text-[14px] leading-5"><?php echo esc_html($description); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>

    <!--Блок Ранее смотрели -->
    <?php
    if ($_COOKIE['viewedProd']) { ?>
        <?php $viewedProd = $_COOKIE['viewedProd']; ?>
        <?php $viewedProd = array_reverse($viewedProd); ?>
        <div class="grid gap-2.5 ">
            <div class="font-medium text-[32px] leading-[48px]" itemprop="name">
                Ранее смотрели
            </div>

            <div class="grid">
                <div id="productSwiper" class="swiper">
                    <div id="productSwiper-wrapper" class="swiper-wrapper">
                        <?php foreach ($viewedProd as $viewedProdId) {
                            $GLOBALS['viewedProd'] = get_post($viewedProdId);
                            $viewedProd = get_post($viewedProdId);
                            // Получаем URL миниатюры
                            $image_url = get_the_post_thumbnail_url($viewedProd->ID, 'full');

                            // Получаем описание
                            $description = get_the_content(null, false, $viewedProd);

                            // Получаем произвольные поля
                            $weight = get_field('weight', $viewedProd->ID);
                            $price = get_field('price', $viewedProd->ID);
                            $discount_price = get_field('discount-price', $viewedProd->ID);
                            ?>
                            <div id="product-swiper-slide"
                                 class="swiper-slide flex flex-col justify-between gap-2.5 p-1.5 rounded-md bg-white">

                                <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                                    <img class="  object-contain"
                                         src="<?php echo esc_url($image_url); ?>"
                                         alt="<?php get_the_title(); ?>" loading="lazy">
                                </a>

                                <div class="flex flex-col gap-[5px]">
                                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                                        <p class="font-medium text-[14px] leading-5 text-black"><?php the_title(); ?></p>
                                    </a>


                                    <div class="flex flex-col gap-[5px]">
                                        <?php $price = get_field('post-price'); ?>
                                        <?php $discount_price = get_field('post-discounted-price'); ?>
                                        <?php if ($price): ?>
                                            <div class="">
                                                <p class="font-medium text-[10px] leading-[15px] text-customBlue-light">
                                                    Цены без НДС
                                                </p>
                                                <div class="flex gap-2.5 mobilePortrait:flex-col  ">
                                                    <p class="font-medium text-[16px] leading-5 text-black"><?php echo esc_html($price); ?></p>
                                                    <del class="font-medium text-[14px] leading-5 text-customGray-bright"><?php echo esc_html($discount_price); ?></del>
                                                </div>
                                            </div>

                                            <div class="flex justify-between items-center ">
                                                <?php $primary_category_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true); ?>
                                                <?php $primary_category = get_category($primary_category_id); ?>
                                                <p class="font-normal text-[14px] leading-5 text-customBlue-light"><?php echo wp_kses_post($primary_category->name); ?></p>
                                                <button>
                                                    <img id="add-button"
                                                         src="<?php echo get_stylesheet_directory_uri() . '/img/svg/button.svg'; ?>"
                                                         alt="barCode">
                                                </button>
                                            </div>

                                        <?php else: ?>
                                            <div class="flex flex-col gap-2.5 ">
                                                <?php $primary_category_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true); ?>
                                                <?php $primary_category = get_category($primary_category_id); ?>
                                                <p class="font-normal text-[14px] leading-5 text-customBlue-light"><?php echo wp_kses_post($primary_category->name); ?></p>

                                                <button class="p-2 rounded-md border border-solid border-customGreen-normal">
                                                    <p class="font-medium text-[14px] leading-6 text-customGreen-normal">
                                                        Узнать цену</p>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                    <div id="swiper-button-prev">
                        <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/prev.svg'; ?>"
                             alt="mobile">
                    </div>
                    <div id="swiper-button-next">
                        <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/next.svg'; ?>"
                             alt="mobile">
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
    <?php } ?>

</div>


<?php get_template_part('module/widgetes/order-form', null, array()); ?>




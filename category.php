<?php get_header(); ?>
<div class="grid grid-cols-[317px_1fr] tabletLandscape:grid-cols-1 min-h-full">
    <!-- Сайдбар -->
    <div class="flex flex-col tabletLandscape:hidden bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar(); ?>
    </div>

    <!-- Основной раздел -->
    <div class="flex flex-col gap-2.5">
        <!-- Шапка для десктопа -->
        <header id="header" class="block mobileLandscape:hidden sticky top-8 z-50">
            <?php get_template_part('module/header', null, array()); ?>
        </header>
        <!-- Шапка для мобильных устройств -->
        <header id="header-mobile" class="hidden mobileLandscape:flex sticky top-0 z-50">
            <?php get_template_part('module/header-mobile', null, array()); ?>
        </header>

        <!-- Основной контент -->
        <div class="flex-grow pt-10">
            <div class="flex flex-col px-5 mobileLandscape:p-2.5 gap-10">
                <!-- Хлебные крошки (Yoast SEO) -->
                <?php if (function_exists('yoast_breadcrumb')): ?>
                    <div class="font-normal text-[14px] leading-5 text-breadcrumb">
                        <?php yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $current_category_id = get_queried_object_id(); // ID текущей категории
                $child_categories = get_categories(array(
                    'hide_empty' => false,
                    'parent' => $current_category_id, // Получаем только подкатегории текущей категории
                ));
                ?>
                <?php if (!empty($child_categories)): ?>
                    <div class="subcategories grid grid-cols-6 ultraWideDesktop:grid-cols-5 wideDesktop:grid-cols-4 desktop:grid-cols-3 mobileLandscape:grid-cols-2 gap-2.5">
                        <?php foreach ($child_categories as $index => $child_category): ?>
                            <?php
                            $image_id = get_term_meta($child_category->term_id, '_thumbnail_id', true);
                            $categories_image = wp_get_attachment_image_url($image_id, 'full');
                            $child_link = get_category_link($child_category->term_id);
                            ?>

                            <!-- Показывать только первые 5 элементов изначально -->
                            <a href="<?php echo esc_url($child_link); ?>"
                               class="subcategory-item <?php echo $index >= 5 ? 'hidden' : ''; ?> flex flex-col gap-2 relative items-center py-1.5 rounded-[5px] bg-white">
                        <span class="absolute top-0 left-0 py-1 px-2 font-semibold text-[12px] leading-[14px] rounded-[5px] bg-customGreen text-customGreen-dark">
                            <?php echo $child_category->count > 0 ? $child_category->count . ' шт.' : '0 шт.'; ?>
                        </span>

                                <?php if ($categories_image): ?>
                                    <img src="<?php echo esc_url($categories_image); ?>" alt="<?php echo esc_attr($child_category->name); ?>" class="w-[50px] h-[50px]"/>
                                <?php endif; ?>

                                <p class="font-normal text-[14px] leading-4">
                                    <?php echo esc_html($child_category->name); ?>
                                </p>
                            </a>

                        <?php endforeach; ?>

                        <!-- Кнопка "Показать еще" как шестой элемент, если категорий больше 5 -->
                        <?php if (count($child_categories) > 5): ?>
                            <div class="show-all-button min-h-20 flex justify-center items-center py-1.5 px-14 mobileLandscape:px-2.5 rounded-[5px] bg-customGreen text-center cursor-pointer text-black">
                                Посмотреть все категории
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>


                <!-- Товары по категории -->
                <div class="flex flex-col gap-2.5">
                    <!-- Заголовок категории -->
                    <h1 class="font-medium text-[32px] leading-[48px]" itemprop="name">
                        <?php single_term_title(); ?>
                    </h1>

                    <!-- Товары по данной категории -->
                    <div class="grid grid-cols-6 ultraWideDesktop:grid-cols-5 wideDesktop:grid-cols-4 desktop:grid-cols-3 mobileLandscape:grid-cols-2 gap-2.5">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                // Получаем данные из ACF полей
                                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                $description = get_the_content();
                                $weight = get_field('weight');
                                $price = get_field('price');
                                $discount_price = get_field('discount-price');
                                $count = get_field('count');
                                $tags = get_the_terms(get_the_ID(), 'post_tag');

                                $tag_image_urls = [];
                                if ($tags && !is_wp_error($tags)) {
                                    foreach ($tags as $tag) {
                                        $image_id = get_term_meta($tag->term_id, '_thumbnail_id', true);
                                        $tag_image_urls[] = wp_get_attachment_image_url($image_id, 'full');
                                    }
                                }
                                ?>

                                <div class="flex flex-col justify-between gap-2.5 p-1.5 rounded-md bg-white">
                                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                                        <img class="h-[168px] w-full object-cover" src="<?php echo esc_url($image_url); ?>"
                                             alt="<?php the_title(); ?>" loading="lazy">
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
                                                    <div class="flex mobilePortrait:flex-col">
                                                        <p class="font-medium text-[16px] leading-5 text-black"><?php echo esc_html($price); ?></p>
                                                        <del class="font-medium text-[14px] leading-5 text-customGray-bright"><?php echo esc_html($discount_price); ?></del>
                                                    </div>
                                                </div>

                                                <div class="flex justify-between items-center">
                                                    <?php $primary_category_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true); ?>
                                                    <?php $primary_category = get_category($primary_category_id); ?>
                                                    <p class="font-normal text-[14px] leading-5 text-customBlue-light"><?php echo wp_kses_post($primary_category->name); ?></p>
                                                    <button class="buy-button"
                                                            data-fancybox="buy-<?php the_ID(); ?>" data-src="#buy" href="javascript:;"
                                                            data-price="<?php echo esc_attr($discount_price ? $discount_price : $price); ?>"
                                                            data-ptitle="<?php the_title(); ?>"
                                                            data-url="<?php echo esc_url(get_permalink()); ?>">
                                                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/button.svg'; ?>"
                                                             alt="barCode">
                                                    </button>
                                                </div>

                                            <?php else: ?>
                                                <div class="flex flex-col gap-[5px]">
                                                    <?php $primary_category_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true); ?>
                                                    <?php $primary_category = get_category($primary_category_id); ?>
                                                    <p class="font-normal text-[14px] leading-5 text-customBlue-light"><?php echo wp_kses_post($primary_category->name); ?></p>

                                                    <button class="price-button p-2 rounded-md border border-solid border-customGreen-normal" data-fancybox="price-<?php the_ID(); ?>"
                                                            data-src="#price" href="javascript:;"
                                                            data-ptitle="<?php the_title(); ?>"
                                                            data-url="<?php echo esc_url(get_permalink()); ?>">
                                                        <p class="font-medium text-[14px] leading-6 text-customGreen-normal">
                                                            Узнать цену</p>
                                                    </button>


                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        else:
                            echo '<p>Записей не найдено</p>';
                        endif;
                        ?>
                    </div>

                    <!-- Пагинация -->
                    <div class="pagination flex justify-between items-center ">

                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('Ранее', 'textdomain'),
                            'next_text' => __('Далее', 'textdomain'),
                        ));
                        ?>


                        <?php
                        // Получаем количество страниц
                        $total_pages = $wp_query->max_num_pages;
                        if ($total_pages > 1) {
                            ?>
                            <div class="pagination-container ">
                                <form action="" method="get" class="pagination-form flex items-center gap-2.5">
                                    <label class="font-normal text-[16px] leading-5" for="page_number"><?php _e('Перейти на страницу:', 'textdomain'); ?></label>
                                    <input class="custom-number-input" type="number" id="page_number" name="paged" min="1" max="<?php echo $total_pages; ?>" value="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" />
                                    <button class="w-[108px] h-[36px] py-1.5 px-5 rounded-md bg-customGreen-normal font-normal text-[16px] leading-5 text-center text-white" type="submit"><?php _e('Перейти', 'textdomain'); ?></button>
                                </form>
                            </div>
                            <?php
                        }
                        ?>

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


                                                            <button class="buy-button"
                                                                    data-fancybox="buy-<?php the_ID(); ?>" data-src="#buy" href="javascript:;"
                                                                    data-price="<?php echo esc_attr($discount_price ? $discount_price : $price); ?>"
                                                                    data-ptitle="<?php the_title(); ?>"
                                                                    data-url="<?php echo esc_url(get_permalink()); ?>">
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

                                                            <button class="price-button p-2 rounded-md border border-solid border-customGreen-normal" data-fancybox="price-<?php the_ID(); ?>"
                                                                    data-src="#price" href="javascript:;"
                                                                    data-ptitle="<?php the_title(); ?>"
                                                                    data-url="<?php echo esc_url(get_permalink()); ?>">
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
        </div>

        <!-- Футер -->
        <footer id="footer" class="block mobileLandscape:hidden">
            <?php get_template_part('module/footer', null, array()); ?>
        </footer>
        <footer id="footer-mobile" class="hidden mobileLandscape:block">
            <?php get_template_part('module/footer-mobile', null, array()); ?>
        </footer>
    </div>
</div>
<?php get_footer(); ?>

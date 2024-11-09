<?php /* Template Name: Каталог товаров */ ?>


<?php get_header(); ?>

<div class="grid grid-cols-[317px_1fr] tabletLandscape:grid-cols-1 min-h-full">
    <!-- Сайдбар -->
    <div class="flex flex-col tabletLandscape:hidden  bg-white py-5 gap-[30px] border border-solid border-sidebarborder">
        <?php get_sidebar(); ?>
    </div>

    <!--    Основной раздел-->
    <div class="flex flex-col gap-2.5">

        <!-- Шапка для десктопа -->
        <div id="header" class="block mobileLandscape:hidden">
            <?php get_template_part('module/header', null, array()); ?>
        </div>
        <!-- Шапка  для мобильных устройств-->
        <div id="header-mobile" class="hidden mobileLandscape:flex">
            <?php get_template_part('module/header-mobile', null, array()); ?>
        </div>

        <!-- Основной контент -->
        <div class="flex-grow flex-1 py-10">

            <div class="flex flex-col gap-[30px] px-5 tabletPortrait:px-2.5">

                <div class=" flex flex-col gap-2.5">
                    <!-- Хлебные крошки (Yoast SEO) -->
                    <?php if (function_exists('yoast_breadcrumb')): ?>
                        <div class="font-normal text-[14px] leading-5 text-breadcrumb">
                            <?php yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>'); ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="font-medium text-[32px] leading-[48px] text-black" itemprop="name">
                        Каталог
                    </h1>
                </div>


                <?php
                $categories = get_categories(array(
                    'hide_empty' => false,
                    'exclude' => array(get_option('default_category')),
                    'parent' => 0,
                ));

                $current_category = get_queried_object_id();
                foreach ($categories as $category) {
                    $category_id = $category->term_id;
                    $category_link = get_category_link($category_id);

                    $child_categories = get_categories(array(
                        'hide_empty' => false,
                        'parent' => $category_id,
                    ));

                    $child_category_ids = wp_list_pluck($child_categories, 'term_id');
                    error_log('Child Category IDs for ' . $category->name . ': ' . implode(', ', $child_category_ids));


                    $is_open = in_array($current_category, wp_list_pluck($child_categories, 'term_id'));


                    ?>
                    <div class="flex flex-col gap-2.5">
                        <?php if (!empty($child_categories)): ?>
                            <a href="<?php echo esc_url($category_link); ?>"
                               class="font-medium text-xl leading-[30px] text-black">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endif; ?>

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
                                        <?php if ($child_category->count > 0): ?>
                                            <span class="absolute top-0 left-0 py-1 px-2 font-semibold text-[12px] leading-[14px] rounded-[5px] bg-customGreen text-customGreen-dark">
                            <?php echo $child_category->count; ?> шт.
                        </span>
                                        <?php else: ?>
                                            <span class="absolute top-0 left-0 py-1 px-2 font-semibold text-[12px] leading-[14px] rounded-[5px] bg-customGreen text-customGreen-dark">
                           0 шт.
                        </span>
                                        <?php endif; ?>

                                        <img src="<?php echo esc_url($categories_image); ?>"
                                             alt="<?php echo esc_attr($child_category->name); ?>"
                                             class="w-[50px] h-[50px]"/>

                                        <p class="font-normal text-[14px] leading-4">
                                            <?php echo esc_html($child_category->name); ?>
                                        </p>
                                    </a>

                                <?php endforeach; ?>

                                <!-- Кнопка "Показать еще" как шестой элемент, если категорий больше 5 -->
                                <?php if (count($child_categories) > 5): ?>
                                    <div class="show-all-button  min-h-20 flex justify-center items-center py-1.5 px-14 mobileLandscape:px-2.5 rounded-[5px] bg-customGreen text-center cursor-pointer text-black">
                                        Посмотреть все
                                        категории
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php } ?>

            </div>

            <div class="grid gap-10 my-2 ">
                <?php get_template_part('module/flexible-content', null, array()); ?>
            </div>

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




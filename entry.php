<div class="grid gap-10 px-5 mobileLandscape:px-2.5">

    <!--Выбранный товар-->
    <div class="grid gap-2.5">

        <!-- Хлебные крошки (Yoast SEO) -->
        <?php if (function_exists('yoast_breadcrumb')): ?>
            <div class="font-normal text-[14px] leading-5 text-breadcrumb">
                <?php yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>'); ?>
            </div>
        <?php endif; ?>

        <h2 class="font-medium text-4xl leading-[54px] text-black"><?php the_title(); ?></h2>

        <article
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
                <div class="grid max-w-[770px] ">
                    <h3 class="font-medium text-[20px] leading-[30px] text-black">Описание</h3>
                    <p class="font-normal text-[14px] leading-6 text-customGray-description"><?php echo wp_kses_post(get_the_content()); ?></p>
                </div>
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
                                    data-productId="<?php echo get_the_ID(); ?>"
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
                            <button class="py-3 px-[18px] rounded-md bg-customGray" data-fancybox="price"
                                    data-src="#price" href="javascript:;">
                                <p class="font-medium text-[16px] leading-6 text-white">Узнать цену</p>
                            </button>
                            <p class="font-medium text-[24px] leading-9 text-black">По запросу</p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </article>
    </div>

    <!--Технические характеристики товара-->
    <div class="flex flex-col">
        <h4 class="font-medium text-xl leading-[30px] text-black">Технические характеристики</h4>
        <?php $banner_field = get_field('specifications'); ?>
        <?php $banner_count = is_array($banner_field) ? count($banner_field) : 0; ?>
        <div class="flex flex-col gap-2.5 py-2.5  justify-center  ">
            <?php while (have_rows('specifications')) : the_row(); ?>
                <?php
                $specification_title = get_sub_field('specification-title');
                $specification_value = get_sub_field('specification-value');
                ?>
                <div class="flex items-center justify-between border-b border-dotted border-customGreen-dotted">
                    <p class="font-normal text-[19px] leading-[34px]  text-customGray-black text-left">
                        <?php echo esc_attr($specification_title); ?>
                    </p>

                    <p class="font-normal text-[19px] leading-[34px]  text-customGray-black text-left">
                        <?php echo esc_attr($specification_value); ?>
                    </p>
                </div>

                <?php $questions_count += 1 ?>
            <?php endwhile; ?>
        </div>
    </div>


    <div class="grid gap-2.5 ">
        <h1 class="font-medium text-[32px] leading-[48px]" itemprop="name">
            Похожие товары
        </h1>
        <?php get_template_part('module/widgetes/products-slider', null, array()); ?>
    </div>

</div>


<?php get_template_part('module/widgetes/order-form', null, array()); ?>




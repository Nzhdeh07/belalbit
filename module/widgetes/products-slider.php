<div class="grid">
    <?php $args = array(
        'category_name' => 'ladder-trays',
        'posts_per_page' => 20,
        'orderby' => 'rand',
    ); ?>
    <?php $query = new WP_Query($args); ?>

    <div id="productSwiper" class="swiper">
        <div id="productSwiper-wrapper" class="swiper-wrapper">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    // Получаем данные из ACF полей
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $description = get_the_content();
                    $weight = get_field('weight');
                    $price = get_field('price');
                    $discount_price = get_field('discount-price');
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

                <?php
                endwhile;
                wp_reset_postdata(); // Сбрасываем данные после запроса
            else :
                echo 'Нет постов в этой категории.';
            endif;
            ?>


        </div>
        <div id="swiper-button-prev">
            <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/prev.svg'; ?>" alt="mobile">
        </div>
        <div id="swiper-button-next">
            <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/next.svg'; ?>" alt="mobile">
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>


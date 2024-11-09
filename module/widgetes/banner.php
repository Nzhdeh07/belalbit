<?php if (have_rows('flexible-content')) : ?>
    <div id="bannerSwiper" class="swiper bannerSwiper rounded-md overflow-hidden">
        <div class="swiper-wrapper">
            <?php while (have_rows('flexible-content')) : the_row(); ?>
                <?php if (get_row_layout() == 'banners') : ?>
                    <?php while (have_rows('banner')) : the_row(); ?>
                        <?php
                        // Получаем данные подполей повторителя
                        $banner_image = get_sub_field('banner-img');
                        $banner_link = get_sub_field('banner-link');
                        $banner_data = get_sub_field('banner-data');
                        $banner_zagolovok = get_sub_field('banner-zagolovok');
                        $banner_tekst = get_sub_field('banner-tekst');
                        $banner_tekst_knopki = get_sub_field('banner-tekst-knopki');
                        ?>

                        <div class="swiper-slide">
                            <div class="w-full h-full flex items-center mobileLandscape:items-start py-5 px-[30px] mobileLandscape:px-2.5 bg-cover bg-center overflow-hidden"
                                 style="background-image: url('<?php echo esc_url($banner_image['url']); ?>');">

                                <!-- Контент слайда -->
                                <div class="flex flex-col gap-4 bg-customWhite p-6 md:p-8 rounded-md max-w-[700px]">
                                    <p class="flex items-center gap-2.5 py-2 px-3 bg-customGreen-normal/15 rounded-md font-medium text-[16px] leading-6 text-black max-w-max">
                                        <img id="calendar"
                                             src="<?php echo get_stylesheet_directory_uri() . '/img/svg/calendar.svg'; ?>"
                                             alt="calendar">
                                        <?php echo esc_attr($banner_data); ?>
                                    </p>
                                    <h3 class="font-medium text-[32px] md:text-[40px] leading-tight text-black text-left">
                                        <?php echo esc_attr($banner_zagolovok); ?>
                                    </h3>
                                    <div class="text-left font-normal text-[18px] md:text-[24px] leading-7 md:leading-9 text-black/80">
                                        <?php echo wp_kses_post($banner_tekst); ?>
                                    </div>
                                    <a href="<?php echo esc_url($banner_link['url']); ?>" class="py-3 px-6 max-w-max rounded-md bg-customGreen-normal font-medium text-[16px] leading-6 text-white cursor-pointer">
                                        <?php echo esc_attr($banner_tekst_knopki); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>

        <!-- Навигация для слайдера -->
        <div id="swiper-navigation-container">
            <div id="banner-pagination" class="swiper-pagination"></div>
            <div class="flex gap-2 py-1 px-2 rounded-[100px] bg-black">
                <div id="prev-banner">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/arrow-slider2.svg'; ?>" alt="Previous">
                </div>
                <div id="next-banner">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/arrow-slider.svg'; ?>" alt="Next">
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (have_rows('flexible-content')) : ?>
    <?php while (have_rows('flexible-content')) :
        the_row(); ?>

        <?php if (get_row_layout() == 'advantages') : ?>
        <div class="px-5 mobileLandscape:px-2.5">
            <div class="advantages  flex flex-col gap-5 py-10 tabletPortrait:py-5  px-5 tabletPortrait:px-2.5  rounded-md bg-white">
                <h2 class="font-medium text-[32px] leading-[48px]">Преимущества</h2>

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
        </div>

        <!--Баннеры-->
    <?php elseif (get_row_layout() == 'banners') : ?>
        <?php if (have_rows('banner')) : ?>
            <?php $banner_field = get_field('banner'); ?>
            <?php $banner_count = is_array($banner_field) ? count($banner_field) : 0; ?>

            <div id="bannerSwiper" class="swiper bannerSwiper rounded-md overflow-hidden">
                <div class="swiper-wrapper">
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
                                    <a href="<?php echo esc_url($banner_link['url']); ?>"
                                       class="py-3 px-6 max-w-max rounded-md bg-customGreen-normal font-medium text-[16px] leading-6 text-white cursor-pointer">
                                        <?php echo esc_attr($banner_tekst_knopki); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php if ($banner_count > 1) : ?>
                    <!-- Навигация для слайдера -->
                    <div id="swiper-navigation-container">
                        <div id="banner-pagination" class="swiper-pagination"></div>
                        <div class="flex gap-2 py-1 px-2 rounded-[100px] bg-black">
                            <div id="prev-banner">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/arrow-slider2.svg'; ?>"
                                     alt="Previous">
                            </div>
                            <div id="next-banner">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/arrow-slider.svg'; ?>"
                                     alt="Next">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php elseif (get_row_layout() == 'bestseller') : ?>
        <div class="px-5 mobileLandscape:px-2.5">
            <div class="flex flex-col gap-2.5 ">
                <h1 class="font-medium text-[32px] leading-[48px] text-black" itemprop="name">
                    Хит продаж
                </h1>
                <div class="grid">
                    <?php $args = array(
                        'tag' => 'bestseller',
                        'posts_per_page' => 12,
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
                <div class="flex items-center justify-center py-3 px-8 border border-solid border-customGreen-dark rounded-md text-customGreen-dark font-medium text-[16px] leading-5">
                    Посмотреть все
                </div>
            </div>
        </div>


    <?php elseif (get_row_layout() == 'about-us') : ?>
        <div class="px-5 mobileLandscape:px-2.5">
            <div class="grid grid-cols-[1fr_483px] tabletLandscape:grid-cols-1 rounded-md overflow-hidden">
                <?php $text = get_sub_field('about-us-text'); ?>
                <?php $img = get_sub_field('about-us-img'); ?>

                <div class="flex flex-col  gap-5 pt-10 pb-2.5 px-[15px] bg-white">

                    <h2 class="font-medium text-[32px] leading-[48px]">О Нас</h2>
                    <div class="text-hide"> <!-- Контейнер для текста с ограничением высоты -->
                        <div class="text-block font-normal text-[16px] leading-6">
                            <?php echo wpautop(esc_html($text)); ?>
                        </div>
                    </div>
                    <div class="read-more-container ">
                        <button class="read-more-button w-full items-center py-3 px-8 border border-solid border-customGreen-dark rounded-md cursor-pointer read-more-button">
                            <p class="font-medium text-[16px] leading-5 text-customGreen-dark">Читать далее</p>
                        </button>
                    </div>


                </div>
                <?php if (!empty($img)): ?>
                    <img class="tabletLandscape:hidden" src="<?php echo esc_url($img['url']); ?>"
                         alt="<?php echo esc_attr($img['alt']); ?>">
                <?php endif; ?>
            </div>
        </div>

    <?php elseif (get_row_layout() == 'header') : ?>
        <div class="px-5 mobileLandscape:px-2.5">
            <?php $background_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <div class="relative flex flex-col  items-center justify-center gap-2.5 py-10 rounded-md bg-cover bg-center"
                 style="background-image: url('<?php echo esc_url($background_image); ?>');">
                <div class="absolute z-10 inset-0 bg-[hsla(0,0%,85%,0.8)] rounded-md pointer-events-none"></div>
                <h1 class="z-50 text-center font-medium text-[36px] leading-[54px] text-black"><?php echo get_the_title(); ?></h1>

                <!-- Хлебные крошки (Yoast SEO) -->
                <?php if (function_exists('yoast_breadcrumb')): ?>
                    <div class="z-50 text-center font-normal text-[14px] leading-5 text-breadcrumb">
                        <?php yoast_breadcrumb('<p  class="breadcrumbs-text  last-gray underscore">', '</p>'); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    <?php elseif (get_row_layout() == 'office-map') : ?>
        <div class="relative flex items-center py-[57px] px-5 ">
            <iframe class="absolute inset-0 w-full h-full -z-10"
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3Af7661b080ceaa3369ff3d1e011b0c101bd1e00283b58638978ee256aa5f670cf&amp;source=constructor"
                    width="100%" height="400" frameborder="0">

            </iframe>

            <div class="z-50 flex flex-col gap-2.5 p-5 rounded-md bg-white max-w-[455px]">
                <p class="font-medium text-[32px] leading-[48px] text-black"> Наш офис</p>
                <p></p>
                <div class="flex flex-col gap-[5px]">
                    <div class="flex gap-[5px] items-center">
                        <svg width="14" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.137 12.194C14.018 12.446 13.864 12.684 13.661 12.908C13.318 13.286 12.94 13.559 12.513 13.734C12.093 13.909 11.638 14 11.148 14C10.434 14 9.67101 13.832 8.86601 13.489C8.06101 13.146 7.25601 12.684 6.45801 12.103C5.65301 11.515 4.89001 10.864 4.16201 10.143C3.44101 9.415 2.79001 8.652 2.20901 7.854C1.63501 7.056 1.17301 6.258 0.837008 5.467C0.501008 4.669 0.333008 3.906 0.333008 3.178C0.333008 2.702 0.417008 2.247 0.585008 1.827C0.753008 1.4 1.01901 1.008 1.39001 0.658C1.83801 0.217 2.32801 0 2.84601 0C3.04201 0 3.23801 0.042 3.41301 0.126C3.59501 0.21 3.75601 0.336 3.88201 0.518L5.50601 2.807C5.63201 2.982 5.72301 3.143 5.78601 3.297C5.84901 3.444 5.88401 3.591 5.88401 3.724C5.88401 3.892 5.83501 4.06 5.73701 4.221C5.64601 4.382 5.51301 4.55 5.34501 4.718L4.81301 5.271C4.73601 5.348 4.70101 5.439 4.70101 5.551C4.70101 5.607 4.70801 5.656 4.72201 5.712C4.74301 5.768 4.76401 5.81 4.77801 5.852C4.90401 6.083 5.12101 6.384 5.42901 6.748C5.74401 7.112 6.08001 7.483 6.44401 7.854C6.82201 8.225 7.18601 8.568 7.55701 8.883C7.92101 9.191 8.22201 9.401 8.46001 9.527C8.49501 9.541 8.53701 9.562 8.58601 9.583C8.64201 9.604 8.69801 9.611 8.76101 9.611C8.88001 9.611 8.97101 9.569 9.04801 9.492L9.58001 8.967C9.75501 8.792 9.92301 8.659 10.084 8.575C10.245 8.477 10.406 8.428 10.581 8.428C10.714 8.428 10.854 8.456 11.008 8.519C11.162 8.582 11.323 8.673 11.498 8.792L13.815 10.437C13.997 10.563 14.123 10.71 14.2 10.885C14.27 11.06 14.312 11.235 14.312 11.431C14.312 11.683 14.256 11.942 14.137 12.194Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-1', 'options') ?></p>
                    </div>


                    <div class="flex gap-[5px] items-center">
                        <svg width="16" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.50667 1.33301C3.66667 1.33301 3 1.99967 3 3.87301V12.1263C3 13.9997 3.66667 14.6663 5.50667 14.6663H11.1533C13 14.6663 13.6667 13.9997 13.6667 12.1263V3.87301C13.6667 1.99967 13 1.33301 11.16 1.33301H5.50667ZM7.16667 11.6997C7.16667 11.0597 7.69333 10.533 8.33333 10.533C8.97333 10.533 9.5 11.0597 9.5 11.6997C9.5 12.3397 8.97333 12.8663 8.33333 12.8663C7.69333 12.8663 7.16667 12.3397 7.16667 11.6997ZM7 4.16634C6.72667 4.16634 6.5 3.93967 6.5 3.66634C6.5 3.39301 6.72667 3.16634 7 3.16634H9.66667C9.94 3.16634 10.1667 3.39301 10.1667 3.66634C10.1667 3.93967 9.94 4.16634 9.66667 4.16634H7Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-2', 'options') ?></p>
                    </div>
                </div>


                <div class="flex flex-col gap-2.5 font-semibold text-[12px] leading-[18px]  ">
                    <?php foreach (get_field('of-work-time', 'options') as $workTime) : ?>
                        <p class="font-normal text-[14px] leading-5 text-customGray"> Время
                            работы: <?php echo $workTime['of-time'] ?>
                        </p>
                        <p class="flex gap-[5px] whitespace-nowrap items-center font-normal text-[14px] leading-5 text-customGray">
                            Рабочие дни:
                            <?php foreach ($workTime['of-days'] as $day) : ?>
                                <span class=" px-[3px] rounded-[6px] font-normal text-[14px] leading-5 bg-mGreen15 text-mGreen "> <?php echo $day ?></span>
                            <?php endforeach; ?>
                        </p>
                    <?php endforeach; ?>
                </div>

                <p class="font-semibold text-[12px] leading-[18px] text-customGray"><?php echo get_field('of-address', 'options') ?></p>
                <p></p>
                <p></p>
                <button class=" w-full items-center py-2 px-4  bg-customGreen-normal rounded-md cursor-pointer  ">
                    <p class="font-medium text-[16px] leading-6 text-white">Связаться с офисом</p>
                </button>

            </div>
        </div>


    <?php elseif (get_row_layout() == 'warehouse-map') : ?>
        <div class="relative flex items-center py-[57px] px-5 ">

            <iframe class="absolute inset-0 w-full h-full -z-10"
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae5d31c918aa97ff72dbfffe36fc1eaf2e607bbeceb5c40386221f8162909903f&amp;source=constructor"
                    width="100%" height="400" frameborder="0"></iframe>

            <div class="z-50 flex flex-col gap-2.5 p-5 rounded-md bg-white max-w-[455px]">
                <p class="font-medium text-[32px] leading-[48px] text-black">Склад</p>
                <p></p>

                <div class="flex flex-col gap-[2px] font-semibold text-[12px] leading-[18px]  ">
                    <?php foreach (get_field('st-work-time', 'options') as $workTime) : ?>
                        <p class="flex gap-[5px] whitespace-nowrap items-cente font-normal text-[14px] leading-5 text-customGrayr"> <?php echo $workTime['st-time'] ?>
                            <?php foreach ($workTime['st-days'] as $day) : ?>
                                <span class=" px-[3px] rounded-[6px] font-normal text-[14px] leading-[21px] bg-mGreen15 text-mGreen "><?php echo $day ?></span>
                            <?php endforeach; ?>
                        </p>
                    <?php endforeach; ?>
                </div>


                <p class="font-semiboldl text-[12px] leading-[18px] text-customGray-contact">
                    <?php echo get_field('st-address', 'options') ?>
                </p>

                <button class=" w-full items-center py-2 px-4  bg-customGreen-normal rounded-md cursor-pointer  ">
                    <p class="font-medium text-[16px] leading-6 text-white">Как проехать</p>
                </button>

            </div>
        </div>

        <!--Каталог для скачаивания-->
    <?php elseif (get_row_layout() == 'download-catalog') : ?>
        <?php $documents = get_field('documents', 'options'); ?>
        <div class="flex flex-col mobilePortrait:gap-10  gap-2.5 px-5 mobilePortrait:px-2.5">
            <?php if ($documents) : // Проверяем, что поле не пустое
                foreach ($documents as $document) :
                    $document_image = $document['document-img'];
                    $document_title = $document['document-title'];
                    $document_file = $document['document-file'];
                    ?>

                    <div class="flex mobilePortrait:flex-col mobilePortrait:items-center gap-5">
                        <?php if (!empty($document_image)): ?>
                            <img class="w-[258px] h-[330px] object-cover"
                                 src="<?php echo esc_url($document_image['url']); ?>"
                                 alt="<?php echo esc_attr($document_image['alt']); ?>">
                        <?php endif; ?>
                        <div class="flex flex-col gap-2.5 mobilePortrait:items-center">
                            <p class="font-medium text-[32px] leading-[48px] text-black mobilePortrait:text-center"><?php echo esc_html($document_title); ?></p>

                            <?php if (!empty($document_file)): ?>
                                <a href="<?php echo esc_url($document_file['url']); ?>"
                                   download="<?php echo esc_attr($document_title); ?>">
                                    <button class="max-w-max py-1.5 px-[18px] rounded-md bg-customGreen-normal">
                                        <p class="font-medium text-[16px] leading-6 text-black">
                                            Скачать каталог
                                        </p>
                                    </button>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php
                endforeach;
            endif;
            ?>
        </div>

    <?php elseif (get_row_layout() == 'download-catalog') : ?>
        <div class="px-5 mobileLandscape:px-2.5">
            <div class="advantages  flex flex-col gap-5 py-10 tabletPortrait:py-5  px-5 tabletPortrait:px-2.5  rounded-md bg-white">
                <h2 class="font-medium text-[32px] leading-[48px]">Преимущества</h2>

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
        </div>


    <?php elseif (get_row_layout() == 'document-slider') : ?>
        <div class="px-5 mobileLandscape:px-2.5">

            <div class="grid grid-cols-2 mobileLandscape:grid-cols-1 gap-5">
                <div class="flex flex-col gap-5 py-10 px-[15px] mobileLandscape:px-2.5 bg-white">
                    <h3 class="font-medium text-[32px] leading-[48px] text-black">Документы о полномочиях</h3>
                    <div class="grid h-[500px] mobileLandscape:h-[210px]">
                        <div id="documentSwiper" class="swiper">
                            <div id="productSwiper-wrapper" class="swiper-wrapper">
                                <?php $documents = get_field('documents', 'options'); ?>
                                <?php if ($documents) : // Проверяем, что поле не пустое
                                    foreach ($documents as $document) :
                                        $document_image = $document['document-img'];
                                        ?>
                                        <div id="product-swiper-slide"
                                             class="swiper-slide flex flex-col justify-between gap-2.5 p-1.5 rounded-md bg-white">

                                            <?php if (!empty($document_image)): ?>
                                                <a class="img" href="<?php echo esc_url($document_image['url']); ?>"
                                                   data-fancybox="gallery-document">
                                                    <img class="object-cover"
                                                         src="<?php echo esc_url($document_image['url']); ?>"
                                                         alt="<?php echo esc_attr($document_image['alt']); ?>">
                                                </a>
                                            <?php endif; ?>

                                        </div>

                                    <?php
                                    endforeach;
                                    wp_reset_postdata(); // Сбрасываем данные после запроса
                                else :
                                    echo 'Нет постов в этой категории.';
                                endif;
                                ?>


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
                <div class="flex flex-col gap-5 py-10 px-[15px] mobileLandscape:px-2.5  bg-white">
                    <h3 class="font-medium text-[32px] leading-[48px] text-black">Отзывы</h3>
                    <div class="grid h-[500px] mobileLandscape:h-[210px]">
                        <div id="reviewsSwiper" class="swiper">
                            <div id="productSwiper-wrapper" class="swiper-wrapper">
                                <?php $documents = get_field('reviews', 'options'); ?>
                                <?php if ($documents) : // Проверяем, что поле не пустое
                                    foreach ($documents as $document) :
                                        $document_image = $document['reviews-img'];
                                        ?>
                                        <div id="product-swiper-slide"
                                             class="swiper-slide flex flex-col justify-between gap-2.5 p-1.5 rounded-md bg-white">

                                            <?php if (!empty($document_image)): ?>
                                                <a class="img" href="<?php echo esc_url($document_image['url']); ?>"
                                                   data-fancybox="gallery">
                                                    <img class="object-cover"
                                                         src="<?php echo esc_url($document_image['url']); ?>"
                                                         alt="<?php echo esc_attr($document_image['alt']); ?>">
                                                </a>
                                            <?php endif; ?>

                                        </div>

                                    <?php
                                    endforeach;
                                    wp_reset_postdata(); // Сбрасываем данные после запроса
                                else :
                                    echo 'Нет постов в этой категории.';
                                endif;
                                ?>


                            </div>
                            <div id="reviews-button-prev">
                                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/prev.svg'; ?>"
                                     alt="mobile">
                            </div>
                            <div id="reviews-button-next">
                                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/next.svg'; ?>"
                                     alt="mobile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    <?php elseif (get_row_layout() == 'details') : ?>
        <div class="px-5 mobileLandscape:px-2.5">
            <?php $details_text = get_sub_field('details-text'); ?>
            <div class="flex flex-col gap-5 py-10 px-[15px] rounded-md bg-white">
                <h3 class="font-medium text-[32px] leading-[48px] text-black">Реквизиты</h3>
                <?php if ($details_text) : ?>
                    <div class="details-text">
                        <?php echo wp_kses_post($details_text); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>


    <?php elseif (get_row_layout() == 'questions-answers') : ?>
        <div class="px-5 mobileLandscape:px-2.5">
            <?php if (have_rows('question-answer')) : ?>
                <div class="flex flex-col items-center justify-center">
                    <?php while (have_rows('question-answer')) : the_row(); ?>
                        <?php
                        $question = get_sub_field('question');
                        $answer = get_sub_field('answer');
                        ?>
                        <div class="flex w-1/2 py-2 min-w-[360px] items-center justify-between max-w-[770px] first:border-t border-b border-solid border-customGreen-border">
                            <p class="font-normal text-[19px] leading-[34px]  text-black text-left"
                               style="letter-spacing: 0.2px">
                                <?php echo esc_html($question); ?>
                            </p>

                            <button class="accordion-toggle" aria-expanded="false">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/plus.svg'; ?>"
                                     alt="toggle" class="toggle-icon">
                            </button>
                        </div>

                        <div class="accordion-content w-1/2 min-w-[360px] max-w-[750px] hidden px-5 py-2 text-left">
                            <p class="text-[16px] leading-5 text-black"><?php echo wp_kses_post($answer); ?></p>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>


    <?php endif; ?>


    <?php endwhile; ?>
<?php endif; ?>

<div class="flex flex-col gap-[20px] px-2.5 py-10 bg-footerbg">
    <!-- Первый блок  -->
    <div class="flex flex-col gap-2.5 ">
        <div>
            <p class="text-customGreen font-bold text-[16px] leading-6">Контактная информация</p>
        </div>
        <div class="flex flex-col gap-2.5">
            <div class="flex gap-[5px] items-center">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.804 12.194C13.685 12.446 13.531 12.684 13.328 12.908C12.985 13.286 12.607 13.559 12.18 13.734C11.76 13.909 11.305 14 10.815 14C10.101 14 9.338 13.832 8.533 13.489C7.728 13.146 6.923 12.684 6.125 12.103C5.32 11.515 4.557 10.864 3.829 10.143C3.108 9.415 2.457 8.652 1.876 7.854C1.302 7.056 0.84 6.258 0.504 5.467C0.168 4.669 0 3.906 0 3.178C0 2.702 0.0839999 2.247 0.252 1.827C0.42 1.4 0.686 1.008 1.057 0.658C1.505 0.217 1.995 0 2.513 0C2.709 0 2.905 0.042 3.08 0.126C3.262 0.21 3.423 0.336 3.549 0.518L5.173 2.807C5.299 2.982 5.39 3.143 5.453 3.297C5.516 3.444 5.551 3.591 5.551 3.724C5.551 3.892 5.502 4.06 5.404 4.221C5.313 4.382 5.18 4.55 5.012 4.718L4.48 5.271C4.403 5.348 4.368 5.439 4.368 5.551C4.368 5.607 4.375 5.656 4.389 5.712C4.41 5.768 4.431 5.81 4.445 5.852C4.571 6.083 4.788 6.384 5.096 6.748C5.411 7.112 5.747 7.483 6.111 7.854C6.489 8.225 6.853 8.568 7.224 8.883C7.588 9.191 7.889 9.401 8.127 9.527C8.162 9.541 8.204 9.562 8.253 9.583C8.309 9.604 8.365 9.611 8.428 9.611C8.547 9.611 8.638 9.569 8.715 9.492L9.247 8.967C9.422 8.792 9.59 8.659 9.751 8.575C9.912 8.477 10.073 8.428 10.248 8.428C10.381 8.428 10.521 8.456 10.675 8.519C10.829 8.582 10.99 8.673 11.165 8.792L13.482 10.437C13.664 10.563 13.79 10.71 13.867 10.885C13.937 11.06 13.979 11.235 13.979 11.431C13.979 11.683 13.923 11.942 13.804 12.194Z"
                          fill="white"/>
                </svg>
                <p class="font-semibold text-white text-[16px] leading-5"><?php echo get_field('contact-1', 'options') ?></p>
            </div>
            <div class="flex gap-[5px] items-center">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M5.17268 1.33301C3.33268 1.33301 2.66602 1.99967 2.66602 3.87301V12.1263C2.66602 13.9997 3.33268 14.6663 5.17268 14.6663H10.8193C12.666 14.6663 13.3327 13.9997 13.3327 12.1263V3.87301C13.3327 1.99967 12.666 1.33301 10.826 1.33301H5.17268ZM6.83268 11.6997C6.83268 11.0597 7.35935 10.533 7.99935 10.533C8.63935 10.533 9.16602 11.0597 9.16602 11.6997C9.16602 12.3397 8.63935 12.8663 7.99935 12.8663C7.35935 12.8663 6.83268 12.3397 6.83268 11.6997ZM6.66602 4.16634C6.39268 4.16634 6.16602 3.93967 6.16602 3.66634C6.16602 3.39301 6.39268 3.16634 6.66602 3.16634H9.33268C9.60602 3.16634 9.83268 3.39301 9.83268 3.66634C9.83268 3.93967 9.60602 4.16634 9.33268 4.16634H6.66602Z"
                          fill="white"/>
                </svg>
                <p class="font-semibold text-white text-[16px] leading-5"><?php echo get_field('contact-2', 'options') ?></p>
            </div>


            <div class="flex flex-col gap-0.5">
                <?php foreach (get_field('of-work-time', 'options') as $workTime) : ?>
                    <p class="flex gap-[5px] whitespace-nowrap items-center font-semibold text-[14px] leading-[21px]  text-white"> <?php echo $workTime['of-time'] ?>
                        <?php foreach ($workTime['of-days'] as $day) : ?>
                            <span class=" px-[3px] rounded-[6px] font-normal text-[14px] leading-5 bg-mGreen15 text-mGreen "><?php echo $day ?></span>
                        <?php endforeach; ?>
                    </p>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

    <!-- Горизонтальный разделитель -->
    <div class="flex items-center">
        <div class="border-2 border-solid border-customGray-border w-full"></div>
    </div>

    <!-- Второй блок - Почта  -->
    <div class="flex items-start ">
        <div class="flex flex-col items-center gap-5 ">
            <div>
                <p class="text-center text-customGreen font-bold text-[16px] leading-6">Почта для заявок</p>
            </div>

            <!--Почта-->
            <p class="font-semibold text-[16px] leading-5 text-white "><?php echo get_field('mail', 'options') ?></p>

            <button class="py-2 px-4 rounded-[6px] bg-customGreen-normal font-medium text-[14px] leading-6 text-black cursor-pointer">
                Связаться
            </button>
        </div>

    </div>

    <!-- Горизонтальный разделитель -->
    <div class="flex items-center">
        <div class="border-2 border-solid border-customGray-border w-full"></div>
    </div>

    <!-- Третий блок - Категории  -->
    <div class="flex flex-col gap-[5px]">

        <p class="font-bold text-[16px] leading-6 text-customGreen">Каталог</p>
        <div class="flex flex-col gap-2.5 font-semibold text-white text-[16px] leading-5">
            <?php
            $categories = get_categories(array(
                'hide_empty' => false,
                'exclude' => array(get_option('default_category')),
                'parent' => 0,
            ));

            foreach ($categories as $category) {
                $category_id = $category->term_id;
                $category_link = get_category_link($category_id);
                $image_id = get_term_meta($category->term_id, '_thumbnail_id', true);
                $category_image = wp_get_attachment_image_url($image_id, 'full');
                $child_categories = get_categories(array(
                    'hide_empty' => false,
                    'parent' => $category_id, // Здесь указываем ID родительской категории
                ));
                ?>
                <!-- Название категории -->
                <a href="<?php echo esc_url($category_link); ?>"
                   class="font-normal  text-[14px] leading-5 text-white">
                    <?php echo esc_html($category->name); ?>
                </a>
            <?php } ?>
        </div>
    </div>

    <!-- Горизонтальный разделитель -->
    <div class="flex items-center">
        <div class="border-2 border-solid border-customGray-border w-full"></div>
    </div>

    <!-- Четвертый блок - Адресса  -->
    <div class="flex flex-col gap-2.5">
        <div class="flex justify-between items-center  ">
            <p class="font-bold text-[16px] leading-6 text-customGreen">Адрес офиса</p>
            <div class="flex  gap-1 items-center ">
                <p class="font-medium text-[14px] leading-5 text-customGreen">Схема проезда</p>
                <svg width="18" height="18" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.166 11.7501C17.166 13.6251 16.791 14.9376 15.951 15.7851L11.166 11.0001L16.9635 5.20264C17.0985 5.79514 17.166 6.47013 17.166 7.25013V11.7501Z"
                          stroke="hsla(148, 25%, 80%, 1)" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.36851 16.7975C3.11101 16.28 2.16602 14.72 2.16602 11.75V7.25C2.16602 3.5 3.66602 2 7.41602 2H11.916C14.886 2 16.446 2.945 16.9635 5.2025L5.36851 16.7975Z"
                          stroke="hsla(148, 25%, 80%, 1)" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.9157 17H7.41567C6.63567 17 5.96066 16.9325 5.36816 16.7975L11.1657 11L15.9507 15.785C15.1032 16.625 13.7907 17 11.9157 17Z"
                          stroke="hsla(148, 25%, 80%, 1)" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.66598 6.48504C9.95848 7.77504 9.14846 8.87004 8.43596 9.54504C7.91846 10.04 7.10098 10.04 6.57598 9.54504C5.86348 8.87004 5.04597 7.77504 5.34597 6.48504C5.85597 4.28754 9.15598 4.28754 9.66598 6.48504Z"
                          stroke="hsla(148, 25%, 80%, 1)"/>
                    <path d="M7.48611 7.02539H7.49285" stroke="hsla(148, 25%, 80%, 1)" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <div class="block ">
            <p class="font-medium text-[14px] leading-5 text-white"><?php echo get_field('of-address', 'options') ?></p>
        </div>
        <div class="flex justify-between items-center">
            <p class="font-bold text-[16px] leading-6 text-customGreen">Адрес склада</p>
            <div class="flex gap-1 items-center ">
                <p class="font-medium text-[14px] leading-5 text-customGreen">Схема проезда</p>
                <svg width="18" height="18" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.166 11.7501C17.166 13.6251 16.791 14.9376 15.951 15.7851L11.166 11.0001L16.9635 5.20264C17.0985 5.79514 17.166 6.47013 17.166 7.25013V11.7501Z"
                          stroke="hsla(148, 25%, 80%, 1)" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.36851 16.7975C3.11101 16.28 2.16602 14.72 2.16602 11.75V7.25C2.16602 3.5 3.66602 2 7.41602 2H11.916C14.886 2 16.446 2.945 16.9635 5.2025L5.36851 16.7975Z"
                          stroke="hsla(148, 25%, 80%, 1)" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.9157 17H7.41567C6.63567 17 5.96066 16.9325 5.36816 16.7975L11.1657 11L15.9507 15.785C15.1032 16.625 13.7907 17 11.9157 17Z"
                          stroke="hsla(148, 25%, 80%, 1)" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.66598 6.48504C9.95848 7.77504 9.14846 8.87004 8.43596 9.54504C7.91846 10.04 7.10098 10.04 6.57598 9.54504C5.86348 8.87004 5.04597 7.77504 5.34597 6.48504C5.85597 4.28754 9.15598 4.28754 9.66598 6.48504Z"
                          stroke="hsla(148, 25%, 80%, 1)"/>
                    <path d="M7.48611 7.02539H7.49285" stroke="hsla(148, 25%, 80%, 1)" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <div class="block">
            <p class="font-medium text-[14px] leading-5 text-white"><?php echo get_field('st-address', 'options') ?></p>
        </div>

    </div>


    <div class="w-full border border-solid border-customGreen"></div>

    <p class="text-center  font-normal text-[14px] leading-4 text-customGreen">Сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой.
        <a class="underline" href="https://digitalgoweb.com">Разработка сайта от Goweb</a>
    </p>
</div>


<?php wp_footer(); ?>


<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script> Fancybox.bind('[data-fancybox]'); </script>
</body>
</html>
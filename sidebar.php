<div class="flex flex-col gap-[30px] px-5 pb-[30px] ">
    <div class="flex flex-col logo gap-[30px] cursor-pointer">
        <a href="<?php echo home_url(); ?>">
            <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>"
                 alt="Logo">
        </a>
        <?php get_search_form(); ?>
    </div>


    <div class="flex flex-col gap-2.5">
        <p class="font-roboto font-normal leading-4 text-gray-400">Каталог</p>
        <?php
        $categories = get_categories(array(
            'hide_empty' => false,
            'exclude' => array(get_option('default_category')),
            'parent' => 0,
        ));

        foreach ($categories

                 as $category) {
            $category_id = $category->term_id;
            $category_link = get_category_link($category_id);
            $image_id = get_term_meta($category->term_id, '_thumbnail_id', true);
            $category_image = wp_get_attachment_image_url($image_id, 'full');
            $child_categories = get_term_children($category_id, 'category'); // Получаем подкатегории
            ?>
            <div class="flex flex-col gap-2">
                <div class="flex gap-3 items-center justify-between text-center">
                    <div class="flex gap-3 items-center text-center">
                        <?php if ($category_image): ?>
                            <!-- Отображаем изображение категории -->
                            <img src="<?php echo esc_url($category_image); ?>"
                                 alt="<?php echo esc_attr($category->name); ?>"
                                 class="w-8 h-8"/>
                        <?php endif; ?>

                        <!-- Название категории -->
                        <a href="<?php echo esc_url($category_link); ?>"
                           class="font-roboto font-normal text-base leading-5 text-blackWithOpacity">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    </div>
                    <div class="flex gap-3 text-center items-center">
                        <!-- количество товаров -->
                        <?php if ($category->count > 0): ?>
                            <span class="flex items-center justify-center bg-buttonbg text-mGreen text-xs w-7 h-7 rounded-full">
                            <?php echo $category->count; ?>
                        </span>
                        <?php endif; ?>


                        <!-- Кнопка для раскрытия подкатегорий, если есть -->
                        <?php if (!empty($child_categories)): ?>
                            <button class="toggle-subcategories">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0059 8.50513V12.0051M12.0059 12.0051V15.5051M12.0059 12.0051H8.50586M12.0059 12.0051H15.5059"
                                          stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.00586 12.0051C3.00586 7.03456 7.0353 3.00513 12.0059 3.00513C16.9764 3.00513 21.0059 7.03456 21.0059 12.0051C21.0059 16.9757 16.9764 21.0051 12.0059 21.0051C7.0353 21.0051 3.00586 16.9757 3.00586 12.0051Z"
                                          stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Подкатегории, скрытые по умолчанию -->
                <?php if (!empty($child_categories)): ?>
                    <div class="subcategories hidden flex flex-col ml-6">
                        <?php
                        foreach ($child_categories as $child_id) {
                            $child_category = get_category($child_id);
                            $child_link = get_category_link($child_id);
                            ?>
                            <a href="<?php echo esc_url($child_link); ?>"
                               class="font-roboto font-normal text-sm leading-4 text-gray-600">
                                <?php echo esc_html($child_category->name); ?>
                                (<?php echo $child_category->count; ?>)
                            </a>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButtons = document.querySelectorAll('.toggle-subcategories');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Ищем элемент подкатегорий, который находится ниже текущего элемента
                const subcategories = this.closest('div').parentElement.querySelector('.subcategories');

                if (subcategories) {
                    subcategories.classList.toggle('hidden');

                    // Меняем символ на "-" при раскрытии и "+" при скрытии
                    this.innerHTML = subcategories.classList.contains('hidden') ? '+' : '-';
                }
            });
        });
    });
</script>


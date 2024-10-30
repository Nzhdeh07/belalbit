<div class="flex flex-col gap-2.5">
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
        <div class="category flex flex-col gap-2.5">
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
                       class="font-normal text-base leading-5 text-blackWithOpacity">
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
                <div class="subcategories hidden flex flex-col gap-2.5">
                    <?php
                    foreach ($child_categories as $child_id) {
                        $child_category = get_category($child_id);
                        $child_link = get_category_link($child_id);
                        $subchild_categories = get_categories(array(
                            'hide_empty' => false,
                            'parent' => $child_category->term_id, // Здесь указываем ID родительской категории
                        ));//                            $subchild_categories = get_term_children($child_category->term_id, 'category');
                        ;// Получаем подкатегории второго уровня
                        ?>
                        <div class="flex flex-col gap-[5px]">
                            <!-- Второй уровень подкатегорий -->
                            <a href="<?php echo esc_url($child_link); ?>"
                               class="font-inter font-normal text-[16px] leading-6  py-2.5 pl-1.5 rounded-[6px] bg-button">
                                <?php echo esc_html($child_category->name); ?>
                            </a>

                            <div class="flex flex-col gap-1.5">
                                <!-- Третий уровень подкатегорий, если они существуют -->
                                <?php foreach ($subchild_categories as $subchild_id) {
                                    $subchild_category = get_category($subchild_id);
                                    $subchild_link = get_category_link($subchild_id); ?>
                                    <a href="<?php echo esc_url($subchild_link); ?>"
                                       class="font-normal text-[14px] leading-[21px] py-1.5 pl-1.5 rounded-[6px]">
                                        <?php echo esc_html($subchild_category->name); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php endif; ?>

        </div>
    <?php } ?>
</div>






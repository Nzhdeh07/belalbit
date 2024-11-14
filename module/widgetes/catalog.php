<div class="flex flex-col gap-2.5">

    <?php
    $categories = get_categories(array(
        'hide_empty' => false,
        'exclude' => array(get_option('default_category')),
        'parent' => 0,
    ));

    $is_category_page = is_category();
    $current_category = $is_category_page ? get_queried_object_id() : null; // Текущая категория, если это страница категории
    $current_category_ancestors = $is_category_page ? get_ancestors($current_category, 'category') : array(); // Предки текущей категории

    foreach ($categories as $category) {
        $category_id = $category->term_id;
        $category_link = get_category_link($category_id);
        $image_id = get_term_meta($category->term_id, '_thumbnail_id', true);
        $category_image = wp_get_attachment_image_url($image_id, 'full');

        // Дочерние категории этой категории
        $child_categories = get_categories(array(
            'hide_empty' => false,
            'parent' => $category_id,
        ));

        // Проверяем, является ли эта категория текущей или если она одна из предков текущей категории
        $is_current = ($current_category === $category_id); // Проверка для самой категории
        $is_open = $is_current || in_array($category_id, $current_category_ancestors); // Категория раскрыта, если она текущая или родитель текущей

        ?>
        <div class="category flex flex-col gap-2.5">
            <div class="flex gap-3 items-center justify-between text-center">
                <div class="flex gap-3 items-center text-center">
                    <?php if ($category_image): ?>
                        <img src="<?php echo esc_url($category_image); ?>"
                             alt="<?php echo esc_attr($category->name); ?>"
                             class="w-8 h-8"/>
                    <?php endif; ?>
                    <a href="<?php echo esc_url($category_link); ?>"
                       class="font-normal text-base leading-5 <?php echo $is_current ? 'text-customGreen-normal' : 'text-blackWithOpacity'; ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                </div>
                <div class="flex gap-3 text-center items-center">
                    <?php if ($category->count > 0): ?>
                        <span class="flex items-center justify-center bg-buttonbg text-mGreen text-xs w-7 h-7 rounded-full">
                            <?php echo $category->count; ?>
                        </span>
                    <?php endif; ?>
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

            <?php if (!empty($child_categories)): ?>
                <div class="subcategories <?php echo $is_open ? 'shown' : 'hidden'; ?> flex flex-col gap-[5px]">
                    <?php foreach ($child_categories as $child_category): ?>
                        <?php
                        $child_link = get_category_link($child_category->term_id);
                        // Проверка для подкатегории на её соответствие текущей
                        $is_child_current = ($current_category === $child_category->term_id);

                        $subchild_categories = get_categories(array(
                            'hide_empty' => false,
                            'parent' => $child_category->term_id,
                        ));

                        // Проверка для подкатегорий дочерней категории
                        $is_subchild_current = ($current_category === $child_category->term_id || in_array($child_category->term_id, $current_category_ancestors));
                        ?>
                        <div class="flex flex-col gap-[5px]">
                            <a href="<?php echo esc_url($child_link); ?>"
                               class="font-inter font-normal text-[16px] leading-6 py-2.5 pl-1.5 rounded-[6px] bg-button <?php echo $is_child_current ? 'text-customGreen-normal' : ''; ?>">
                                <?php echo esc_html($child_category->name); ?>
                            </a>

                            <div class="flex flex-col">
                                <?php foreach ($subchild_categories as $subchild_category): ?>
                                    <a href="<?php echo esc_url(get_category_link($subchild_category->term_id)); ?>"
                                       class="font-normal text-[14px] leading-[21px] py-1.5 pl-1.5 rounded-[6px] <?php echo ($current_category === $subchild_category->term_id) ? 'text-customGreen-normal' : ''; ?>">
                                        <?php echo esc_html($subchild_category->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php } ?>
</div>

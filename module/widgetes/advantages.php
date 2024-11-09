<?php if (have_rows('flexible-content')) : ?>
    <?php while (have_rows('flexible-content')) : the_row(); ?>
        <?php if (get_row_layout() == 'advantages') : ?>
            <div class="advantages flex flex-col gap-5 py-10 tabletPortrait:py-5  px-5 tabletPortrait:px-2.5  rounded-md bg-white">
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
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

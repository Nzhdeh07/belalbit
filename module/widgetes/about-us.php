<div class="grid grid-cols-[1fr_483px] rounded-md overflow-hidden">

    <?php $first_text = get_field('about-us-tekst', 'options'); ?>
    <?php if (have_rows('about-us-kartinki', 'options')): ?>
        <?php the_row(); // Переходим к первой строке ?>
        <?php
        // Получаем данные из первой строки
        $first_image = get_sub_field('about-us-kartinka');
        ?>

        <div class="flex flex-col gap-5 py-10 px-[15px] bg-white">
            <h2 class="font-medium text-[32px] leading-[48px]">О Нас</h2>
            <?php if (!empty($first_text)): ?>
                <div class="max-h-[170px] overflow-hidden"> <!-- Ограничьте максимальную высоту -->
                    <p class="font-normal text-[16px] leading-6"><?php echo wpautop(esc_html($first_text)); ?></p>
                </div>
            <?php endif; ?>

            <button class="items-center py-3 px-8 border border-solid border-customGreen-dark rounded-md cursor-pointer">
                <p class="font-medium text-[16px] leading-5 text-customGreen-dark">Читать далее</p>
            </button>
        </div>
        <?php if (!empty($first_image)): ?>
            <img src="<?php echo esc_url($first_image['url']); ?>" alt="<?php echo esc_attr($first_image['alt']); ?>">
        <?php endif; ?>

    <?php endif; ?>
</div>
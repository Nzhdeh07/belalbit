<div class="flex justify-between p-2.5 items-center search-container">
    <a href="<?php echo home_url(); ?>" class="logo-container">
        <img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/logo.svg'; ?>" alt="Logo">
    </a>

    <div class="search-box p-3 box-border border border-solid border-customBlue-border rounded-[6px] hidden">
        <input type="search" placeholder="<?php echo esc_attr_x('Поиск', 'placeholder'); ?>"
               value="<?php echo get_search_query(); ?>" name="s"
               title="<?php echo esc_attr_x('Ищем:', 'label'); ?>" id="voice-search"
               class="font-roboto text-sidebarsearch text-sm font-normal w-full p-2.5 border-none focus:outline-none" required />
    </div>

    <div class="search-icon p-3 box-border border border-solid border-customBlue-border rounded-[6px] cursor-pointer">
        <svg width="16" height="16" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.9883 21.0078L18.585 17.6041M21.0268 11.528C21.0268 16.2336 17.2126 20.0483 12.5075 20.0483C7.80248 20.0483 3.98828 16.2336 3.98828 11.528C3.98828 6.82245 7.80248 3.00781 12.5075 3.00781C17.2126 3.00781 21.0268 6.82245 21.0268 11.528Z"
                  stroke="green" stroke-opacity="0.6" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
    </div>
</div>

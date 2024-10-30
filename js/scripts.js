document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.toggle-subcategories');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const categoryWrapper = this.closest('.category');
            const subcategories = categoryWrapper.querySelector('.subcategories');

            if (subcategories) {
                subcategories.classList.toggle('hidden');

                // Заменяем иконку на крестик или другой символ в зависимости от состояния
                if (subcategories.classList.contains('hidden')) {
                    this.innerHTML = `
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0059 8.50513V12.0051M12.0059 12.0051V15.5051M12.0059 12.0051H8.50586M12.0059 12.0051H15.5059"
                                  stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.00586 12.0051C3.00586 7.03456 7.0353 3.00513 12.0059 3.00513C16.9764 3.00513 21.0059 7.03456 21.0059 12.0051C21.0059 16.9757 16.9764 21.0051 12.0059 21.0051C7.0353 21.0051 3.00586 16.9757 3.00586 12.0051Z"
                                  stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    `;
                } else {
                    this.innerHTML = `
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M16 8L8 16M8 8L16 16" stroke="black" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="10" stroke="black" stroke-opacity="0.8" stroke-width="1.5"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    `;
                }
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const catalogButton = document.getElementById('catalog-button');
    const catalogDropdown = document.getElementById('catalog-dropdown');
    const catalogIcon = document.getElementById('catalog-icon');

    const menuDropdown = document.getElementById('menu-dropdown');
    const menuButtonIcon = document.getElementById('menu-icon');

    catalogButton.addEventListener('click', function () {
        catalogDropdown.classList.toggle('hidden');
        menuDropdown.classList.add('hidden');
        menuButtonIcon.src = menuIcon;

        if (catalogDropdown.classList.contains('hidden')) {
            catalogIcon.src = menuIcon;
        } else {
            catalogIcon.src = closeIcon;
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.getElementById('menu-button');
    const menuDropdown = document.getElementById('menu-dropdown');
    const menuButtonIcon = document.getElementById('menu-icon');

    const catalogDropdown = document.getElementById('catalog-dropdown');
    const catalogIcon = document.getElementById('catalog-icon');

    menuButton.addEventListener('click', function () {
        menuDropdown.classList.toggle('hidden');
        catalogDropdown.classList.add('hidden');
        catalogIcon.src = menuIcon;

        if (menuDropdown.classList.contains('hidden')) {
            menuButtonIcon.src = menuIcon;

        } else {
            menuButtonIcon.src = closeIcon;
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const searchIcon = document.querySelector('.search-icon');
    const searchBox = document.querySelector('.search-box');
    const logoContainer = document.querySelector('.logo-container');

    searchIcon.addEventListener('click', function () {
        // Скрыть ссылку на логотип
        logoContainer.classList.toggle('hidden');

        // Показывать или скрывать поле поиска с анимацией
        searchBox.classList.toggle('hidden');
    });
});




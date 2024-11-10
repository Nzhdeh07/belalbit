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
        logoContainer.classList.toggle('hidden');
        searchBox.classList.toggle('hidden');
    });
});


// module/catalog Раскрывает категории, если их больше 5
document.addEventListener('DOMContentLoaded', function () {
    const showAllButtons = document.querySelectorAll('.show-all-button');
    showAllButtons.forEach(button => {
        button.addEventListener('click', function () {
            const subcategoryItems = button.parentElement.querySelectorAll('.hidden');
            subcategoryItems.forEach(item => item.classList.remove('hidden'));
            button.remove();
        });
    });
});


var swiper = new Swiper(".bannerSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        prevEl: "#prev-banner",
        nextEl: "#next-banner",
    },
});

var swiper = new Swiper("#productSwiper", {

    slidesPerView: 2,
    spaceBetween: 10,
    breakpoints: {
        1399: {
            slidesPerView: 3,
        },
        1599: {
            slidesPerView: 4,
        },
        1799: {
            slidesPerView: 5,
        },
        1919: {
            slidesPerView: 6,
        },
    },
    pagination: {
        clickable: true,
    },
    navigation: {
        nextEl: "#swiper-button-next",
        prevEl: "#swiper-button-prev",
    },
    on: {
        init: function () {
            // Скрыть prev кнопку при инициализации
            document.getElementById("swiper-button-prev").style.display = "none";
        },
        slideChange: function () {
            // Показывать или скрывать кнопки в зависимости от позиции слайда
            var isBeginning = this.isBeginning;
            var isEnd = this.isEnd;

            // Если слайд на первом элементе, скрываем prev кнопку
            document.getElementById("swiper-button-prev").style.display = isBeginning ? "none" : "block";

            // Если слайд на последнем элементе, скрываем next кнопку
            document.getElementById("swiper-button-next").style.display = isEnd ? "none" : "block";
        },
    },
});


jQuery(document).ready(function($) {
    function checkTextBlocks() {
        $('.text-hide .text-block').each(function () {
            var $this = $(this);
            var maxHeight = 170;

            $this.css('max-height', '');
            $this.css('overflow', '');
            $this.removeClass('expanded');

            if ($this.outerHeight() > maxHeight) {
                $this.css({
                    'max-height': maxHeight + 'px',
                    'overflow': 'hidden',
                    'position': 'relative',
                });

                var readMoreBtn = $this.closest('.text-hide').next('.read-more-container').find('.read-more-button');

                readMoreBtn.on('click', function () {
                    if ($this.hasClass('expanded')) {
                        $this.removeClass('expanded');
                        $this.css('max-height', maxHeight + 'px');
                        $(this).find('p').text('Читать далее');
                    } else {
                        $this.addClass('expanded');
                        $this.css('max-height', 'none');
                        $(this).find('p').text('Скрыть');
                    }
                });
            } else {
                $this.closest('.text-hide').next('.read-more-container').hide();
            }
        });
    }

    checkTextBlocks();

    let lastWindowWidth = jQuery(window).width();
    jQuery(window).on('resize', function() {
        let currentWindowWidth = jQuery(window).width();
        if (currentWindowWidth !== lastWindowWidth) {
            checkTextBlocks();
            lastWindowWidth = currentWindowWidth;
        }
    });
});



var swiper = new Swiper("#documentSwiper", {

    slidesPerView: 2,
    spaceBetween: 10,
    pagination: {
        clickable: true,
    },
    navigation: {
        nextEl: "#swiper-button-next",
        prevEl: "#swiper-button-prev",
    },
    on: {
        init: function () {
            // Скрыть prev кнопку при инициализации
            document.getElementById("swiper-button-prev").style.display = "none";
        },
        slideChange: function () {
            // Показывать или скрывать кнопки в зависимости от позиции слайда
            var isBeginning = this.isBeginning;
            var isEnd = this.isEnd;

            // Если слайд на первом элементе, скрываем prev кнопку
            document.getElementById("swiper-button-prev").style.display = isBeginning ? "none" : "block";

            // Если слайд на последнем элементе, скрываем next кнопку
            document.getElementById("swiper-button-next").style.display = isEnd ? "none" : "block";
        },
    },
});



var swiper = new Swiper("#reviewsSwiper", {

    slidesPerView: 2,
    spaceBetween: 10,
    pagination: {
        clickable: true,
    },
    navigation: {
        nextEl: "#reviews-button-next",
        prevEl: "#reviews-button-prev",
    },
    on: {
        init: function () {
            // Скрыть prev кнопку при инициализации
            document.getElementById("reviews-button-prev").style.display = "none";
        },
        slideChange: function () {
            // Показывать или скрывать кнопки в зависимости от позиции слайда
            var isBeginning = this.isBeginning;
            var isEnd = this.isEnd;

            // Если слайд на первом элементе, скрываем prev кнопку
            document.getElementById("reviews-button-prev").style.display = isBeginning ? "none" : "block";

            // Если слайд на последнем элементе, скрываем next кнопку
            document.getElementById("reviews-button-next").style.display = isEnd ? "none" : "block";
        },
    },
});


document.addEventListener("DOMContentLoaded", function() {
    Fancybox.bind('[data-fancybox="gallery"]', {
        // Настройки Fancybox (например, чтобы показывать стрелки и навигацию)
        infinite: true,
        Thumbs: {
            autoStart: true,
        },
        Toolbar: {
            display: {
                left: [],
                middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX", "flipY"],
                right: ["close"],
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    Fancybox.bind('[data-fancybox="gallery-document"]', {
        // Настройки Fancybox (например, чтобы показывать стрелки и навигацию)
        infinite: true,
        Thumbs: {
            autoStart: true,
        },
        Toolbar: {
            display: {
                left: [],
                middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX", "flipY"],
                right: ["close"],
            }
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.accordion-toggle');

    toggles.forEach(toggle => {
        toggle.addEventListener('click', function () {
            const content = this.closest('div').nextElementSibling;
            content.classList.toggle('show');
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const toggles = document.querySelectorAll(".accordion-toggle");

    toggles.forEach((toggle) => {
        toggle.addEventListener("click", function() {
            // Найти соответствующий контент аккордеона
            const content = toggle.parentElement.nextElementSibling;

            // Переключить видимость содержимого
            content.classList.toggle("hidden");

            // Переключить атрибут `aria-expanded`
            const isExpanded = toggle.getAttribute("aria-expanded") === "true";
            toggle.setAttribute("aria-expanded", !isExpanded);

            // Повернуть иконку
            const img = toggle.querySelector(".toggle-icon");
            img.classList.toggle("rotate", !isExpanded);
        });
    });
});


Fancybox.bind('[data-fancybox]', {
    buttons: [
        "zoom",
        "close",
        "fullscreen",
    ],
    zoom: {
        enabled: true,
        duration: 300,
    },
    transitionEffect: "tube",
});


var menuIcon = "<?php echo get_stylesheet_directory_uri(); ?>/img/svg/menu.svg";
var closeIcon = "<?php echo get_stylesheet_directory_uri(); ?>/img/svg/close-white.svg";
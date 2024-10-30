/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.php"],
    theme: {
        extend: {
            screens: {
                md: "950px",
                lg: "1440px",
                xl: "1730px",

                fullHdDesktop: {max: "1920px"},
                ultraWideDesktop: {max: "1799px"},
                wideDesktop: {max: "1599px"},
                desktop: {max: "1399px"},
                tabletLandscape: {max: "1199px"},
                tabletPortrait: {max: "991px"},
                mobileLandscape: {max: "767px"},
                mobilePortrait: {max: "575px"},


                mMobile: {max: "576"},
                maxSm: {max: "800px"},
                maxMd: {max: "1100px"},
                maxLg: {max: "1440px"},
                maxXl: {max: "1730px"},
            },
            fontFamily: {
                roboto: ['Roboto', 'sans-serif'],
                inter: ['Inter', 'sans-serif'],
            },
            colors: {
                sitebg: '#F2F4F1', // Пример основного цвета
                customGreen: {
                    DEFAULT: 'hsla(148, 25%, 80%, 1)',
                    normal: 'hsla(111, 48%, 55%, 1)',
                },
                customGray: {
                    DEFAULT: 'hsla(0, 0%, 31%, 1)',
                    border: 'hsla(0, 0%, 35%, 1)',
                    light: '#F3F4F6',
                    dark: '#4B5563'
                },
                customBlue: {
                    DEFAULT: 'hsla(213, 27%, 84%, 1)',
                    border: 'hsla(213, 27%, 84%, 1)',
                },

                mGreen15: 'rgba(104, 196, 87, 0.15)',
                mGreen: 'rgba(104, 196, 87, 1)',
                mLightGreen: 'rgba(104, 196, 87, 1)',
                footerbg: 'rgba(43, 43, 43, 1)',
                sidebarborder: 'rgba(229, 229, 229, 1)',
                sidebarsearch: 'rgba(120, 120, 120, 1)',
                buttonbg: 'rgba(113, 178, 64, 0.05)',
                button: 'rgba(237, 238, 237, 1)',
            },
        },
    },
    plugins: [],
}


/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.php"],
    theme: {
        extend: {
            screens: {
                md: "950px",
                lg: "1440px",
                xl: "1730px",

                mobilePortrait: {max: "575px"},
                mobileLandscape: {max: "767px"},
                tabletPortrait: {max: "991px"},
                tabletLandscape: {max: "1199px"},
                desktop: {max: "1399px"},
                wideDesktop: {max: "1599px"},
                ultraWideDesktop: {max: "1799px"},
                fullHdDesktop: {max: "1920px"},

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
                BED8CA: 'rgba(190, 216, 202, 1)', // Пример вторичного цвета
                mGreen15: 'rgba(104, 196, 87, 0.15)',
                mGreen: 'rgba(104, 196, 87, 1)',
                mLightGreen: 'rgba(104, 196, 87, 1)',
                footerbg: 'rgba(43, 43, 43, 1)',
                sidebarborder: 'rgba(229, 229, 229, 1)',
                sidebarsearch: 'rgba(120, 120, 120, 1)',
                buttonbg: 'rgba(113, 178, 64, 0.05)',
                button: 'rgba(237, 238, 237, 1)',
                customGray: {
                    DEFAULT: 'hsla(0, 0%, 31%, 1)',
                    light: '#F3F4F6',
                    // DEFAULT: '#9CA3AF',
                    dark: '#4B5563'
                },
            },
        },
    },
    plugins: [],
}


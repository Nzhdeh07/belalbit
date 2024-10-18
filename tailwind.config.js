/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.php"],
    theme: {
        extend: {
            screens: {
                sm: "576px",
                md: "720px",
                lg: "920px",
                xl: "1110px",
            },
            fontFamily: {
                roboto: ['Roboto', 'sans-serif'],
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
                customGray: {
                    light: '#F3F4F6',
                    DEFAULT: '#9CA3AF',
                    dark: '#4B5563'
                },
            },
        },
    },
    plugins: [],
}


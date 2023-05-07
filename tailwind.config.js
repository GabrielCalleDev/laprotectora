const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
    ],

    theme: {
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1124px',
            '2xl': '1280px',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary   : '#161515',
                secondary : '#2e323a',
                tertiary  : '#575652',
                quaternary: '#aab1b8',
                quinary   : '#feeb53',
                default   : '#F5F5F5',
            },
            fontFamily: {
                poppins     : ['Poppins'],
                poppinsBlack: ['Poppins-black'],
            },
            fontSize: {
                s: '0.8rem',
            },
            height: {
                'screen-25': '25vh',
                'screen-50': '50vh',
                'screen-75': '75vh',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'crp-red': '#cd141f',
                'crp-darkred': '#810c14',
                'crp-grey': '#474747',
                'grey-400': '#9ca3af',
                'grey-500': '#6b7280',
            }
        },
    },

    plugins: [forms],
};

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
            colors: {
                library: {
                    canvas: '#f6f1e8',
                    paper: '#fffdf8',
                    line: '#ded6c8',
                    ink: '#17212b',
                    muted: '#667085',
                    sage: '#708b75',
                    moss: '#3f6b57',
                    brass: '#b88a44',
                    brick: '#a84a3a',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};

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
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            // >>> TAMBAHKAN KODE INI DI SINI <<<
            colors: {
                'my-bottom-color': '#5A827E', // Nama kustom untuk warna 5A827E
                'my-top-color': '#B9D4AA',    // Nama kustom untuk warna B9D4AA
                // Kamu juga bisa menambahkan warna kustom lainnya di sini
                // 'primary': '#FF5733',
                // 'secondary': '#33FF57',
            },
            // >>> AKHIR DARI KODE YANG DITAMBAHKAN <<<
        },
    },

    plugins: [forms],
};
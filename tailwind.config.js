import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "selector",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
        "./node_modules/flowbite/**/*.js",

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#F3FAF7",
                    100: "#DEF7EC",
                    200: "#BCF0DA",
                    300: "#84E1BC",
                    400: "#31C48D",
                    500: "#0E9F6E",
                    600: "#057A55",
                    700: "#046C4E",
                    800: "#03543F",
                    900: "#014737",
                },
                secondary: {
                    50: "#fdf2f8",
                    100: "#fce7f3",
                    200: "#fbcfe8",
                    300: "#f9a8d4",
                    400: "#f472b6",
                    500: "#ec4899",
                    600: "#db2777",
                    700: "#be185d",
                    800: "#9d174d",
                    900: "#831843",
                },
                gray: {
                    50: "#f9fafb",
                    100: "#f4f5f7",
                    200: "#e5e7eb",
                    300: "#d2d6dc",
                    400: "#9fa6b2",
                    500: "#6b7280",
                    600: "#4b5563",
                    700: "#374151",
                    800: "#1f2937",
                    900: "#111827",
                },
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};

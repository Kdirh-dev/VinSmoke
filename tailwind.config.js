import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                playfair: ['Playfair Display', 'serif'],
            },
            colors: {
                'primary-dark': '#1a1a1a',
                'primary-light': '#2d2d2d',
                'accent-gold': '#c8a97e',
                'accent-gold-light': '#d4b995',
                'accent-gold-dark': '#b8945f',
            },
            boxShadow: {
                'soft': '0 8px 32px rgba(0, 0, 0, 0.1)',
                'medium': '0 15px 40px rgba(0, 0, 0, 0.15)',
                'strong': '0 25px 50px rgba(0, 0, 0, 0.25)',
            },
            borderRadius: {
                'lg': '12px',
                'xl': '20px',
            },
        },
    },
    plugins: [],
};
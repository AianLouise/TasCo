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
        fontSize: {
            xs: ['12px', '16px'],
            sm: ['14px', '20px'],
            base: ['16px', '19.5px'],
            lg: ['18px', '21.94px'],
            xl: ['20px', '24.38px'],
            '2xl': ['24px', '29.26px'],
            '3xl': ['28px', '50px'],
            '4xl': ['48px', '58px'],
            '5xl': ['65px', '65px'],
            '6xl': ['80px', '80px'],
            '8xl': ['96px', '106px']
          },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
                'primary': "#A0DDFF",
                "blue": "#7189FF",
                "slate-gray": "#6D6D6D",
                "pale-blue": "#F5F6FF",
                "white-400": "rgba(255, 255, 255, 0.80)"
              },
              boxShadow: {
                '3xl': '0 10px 40px rgba(0, 0, 0, 0.1)'
              },
              backgroundImage: {
                'hero': "url('assets/images/hero-bg.png')"
              },
              screens: {
                "wide": "1440px"
              }
        },
    },

    plugins: [forms],
};

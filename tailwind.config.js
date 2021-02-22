const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './storage/framework/views/*.php', 
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    darkMode: false,
    
    theme: {
        extend: {
            colors: {
                'blue-gray': colors.blueGray,
                cyan: colors.cyan,
                grape: colors.purple,
                'light-blue': colors.lightBlue,
                orange: colors.orange,
                rose: colors.rose,
                teal: colors.teal,
                'warm-gray': colors.warmGray,
              },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('tailwindcss-elevation')(['responsive']),
        require('tailwindcss-flexbox-order')(),
        require('tailwindcss-typography')({
                ellipsis: true,
                hyphens: true,
                kerning: true,
                textUnset: true,
                componentPrefix: 'c-',
        }),
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/line-clamp'),
        require('tailwindcss-scroll-snap'),
        require('tailwindcss-image-rendering')(),
        require('tailwindcss-writing-mode')({
                variants: ['responsive', 'hover']
        }),
        require("tailwindcss-hyphens"),
        require('tailwindcss-tooltip-arrow-after')(),
        require('tailwindcss-dir')(),
        require('tailwindcss-touch')(),
    ],
};

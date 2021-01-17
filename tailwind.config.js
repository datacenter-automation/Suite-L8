const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
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
        require('@tailwindcss/forms'),
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

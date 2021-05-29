const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        fontFamily: {
            'blog': ['Merriweather', ...defaultTheme.fontFamily.serif]
        },
        extend: {
            colors: {
                'twitter-blue': '#1DA1F2',
                'github-gray': '#24292E',
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
}

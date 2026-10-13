import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import homepageCss from './scripts/homepage-css.mjs';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/scss/home.scss', 'resources/js/app.js', 'resources/js/home.js'],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [homepageCss()],
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});

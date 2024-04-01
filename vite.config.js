import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
    cssSourceMap: true,
    plugins: [
        laravel({
            input: [
                'resources/js/admin/app.js',
                'resources/sass/admin/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'bootstrap-growl-ifightcrime':  resolve(__dirname, 'node_modules/bootstrap-growl-ifightcrime'),
            'sweetalert2': resolve(__dirname, 'node_modules/sweetalert2'),
        },
    },
});

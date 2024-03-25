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
            '~datepicker':  resolve(__dirname, 'node_modules/bootstrap-datepicker'),
            '~select2':  resolve(__dirname, 'node_modules/select2'),
            'bootstrap-growl-ifightcrime':  resolve(__dirname, 'node_modules/bootstrap-growl-ifightcrime'),
            'sweetalert2': resolve(__dirname, 'node_modules/sweetalert2'),
            '~bootstrap-fileinput': resolve(__dirname, 'node_modules/bootstrap-fileinput'),
        },
    },
});
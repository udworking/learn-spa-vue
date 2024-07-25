import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    build: {
        outDir: 'public/build',
        rollupOptions: {
            input: {
                main: 'index.html',
            },
        },
    },
    server: {
        historyApiFallback: true, // これを追加
    },
});

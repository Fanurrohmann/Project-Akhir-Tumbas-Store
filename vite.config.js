import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
    // build: {
    //     manifest: true,
    //     outDir: 'public/build', // Direktori output manifest.json dan aset
    //     emptyOutDir: true,      // Hapus file lama sebelum build baru
    // },
});

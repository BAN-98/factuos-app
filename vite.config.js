import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        manifest: true,
        rollupOptions: {
            input: {
                app: './resources/js/app.js',
                bootstrap: './resources/js/bootstrap.js',
                filament: './resources/js/filament.js',
                trix: './resources/js/trix.js',
            },
        },
    }
    ,
    plugins: [
        laravel({
            detectTls:"localhost:8000",
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
});

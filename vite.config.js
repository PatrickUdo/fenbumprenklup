import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                // Alleen gebruikte gewichten; preload alleen wat boven de vouw staat
                // (broodtekst, menu en koppen). Cursief komt alleen in het mobiele menu voor.
                bunny('Jost', {
                    weights: [300, 400],
                    preload: [{ weight: 300, style: 'normal' }, { weight: 400, style: 'normal' }],
                }),
                bunny('Cormorant Garamond', {
                    weights: [500],
                    styles: ['normal', 'italic'],
                    preload: [{ weight: 500, style: 'normal' }],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        // DDEV: Vite runs in the web container and is exposed on port 5173.
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        origin: process.env.DDEV_PRIMARY_URL_WITHOUT_PORT
            ? `${process.env.DDEV_PRIMARY_URL_WITHOUT_PORT}:5173`
            : undefined,
        cors: {
            origin: /https?:\/\/([A-Za-z0-9\-\.]+)?(\.ddev\.site)(?::\d+)?$/,
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});

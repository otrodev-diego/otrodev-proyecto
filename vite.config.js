import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',
        port: Number(process.env.VITE_PORT) || 5173,
        hmr: {
            host: process.env.HMR_HOST || 'localhost',
            protocol: 'ws',
            port: Number(process.env.VITE_PORT) || 5173,
        },
    },
});

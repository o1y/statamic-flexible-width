import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue2';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');

    return {
        base: '/dist',
        plugins: [
            laravel({
                valetTls: env.VALET_TLS,
                input: [
                    'resources/js/addon.js'
                ],
                publicDirectory: 'dist',
            }),
            vue()
        ]
    }
});

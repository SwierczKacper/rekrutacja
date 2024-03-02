import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vitePluginRequire from "vite-plugin-require";

export default defineConfig({
    plugins: [
        laravel({
            input: ['./resources/scss/app.scss', './resources/js/app.ts'],
            refresh: true,
        }),
        vitePluginRequire({

        }),
    ],
});

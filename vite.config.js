import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

import VueI18n from "@intlify/vite-plugin-vue-i18n";
import { fileURLToPath } from "url";

const path = require("path");

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
        VueI18n({
            runtimeOnly: true,
            compositionOnly: true,
            include: [
                fileURLToPath(
                    new URL("./resources/js/i18n/locales/**", import.meta.url)
                ),
            ],
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
            // alias: {
            //     '@': path.resolve(__dirname, 'resources/js'),
            // },
        }),
    ],
});

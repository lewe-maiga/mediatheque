import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import solid from "vite-plugin-solid";
import solidStyled from "vite-plugin-solid-styled";
export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.tsx",
                "resources/js/welcome.tsx",
                "resources/js/books/create.tsx",
            ],
            refresh: true,
        }),
        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
        solid(),
        solidStyled({
            filter: {
                include: "ressources/ts/**/*.ts",
                exclude: "node_modules/**/*.{ts,js,tsx,jsx}",
            },
        }),
    ],
});

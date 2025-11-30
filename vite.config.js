import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', // SCSS file
                'resources/js/app.js'       // JavaScript file
            ],
            refresh: true, // Enables hot module replacement
        }),
    ],
    server: {
        // Optional: Configure the server settings if needed
        host: 'localhost', // Specify the host
        port: 3000,        // Specify the port
        strictPort: true,  // Prevents the server from trying to use another port if the specified one is already in use
    },
    build: {
        // Optional: Configure build options if needed
        outDir: 'public/build', // Output directory for built assets
        emptyOutDir: true,      // Clears the output directory before building
    },
});
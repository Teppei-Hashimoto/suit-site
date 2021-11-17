const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/style.scss", "public/css")
    .copyDirectory(
        "node_modules/@fortawesome/fontawesome-free/webfonts",
        "public/webfonts"
    )
    .postCss("resources/css/app.css", "public/css", [tailwindcss]);
// .options({
//     processCssUrls: false,
//     postCss: [tailwindcss("./tailwind.config.js")],
// });

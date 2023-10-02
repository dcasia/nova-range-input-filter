const mix = require('laravel-mix')

require('./nova.mix')
require('mix-tailwindcss');

mix
    .setPublicPath('dist')
    .js('resources/js/filter.js', 'js')
    .vue({ version: 3 })
    .postCss('resources/css/filter.css', 'css')
    .tailwind()
    .nova('digital-creative/nova-range-input-filter')

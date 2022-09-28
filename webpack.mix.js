const mix = require('laravel-mix')

require('./nova.mix.js');

mix.setPublicPath('dist')
    .js('resources/js/filter.js', 'js')
    .vue({ version: 3})

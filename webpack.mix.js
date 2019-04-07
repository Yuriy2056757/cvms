const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts(
  [
    'resources/js/app.js',
    'node_modules/mdbootstrap/js/popper.min.js',
    'node_modules/mdbootstrap/js/jquery-3.3.1.min.js',
    'node_modules/mdbootstrap/js/bootstrap.min.js',
    'node_modules/mdbootstrap/js/mdb.min.js'
  ],
  'public/js/app.js'
)
  .styles(
    'node_modules/mdbootstrap/css/bootstrap.min.css',
    'public/css/app.css'
  )
  .sass('node_modules/mdbootstrap/scss/mdb.scss', 'public/css/mdb.css')
  .sass('resources/sass/app.scss', 'public/css/app.css')
  .sass(
    'resources/sass/cvms/cvms.scss',
    'public/css/cvms/cvms.css'
  )
  .browserSync('localhost:8000');

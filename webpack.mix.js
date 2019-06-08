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
    'node_modules/mdbootstrap/js/popper.min.js',
    'node_modules/mdbootstrap/js/jquery-3.3.1.min.js',
    'node_modules/mdbootstrap/js/bootstrap.min.js',
    'node_modules/mdbootstrap/js/mdb.min.js'
  ],
  'public/js/cvms/cvms.js'
)
  .scripts(
    [
      'resources/js/cvms/custom.js'
    ],
    'public/js/cvms/custom.js'
  )
  .styles(
    'node_modules/mdbootstrap/css/bootstrap.min.css',
    'public/css/cvms/mdb-bootstrap.css'
  )
  .sass('node_modules/mdbootstrap/scss/mdb.scss', 'public/css/cvms/mdb.css')
  .sass('resources/sass/cvms/custom.scss', 'public/css/cvms/custom.css')
  .browserSync('localhost:8000');

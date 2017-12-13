let mix = require('laravel-mix');

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
//mix.less('resources/assets/less/styles.less','public/css');
//js('resources/assets/js/app.js', 'public/js')

   mix.sass('resources/assets/sass/app.scss', 'public/css');

//Se agregan los js del proyecto en un solo archivo luego hacer referencia en el html al all.js
/*mix.scripts('resources/assets/js/app.js','public/js/app.js');*/
mix.js('resources/assets/js/app.js','public/js');
mix.scripts(['node_modules/jquery/dist/jquery.min.js','node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js'],'public/js/all.js');

//Estos es para ver los cambios de JS y CSS de una vez en el navegador
mix.browserSync({

proxy:'blog.dev:8080'

})
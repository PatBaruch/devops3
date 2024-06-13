
   const mix = require('laravel-mix');

   mix.js('resources/js/app.js', 'public/js')
      .vue()  // Add this line to enable Vue support
      .sass('resources/sass/app.scss', 'public/css', {
         implementation: require('sass')
      })
      .sourceMaps();

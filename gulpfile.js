const elixir = require('gulp-copy');

require('laravel-elixir-vue-2');

elixir(mix =>{

    mix.copy('node_modules/sweetalert/dist/','public/sweetalert/');
});


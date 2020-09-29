const themename = '../custom_coaching_booking';

// You can declare multiple variables with one statement by starting with var and seperate the variables with a comma and span multiple lines.
// Below are all the Gulp Plugins we're using.
const gulp          = require('gulp'),      
      browserSync   = require('browser-sync').create(),
      reload        = browserSync.reload,
      concat  = require( 'gulp-concat' ),
      cleanCSS  = require( 'gulp-clean-css' ),      
      uglify  = require( 'gulp-uglify' ),
      lineec  = require( 'gulp-line-ending-corrector' );   

const root          =  './' + themename + '/';
// cssRoot              = root + 'css/',
// jsRoot               = root + 'js/',
// allCss               = cssRoot + '*.css';
// allJS                = [
//                           jsRoot + 'jquery-3.2.1.min.js',
//                           jsRoot + 'bootstrap.min.js',
//                           jsRoot + 'jquery.slicknav.min.js',
//                           jsRoot + 'owl.carousel.min.js',
//                           jsRoot + 'jquery.nicescroll.min.js',
//                           jsRoot + 'jquery.zoom.min.js',
//                           jsRoot + 'jquery-ui.min.js',
//                           jsRoot + 'main.js'
//                        ];
const phpWatchFiles   = root + '**/*.php';

/* CSS Minify process - 
-concating css then minifying 
- from 'allCss' to 'root' as the name of 'main_style_min.css'
*/
// function concatCSS() { 
//   return gulp.src(allCss)        
//   .pipe(concat('main_style_min.css'))      
//   .pipe(cleanCSS())       
//   .pipe(lineec()) 
//   .pipe(gulp.dest([root]));
// }

/* JS Minify process - 
-concating css then minifying 
- from 'all_Js' to 'root' as the name of 'main_js_min.js'
*/
// function concatJS() {
//   return gulp.src(allJS)
//   .pipe(concat('main_js_min.js'))
//   .pipe(uglify())
//   .pipe(lineec())
//   .pipe(gulp.dest(root));
// }



function watch() {
    browserSync.init({
      open: 'external',
      proxy: 'http://localhost/all_wordpress/travelo/',
    });

    // gulp.watch(allCss, concatCSS); // Only Css Minify - concat then minify
    // gulp.watch(allJS, concatJS); // Only JS Minify - concat then minify
    gulp.watch([phpWatchFiles]).on('change', reload);
}

// exports.concatCSS = concatCSS;
// exports.javascript = concatJS;
exports.watch = watch;

const build = gulp.series(watch);
gulp.task('default', build);
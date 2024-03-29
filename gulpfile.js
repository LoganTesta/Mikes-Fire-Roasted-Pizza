
/*Call gulp build to run several tasks shown below. Type gulp in the command line in the project's main directory and gulp will watch automatically 
/*for any changes to the following files.*/

var gulp = require('gulp');
var csssnano = require('gulp-cssnano');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');


var newer = require('gulp-newer');
var imagemin = require('gulp-imagemin');

var original = 'assets/';
var result = 'assets/';

function compressImages() {
    const output = result;

    return gulp.src(original + 'images/nonminified/**/*')
        .pipe(newer(output))
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest(output + 'images/'));
};
exports.compressImages = compressImages;



/*Compress JavaScript files into one minified file*/
const
        devBuild = (process.env.NODE_ENV !== 'production'),
        noop = require('gulp-noop'),
        deporder = require('gulp-deporder'),
        terser = require('gulp-terser'),
        stripdebug = devBuild ? null : require('gulp-strip-debug'),
        sourcemaps = devBuild ? require('gulp-sourcemaps') : null;

function compressJavaScript() {
    return gulp.src(original + 'javascript/base/**/*')
            .pipe(sourcemaps ? sourcemaps.init() : noop())
            .pipe(deporder())
            .pipe(concat('main-javascript-min.js'))
            .pipe(stripdebug ? stripdebug() : noop())
            .pipe(terser())
            .pipe(sourcemaps ? sourcemaps.write() : noop())
            .pipe(gulp.dest(result + 'javascript/minified'));
}
exports.compressJavaScript = compressJavaScript;



/*Minify CSS*/
var cleanCSS = require('gulp-clean-css');

function minifyCSS() {
    return gulp.src(original + 'css/base/*.css')
            .pipe(sourcemaps.init())
            .pipe(cleanCSS({compatability: 'ie8'}))
            .pipe(sourcemaps.write('../minified/'))
            .pipe(gulp.dest(result + 'css/minified/'));
}
exports.minifyCSS = minifyCSS;



/* Call gulp build to run several tasks shown below.*/
exports.build = gulp.parallel(exports.compressImages, exports.compressJavaScript, exports.minifyCSS);


/*Another option: type gulp in the proper command line directory and gulp will watch automatically for any changes to the following files.*/
function watch(done){  
    gulp.watch(original + 'images/nonminified/**/*', compressImages);
    gulp.watch(original + 'javascript/base/**/*', compressJavaScript);
    gulp.watch(original + 'css/base/*.css', minifyCSS); 
}
exports.watch = watch;
exports.default = gulp.series(exports.build, exports.watch);

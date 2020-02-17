
var gulp = require('gulp');
var csssnano = require('gulp-cssnano');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('default', function () {

});

var newer = require('gulp-newer');
var imagemin = require('gulp-imagemin');

var original = 'assets/images/nonminified/';
var result = 'assets/images/';

function compressImages() {
    const output = result;

    return gulp.src(original + "/**/*")
        .pipe(newer(output))
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest(output));
};
exports.compressImages = compressImages;
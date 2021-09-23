const gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));

// Task for Coverting SASS to CSS
gulp.task('sass', async function() {
    return gulp.src('./sass/utilities/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./sass/utilities/'));
});

// Task 2 : Watch Taks

gulp.task('watch', async function() {
    gulp.watch('sass/utilities/*.scss', gulp.series('sass'));
})
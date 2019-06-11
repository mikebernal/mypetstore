var gulp     = require('gulp');
var sass     = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');

var browserSync = require('browser-sync').create();

gulp.task('browserSync', function() {
    browserSync.init({
        proxy: 'mypetstore.local',
    });
});

gulp.task('sass', function() {
    return gulp.src('web/themes/custom/zero/sass/*.scss')
    .pipe(sassGlob())
    .pipe(sass())
    .pipe(gulp.dest('web/themes/custom/zero/css'))
    .pipe(browserSync.reload({
        stream: true
    }))
});

gulp.task('watch', gulp.parallel( 'browserSync', 'sass', function() {
    gulp.watch('web/themes/custom/zero/sass/**/*.scss', gulp.parallel('sass'));
}));
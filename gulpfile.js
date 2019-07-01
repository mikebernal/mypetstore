var gulp     = require('gulp');
var sass     = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');

var browserSync = require('browser-sync').create();

gulp.task('browserSync', function() {
    browserSync.init({
        proxy: 'mypetstore.local',
        logConnections: true
    });
});

gulp.task('sass', function() {
    return gulp.src('web/themes/custom/omegasubtheme/style/scss/*.scss')
    .pipe(sassGlob())
    .pipe(sass())
    .pipe(gulp.dest('web/themes/custom/omegasubtheme/style/css'))
    .pipe(browserSync.reload({
        stream: true
    }))
});

gulp.task('watch', gulp.parallel( 'browserSync', 'sass', function() {
    gulp.watch([
        'web/themes/custom/omegasubtheme/style/scss/**/*.scss',
        'web/themes/custom/omegasubtheme/js/**/*.js',
        'web/themes/custom/omegasubtheme/templates/**/*.twig',
    ], gulp.parallel('sass'));
}));
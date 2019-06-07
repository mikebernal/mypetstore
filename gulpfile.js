var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('browserSync', function() {
    browserSync.init({
        proxy: 'mypetstore.local',
    });
});

gulp.task('sass', function() {
    return gulp.src('web/themes/custom/zero/sass/*.sass')
    .pipe(sass())
    .pipe(gulp.dest('web/themes/custom/zero/css'))
    .pipe(browserSync.reload({
        stream: true
    }))
});

gulp.task('watch', gulp.parallel( 'browserSync', 'sass', function() {
    gulp.watch('web/themes/custom/zero/sass/**/*.sass', gulp.parallel('sass'));
}));
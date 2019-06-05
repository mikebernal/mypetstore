var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('browserSync', function() {
    browserSync.init({
        // Local URL http://localhost:3000 not serving updates
        // Go 192.168.56.1:3000 instead
        // Could it be because I am serving it on a proxy?
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
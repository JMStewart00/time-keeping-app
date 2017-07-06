const gulp = require('gulp'),
      sass = require('gulp-sass'),
      autoprefixer = require('gulp-autoprefixer'),
      connect = require('gulp-connect-php'),
      browserSync = require('browser-sync'),
      concat = require('gulp-concat'),
      customizeBootstrap = require('gulp-customize-bootstrap');

const autoprefixerOptions = {
    browsers: [
        "Android 2.3",
        "Android >= 4",
        "Chrome >= 20",
        "Firefox >= 24",
        "Explorer >= 8",
        "iOS >= 6",
        "Opera >= 12",
        "Safari >= 6"
    ]
};   

gulp.task('compileBootstrap', function() {
  return gulp.src('node_modules/bootstrap/scss/bootstrap.scss')
    .pipe(customizeBootstrap('app/css/scss/custom_bootstrap/*.scss'))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(gulp.dest('app/css/'))
    .pipe(bs.stream());
});   

gulp.task('sass', function () {
  return gulp.src('./app/css/scss/extra_style/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer( autoprefixerOptions))
    .pipe(concat('main.css'))
    .pipe(gulp.dest('./app/css/'))
    .pipe(bs.stream());
});

gulp.task('connect-sync', function() {
  connect.server({}, function (){
    browserSync({
      proxy: '127.0.0.1:8000'
    });
  });
});

gulp.task('watch', function () {
   gulp.watch('./app/**/*.scss', ['compileBootstrap', 'sass']);
   gulp.watch('**/*.php').on('change', function () {
    browserSync.reload();
   });
});


gulp.task('default', ['watch', 'connect-sync']);   
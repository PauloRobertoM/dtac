var gulp   = require('gulp'),
    watch  = require('gulp-watch'),
    stylus = require('gulp-stylus'),
    notify = require("gulp-notify");
 
gulp.task('stylus', function () {
	watch('./assets/styl/**/*.styl', function () {
		gulp.src('./assets/styl/style.styl').pipe(stylus({
			compress: true
		})).pipe(gulp.dest('./assets/css/')).pipe(notify("arquivo styl compilado!"));
	});
});
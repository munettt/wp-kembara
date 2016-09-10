var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');

// source and distribution folder
var config = {

    source: './bower_components/',
    dest: './dist/'
}
	
var	vendor = {
		bootstrap: { in: config.source + 'bootstrap/' },
		fonts: { in: [config.source + 'Ionicons/'], out: config.dest + 'fonts/Ionicons'},
		scripts: { 
					in: [config.source + 'jquery/dist/jquery.min.js', config.source + 'tether/dist/js/tether.js', config.source + 'bootstrap/dist/js/bootstrap.js', './js/ie10.js', './js/main.js' ],
					output: 'app.js',
					out: config.dest + 'js/'
		}
}

var scss = {
		in: './css/style.scss',
		out: config.dest + 'css/',	
		watch: './css/**/*',
		option: {
			outputStyle: 'compressed',
			includePaths: [vendor.bootstrap.in]
		}
}

    
// task: fonts
gulp.task('fonts', function () {
		gulp.src(vendor.fonts.in + "fonts/*.*")
        .pipe(gulp.dest(vendor.fonts.out + "/fonts"))

		gulp.src(vendor.fonts.in + "css/ionicons.min.css")
        .pipe(gulp.dest(vendor.fonts.out + "/css") )
});

// task: css
gulp.task('css', ['fonts'], function () {
    return gulp.src(scss.in)
		.pipe(sourcemaps.init())
        .pipe(sass(scss.option))
		.pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(scss.out));
});


// task: js
gulp.task('js', function () {
  return gulp.src(vendor.scripts.in)
    .pipe(concat(vendor.scripts.output))
    .pipe(uglify())
    .pipe(gulp.dest(vendor.scripts.out));
});


// Watch .scss files
gulp.task('watch', function() {

  gulp.watch('css/**/*.scss', ['css']);

});

gulp.task('default', ['fonts', 'css', 'js']);
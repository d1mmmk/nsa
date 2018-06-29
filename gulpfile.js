var gulp = require('gulp');
var scss = require('gulp-scss');
var copy = require("gulp-copy");
var watch = require('gulp-watch');
var imagemin = require('gulp-imagemin');
var spritesmith = require('gulp.spritesmith');
var dist = './dist';
var src = './src';
var images = [src + '/images/*.*'];
var wp = dist + '/wp-nsa';

gulp.task('scss', function() {
  return gulp.src([
      src + '/scss/style.scss',
      src + '/scss/editor.scss'
    ])
    .pipe(scss({
        // style: 'compressed'
    })).pipe(gulp.dest(dist));
});

gulp.task('copy', function(){
  gulp.src([src + '/*.html'])
      .pipe(gulp.dest(dist));
})

gulp.task('images', function() {
    return gulp.src(images)
        .pipe(imagemin())
        .pipe(gulp.dest(dist+'/images'));
});

gulp.task('sprite', function() {
    ['services', 'rules'].forEach(function(sprite) {
    var spriteData = gulp.src([src + '/images/'+sprite+'/*.png']).pipe(spritesmith({
            imgName: sprite + '.png',
            cssName: sprite + '.scss',
            cssFormat: 'scss',
            imgPath: 'images/' + sprite + '.png',
            algorithm: 'binary-tree'
        }));
        spriteData.img
            .pipe(gulp.dest(src + '/images/'));
        spriteData.css
            .pipe(gulp.dest(src + '/scss/'));
    });
});

gulp.task('wptheme', function() {
    gulp.src(src +'/js/**/*.js')
        .pipe(gulp.dest(wp+'/js'));
        
    gulp.src(images)
        .pipe(imagemin())
        .pipe(gulp.dest(wp+'/images'));
        
    gulp.src([
      src + '/scss/style.scss',
      src + '/scss/editor.scss'
    ])
    .pipe(scss({
        // style: 'compressed'
    })).pipe(gulp.dest(wp));
    
    gulp.src([src + '/wp-nsa/**/*.php'])
      .pipe(gulp.dest(wp));
});


gulp.task('wp', ['sprite', 'wptheme']);

gulp.task('build', ['scss', 'sprite', 'images', 'copy', 'wptheme']);

gulp.task('watch', function(){
   gulp.watch(src+'/index.html', ['copy']);
   gulp.watch(src+'/scss/**/*.scss', ['scss']);
})

gulp.task('default', ['watch']);
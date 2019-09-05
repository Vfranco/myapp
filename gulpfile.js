/**
* ================================
*   Dependencias
* ================================
*/
var gulp    = require('gulp'),
    concat  = require('gulp-concat'),
    uglify  = require('gulp-uglify');
    babel   = require('gulp-babel');         

/**
 * ===============================
 *  Tareas
 * ===============================
 */
gulp.task('app', async function(){
    gulp.src('src/Scripts/app/*.js')
    .pipe(babel({
        presets : ['es2015']
    }))
    .pipe(concat('app.min.js'))    
    .pipe(uglify())
    .pipe(gulp.dest('src/Scripts/production/'))    
});

gulp.task('login', async function(){
    gulp.src('src/Scripts/controllers/*.js')
    .pipe(babel({
        presets : ['es2015']
    }))
    .pipe(concat('sigga-login.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('src/Scripts/production/'))    
});

gulp.task('directives', async function(){
    gulp.src('src/Scripts/directives/*.js')
    .pipe(babel({
        presets : ['es2015']
    }))
    .pipe(concat('app-directives.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('src/Scripts/production/'))
});

gulp.task('factorys', async function(){
    gulp.src('src/Scripts/factorys/*.js')
    .pipe(babel({
        presets : ['es2015']
    }))
    .pipe(concat('app-factorys.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('src/Scripts/production/'))
});

gulp.task('filters', async function(){
    gulp.src('src/Scripts/filters/*.js')
    .pipe(babel({
        presets : ['es2015']
    }))
    .pipe(concat('app-filters.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('src/Scripts/production/'))    
});

gulp.task('watch', function(){
    gulp.watch('src/Scripts/controllers/*.js', gulp.series('login'));
    gulp.watch('src/Scripts/app/*.js', gulp.series('app'));
    gulp.watch('src/Scripts/directives/*.js', gulp.series('directives'));
    gulp.watch('src/Scripts/factorys/*.js', gulp.series('factorys'));
    gulp.watch('src/Scripts/filters/*.js', gulp.series('filters'));
    gulp.watch('src/Scripts/app/*.js', gulp.series('app'));
});
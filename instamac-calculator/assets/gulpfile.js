// REFERENCES
const 	fs				=	require("fs"),
		gulp			=	require("gulp"),
		sass			=	require("gulp-sass"),
		concat			=	require("gulp-concat"),
		cssmin			=	require("gulp-cssmin"),
		gulpif			=	require("gulp-if"),
		plumber			=	require("gulp-plumber"),
		autoprefixer	=	require("autoprefixer"),
		postcss			=	require("gulp-postcss"),
		notify			=	require("gulp-notify"),
		log				=	require("fancy-log"),
		color			=	require("gulp-color"),
		webpack			=	require("webpack-stream"),
		TerserPlugin	=	require("terser-webpack-plugin");

let		paths;


// CONFIG
// Local and dev servers should have an environmental variable called 'Gulp:Environment' set to 'DEBUG', bundles will be unminified.
// Live servers should not have this environment variable, bundles will be built for production.
const	config	=	{
	
	environment: process.env["Gulp:Environment"],
	
};

// PATHS
paths	=	{

	// SCSS INPUTS
	frontend_scss:		"scss/frontend.scss",
	admin_scss:			"scss/admin.scss",
	
	// CSS OUTPUTS
	frontend_css:		"css/",
	admin_css:			"css/",
	
};
	
// FRONTEND STYLES
gulp.task("frontend_styles", (done) => {
	
	gulp
	.src(paths.frontend_scss)
	.pipe(
		plumber({
			errorHandler: function (err) {
				notify.onError({
					title: "Gulp error in " + err.plugin,
					message: err.toString(),
				})(err);
			},
		})
	)
	.pipe(sass())
	.pipe(concat("frontend.css"))
	.pipe(postcss([autoprefixer()]))
	.pipe(gulpif(config.environment !== "DEBUG", cssmin()))
	.pipe(gulp.dest(paths.frontend_css));
	
	return done();
	
});
	
// ADMIN STYLES
gulp.task("admin_styles", (done) => {
	
	gulp
	.src(paths.admin_scss)
	.pipe(
		plumber({
			errorHandler: function (err) {
				notify.onError({
					title: "Gulp error in " + err.plugin,
					message: err.toString(),
				})(err);
			},
		})
	)
	.pipe(sass())
	.pipe(concat("admin.css"))
	.pipe(postcss([autoprefixer()]))
	.pipe(gulpif(config.environment !== "DEBUG", cssmin()))
	.pipe(gulp.dest(paths.admin_css));
	
	return done();
	
});
	
// BASE WATCH
gulp.task("watch", () => {
	gulp.watch(paths.frontend_scss, gulp.series("frontend_styles"));
	gulp.watch(paths.admin_scss, gulp.series("admin_styles"));
});
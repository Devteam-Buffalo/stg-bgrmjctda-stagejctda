import gulp from 'gulp';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import pump from 'pump';

gulp.task( 'css', ( cb ) => {
	const fileSrc = [
		'./assets/css/admin/admin.css',
		'./assets/css/frontend/frontend.css',
		'./assets/css/shared/shared.css'
	];
	const fileDest = './dist';

	const cssOpts = {
		stage: 0,
		autoprefixer: {
			grid: true
		}
	};

	const taskOpts = [
		require( 'postcss-import' ),
		require( 'postcss-safe-parser' ),
		require( 'postcss-preset-env' )( cssOpts ),
	];

	pump( [
		gulp.src( fileSrc ),
		sourcemaps.init( {
			loadMaps: true
		} ),
		postcss( taskOpts ),
		sourcemaps.write( './css', {
			mapFile: function( mapFilePath ) {
				return mapFilePath.replace( '.css.map', '.min.css.map' );
			}
		} ),
		gulp.dest( fileDest )
	], cb );
} );

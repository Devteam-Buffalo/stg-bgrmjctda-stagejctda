import path from 'path';
import webpack from 'webpack';
import WebpackBar from 'webpackbar';
import GoogleFontsPlugin from 'google-fonts-webpack-plugin';

const DIST_PATH = path.resolve( './dist/js' );

const config = {
	mode: process.env.NODE_ENV,
	entry: {
		admin: './assets/js/admin/admin.js',
		frontend: './assets/js/frontend/frontend.js',
		shared: './assets/js/shared/shared.js'
	},
	output: {
		path: DIST_PATH,
		filename: '[name].min.js',
	},
	resolve: {
		modules: ['node_modules'],
	},
	cache: true,
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.js$/,
				enforce: 'pre',
				loader: 'eslint-loader',
				options: {
					fix: true
				}
			},
			{
				test: /\.js$/,
				use: [{
					loader: 'babel-loader',
					options: {
						babelrc: true,
					}

				}]
			}
		]
	},
	plugins: [
		new webpack.NoEmitOnErrorsPlugin(),
		new WebpackBar()
		/**
		new GoogleFontsPlugin({
			local: true,
			path: "./assets/fonts/serif",
			apiUrl: "https://google-webfonts-helper.herokuapp.com/api/fonts",
			fonts: [
				{
					family: "Roboto Slab",
					subsets: [ "latin" ],
					variants: [ "100", "300", "500", "700" ],
					formats: ["woff", "woff2", "eot", "ttf", "svg"]
				}
			]
		})
		**/
	],
	stats: {
		colors: true
	}
	/**
	externals: {
		jquery: 'jQuery'
	}
	**/
};

module.exports = config;

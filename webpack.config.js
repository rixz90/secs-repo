const HtmlWebpackPlugin = require('html-webpack-plugin')

const path = require('path')
module.exports = {
	mode: 'development',
	watch: true,
	watchOptions: {
		poll: 1000, // Check for changes every second
	},
	entry: {
		bundle: path.resolve(__dirname, 'src/index.js'),
	},
	output: {
		path: path.resolve(__dirname, 'dist'),
		filename: '[name]_[contenthash].js',
		clean: true,
		assetModuleFilename: '[name][ext]',
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: ['style-loader', 'css-loader', 'sass-loader'],
			},
			{
				test: /\.(png|svg|jpeg|gif)$/i,
				type: 'asset/resource',
			},
		],
	},
	plugins: [
		new HtmlWebpackPlugin({
			title: 'SECS',
			filename: 'base.html.twig',
			template: 'src/template.html',
		}),
	],
}

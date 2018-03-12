let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 | 기본형
 | mix.확장자('컴파일되는 파일', '컴파일 후의 파일[위치]')
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
		// .scripts([
		// 'node_modules/highlightjs/highlight.pack.js',
		// 'resources/assets/js/app.js'
		// ], 'public/js/app.js');	
mix.copyDirectory('node_modules/font-awesome/fonts', 'public/build/fonts');

/*  사용 방법
//  Less -> CSS
	mix.less('resources/assets/sass/app.less', 'public/css');
	
// SASS -> CSS
	mix.sass('resources/assets/sass/app.scss', 'public/css');
	mix.sass('resources/assets/sass/app.scss', 'public/css', {
		precision: 5
	});
	
//  Stylus -> CSS
	mix.stylus('resources/assets/sass/app.styl', 'public/css');
	mix.stylus('resources/assets/sass/app.styl', 'public/css', {
		use: [ require('rupture')() ] // 플러그인  사용
	});
//  PostCSS->CSS
	mix.sass('resources/assets/sass/app.scss', 'public/css')
		.option({
			postCss: [
				require('postcss-css-variables')()
			]
		});
// 일반 css를 결합
	mix.stylus([
		'public/css/vender/normalize.css',
		'public/css/vender/videojs.css'
		], 'public/css/all.css'	);
// 소스 맵
	mix.js('resources/assets/js/app.js', 'public/js').sourceMaps();
	
// JavaScript 변환 
	mix.scripts(['resources/assets/js/common.js', 'resources/assets/js/admin.js'], 'public/js/app.js');
	// ES2015, 모듈, .vue파일 컴파일, 압축 가능
// React 변환
	mix.react('resources/assets/js/app.jsx', 'public/js');
// 바벨 변환	
	mix.babel('resources/assets/js/app.js', 'public/js');


// 파일/디렉토리 카피
// mix.copy('소스 파일', '타켓 파일')
//CSS를 복사
	mix.copy('node_modules/foo/bar.css', 'public/css/bar.css');
//디렉토리를 카피
	mix.copyDirectory('assets/img', 'public/img');
// 버전화 
	mix.js('resources/assets/js/app.js','public/js'). version();
  // <link rel="stylesheet" href="{{mix('/css/app.css')}}">	
*/
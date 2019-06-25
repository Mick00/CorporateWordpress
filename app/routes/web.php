<?php
/**
 * Web Routes.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package WPEmergeTheme
 */

use WPEmerge\Facades\Route;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle the homepage, for example.
// phpcs:ignore
// Route::get()->url( '/' )->handle( 'ExampleController@home' );
#Route::get()->url('/offre-d-emploi/')->handle('App\Controllers\JobsOfferController@list_jobs');
//Route::get()->where('type_post', 'joboffer')->view('jobofferlist');
/*Route::get()
->url('/offre-d-emploi/')
->group(function (){
	Route::get()->url('/')->handle('App\Controllers\JobsOfferController@list_jobs');
	Route::get()->url('/{job}/')->handle(function ($request, $view, $joboffer){
		echo "Job".$joboffer;
		var_dump($request);
		var_dump($view);
	});
});

// If we do not want to hardcode a url, we can use one of the available route conditions instead.
// phpcs:ignore
// Route::get()->where( 'post_id', get_option( 'page_on_front' ) )->handle( 'ExampleController@home' );

/**
 * Pass all front-end requests through WPEmerge.
 * WARNING: Do not add routes after this - they will be ignored.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods?id=handling-all-requests
 */
Route::all();

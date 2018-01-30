<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Category;

Route::get('/userlogout' , function (){
	auth()->logout();
	return redirect('/divar/tehran/all');
});

Route::get('/' , function (){
	return redirect('/divar/tehran/all');
});

Route::get('/divar/all/all' , function (){

});

Route::get('/divar/{city}/{category}' , 'DivarController@index');



//Route::get('/advertise' , 'AdvertisesController@advertise');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout' , function (){
	 auth()->logout();
	 return back();
});

Route::get('/category/query' , 'CategoriesController@query');


Route::get('/user/advertise' , 'AdvertisesController@index')->middleware('auth');

Route::post('/user/advertise/store' , 'AdvertisesController@store');

Route::get('/advertise/{advertise_id}' , 'AdvertisesController@show');
















//
//Route::get('/node/node/node' , function (){
//
//	$root = Category::create(['name' => 'Desks and Chairs']);
//	$child1 = $root->children()->create(['name' => 'Wood']);
//	$child2 = $root->children()->create(['name' => 'Metal']);
//
//	$child3 = $child1->children()->create(['name' => 'Chair']);
//	$child4 = $child2->children()->create(['name' => 'Desk']);
//
//$array = ['tehran' , 'shiraz' , 'yazd' , 'rasht' , 'esfahan' , 'arak' , 'noor' , 'amol' ];
//
//foreach ($array as $r)
//{
//	\App\Location::create([
//		'name' => $r
//	]);
//}
//
//});

Route::get('/sms' , function (){

	$sender = new \App\Socialite\Sms\Sms();

	dump($sender->messageStatus(1064229955));

//	dump($sender->sendGroupSms(['09362919434' , '09354008609'] , 'peyman'));

});




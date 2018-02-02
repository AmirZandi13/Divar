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
use App\Socialite\Email\Email;
use App\Socialite\Sms\Sms;
use App\Socialite\Socialite;
use Illuminate\Support\Facades\Mail;

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

Route::get('views' , 'AdvertisesController@view');








Route::get('/sms' , function (){

	$sender = new Socialite(Email::class , 'Email' , 'amir zandieh' , 'system' , \App\User::find(1));

	dd($sender->socialite());

});

Route::get('/mail' , function (){

	$user = \App\User::find(1);

	Mail::to('pepesh33@yahoo.com')->send(new \App\Mail\SendEmail($user));

	dd('email send successfully');
});
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
use Illuminate\Support\Facades\Input;
use App\Notifications\InvoicePaid;
use App\User;

Route::get('/', function () {
	// User::find(1) -> notify(new InvoicePaid );

	$user = User::find(1);
	Notification::route('mail', 'khimdingmilan99@gmail.com')
            ->notify(new InvoicePaid($user));


    return view('auth.login');
});
Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

Route::get('send','mailController@send');

Auth::routes();

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/home/client','Backend\ClientController@index');
Route::post('/home/client/store','Backend\ClientController@store')->name('client-store');
Route::get('/home/client/{id}/show','Backend\ClientController@show')->name('client-show');
Route::get('/home/client/{id}/edit','Backend\ClientController@edit')->name('client-edit');
Route::get('/home/client/{id}/update','Backend\ClientController@update')->name('client-update');
Route::post('/home/client/{id}/update2','Backend\ClientController@update2')->name('client-update2');
Route::get('/home/client/{id}/delete','Backend\ClientController@destroy')->name('client-delete');
Route::get('/home/client/create','Backend\ClientController@create')->name('client-create');
Route::get('/home/client/live','Backend\ClientController@live')->name('client-live');

//notification
// Route::get('/home/notification/','Backend\NotificationController@index');
Route::get('/home/notification/{id}/detail','Backend\NotificationController@detail');
Route::post('/home/notification/store','Backend\NotificationController@store');
Route::get('/home/notification/{id}/delete','Backend\NotificationController@destroy');

//live search
Route::get('/livesearch','Backend\liveSearchController@index')->name('live_search');
Route::get('/livesearch/action','Backend\liveSearchController@action')->name('live_search.action');
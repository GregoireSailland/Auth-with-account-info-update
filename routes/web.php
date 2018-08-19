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
$all_langs = config('app.all_langs');

/**
* Iterate over each language prefix 
*/         /**
foreach( $all_langs as $prefix ){

   if ($prefix == 'en') $prefix = '';

   //Register new route group with current prefix
   
   Route::group(['prefix' => $prefix], function() use ($prefix) {

         // Now we need to make sure the default prefix points to default  lang folder.
         if ($prefix == '') $prefix = 'en';


         * The following line will register:
         *
         * example.com/
         * example.com/en/
		 */

Route::prefix('{lang?}')->middleware('locale')->group(function() {

Route::get('/', function () {
    return view('front-page');
});
if(0){	Auth::routes();}
// Authentication Routes...
else{
Route::group(['namespace' => 'Auth'], function () {//->name('')

	Route::get('login', 'LoginController@showLoginForm')->name('login');//Route::get('login', 'Auth\AuthController@showLoginForm');
	Route::post('login', 'LoginController@login');//Route::post('login', 'Auth\AuthController@login');
	Route::post('logout', 'LoginController@logout')->name('logout');//Route::get('logout', 'Auth\AuthController@logout');

	// Password Reset Routes...
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');//Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::get('password/reset', 'ResetPasswordController@reset')->name('password.request');//Route::post('password/reset', 'Auth\PasswordController@reset');
	Route::post('password/reset', 'ResetPasswordController@reset')->name('');//Route::post('password/reset', 'Auth\PasswordController@reset');
	Route::get('password/reset/{token?}', 'ResetPasswordController@showResetForm')->name('password.reset');//Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

	// Registration Routes...
	Route::get('register', 'RegisterController@showRegistrationForm')->name('register');//Route::get('register', 'Auth\AuthController@showRegistrationForm');
	Route::post('register', 'RegisterController@register');//Route::post('register', 'Auth\AuthController@register');


	Route::get('/account', 'AccountController@index')->name('account');
	Route::post('/account', 'AccountController@update')->name('account.update');
});
}
Route::get('/logged-in', 'LoggedInController@in')->name('logged-in');
Route::get('/logged-out', 'LoggedInController@out')->name('logged-out');




Route::get('/posts', function () {
    return view('posts');
});

Route::get('/espaces', function () {
    return view('espaces');
});

});//Route::prefix('{lang?}')->middleware('locale')->group(function()


Route::group(['namespace' => 'Auth'], function () {
	Route::post('login', 'LoginController@login');
	Route::post('logout', 'LoginController@logout')->name('logout');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::post('password/reset', 'ResetPasswordController@reset')->name('');
	Route::post('register', 'RegisterController@register');
	Route::post('/account', 'AccountController@update')->name('account.update');
});

	/*
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
| Domain | Method   | URI                    | Name             | Action                                                                 | Middleware   |
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
|        | GET|HEAD | /                      |                  | Closure                                                                | web          |
|        | GET|HEAD | posts                  |                  | Closure                                                                | web          |
|        | GET|HEAD | espaces                |                  | Closure                                                                | web          |

|        | GET|HEAD | api/user               |                  | Closure                                                                | api,auth:api |

|        | GET|HEAD | logged-in              | logged-in        | App\Http\Controllers\LoggedInController@index                          | web,auth     |
|        | GET|HEAD | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST     | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | POST     | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web          |

|        | POST     | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
|        | GET|HEAD | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
|        | POST     | password/reset         |                  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
|        | GET|HEAD | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |

|        | GET|HEAD | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
|        | POST     | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
*/
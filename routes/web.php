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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/login/social', 'Auth\LoginController@loginSocial');
Route::get('/login/callback', 'Auth\LoginController@loginCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::group(['middleware' => 'can:admin'], function(){
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::post('/login/social', 'Auth\LoginController@loginSocial');
    Route::get('/login/callback', 'Auth\LoginController@loginCallback');
});


Route::group(['middleware' => 'guest'], function(){
    Route::get('/test', function(){
        echo "Olá Mundo!";
    });
});

Route::get('/auth', function (\Illuminate\Http\Request $request) {
    //dd($request->user());
    //dd(\Auth::user());
    //dd(\Auth::check());
    //dd(\Auth::id());
    //\Auth::loginUsingId()
});

//http - Não mantém estado -

//sessão - guardada servidor - os dados do usuário - admin@user.com
//cookie da sessão


//cookies - guardado no browser
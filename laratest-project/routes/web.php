<?php

use Illuminate\Support\Facades\Route;
//use Laravel\Socialite\Facades\Socialite;
//use App\Http\Controllers\Auth;

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

Route::get('/home', 'HomeController@index')->name('home.index');

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify');

Route::get('/register', 'RegisterController@index')->name('register.index');;
Route::post('/register', 'RegisterController@store');



Route::get('/logout', 'LogoutController@index');

//Route::get('/about', 'AboutController@index');

//Route::get('/clientlist', 'ClientListController@index');

//Route::get('/addclient', 'AddClientController@index');

//Route::get('/contactclient', 'ContactClientController@index');

Route::group(['middleware'=>['sess']], function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/client', 'ClientController@index');
    Route::get('/clientlist', 'ClientController@list')->name('client.list');
    Route::get('/details/{id}', 'ClientController@details');
    Route::get('/client/list/download_list_data', 'ClientController@dwonload')->name('client.all');
    
    //Route::get('/detailsTEST', 'ClientController@details');

        Route::get('/create', 'ClientController@create')->name('client.create'); //
        Route::post('/create', 'ClientController@insert')->name('client.insert');
        Route::get('/edit/{id}', 'ClientController@edit');
        Route::post('/edit/{id}', 'ClientController@update');
        Route::get('/delete/{id}', 'ClientController@delete');
        Route::post('/delete/{id}', 'ClientController@destroy');

        Route::get('/search', 'ClientController@search');
        Route::get('/search', 'ClientController@searching')->name('client.search');

        Route::get('/forum', 'ForumController@index');
        Route::post('/forum', 'ForumController@create')->name('forum.create');
        Route::get('/forumpost', 'ForumController@show');
        Route::get('/forumpost', 'ForumController@list')->name('forum.forumpost');
        Route::get('/postreply/{id}', 'ForumController@reply');
        Route::post('/postreply/{id}', 'ForumController@replyinsert');

        Route::get('/accounts', 'AccountController@index');
        
        Route::get('/loan', 'LoanController@index');
        Route::get('/createloan', 'LoanController@create')->name('loan.create');
        Route::post('/createloan', 'LoanController@insert')->name('loan.insert');
        Route::get('/loanlist', 'LoanController@list')->name('loan.list');
        Route::get('/loancategory', 'LoanController@category');
        Route::get('/loanapplication', 'LoanController@apply');
        Route::post('/loanapplication', 'LoanController@applied');
        Route::post('/loanlist/{id}', 'LoanController@approval');

        //Route::get('/regular', 'RegularController@index');
        //Route::get('/createregular', 'RegularController@create')->name('regular.create');
        //Route::post('/createregular', 'RegularController@insert')->name('regular.insert');
        //Route::get('/regularlist', 'RegularController@list')->name('regular.list');

        //Route::resource('regular', 'RegularController');
        Route::get('/regular', 'RegularController@index');
        Route::get('/createregular', 'RegularController@create');
        Route::post('/createregular', 'RegularController@store');
        Route::get('/regularlist', 'RegularController@show')->name('regular.show');
        Route::get('/regularedit/{id}', 'RegularController@edit');
        Route::post('/regularedit/{id}', 'RegularController@update');
        

    });


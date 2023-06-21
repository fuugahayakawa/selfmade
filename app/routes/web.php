<?php
use App\Http\Controllers\PostController;
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

Auth::routes();
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

//ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('post','PostController');
    // Route::post('post','PostController');
    Route::resource('comment','CommentController');
    Route::resource('report','ReportController');
    Route::resource('favorite','FavoriteController');
    Route::resource('account','MyaccountController');
    Route::resource('outuser','OutuserController');
    Route::resource('outpost','OutpostController');
    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
    Route::post('ajaxlike', 'PostController@ajaxlike');
});
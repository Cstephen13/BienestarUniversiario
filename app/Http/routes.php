<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'IndexController@index',
    'as' => 'index','middleware'=>'auth']);

Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){

    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'admin.categories.destroy'
    ]);
    Route::get('categories/{id}/show', [
        'uses' => 'CategoriesController@show',
        'as' => 'admin.categories.show'
    ]);
    Route::post('categories/edit', [
        'uses' => 'CategoriesController@edit',
        'as' => 'admin.categories.edit'
    ]);
    Route::post('roles/add', [
        'uses' => 'RolesController@store',
            'as' => 'admin.roles.add'
    ]);
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/destroy', [
        'uses' => 'UsersController@destroy',
        'as' => 'admin.users.destroy'
    ]);
    Route::post('user/save',[
        'uses' => 'UsersController@save',
        'as' => 'admin.users.save'
    ]);
    Route::get('user/procces',[
        'uses' => 'UsersController@GuardarDatos',
        'as' => 'admin.users.procces'
    ]);
    Route::post('users/edit', [
        'uses' => 'UsersController@update',
        'as' => 'admin.users.update'
    ]);
    Route::post('users/cambiarcontrasena',[
        'uses' =>'UsersController@cambiarContrasena',
        'as' => 'admin.users.cambiarcontrasena'
    ]);
    Route::get('users/{id}/state', [
        'uses' => 'UsersController@cambiarEstado',
        'as' => 'admin.users.state'
    ]);
});
Route::get('auth/login',[
 'uses' => 'Auth\AuthController@getLogin',
    'as' => 'auth.login'
]);
Route::post('auth/login',[
    'uses' => 'Auth\AuthController@postLogin',
    'as' => 'auth.login'
]);
Route::get('auth/logout',[
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'auth.logout'
]);
Route::post('password/email',[
    'uses'=> 'Auth\PasswordController@postEmail',
    'as'=>'auth.resetpassword']);
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['uses'=>'Auth\PasswordController@postReset','as'=>'resetpassword']);

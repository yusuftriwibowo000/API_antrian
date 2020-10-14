<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//get key .env
$router->get('/key', function () {
	return Str::random(32);
});

//get value Hello world
$router->get('/foo', function () {
	return "Hello World!";
});

//get ID via URI
// $router->get('/user/{id}', function ($id) {
// 	return "user ID = " . $id;
// });

$router->get('user/{id}', 'ExampleController@getUser');

$router->get('post/anjay1/{anjay1}/anjay2/{anjay2}', 'ExampleController@getAnjay');

//get parameter via URI
$router->get('/optional[/{param}]', function ($param = null) {
	return $param;
});

$router->get('profile', function () {
	return redirect()->route('route.profile');
});

$router->get('profile/idstack', ['as' => 'route.profile', function () {
	return "Route IDStack";
}]);


$router->get('/admin/home', ['middleware' => 'age' , function (){
	return "Old Enough";
}]);

$router->get('/fail', function () {
	return "Not yet mature";
});

//Fungsi Admin
$router->post('/register_admin', 'LoginController@register_admin');
$router->post('/login_admin', 'LoginController@login_admin');
$router->get('/users', 'LoginController@index');
$router->put('/edit_profile/{id_users}', 'LoginController@editProfile');
$router->delete('/delete_profile/{id_users}', 'LoginController@deleteProfile');

//Fungsi Karyawan
$router->post('/register_karyawan', 'LoginController@register_karyawan');
$router->post('/login_karyawan', 'LoginController@login_karyawan');
$router->get('/list_karyawan', 'LoginController@list_karyawan');
// $router->put('/edit_profile/{id_users}', 'LoginController@editProfile');
// $router->delete('/delete_profile/{id_users}', 'LoginController@deleteProfile');

//Fungsi Pelanggan
$router->post('/register_pelanggan', 'LoginController@register_pelanggan');
$router->post('/login_pelanggan', 'LoginController@login_pelanggan');
$router->get('/list_pelanggan', 'LoginController@list_pelanggan');
$router->put('/edit_password_pelanggan/{id_users}', 'LoginController@edit_password_pelanggan');
// $router->delete('/delete_profile/{id_users}', 'LoginController@deleteProfile');


//Fungsi Antrian
$router->post('/tambah_antrian', 'AntrianController@tambah_antrian');


//global route
$router->post('/logout', 'LoginController@logout');
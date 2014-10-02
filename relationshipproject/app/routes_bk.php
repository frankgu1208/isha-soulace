<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/client_admin', function()
{
	return View::make('client');
});
Route::get('/login_admin', function()
{
	return View::make('login_admin');
});
Route::get('/serviceList', function()
{
	return View::make('serviceList');
});
// Route::controller('home', 'HomeController');

Route::get('/login', function()
{
	return View::make('login');
});
Route::get('/register', function()
{
	return View::make('register');
});

Route::get('/', function()
{
    return View::make('home');
});

Route::get('/about', function()
{
    return View::make('about');
});

Route::controller('users', 'UsersController');
Route::controller('emails', 'EmailController');
Route::controller('password', 'PasswordController');


Route::get('/map', function(){
    $config = array();
    $config['center'] = 'auto';
    $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

    Gmaps::initialize($config);

    // set up the marker ready for positioning
    // once we know the users location
    $marker = array();
    Gmaps::add_marker($marker);

    $map = Gmaps::create_map();
    echo "<html><head>".$map['js']."</head><body>".$map['html']."</body></html>";
});

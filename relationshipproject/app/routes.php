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

Route::post('/registerworkshop/{id}', 'ClientsController@registerWorkshop');
# Standard User Routes
Route::group(['before' => 'sentry|serviceProviders'], function(){

    Route::get('serviceProviders/{id}', 'ServiceProvidersController@show');

    Route::group(['before' => 'verified'], function(){
        Route::resource('serviceProviders', 'ServiceProvidersController', array('except' => array('show')));
        Route::resource('workshopAdvertisements', 'WorkshopAdvertisementsController');
        Route::resource('workshops', 'WorkshopsController');

        Route::group(['prefix' => 'myclients'], function(){

            Route::get('/', 'ClientsController@getSPClients');

        });

        Route::group(['prefix' => 'myworkshops'], function(){

            Route::get('/', 'WorkshopsController@getMyWorkshops');
            Route::get('/myclients/', 'ClientsController@getClients');
            Route::post('/myclients/', 'ClientsController@searchClients');

        });
    });

});

# Admin Routes
Route::group(['before' => 'sentry|admin'], function(){

    Route::get('/map', 'MapController@getMap');
    Route::post('/map', 'MapController@postMap');

});

Route::when('admin/*', 'admin');

Route::get('ad', function(){

    return View::make('serviceProvider.advertiseWS');

});

Route::group(['prefix' => 'workshoplist'], function(){

    Route::get('/', 'WorkshopsController@getWorkshoplist');
    Route::post('/', 'WorkshopsController@searchWorkshop');

});

Route::get('/', function()
    {
        return Redirect::to('home');//View::make('home');
    });

Route::controller('services','ServiceFormController');

Route::get('services/accommodation', array('uses' => 'ServiceFormController@getAccommodation'));
Route::get('services/familylaw', array('uses' => 'ServiceFormController@getFamilyLaw'));
Route::get('services/fitnessandnutrition', array('uses' => 'ServiceFormController@getFitnessandNutrition'));
Route::get('services/mentalwellbeing', array('uses' => 'ServiceFormController@getMentalwellbeing'));
Route::get('services/financialadvice', array('uses' => 'ServiceFormController@getFinancialadvice'));
Route::get('services/options', array('uses' => 'ServiceFormController@getOptions'));
Route::get('services/mentors', array('uses' => 'ServiceFormController@getMentors'));
Route::post('services/accommodation', array('uses' => 'ServiceFormController@postAccommodation'));
Route::post('services/familylaw', array('uses' => 'ServiceFormController@postFamilyLaw'));
Route::post('services/fitnessandnutrition', array('uses' => 'ServiceFormController@postFitnessandNutrition'));
Route::post('services/mentalwellbeing', array('uses' => 'ServiceFormController@postMentalwellbeing'));
Route::post('services/financialadvice', array('uses' => 'ServiceFormController@postFinancialadvice'));
Route::post('services/options', array('uses' => 'ServiceFormController@postOptions'));
Route::post('services/mentors', array('uses' => 'ServiceFormController@postMentors'));

//Route::controller('reviews', 'ReviewController');

Route::post('reviews/website', 'WebReviewsController@storeComment');
Route::post('reviews/workshops', 'WorkshopReviewsController@storeComment');
Route::post('reviews/services', 'ServicesReviewsController@storeComment');

//Route::controller('services','ServiceFormController');
//Route::controller('reviews', 'ReviewController');

Route::get('reviews/website', array('uses' => 'ReviewController@getWebsite'));
Route::get('reviews/services', array('uses' => 'ReviewController@getServices'));
Route::get('reviews/workshops', array('uses' => 'ReviewController@getWorkshops'));

Route::controller('users', 'UsersController');


//Route::resource('tickets', 'TicketsController');
//Route::resource('clients', 'ClientsController');
//Route::resource('Administrators', 'AdministratorsController');
//Route::get('password/remind', array('uses' => 'PasswordController@getRemind'));
//Route::get('password/reset', array('uses' => 'PasswordController@getReset'));
//Route::post('password/remind', array('uses' => 'PasswordController@postRemind'));
//Route::post('/password/reset/', array('uses' => 'PasswordController@postReset'));
Route::controller('password', 'PasswordController');
Route::get( '/activate/{activationCode}', array( 'uses' => 'UsersController@activate' )); 

Route::controller('/', 'HomeController');
//Route::controller('emails', 'EmailController');
//Route::controller('password', 'PasswordController');
//

/* HTML Macros */
HTML::macro('smartNavMenu', function($url, $text) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return '<li'.$class.'><a href="'.URL::to($url).'">'.$text.'</a></li>';
});
HTML::macro('startSmartDropdown', function($url) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return ''.$class.' class="dropdown"';
});


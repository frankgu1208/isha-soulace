<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


    protected $layout = "layouts.main";
    
	public function getHome()
	{
        //$this->layout->title = 'Isha SoulAce - Home';
        $title = 'Isha SoulAce - Home';
        //$this->layout->content = View::make('home');
        return View::make('home')->with('title', $title);
        
	}

	public function getAbout()
	{
        $this->layout->title = 'About Us - Isha SoulAce';
        $this->layout->content = View::make('about');

	}

}

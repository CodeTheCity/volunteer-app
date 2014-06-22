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

	public function showWelcome()
	{
		if (Sentry::check()){
		$user = Sentry::getUser();

		//for an oppurtunity if and skills match then check against location
		$skillmatches = Skill::with('opportunities')->with('users')->has('opportunities')->has('users')->get();	
		//if the oppurtunity and location match send email and display in Matches on feed

		//array to store docs without tags
	
		$usermatches = User::with('locations')->has('locations')->get();

		$opportunitymatches = Opportunity::with('location')->with('skills')->get();		

		//return $skillmatches;

		return View::make('hello', compact('skillmatches', 'opportunitymatches'));

		}
		else {
			
			return View::make('hello');
		}
	
	}
}
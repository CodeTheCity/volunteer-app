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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));


/*
|-----------------------------------------------------------------------
| User
|-----------------------------------------------------------------------
*/

Route::controller('users', 'UserController');

/*
|-----------------------------------------------------------------------
| Groups
|-----------------------------------------------------------------------
*/

Route::resource('groups', 'GroupController');


/*
|-----------------------------------------------------------------------
| Cities
|-----------------------------------------------------------------------
*/

Route::resource('cities', 'CitiesController');

/*
|-----------------------------------------------------------------------
| Testing
|-----------------------------------------------------------------------
*/

Route::get('/test', function()
{
	$testsms = Sms::send(array('to'=>'+447811031112', 'text'=>'Hello ;)'));

	return View::make('hello');

});

Route::get('/random', function()
{
	$random = date('Yms') . rand(10*45, 19*98);
	return $random;
});

Route::resource('skills', 'SkillsController');

Route::post('/user/{id}/add', array('as' => 'skills.add', 'uses' => 'SkillsController@useradd'));

Route::resource('locations', 'LocationsController');

Route::resource('opportunities', 'OpportunitiesController');

Route::group(array('prefix' => 'v1', 'before' => 'api.auth|api.limit'), function()
{

	Route::get('locations', function()
	{
		$locations = Auth::user()->locations;

		return Response::json($locations->toArray());
	});

});




Route::resource('profiles', 'ProfilesController');
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

/*
|-----------------------------------------------------------------------
| Skills
|-----------------------------------------------------------------------
*/

Route::resource('skills', 'SkillsController');

Route::post('/user/{id}/add', array('as' => 'skills.add', 'uses' => 'SkillsController@useradd'));

/*
|-----------------------------------------------------------------------
| Locations
|-----------------------------------------------------------------------
*/

Route::resource('locations', 'LocationsController');

/*
|-----------------------------------------------------------------------
| Opportunities
|-----------------------------------------------------------------------
*/

Route::resource('opportunities', 'OpportunitiesController');

Route::group(array('prefix' => 'v1'), function()
{

	Route::get('skills', function()
	{
		$skills = Skill::all();
		return Response::json($skills->toArray(), 201);
	});

	Route::get('opportunities', function()
	{
		$opportunities = Opportunity::all();
		return Response::json($opportunities->toArray(), 201);
	});

	Route::get('skill-matches', function()
	{
		$skillmatches = Skill::with('opportunities')->with('users')->has('opportunities')->has('users')->get();	
		return Response::json($skillmatches->toArray(), 201);
	});

	Route::get('opportunity-matches', function()
	{
		$opportunitymatches = Opportunity::with('location')->with('skills')->get();	
		return Response::json($opportunitymatches->toArray(), 201);
	});

});

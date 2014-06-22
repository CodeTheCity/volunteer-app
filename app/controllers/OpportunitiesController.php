<?php

class OpportunitiesController extends BaseController {

	/**
	 * Opportunity Repository
	 *
	 * @var Opportunity
	 */
	protected $opportunity;

	public function __construct(Opportunity $opportunity)
	{
		$this->opportunity = $opportunity;

		$user = Sentry::getUser();

		View::share('user', $user);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$opportunities = $this->opportunity->all();

		return View::make('opportunities.index', compact('opportunities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$locations = Location::lists('location_name', 'id');

		$skills = Skill::all();

		return View::make('opportunities.create', compact('locations', 'skills'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$input = [
			'opportunity_title' => Input::get('opportunity_title'),
			'opportunity_detail' => Input::get('opportunity_detail'),
			'opportunity_travel_information' => Input::get('opportunity_travel_information'),
			'opportunity_date' => Input::get('opportunity_date'),
			'location_id' => Input::get('location_id'),
			'user_id' => Input::get('user_id')
			];

		$opp_skills = Input::get('skills');

		$validation = Validator::make($input, Opportunity::$rules);

		if ($validation->passes())
		{
			$opportunity_object = $this->opportunity->create($input);
			if(is_array($opp_skills))
			{
			Opportunity::find($opportunity_object->id)->skills()->attach($opp_skills);
			}	

			return Redirect::route('opportunities.index');
		}

		return Redirect::route('opportunities.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$opportunity = $this->opportunity->findOrFail($id);

		$group = Opportunity::find($opportunity->id);
		$skills = Skill::all();
		$assigned = $group->skills->lists('id');

		return View::make('opportunities.show', compact('opportunity','group', 'skills', 'assigned'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$opportunity = $this->opportunity->find($id);
		$locations = Location::lists('location_name', 'id');

		$group = Opportunity::find($id);
		$skills = Skill::all();
		$assigned = $group->skills->lists('id');

		if (is_null($opportunity))
		{
			return Redirect::route('opportunities.index');
		}

		return View::make('opportunities.edit', compact('opportunity', 'locations', 'group', 'skills', 'assigned'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = [
			'opportunity_title' => Input::get('opportunity_title'),
			'opportunity_detail' => Input::get('opportunity_detail'),
			'opportunity_travel_information' => Input::get('opportunity_travel_information'),
			'opportunity_date' => Input::get('opportunity_date'),
			'location_id' => Input::get('location_id'),
			'user_id' => Input::get('user_id')
		];

		$opp_skills = Input::get('skills');

		$validation = Validator::make($input, Opportunity::$rules);

		if ($validation->passes())
		{
			$opportunity_object = $this->opportunity->find($id);
			$opportunity_object->update($input);
			if(is_array($opp_skills))
			{
			Opportunity::find($opportunity_object->id)->skills()->sync($opp_skills);
			}	


			return Redirect::route('opportunities.show', $id);
		}

		return Redirect::route('opportunities.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->opportunity->find($id)->delete();

		return Redirect::route('opportunities.index');
	}

}

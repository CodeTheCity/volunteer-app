<?php

class Community_eventsController extends BaseController {

	/**
	 * Community_event Repository
	 *
	 * @var Community_event
	 */
	protected $community_event;

	public function __construct(Community_event $community_event)
	{
		$this->community_event = $community_event;
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
		$community_events = $this->community_event->all();

		return View::make('community_events.index', compact('community_events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$locations = Location::lists('location_name', 'id');
		return View::make('community_events.create', compact('locations'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Community_event::$rules);

		if ($validation->passes())
		{
			$this->community_event->create($input);

			return Redirect::route('community_events.index');
		}

		return Redirect::route('community_events.create')
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
		$community_event = $this->community_event->findOrFail($id);

		return View::make('community_events.show', compact('community_event'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$community_event = $this->community_event->find($id);

		$locations = Location::lists('location_name', 'id');

		if (is_null($community_event))
		{
			return Redirect::route('community_events.index');
		}

		return View::make('community_events.edit', compact('community_event','locations'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Community_event::$rules);

		if ($validation->passes())
		{
			$community_event = $this->community_event->find($id);
			$community_event->update($input);

			return Redirect::route('community_events.show', $id);
		}

		return Redirect::route('community_events.edit', $id)
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
		$this->community_event->find($id)->delete();

		return Redirect::route('community_events.index');
	}

}

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
		return View::make('opportunities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Opportunity::$rules);

		if ($validation->passes())
		{
			$this->opportunity->create($input);

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

		return View::make('opportunities.show', compact('opportunity'));
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

		if (is_null($opportunity))
		{
			return Redirect::route('opportunities.index');
		}

		return View::make('opportunities.edit', compact('opportunity'));
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
		$validation = Validator::make($input, Opportunity::$rules);

		if ($validation->passes())
		{
			$opportunity = $this->opportunity->find($id);
			$opportunity->update($input);

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

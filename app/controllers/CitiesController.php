<?php

class CitiesController extends BaseController {

	/**
	 * City Repository
	 *
	 * @var City
	 */
	protected $city;

	public function __construct(City $city)
	{
		$this->city = $city;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities = $this->city->all();

		return View::make('cities.index', compact('cities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input  = [
			'city_name' => Input::get('city_name'),
			'image' => Input::file('image')->getClientOriginalName()
		];

		$validation = Validator::make($input, City::$rules);

		if ($validation->passes())
		{

			$destinationPath = '/uploads/images/';
			$filename = str_random(12) . Input::file('image')->getClientOriginalName();
			$upload_success = Input::file('image')->move(public_path() . $destinationPath, $filename);

			$this->city->create($input);	

			return Redirect::route('cities.index');
		}

		return Redirect::route('cities.create')
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
		$city = $this->city->findOrFail($id);

		return View::make('cities.show', compact('city'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$city = $this->city->find($id);

		if (is_null($city))
		{
			return Redirect::route('cities.index');
		}

		return View::make('cities.edit', compact('city'));
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
		$validation = Validator::make($input, City::$rules);

		if ($validation->passes())
		{
			$city = $this->city->find($id);
			$city->update($input);

			return Redirect::route('cities.show', $id);
		}

		return Redirect::route('cities.edit', $id)
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
		$this->city->find($id)->delete();

		return Redirect::route('cities.index');
	}

}

<?php

class SkillsController extends BaseController {

	/**
	 * Skill Repository
	 *
	 * @var Skill
	 */
	protected $skill;

	public function __construct(Skill $skill)
	{
		$this->skill = $skill;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$skills = $this->skill->all();

		return View::make('skills.index', compact('skills'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('skills.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Skill::$rules);

		if ($validation->passes())
		{
			$this->skill->create($input);

			return Redirect::route('skills.index');
		}

		return Redirect::route('skills.create')
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
		$skill = $this->skill->findOrFail($id);

		return View::make('skills.show', compact('skill'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$skill = $this->skill->find($id);

		if (is_null($skill))
		{
			return Redirect::route('skills.index');
		}

		return View::make('skills.edit', compact('skill'));
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
		$validation = Validator::make($input, Skill::$rules);

		if ($validation->passes())
		{
			$skill = $this->skill->find($id);
			$skill->update($input);

			return Redirect::route('skills.show', $id);
		}

		return Redirect::route('skills.edit', $id)
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
		$this->skill->find($id)->delete();

		return Redirect::route('skills.index');
	}

	public function useradd($id)
	{
		$input = Input::all();

		$user_id = $input['user_id'];

		$random = date('Yms') . rand(10*45, 19*98);

		$stamp_id = DB::table('guestlist_user')->insertGetId(array('user_id' => $user_id, 'guestlist_id' => $id, 'reference' => $random, 'attended' => '0'));

		$data['email'] = Sentry::getUser()->email;
		$data['reference'] = $random;
		$data['guestlist_id'] = $id;
		$data['stamp_id'] = $stamp_id;

		Mail::send('emails.stamp.add', $data, function($m) use($data)
		{
		    $m->to($data['email'])->subject('Confirmation of Guestlist');
		});

		Session::flash('success', 'You have been added to the guestlist. Check your emails');
		return Redirect::route('guestlists.show', $id);
	}

}

<?php

class Opportunity extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'opportunity_title' => 'required',
		'opportunity_detail' => 'required',
		'opportunity_travel_information' => 'required',
		'opportunity_date' => 'required',
		'location_id' => 'required',
		'user_id' => 'required',
	);

	public function location() {

        return $this->belongsTo('Location');
	}

	public function skills() {

        return $this->belongsToMany('Skill');
	}

}

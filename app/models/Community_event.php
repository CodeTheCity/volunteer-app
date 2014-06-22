<?php

class Community_event extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'community_event_title' => 'required',
		'community_event_detail' => 'required',
		'community_event_date' => 'required',
		'location_id' => 'required',
		'user_id' => 'required'
	);

	public function location() {

        return $this->belongsTo('Location');
	}

}

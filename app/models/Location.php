<?php

class Location extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'location_name' => 'required',
		'city_id' => 'required'
	);


	public function city() {

        return $this->hasOne('City', 'city_id');
	}

}

<?php

class City extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'city_name' => 'required'
	);
}

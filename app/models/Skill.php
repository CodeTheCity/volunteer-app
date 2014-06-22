<?php

class Skill extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'skill_name' => 'required'
	);

	public function profile() {

	}

	public function opportunities() {

        return $this->belongsToMany('Opportunity');
	}

	public function users() {

        return $this->belongsToMany('User');
	}
}

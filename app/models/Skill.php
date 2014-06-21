<?php

class Skill extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'skill_name' => 'required'
	);

	public function users() {

        return $this->belongsToMany('User', 'skill_user')->withPivot('id');
	}

	public function opportunities() {

        return $this->belongsToMany('Opportunity', 'oppurtunity_skill')->withPivot('id');
	}
}

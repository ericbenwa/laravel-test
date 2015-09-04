<?php

class Author extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name'=>'required|min:2',
		'bio'=>'required|min:10'
	);

	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
}

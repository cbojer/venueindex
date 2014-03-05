<?php

class Venue extends \Eloquent {
    protected $guarded = [];

    public static $createRules = [];

    public static $updateRules = [];


    public function validateForCreation($input) {

    	$validation = Validator::make($input, static::$createRules);

    	if($validation->passes()) return true;

    	$errors = $validation->messages();

    	return $errors;
    
    }

    public function validateForUpdate($input, $id) {
        $validation = Validator::make($input, static::$updateRules);

        if($validation->passes()) return true;

        $errors = $validation->messages();

        return $errors;
    
    }
}
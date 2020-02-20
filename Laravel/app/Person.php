<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Person extends Model
{
	protected $guarded = ["id"];
	public static $rules = [
		"name" => "required",
		"mail" => "email",
		"age" => "integer",
	];

	public function newCollection(array $models=[]){
		return new MyCollection($models);
	}

	public function getNameAttribute($value){
		return strtoupper($value);
	}

	public function getNameAndIdAttribute(){
		return $this->name . '[id=' . $this->id . ']';
	}

	public function getNameAndMailAttribute(){
		return $this->name . '[mail=' . $this->mail . ']';
	}

	public function getNameAndAgeAttribute(){
		return $this->name . '[age=' . $this->age . ']';
	}

	public function getAllDataAttribute(){
		return $this->name . '(' . $this->age . ')' . '[mail=' . $this->mail . ']';
	}

	public function setNameAttribute($value){
		return strtoupper($value);
		$this->attributes["name"] = strtoupper($value);
	}


}

class MyCollection extends Collection{
	public function fields(){
		$item = $this->first();
		return array_keys($item->toArray());
	}
}

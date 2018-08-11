<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use User,Auth;

class Blog extends Model
{
	/**
     * Get a request data for an incoming input data.
     *
     * @param  array  $data
     * @return validator object.
     */
    public function checkInputValidation($data)
	{
		
		$validator 	= Validator::make($data, [
           'topic'   => 'required|max:255',
           'post'    => 'required'
		]);
		
		return $validator;
		
	}

	/**
     * Get a request data for an incoming input data and if record is for update then id also.
     *
     * @param  array  $data
     * @return true if record save or edit.
     */	
	
	public function saveRecord(array $data,$id=null)
	{
		
		if($id)
			$editObj      = $this->find($id);
		else
			$editObj 	  = $this;
		
		$editObj->topic 	 = $data['topic'];
	    $editObj->post  	 = $data['post'];
		$editObj->author_id  = Auth::user()->id;
		
		return $editObj->save();
	}
	
	
		
		
		
}

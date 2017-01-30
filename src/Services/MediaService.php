<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use BeyondPlus\CmsLibrary\Models\Bp_media;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class MediaService
{
 	public function search($where , $paginate = Limit::NORMAL){
	    $array = Bp_media::all();
	    $array = $array->toArray();
	    $query = Bp_media::latest();
	    foreach ($where as $key => $value) {
	      $key = ltrim($key, Limit::QUERY);
	      if(array_key_exists($key, $array[0])){
	        if($key == 1){
	            $query = $query->Where($key, 'like', '%'.urldecode($value).'%');
	        } else {
	            $query = $query->orWhere($key, 'like', '%'.urldecode($value).'%');
	        }
	      } else {

	      }
	    }
	    $query = $query->paginate($paginate);
	    return $query;
	 }
   
}

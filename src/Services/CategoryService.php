<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use BeyondPlus\CmsLibrary\Models\Bp_category;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class CategoryService
{
  public function category($per_page){
    $query['data'] = Bp_category::orderBy('category_name')->paginate($per_page);
    $query['all']= Bp_category::select('category_name','category_id')->get();
    return $query;
  }

  public function search($where , $paginate = Limit::NORMAL){
    $array = Bp_category::get();
    $array = $array->toArray();
    $query = Bp_category::orderBy('category_name', 'desc');
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

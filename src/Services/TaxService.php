<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use BeyondPlus\CmsLibrary\Models\Bp_tax;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class TaxService
{
  public function taxonomy($per_page){
    $query['data'] = Bp_tax::orderBy('tax_name')->paginate($per_page);
    $query['all']= Bp_tax::select('tax_name','tax_id')->get();
    return $query;
  }

  public function search($where , $paginate = Limit::NORMAL){
    $array = Bp_tax::get();
    $array = $array->toArray();
    $query = Bp_tax::orderBy('tax_name', 'desc');
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

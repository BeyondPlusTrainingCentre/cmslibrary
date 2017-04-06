<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use BeyondPlus\CmsLibrary\Models\Bp_custom;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class CustomService
{
  public function customs($per_page){
    $query['data'] = Bp_custom::latest()->paginate($per_page)->all();
    return $query;
  }
   
}

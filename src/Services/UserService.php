<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use App\User;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class UserService
{
  public function users($per_page){
    $query['data'] = User::latest()->simplePaginate($per_page);
    return $query;
  }
   
}

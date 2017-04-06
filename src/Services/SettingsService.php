<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use BeyondPlus\CmsLibrary\Models\Bp_options;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class SettingsService
{
  public function settings($per_page){
    $query = Bp_options::orderBy('option_id')->simplePaginate($per_page);
    return $query;
  }
   
}

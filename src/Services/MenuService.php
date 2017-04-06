<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use BeyondPlus\CmsLibrary\Models\Bp_post;
use BeyondPlus\CmsLibrary\Models\Bp_menu;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class MenuService
{
  public function menu($per_page){
  	$query['menu'] = Bp_menu::where('parent_id','>',0)->orderBy('menu_id', 'desc')->get();
    $query['pages']=  Bp_post::select('id','title')->where('post_type','page')->orderBy('id', 'desc')->get();
    $query['posts']=  Bp_post::select('id','title')->where('post_type','post')->orderBy('id', 'desc')->get();
    return $query;
  }
   
}

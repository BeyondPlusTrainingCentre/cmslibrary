<?php

namespace BeyondPlus\CmsLibrary\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use BeyondPlus\CmsLibrary\Models\Bp_category;
use BeyondPlus\CmsLibrary\Models\Bp_term;
use BeyondPlus\CmsLibrary\Models\Bp_post;
use BeyondPlus\CmsLibrary\Models\Bp_relationship;
use BeyondPlus\CmsLibrary\Models\User;
use BeyondPlus\CmsLibrary\Controllers\Utils\Limit;

class PostService
{
  public function post($per_page){
    $query['data']= Bp_post::where('post_type','=', 'post')->orderBy('updated_at','desc')->paginate($per_page);
    $query['category'] = Bp_category::orderBy('category_name')->get();
    return $query;
  }

  public function page($per_page){
    $query['data']= Bp_post::where('post_type','=', 'page')->orderBy('updated_at','desc')->paginate($per_page);
    $query['category'] = Bp_category::orderBy('category_name')->get();
    return $query;
  }

  public function detail($id){
    $query['data']= Bp_post::where('post_type', '=' , 'post')->where('id' , '=' ,  $id)->orderBy('updated_at','desc')->get();
    $query['post_category']= Bp_relationship::where('post_id', '=' , $id)->orderBy('updated_at','desc')->get();
    $query['category'] = Bp_category::orderBy('category_name')->get();
    return $query;
  }

  public function search($where , $paginate = Limit::NORMAL){
    $array = Bp_post::get();
    $array = $array->toArray();
    $query = Bp_post::orderBy('title', 'desc');
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

<?php

namespace BeyondPlus\CmsLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Bp_category extends Model
{
    protected $primaryKey = 'category_id';
    protected $table = 'bp_category';

    protected $fillable = [
    	'category_id','category_name', 'parent_id','category_link','category_icon', 'category_dash', 'category_active'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Bp_post');
    }

}
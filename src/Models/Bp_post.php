<?php

namespace BeyondPlus\CmsLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Bp_post extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'bp_post';

    protected $fillable = [

    	 'title', 'body','featured','featured_img','post_link','post_type', 'post_template','post_weight','post_active','staff_id','created_at'

    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function category()
    {
        return $this->belongsTo('BeyondPlus\CmsLibrary\Models\Category');
    }

    public function categories()
    {
        return $this->belongsToMany('BeyondPlus\CmsLibrary\Models\Bp_category', 'bp_relationship' ,'post_id', 'post_id');
    }


}

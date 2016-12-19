<?php

namespace BeyondPlus\CmsLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Bp_slider extends Model
{
    protected $primaryKey = 'slider_id';
    protected $table = 'bp_slider';

    protected $fillable = [
    	 'slider_name','slider_link','slider_weight','slider_description', 'slider_type','staff_id','created_at','updated_at'
    ];



}

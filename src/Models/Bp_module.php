<?php

namespace BeyondPlus\CmsLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Bp_module extends Model
{
    protected $primaryKey = 'module_id';
    protected $table = 'bp_modules';

    protected $fillable = [
    	 'module_name','module_link','module_weight', 'module_icon', 'parent_id','staff_id','created_at','updated_at'
    ];

    public function child() {
    	return $this->hasMany('BeyondPlus\CmsLibrary\Models\Bp_module','parent_id');
    }
}

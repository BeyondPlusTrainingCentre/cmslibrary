<?php

namespace BeyondPlus\CmsLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $primaryKey = 'que_id';
    protected $table = 'comments';

    protected $fillable = [
    	 'comment_id', 'customer_id','comment_value','comment_active', 'staff_id','created_at','updated_at'
    ];

  	public function users()
    {
        return $this->hasMany(User::class,'id', 'customer_id');
    }
}

<?php

namespace BeyondPlus\CmsLibrary\Models;

use Illuminate\Database\Eloquent\Model;

class Bp_languages extends Model
{
    protected $primaryKey = 'language_id';
    protected $table = 'bp_languages';

    protected $fillable = [
    	'language_id', 'language_iso', 'language_value'
    ];
}

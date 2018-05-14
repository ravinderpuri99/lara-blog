<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function setLiveAttribute($value)
    {
    	$this->attributes['live'] = (boolean)($value);
    }
}

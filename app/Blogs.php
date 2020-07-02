<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //
    protected $fillable=['title','image','content','user_id'];
}

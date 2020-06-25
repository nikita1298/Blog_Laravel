<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //
    protected $fillable=['image','content','user_id'];
}

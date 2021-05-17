<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Menu extends Model
{
    use softDeletes;
    protected $fillable = ['name','parent_id','slug'];
}

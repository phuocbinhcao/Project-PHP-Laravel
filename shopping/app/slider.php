<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Slider extends Model
{
    use softDeletes;
    protected $guarded =[];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function permissionsChildrent(){
        return $this->hasMany(Permission::class, 'parent_id');
    }
}

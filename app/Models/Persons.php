<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $table  = "personas";

    public function getAuthPassword() {
        return $this->attributes['per_con'];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonExperience extends Model
{
    protected $table = "personas_exp";

    protected $primaryKey = "exp_cod";

    public $timestamps = false;

    protected $fillable = [
        "exp_cod",
        "exp_emp",
        "exp_car",
        "exp_ini",
        "exp_ffi",
        "exp_mot",
        "exp_des",
        "per_cod",
    ];
}

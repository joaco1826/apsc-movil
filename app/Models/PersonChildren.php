<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonChildren extends Model
{
    protected $table = "personas_hijos";

    protected $fillable = [
        "hij_cod",
        "hij_nom",
        "hij_ocu",
        "hij_par",
        "hij_eda",
        "per_cod",
    ];
}

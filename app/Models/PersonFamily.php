<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonFamily extends Model
{
    protected $table = "personas_fam";

    protected $fillable = [
        "fam_cod",
        "fam_nom",
        "fam_par",
        "fam_tel",
        "fam_ocu",
        "per_cod",
    ];
}

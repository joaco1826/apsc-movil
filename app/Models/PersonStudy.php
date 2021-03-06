<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonStudy extends Model
{
    protected $table = "personas_estudios";

    protected $primaryKey = "est_cod";

    public $timestamps = false;

    protected $fillable = [
        "est_cod",
        "est_ent",
        "est_pro",
        "est_fec",
        "per_cod",
    ];
}

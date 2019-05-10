<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    protected $table = "postulaciones";

    protected $primaryKey = "pos_cod";

    protected $fillable = [
        "per_cod",
        "req_cod",
        "pos_fec",
        "pos_est"
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "postulaciones";

    protected $fillable = [
        "per_cod",
        "req_cod",
        "pos_fec",
        "pos_est"
    ];

    public function persons() {
        return $this->hasMany("App\Models\Person", "per_cod", "per_cod");
    }
}

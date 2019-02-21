<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "muni";

    protected $fillable = [
        "mun_cod",
        "dep_cod",
        "mun_cdg",
        "mun_nom",
        "mun_cor"
    ];

    public function state() {
        return $this->belongsTo("App\Models\State", "dep_cod", "dep_cod");
    }
}

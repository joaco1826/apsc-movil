<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "dpto";

    protected $fillable = [
        "dep_cod",
        "dep_cdg",
        "dep_nom"
    ];

    public function persons() {
        return $this->hasMany("App\Models\City", "dep_cod", "dep_cod");
    }
}

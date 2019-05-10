<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    protected $table = "requisiciones";

    protected  $primaryKey = "req_cod";

    public function company()
    {
        return $this->belongsTo("App\Models\Type", "tip_cod", "tip_cod");
    }

    public function city()
    {
        return $this->belongsTo("App\Models\City", "mun_cod", "mun_cod");
    }
}

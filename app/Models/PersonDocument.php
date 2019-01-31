<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonDocument extends Model
{
    protected $table = "personas_documentos";

    protected $fillable = [
        "doc_cod",
        "tdo_cod",
        "per_cod",
        "doc_rut",
        "doc_est"
    ];
}

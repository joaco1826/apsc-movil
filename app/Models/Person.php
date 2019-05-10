<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table  = "personas";

    protected  $primaryKey = "per_cod";

    protected $fillable = [
        "per_cod",
        "per_fot",
        "per_tid",
        "per_ide",
        "per_pno",
        "per_sno",
        "per_pap",
        "per_sap",
        "per_ema",
        "per_con",
        "per_fna",
        "per_pai",
        "per_cna",
        "per_fex",
        "per_cex",
        "per_dir",
        "per_bar",
        "per_tel",
        "per_ato",
        "per_cel",
        "per_ciu",
        "per_gsa",
        "per_pro",
        "per_mcf",
        "per_sex",
        "per_civ",
        "per_ura",
        "per_eda",
        "per_pes",
        "per_tca",
        "per_tpa",
        "per_tza",
        "per_gso",
        "per_get",
        "per_her",
        "per_hij",
        "per_pac",
        "per_nlm",
        "per_dis",
        "per_lco",
        "per_cat",
        "per_cju",
        "per_eps",
        "per_afp",
        "per_arl",
        "per_cjc",
        "per_asp",
        "per_tur",
        "per_din",
        "per_fre",
        "per_otr",
        "per_niv",
        "per_tpr",
        "per_est",
        "per_obs",
        "est_cod",
        "per_exp",
        "per_fecm",
        "car_cod",
        "per_fin",
        "per_loc"
    ];
}

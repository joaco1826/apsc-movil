<?php

namespace App\Http\Controllers;

use App\Models\Postulation;
use Illuminate\Http\Request;

class VacantController extends Controller
{
    public function postulate(Request $request) {
        request()->validate([
            "req_cod" => "required|integer"
        ]);

        $auth = session()->get('person');

        Postulation::create([
            "per_cod" => $auth->per_cod,
            "req_cod" => $request->req_cod,
            "pos_fec" => date("Y-m-d"),
            "pos_est" => "1"
        ]);

        return response(json_encode(["message" => "Saved"]), 201)->header('Content-Type', 'text/json');

    }
}

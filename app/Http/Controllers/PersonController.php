<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        $fecha = date("Y-m-d");
        $vacantes = DB::select("SELECT r.req_cod,r.req_til
                FROM requisiciones r WHERE r.req_fex >= '$fecha' ORDER BY r.req_til");
        $fuentes = Type::where('tip_tip', 'rec')->orderBy('tip_des')->get();
        return view('register', ['fuentes' => $fuentes, 'vacantes' => $vacantes]);
    }

    public function login(Request $request)
    {
        request()->validate([
            "user" => "required|string|max:15",
            "password" => "required|string|max:15",
        ]);

        $person = Person::where(['per_ide' => $request->user, 'per_est' => 1])->first();
        if ($person) {
            if ($person->per_con === $request->password) {
                session(['person' => $person]);
                return response(json_encode(['message' => 'Usuario autenticado']), 200)->header('Content-Type', 'text/json');
            } else {
                return response(json_encode(['message' => 'Usuario y/o contraseña incorrectos.']), 400)->header('Content-Type', 'text/json');
            }
        } else {
            return response(json_encode(['message' => 'El usuario no existe.']), 400)->header('Content-Type', 'text/json');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
           "per_tid" => "required|integer",
           "per_ide" => "required|string|max:15",
           "per_pno" => "required|string|max:30",
           "per_sno" => "required|string|max:30",
           "per_pap" => "required|string|max:30",
           "per_sap" => "required|string|max:30",
           "per_ema" => "required|string|max:60",
           "per_fna" => "required|date",
           "per_cna" => "required|integer",
           "per_fex" => "required|date",
           "per_cex" => "required|integer",
           "per_dir" => "required|string|max:80",
           "per_bar" => "required|string|max:40",
           "per_tel" => "required|string|max:30",
           "per_ato" => "required|string|max:30",
           "per_cel" => "required|string|max:30",
           "per_ciu" => "required|integer",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

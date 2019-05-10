<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\City;
use App\Models\Vacant;
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

    public function registerPerson(Request $request)
    {
        request()->validate([
            "per_pno" => "required|string|max:30",
            "per_pap" => "required|string|max:30",
            "per_ide" => "required|string|max:30|unique:personas",
            "per_ema" => "required|email|max:60|unique:personas",
            "per_cel" => "required|string|max:30",
            "per_fre" => "required|integer",
            "req_cod" => "required|integer",
        ]);

        $person = Person::create([
            "per_pno" => $request->per_pno,
            "per_sno" => $request->per_sno,
            "per_pap" => $request->per_pap,
            "per_sap" => $request->per_sap,
            "per_ide" => $request->identificacion,
            "per_ema" => $request->email,
            "per_cel" => $request->per_cel,
            "per_fre" => $request->per_fre,
            "per_con" => $request->identificacion,
            "per_est" => 1,
            "per_fin" => date("Y-m-d H:i:s")
        ]);
        if ($person) {
            session(['person' => $person]);
            Application::create([
                "per_cod" => $person->id,
                "req_cod" => $request->req_cod,
                "pos_fec" => date("Y-m-d"),
                "pos_est" => 1
            ]);
            return response(json_encode($person), 201)->header('Content-Type', 'text/json');
        } else {
            return response(json_encode(['message' => 'A ocurrido algo inesperado, por favor intente más tarde']), 400)->header('Content-Type', 'text/json');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person', [
            "types" => Type::where("tip_tip", "identificacion")->get(),
            "cities" => City::orderBy('mun_nom')->get(),
            "stratas" => Type::where("tip_tip", "eto")->get(),
            "bloods" => Type::where("tip_tip", "sangre")->get(),
            "genders" => Type::where("tip_tip", "sexo")->get(),
            "civil" => Type::where("tip_tip", "civil")->get(),
            "academic" => Type::where("tip_tip", "niv")->get(),
            "height" => Type::where("tip_tip", "est")->get(),
            "shirt_size" => Type::where("tip_tip", "cam")->get(),
            "pants_size" => Type::where("tip_tip", "pant")->get(),
            "shoes_size" => Type::where("tip_tip", "zap")->get(),
            "shoes_size" => Type::where("tip_tip", "zap")->get(),
            "auth" => session()->get('person'),
        ]);
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
           "per_pap" => "required|string|max:30",
           "per_ema" => "required|string|max:60",
           "per_fna" => "required|date",
           "per_cna" => "required|integer",
           "per_fex" => "required|date",
           "per_cex" => "required|integer",
           "per_dir" => "required|string|max:80",
           "per_bar" => "required|string|max:40",
           "per_cel" => "required|string|max:30",
           "per_ciu" => "required|integer",
        ]);

        $auth = session()->get('person');

        Person::find($auth->per_cod)->update($request->all());
        $person = Person::find($auth->per_cod);
        session()->put('person', $person);
        if ($person) {
            return response(json_encode($person), 201)->header('Content-Type', 'text/json');
        } else {
            return response(json_encode(['message' => 'A ocurrido algo inesperado, por favor intente más tarde']), 400)->header('Content-Type', 'text/json');
        }
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

    public function vacants()
    {
        return view('vacants', [
            "vacants" => Vacant::where("req_fex", ">=", date("Y-m-d"))->orderByDesc("req_fec")->get()
        ]);
    }

    public function vacant($id)
    {
        return view('vacant', [
            "vacant" => Vacant::find($id)
        ]);
    }
}

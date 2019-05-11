<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\City;
use App\Models\PersonExperience;
use App\Models\PersonFamily;
use App\Models\PersonStudy;
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

    public function logout()
    {
        session()->flush();
        return redirect("/");
    }

    public function studies()
    {
        $auth = session()->get("person");
        return view("studies", [
            "studies" => PersonStudy::where("per_cod", $auth->per_cod)->orderByDesc("est_cod")->get()
        ]);
    }

    public function studies_create(Request $request)
    {
        request()->validate([
            "est_ent" => "required|string|min:3|max:255",
            "est_pro" => "required|string|min:3|max:255",
            "est_fec" => "required|date"
        ]);

        $auth = session()->get('person');

        PersonStudy::create([
            "per_cod" => $auth->per_cod,
            "est_ent" => $request->est_ent,
            "est_pro" => $request->est_pro,
            "est_fec" => $request->est_fec
        ]);

        return response(json_encode(["message" => "Saved"]), 201)->header('Content-Type', 'text/json');

    }

    public function studies_delete($id)
    {

        $auth = session()->get('person');

        $study = PersonStudy::where(["per_cod" => $auth->per_cod, "est_cod" => $id])->first();
        $study->delete();

        return redirect("/studies");

    }

    public function experiencies()
    {
        $auth = session()->get("person");
        return view("experiencies", [
            "experiencies" => PersonExperience::where("per_cod", $auth->per_cod)->orderByDesc("exp_cod")->get()
        ]);
    }

    public function experiencies_create(Request $request)
    {
        request()->validate([
            "exp_emp" => "required|string|min:3|max:255",
            "exp_car" => "required|string|min:3|max:255",
            "exp_ini" => "required|date",
            "exp_mot" => "required|string|min:3|max:255",
            "exp_des" => "required|string|min:3"
        ]);

        $auth = session()->get('person');

        PersonExperience::create([
            "per_cod" => $auth->per_cod,
            "exp_emp" => $request->exp_emp,
            "exp_car" => $request->exp_car,
            "exp_ini" => $request->exp_ini,
            "exp_ffi" => $request->exp_ffi,
            "exp_mot" => $request->exp_mot,
            "exp_des" => $request->exp_des
        ]);

        return response(json_encode(["message" => "Saved"]), 201)->header('Content-Type', 'text/json');

    }

    public function experiencies_delete($id)
    {

        $auth = session()->get('person');

        $experiencie = PersonExperience::where(["per_cod" => $auth->per_cod, "exp_cod" => $id])->first();
        $experiencie->delete();

        return redirect("/experiencies");

    }

    public function references()
    {
        $auth = session()->get("person");
        return view("references", [
            "references" => PersonFamily::where("per_cod", $auth->per_cod)->orderByDesc("fam_cod")->get()
        ]);
    }

    public function references_create(Request $request)
    {
        request()->validate([
            "fam_nom" => "required|string|min:3|max:100",
            "fam_par" => "required|string|min:3|max:50",
            "fam_tel" => "required|string|min:7|max:30",
            "fam_ocu" => "required|string|min:3|max:30"
        ]);

        $auth = session()->get('person');

        PersonFamily::create([
            "per_cod" => $auth->per_cod,
            "fam_nom" => $request->fam_nom,
            "fam_par" => $request->fam_par,
            "fam_tel" => $request->fam_tel,
            "fam_ocu" => $request->fam_ocu
        ]);

        return response(json_encode(["message" => "Saved"]), 201)->header('Content-Type', 'text/json');

    }

    public function references_delete($id)
    {

        $auth = session()->get('person');

        $reference = PersonFamily::where(["per_cod" => $auth->per_cod, "fam_cod" => $id])->first();
        $reference->delete();

        return redirect("/references");

    }
}

@extends('layouts.session')
@section('content')
    <div class="content">
        <div class="options mt-4">
            <div class="row align-items-center">
                <div class="col-2"><img src="{{ asset("img/hv.png") }}" alt="hv"></div>
                <div class="col-10 text-options">Hoja de vida subida con éxito</div>
            </div>
        </div>
        <div class="options">
            <div class="row align-items-center">
                <div class="col-2"><img src="{{ asset("img/pruebas.png") }}" alt="hv"></div>
                <div class="col-10 text-options">Comenzar las pruebas psicotécnicas</div>
            </div>
        </div>
        <div class="options">
            <div class="row align-items-center">
                <div class="col-2"><img src="{{ asset("img/adjuntar.png") }}" alt="hv"></div>
                <div class="col-10 text-options">Anexar documento para continuar con el  proceso</div>
            </div>
        </div>
        <a class="see-vacant" href="{{ url("/vacants") }}">Ver vacantes afines a mi perfil</a>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    @component('components.header-login', ['title' => 'Registro de usuario'])@endcomponent
    <div class="login">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Usuario">
        </div>
        <div class="form-group mb-0">
            <input type="password" class="form-control" placeholder="Contraseña">
        </div>
    </div>
    <div class="franja mt-2">
        <div class="row align-items-center">
            <div class="col-6"><a class="recovery" href="{{ url("/") }}">Ya tengo cuenta</a></div>
            <div class="col-6 text-right"><button class="b-sesion">Regístrarme ></button></div>
        </div>
    </div>
    <a href=""><button class="button mt-3">Ingreso Empresa</button></a>
@endsection
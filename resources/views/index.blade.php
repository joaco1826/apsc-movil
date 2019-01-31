@extends('layouts.app')
@section('content')
    @component('components.header-login', ['title' => 'Inicio de Sesión'])@endcomponent
    <form id="frmLogin">
        @csrf
        <div class="login">
            <div class="form-group">
                <input type="text" name="user" class="form-control" placeholder="Usuario">
            </div>
            <div class="form-group mb-0">
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
            </div>
        </div>
        <div class="franja mt-2">
            <div class="row align-items-center">
                <div class="col-6"><a class="recovery" href="">Olvidé mi contraseña</a></div>
                <div class="col-6"><button class="b-sesion">Iniciar Sesión ></button></div>
            </div>
        </div>
    </form>
    <a href="{{ url("/register") }}"><button type="submit" class="button mt-3">Crear una cuenta</button></a>
    <a href=""><button class="button mt-3">Ingreso Empresa</button></a>
@endsection
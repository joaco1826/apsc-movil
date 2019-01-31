@extends('layouts.app')
@section('content')
    @component('components.header-login', ['title' => 'Registro de usuario'])@endcomponent
    <form id="frmRegister">
        <div class="login">
            <div class="form-group">
                <input type="text" name="per_pno" class="form-control" placeholder="Primer nombre">
            </div>
            <div class="form-group">
                <input type="text" name="per_sno" class="form-control" placeholder="Segundo nombre">
            </div>
            <div class="form-group">
                <input type="text" name="per_pap" class="form-control" placeholder="Primer apellido">
            </div>
            <div class="form-group">
                <input type="text" name="per_sap" class="form-control" placeholder="Segundo apellido">
            </div>
            <div class="form-group">
                <input type="text" name="per_ide" class="form-control" placeholder="Nº identificación">
            </div>
            <div class="form-group">
                <input type="text" name="per_ema" class="form-control" placeholder="Correo electónico">
            </div>
            <div class="form-group">
                <input type="text" name="per_cel" class="form-control" placeholder="Celular">
            </div>
            <div class="form-group mb-0">
                <select name="per_fre" class="form-control">
                    <option value="">Seleccione</option>
                    @foreach($fuentes as $f)
                        <option value="{{ $f->tip_cod }}">{{ $f->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-0">
                <select name="req_cod" class="form-control">
                    <option value="">Vacantes disponibles el día de hoy</option>
                    @foreach($vacantes as $v)
                        <option value="{{ $v->req_cod }}">{{ $v->req_til }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="franja mt-2">
            <div class="row align-items-center">
                <div class="col-6"><a class="recovery" href="{{ url("/") }}">Ya tengo cuenta</a></div>
                <div class="col-6 text-right"><button class="b-sesion">Regístrarme ></button></div>
            </div>
        </div>
    </form>
    <a href=""><button class="button mt-3 mb-3">Ingreso Empresa</button></a>
@endsection
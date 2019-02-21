@extends('layouts.app')
@section('content')
    @component('components.header-login', ['title' => 'Registro de usuario'])@endcomponent
    <form id="frmRegister" class="custom-form">
        @csrf
        <div class="login">
            <div class="form-group">
                <input type="text" name="per_pno" class="form-control" placeholder="Primer nombre" required>
            </div>
            <div class="form-group">
                <input type="text" name="per_sno" class="form-control" placeholder="Segundo nombre">
            </div>
            <div class="form-group">
                <input type="text" name="per_pap" class="form-control" placeholder="Primer apellido" required>
            </div>
            <div class="form-group">
                <input type="text" name="per_sap" class="form-control" placeholder="Segundo apellido">
            </div>
            <div class="form-group">
                <input type="text" name="identificacion" class="form-control" placeholder="Nº identificación" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Correo electónico" required>
            </div>
            <div class="form-group">
                <input type="text" name="per_cel" class="form-control" placeholder="Celular" required>
            </div>
            <div class="form-group">
                <select name="per_fre" class="form-control" required>
                    <option value="">Seleccione fuente de reclutamiento</option>
                    @foreach($fuentes as $f)
                        <option value="{{ $f->tip_cod }}">{{ $f->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-0">
                <select name="req_cod" class="form-control" required>
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
                <div class="col-6 text-right"><button type="submit" class="b-sesion">Regístrarme ></button></div>
            </div>
        </div>
    </form>
    <a href=""><button class="button mt-3 mb-3">Ingreso Empresa</button></a>
@endsection
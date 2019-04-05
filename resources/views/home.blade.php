@extends('layouts.session')
@section('content')
    <div class="content">
        <div class="text-ins">
            <p>Inscripción de hoja de vida</p>
            <p>Para continuar con el proceso complete todos los campos a continuación:</p>
        </div>
        <div class="opc-hv mt-5">
            <a href="{{ url("curriculum-vitae") }}">
                <div class="row align-content-between align-items-center">
                    <div class="col-2 text-center"><img src="{{ asset("img/icon1.png") }}" alt=""></div>
                    <div class="col-8">Datos personales</div>
                    <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
                </div>
            </a>
        </div>
        <div class="opc-hv">
            <div class="row align-content-between align-items-center">
                <div class="col-2 text-center"><img src="{{ asset("img/icon2.png") }}" alt=""></div>
                <div class="col-8">Estudios</div>
                <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
            </div>
        </div>
        <div class="opc-hv">
            <div class="row align-content-between align-items-center">
                <div class="col-2 text-center"><img src="{{ asset("img/icon3.png") }}" alt=""></div>
                <div class="col-8">Laborales</div>
                <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
            </div>
        </div>
        <div class="opc-hv">
            <div class="row align-content-between align-items-center">
                <div class="col-2 text-center"><img src="{{ asset("img/icon4.png") }}" alt=""></div>
                <div class="col-8">Referencias</div>
                <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
            </div>
        </div>
    </div>
    <button class="btn-apsc mt-5" style="background: #b0b0b0;">Enviar hoja de vida a revisión</button>
@endsection

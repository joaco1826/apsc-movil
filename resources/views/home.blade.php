@extends('layouts.session')
@section('content')
    <div class="content">
        <div class="text-ins">
            <p>Inscripción de hoja de vida</p>
            <p>Para continuar con el proceso complete todos los campos a continuación:</p>
        </div>
        <div class="opc-hv mt-5">
            <a href="{{ url("/curriculum-vitae") }}">
                <div class="row align-content-between align-items-center">
                    <div class="col-2 text-center"><img src="{{ asset("img/icon1.png") }}" alt=""></div>
                    <div class="col-8 @if($person > 0) colorPrimary @endif">Datos personales</div>
                    @if($person > 0)
                        <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
                    @endif
                </div>
            </a>
        </div>
        <div class="opc-hv">
            <a href="{{ url("/studies") }}">
                <div class="row align-content-between align-items-center">
                    <div class="col-2 text-center"><img src="{{ asset("img/icon2.png") }}" alt=""></div>
                    <div class="col-8 @if($studies > 0) colorPrimary @endif">Estudios</div>
                    @if($studies > 0)
                        <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
                    @endif
                </div>
            </a>
        </div>
        <div class="opc-hv">
            <a href="{{ url("/experiencies") }}">
                <div class="row align-content-between align-items-center">
                    <div class="col-2 text-center"><img src="{{ asset("img/icon3.png") }}" alt=""></div>
                    <div class="col-8 @if($experiencies > 0) colorPrimary @endif">Laborales</div>
                    @if($experiencies > 0)
                        <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
                    @endif
                </div>
            </a>
        </div>
        <div class="opc-hv">
            <a href="{{ url("/references") }}">
                <div class="row align-content-between align-items-center">
                    <div class="col-2 text-center"><img src="{{ asset("img/icon4.png") }}" alt=""></div>
                    <div class="col-8 @if($references > 0) colorPrimary @endif">Referencias</div>
                    @if($references > 0)
                        <div class="col-2"><img src="{{ asset("img/icon5.png") }}" alt=""></div>
                    @endif
                </div>
            </a>
        </div>
    </div>
    <button class="btn-apsc mt-5 @if($references > 0 and $person > 0 and $experiencies > 0 and $studies > 0) bgPrimary @endif"
            style="background: #b0b0b0;">
        Enviar hoja de vida a revisión
    </button>
@endsection

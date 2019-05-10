@extends('layouts.session')
@section('content')
    <div class="content">
        <div class="title-form">Vacantes disponibles</div>
        <div class="postulation">
            <img src="{{ asset("img/vacant.png") }}" alt="vacant">
            <div class="postulation__title mb-3">Postulación exitosa</div>
            <div class="postulation__text mb-4">
                Hemos recibido tu solicitud con éxito.<br>
                Notificaremos el siguiente paso vía email.
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-7">
            <div class="franja mt-2">
                <a href=""><button type="button" class="b-sesion"
                        style="font-size: 13pt; text-align: center; display: table; margin: 0 auto;">
                    Aceptar y continuar
                </button></a>
            </div>
        </div>
    </div>
@endsection

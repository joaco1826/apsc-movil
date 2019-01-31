@extends('layouts.session')
@section('content')
    <div class="content">
        <p class="welcome">¡Bienvenido!</p>
        <div class="content-email">
            <img src="{{ asset("img/buzon.png") }}" class="img-buzon" alt="buzon">
            <p>Hemos enviado un correo de validación a su bandeja de entrada. Es indispensable que lo revise, de click
                en el enlace y siga las instrucciones para continuar.</p>
            <p>Es posible que este e-mail caiga en tu bandeja de &quot;Promociones&quot;, &quot;Spam&quot; o &quot;
                Correo No Deseado&quot;.</p>
            <a href="{{ url("/home") }}"><button class="btn-apsc">Aceptar</button></a>
        </div>
    </div>
@endsection

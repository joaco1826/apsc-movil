<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="content">
            <div class="row">
                <div class="col-9"><img class="logo-header" src="{{ url("img/logo-apsc.png") }}" alt="logo apsc"></div>
                <div class="col-3">
                    <div class="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <img src="{{ asset("img/close-menu.png") }}" class="close-menu" alt="close-menu">
                </div>
            </div>
        </div>
    </div>
    @php
        $person = session()->get('person');
        $basic = \App\Models\Person::where("per_cod", $person->per_cod)->where("per_ciu", "<>", "")->count();
        $studies = \App\Models\PersonStudy::where("per_cod", $person->per_cod)->count();
        $experiencies = \App\Models\PersonExperience::where("per_cod", $person->per_cod)->count();
        $references = \App\Models\PersonFamily::where("per_cod", $person->per_cod)->count();
        $vacants = \App\Models\Vacant::where("req_fex", ">=", date("Y-m-d"))->count();
        $percent = 10;
        if ($basic > 0) $percent += 40;
        if ($studies > 0) $percent += 20;
        if ($experiencies > 0) $percent += 10;
        if ($references > 0) $percent += 20;
    @endphp
    <div class="content-menu">
        @if ($person->per_fot != "")
            <img src="https://kaizen.apsc.com.co/files/{{ $person->per_fot }}" class="img-profile" alt="profile">
        @else
            <img src="{{ asset("img/profile.png") }}" class="img-profile" alt="profile">
        @endif
        <p class="title">{{ ucwords(mb_strtolower($person->per_pno . " " . $person->per_sno . " " . $person->per_pap . " " . $person->per_sap)) }}</p>
        <p class="sub-title">Finance Arrow Ltda.</p>
        <div class="nav-hv mt-5"><a href="{{ url("/home") }}"><span>({{ $percent }}%)</span> Hoja de vida</a></div>
        <div class="nav-hv border-0"><a href="{{ url("/vacants") }}"><span>({{ $vacants }})</span> Vacantes disponibles</a></div>
            <a href="{{ url("/logout") }}">
                <div class="logout"><img src="{{ asset("img/close.png") }}" alt="logout"> Cerrar sesión</div>
            </a>
        <div class="help-menu"><img src="{{ asset("img/help.png") }}" alt="help"> ¿Necesitas ayuda?</div>
        <p class="terms">Términos y condiciones ı Políticas de privacidad </p>
    </div>
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>

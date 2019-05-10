@extends('layouts.session')
@section('content')
    <div class="content">
        <div class="title-form">Vacantes disponibles</div>
        @foreach($vacants as $v)
            <div class="content-vacant">
                <div class="content-vacant__title">{{ ucfirst(mb_strtolower($v->req_til, "UTF-8")) }}</div>
                <div class="content-vacant__company">{{ ucfirst(mb_strtolower($v->company->tip_des, "UTF-8")) }}</div>
                <div class="content-vacant__date">
                    <strong>Fecha: </strong> {{ date("d/m/Y", strtotime($v->req_fci)) }}
                </div>
                <div class="content-vacant__date">
                    <strong>Ciudad: </strong> {{ $v->city->mun_nom }}
                </div>
                <button><a href="{{ url("/vacant/" . $v->req_cod) }}">Ver vacante</a></button>
            </div>
        @endforeach
    </div>
@endsection

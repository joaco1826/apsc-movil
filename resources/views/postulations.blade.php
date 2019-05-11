@extends('layouts.session')
@section('content')
    <div class="content">
        <div class="title-form">Postulaciones</div>
        @foreach($vacants as $v)
            <div class="content-vacant">
                <div class="content-vacant__title">{{ ucfirst(mb_strtolower($v->vacant->req_til, "UTF-8")) }}</div>
                <div class="content-vacant__company">{{ ucfirst(mb_strtolower($v->vacant->company->tip_des, "UTF-8")) }}</div>
                <div class="content-vacant__date">
                    <strong>Fecha: </strong> {{ date("d/m/Y", strtotime($v->vacant->req_fci)) }}
                </div>
                <div class="content-vacant__date">
                    <strong>Ciudad: </strong> {{ $v->vacant->city->mun_nom }}
                </div>
                <button><a href="#">Pendiente por revisión</a></button>
            </div>
        @endforeach
    </div>
@endsection

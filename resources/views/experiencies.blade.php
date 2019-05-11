@extends('layouts.session')
@section('content')
    <div class="content">
        <a href="{{ url("/experiencies/create") }}"><button class="add-button">Agregar experiencia</button></a>
        @forelse($experiencies as $exp)
            <div class="studies">
                <div class="studies__title">Empresa</div>
                <div class="studies__response">{{ $exp->exp_emp }}</div>
                <div class="studies__title">Cargo</div>
                <div class="studies__response">{{ $exp->exp_car }}</div>
                <div class="studies__title">Fecha de inicio</div>
                <div class="studies__response">{{ date("d/m/Y", strtotime($exp->exp_ini)) }}</div>
                <div class="studies__title">Fecha de retiro</div>
                <div class="studies__response">
                    @if ($exp->exp_ffi != "")
                        {{ date("d/m/Y", strtotime($exp->exp_ffi)) }}
                    @else
                        Actualmente
                    @endif
                </div>
                <div class="studies__title">Motivo de retiro</div>
                <div class="studies__response">{{ $exp->exp_mot }}</div>
                <div class="studies__title">Funciones</div>
                <div class="studies__response">{{ $exp->exp_des }}</div>
                <a href="{{ url("/experiencies/delete/" . $exp->exp_cod) }}">
                    <div class="studies__delete">Eliminar</div>
                </a>
            </div>
        @empty
            <p class="text-person-options">No se han registrado experiencias</p>
        @endforelse
    </div>
@endsection
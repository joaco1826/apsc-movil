@extends('layouts.session')
@section('content')
    <div class="content">
        <a href="{{ url("/studies/create") }}"><button class="add-button">Agregar estudio</button></a>
        @forelse($studies as $s)
            <div class="studies">
                <div class="studies__title">Institución</div>
                <div class="studies__response">{{ $s->est_ent }}</div>
                <div class="studies__title">Titulo obtenido</div>
                <div class="studies__response">{{ $s->est_pro }}</div>
                <div class="studies__title">Fecha</div>
                <div class="studies__response">{{ date("d/m/Y", strtotime($s->est_fec)) }}</div>
                <a href="{{ url("/studies/delete/" . $s->est_cod) }}">
                    <div class="studies__delete">Eliminar</div>
                </a>
            </div>
        @empty
            <p class="text-person-options">No se han registrado estudios</p>
        @endforelse
    </div>
@endsection
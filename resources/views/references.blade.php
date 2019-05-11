@extends('layouts.session')
@section('content')
    <div class="content">
        <a href="{{ url("/references/create") }}"><button class="add-button">Agregar referencia</button></a>
        @forelse($references as $ref)
            <div class="studies">
                <div class="studies__title">Nombre completo</div>
                <div class="studies__response">{{ $ref->fam_nom }}</div>
                <div class="studies__title">Parentesco</div>
                <div class="studies__response">{{ $ref->fam_par }}</div>
                <div class="studies__title">Teléfono</div>
                <div class="studies__response">{{ $ref->fam_tel }}</div>
                <div class="studies__title">Ocupación</div>
                <div class="studies__response">{{ $ref->fam_ocu }}</div>
                <a href="{{ url("/references/delete/" . $ref->fam_cod) }}">
                    <div class="studies__delete">Eliminar</div>
                </a>
            </div>
        @empty
            <p class="text-person-options">No se han registrado referencias</p>
        @endforelse
    </div>
@endsection
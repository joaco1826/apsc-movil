@extends('layouts.session')
@section('content')
    <form id="frmPostulate">
        @csrf
        <input type="hidden" name="req_cod" value="{{ $vacant->req_cod }}">
        <div class="content">
            <div class="title-form">{{ ucfirst(mb_strtolower($vacant->req_til, "UTF-8")) }}</div>
            <div class="content-vacant">
                <div class="content-vacant__description">{{ ucfirst(mb_strtolower($vacant->req_des, "UTF-8")) }}</div>
                <div class="content-vacant__date content-vacant__border">
                    <strong>Fecha: </strong> {{ date("d/m/Y", strtotime($vacant->req_fci)) }}
                </div>
                <div class="content-vacant__date content-vacant__border">
                    <strong>Ciudad: </strong> {{ $vacant->city->mun_nom }}
                </div>
                <div class="content-vacant__date content-vacant__border">
                    <strong>Salario: </strong> {{ $vacant->req_sal }}
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class="franja mt-2">
                    <button type="submit" class="b-sesion"
                            style="font-size: 15pt; text-align: center; display: table; margin: 0 auto;">
                        Postularme
                    </button>
                </div>
            </div>
            <div class="col-6 cancel-and-back">
                <a href="javascript:history.back()">Cancelar y regresar</a>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
@endsection
@extends('layouts.session')
@section('content')
    <form id="frmStudies">
        @csrf
        <div class="content">
            <div class="login">
                <div class="form-group">
                    <input type="text"  name="est_ent" class="form-control custom" placeholder="Institución" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="est_pro" class="form-control custom" placeholder="Titulo obtenido" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="est_fec" class="form-control custom" placeholder="Fecha" required>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-7">
                <div class="franja mt-2"><button type="submit" class="b-sesion" style="font-size: 12pt">Guardar y continuar</button></div>
            </div>
            <div class="col-5 cancel-and-back">
                <a href="javascript:history.back()">Cancelar y regresar</a>
            </div>
        </div>
    </form>
@endsection
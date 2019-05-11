@extends('layouts.session')
@section('content')
    <form id="frmReferences">
        @csrf
        <div class="content">
            <div class="login">
                <div class="form-group">
                    <input type="text"  name="fam_nom" class="form-control custom" placeholder="Nombre completo" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="fam_par" class="form-control custom" placeholder="Parentesco" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="fam_tel" class="form-control custom" placeholder="Teléfono o celular" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="fam_ocu" class="form-control custom" placeholder="Ocupación" required>
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
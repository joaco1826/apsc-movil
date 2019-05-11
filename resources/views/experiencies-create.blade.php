@extends('layouts.session')
@section('content')
    <form id="frmExperiencies">
        @csrf
        <div class="content">
            <div class="login">
                <div class="form-group">
                    <input type="text"  name="exp_emp" class="form-control custom" placeholder="Empresa" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="exp_car" class="form-control custom" placeholder="Cargo desempeñado" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="exp_ini" class="form-control custom" placeholder="Fecha de inicio" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="exp_ffi" class="form-control custom" placeholder="Fecha de retiro" required>
                </div>
                <div class="form-group">
                    <textarea name="exp_mot" rows="3" required class="form-control custom" placeholder="Motivo de retiro"></textarea>
                </div>
                <div class="form-group">
                    <textarea name="exp_des" rows="5" required class="form-control custom" placeholder="Funciones"></textarea>
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
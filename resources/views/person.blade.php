@extends('layouts.session')
@section('content')
    <div class="title-form">Datos personales</div>
    <form id="frmPerson" class="custom-form">
        @csrf
        <div class="login">
            <div class="form-group">
                <input type="text" value="{{ $auth->per_pno }}" name="per_pno" class="form-control custom" placeholder="Primer nombre" required>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_sno }}" name="per_sno" class="form-control custom" placeholder="Segundo nombre">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_pap }}" name="per_pap" class="form-control custom" placeholder="Primer apellido" required>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_sap }}" name="per_sap" class="form-control custom" placeholder="Segundo apellido">
            </div>
            <div class="form-group">
                <select name="per_tip" class="form-control custom" required>
                    <option value="">Tipo de identificación</option>
                    @foreach($types as $t)
                        @if ($auth->per_tip == $t->tip_cod)
                            <option selected value="{{ $t->tip_cod }}">{{ $t->tip_des }}</option>
                        @else
                            <option value="{{ $t->tip_cod }}">{{ $t->tip_des }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_ide }}" name="per_ide" class="form-control custom" placeholder="Nº identificación" required>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_fex }}" name="per_fex" class="form-control custom date" placeholder="Fecha expedición" required>
            </div>
            <div class="form-group">
                <select name="per_cex" class="form-control custom" required>
                    <option value="">Ciudad expedición</option>
                    @foreach($cities as $c)
                        @if ($auth->per_cex == $c->mun_cod)
                            <option selected value="{{ $c->mun_cod }}">{{ $c->mun_nom }} - {{ $c->state->dep_nom }}</option>
                        @else
                            <option value="{{ $c->mun_cod }}">{{ $c->mun_nom }} - {{ $c->state->dep_nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_ciu" class="form-control custom" required>
                    <option value="">Ciudad residencia</option>
                    @foreach($cities as $c)
                        @if ($auth->per_ciu == $c->mun_cod)
                            <option selected value="{{ $c->mun_cod }}">{{ $c->mun_nom }} - {{ $c->state->dep_nom }}</option>
                        @else
                            <option value="{{ $c->mun_cod }}">{{ $c->mun_nom }} - {{ $c->state->dep_nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_dir }}" name="per_dir" class="form-control custom" placeholder="Dirección" required>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_bar }}" name="per_bar" class="form-control custom" placeholder="Barrio" required>
            </div>
            <div class="form-group">
                <input type="email" value="{{ $auth->per_ema }}" name="email" class="form-control custom" placeholder="Correo electónico" required>
            </div>
            <div class="form-group">
                <input type="text" name="per_tel" class="form-control custom" placeholder="Teléfono">
            </div>
            <div class="form-group">
                <input type="text" name="per_cel" class="form-control custom" placeholder="Celular" required>
            </div>
            <div class="form-group">
                <input type="text" name="per_fna" class="form-control custom" placeholder="F. Nacimiento" required>
            </div>
            <div class="form-group">
                <select name="per_pai" class="form-control custom" required>
                    <option value="">País nacimiento</option>
                    <option value="COLOMBIA">Colombia</option>
                    <option value="OTRO">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_cna" class="form-control custom" required>
                    <option value="">Ciudad nacimiento</option>
                    @foreach($cities as $c)
                        <option value="{{ $c->mun_cod }}">{{ $c->mun_nom }} - {{ $c->state->dep_nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_cna" class="form-control custom" required>
                    <option value="">Estrato</option>
                    @foreach($stratas as $s)
                        <option value="{{ $s->tip_cod }}">{{ $s->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_cna" class="form-control custom" required>
                    <option value="">Grupo sanguíneo</option>
                    @foreach($bloods as $b)
                        <option value="{{ $b->tip_cod }}">{{ $b->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="per_pro" class="form-control custom" placeholder="Profesión" required>
            </div>
            <div class="form-group">
                <select name="per_mcf" class="form-control custom" required>
                    <option value="">Mujer cabeza de familia</option>
                    <option value="SI">Si</option>
                    <option value="NO">No</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_sex" class="form-control custom" required>
                    <option value="">Sexo</option>
                    @foreach($genders as $g)
                        <option value="{{ $g->tip_cod }}">{{ $g->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_sex" class="form-control custom" required>
                    <option value="">Estado civil</option>
                    @foreach($civil as $c)
                        <option value="{{ $c->tip_cod }}">{{ $c->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="per_eda" class="form-control custom" placeholder="Edad" required maxlength="2">
            </div>
            <div class="form-group">
                <input type="text" name="per_pes" class="form-control custom" placeholder="Peso" required maxlength="2">
            </div>
            <div class="form-group">
                <select name="per_ura" class="form-control custom" required>
                    <option value="">Estatura</option>
                    @foreach($height as $h)
                        <option value="{{ $h->tip_cod }}">{{ $h->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_sex" class="form-control custom" required>
                    <option value="">Talla camisa</option>
                    @foreach($shirt_size as $s)
                        <option value="{{ $s->tip_cod }}">{{ $s->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_sex" class="form-control custom" required>
                    <option value="">Talla pantalón</option>
                    @foreach($pants_size as $p)
                        <option value="{{ $p->tip_cod }}">{{ $p->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_sex" class="form-control custom" required>
                    <option value="">Talla zapatos</option>
                    @foreach($shoes_size as $s)
                        <option value="{{ $s->tip_cod }}">{{ $s->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="per_gso" class="form-control custom" placeholder="Grupo social">
            </div>
            <div class="form-group">
                <select name="per_get" class="form-control custom" required>
                    <option value="">Grupo étnico</option>
                    <option value="AFROCOLOMBIANO">Afrocolombiano</option>
                    <option value="INDÍGENA">Indigena</option>
                    <option value="RAIZAL">Raizal</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="per_her" class="form-control custom" placeholder="Nrº de hermanos">
            </div>
            <div class="form-group">
                <input type="text" name="per_hij" class="form-control custom" placeholder="Nrº de hijos">
            </div>
            <div class="form-group">
                <input type="text" name="per_pac" class="form-control custom" placeholder="Personas a cargo">
            </div>
            <div class="form-group">
                <input type="text" name="per_asp" class="form-control custom" placeholder="Aspiración salarial">
            </div>
            <div class="form-group">
                <select name="per_tur" class="form-control custom" required>
                    <option value="">Disponibilidad de turnos</option>
                    <option value="SI">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_din" class="form-control custom" required>
                    <option value="">Disponibilidad inmediata</option>
                    <option value="SI">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_sex" class="form-control custom" required>
                    <option value="">Nivel académico</option>
                    @foreach($academic as $a)
                        <option value="{{ $a->tip_cod }}">{{ $a->tip_des }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="franja mt-2">
            <div class="row align-items-center">
                <div class="col-6"><a class="recovery" href="{{ url("/") }}">Ya tengo cuenta</a></div>
                <div class="col-6 text-right"><button type="submit" class="b-sesion">Guardar ></button></div>
            </div>
        </div>
    </form>
@endsection
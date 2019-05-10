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
                <select name="per_tid" class="form-control custom" required>
                    <option value="">Tipo de identificación</option>
                    @foreach($types as $t)
                        @if ($auth->per_tid == $t->tip_cod)
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
                <input type="email" value="{{ $auth->per_ema }}" name="per_ema" class="form-control custom" placeholder="Correo electónico" required>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_tel }}" name="per_tel" class="form-control custom" placeholder="Teléfono">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_cel }}" name="per_cel" class="form-control custom" placeholder="Celular" required>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_fna }}" name="per_fna" class="form-control custom" placeholder="F. Nacimiento" required>
            </div>
            <div class="form-group">
                <select name="per_pai" class="form-control custom" required>
                    <option value="">País nacimiento</option>
                    <option @if($auth->per_pai == "COLOMBIA") selected @endif value="COLOMBIA">Colombia</option>
                    <option @if($auth->per_pai == "OTRO") selected @endif value="OTRO">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_cna" class="form-control custom" required>
                    <option value="">Ciudad nacimiento</option>
                    @foreach($cities as $c)
                        <option @if($auth->per_cna == $c->mun_cod) selected @endif value="{{ $c->mun_cod }}">{{ $c->mun_nom }} - {{ $c->state->dep_nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_ato" class="form-control custom" required>
                    <option value="">Estrato</option>
                    @foreach($stratas as $s)
                        <option @if($auth->per_ato == $s->tip_cod) selected @endif value="{{ $s->tip_cod }}">{{ $s->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_gsa" class="form-control custom" required>
                    <option value="">Grupo sanguíneo</option>
                    @foreach($bloods as $b)
                        <option @if($auth->per_gsa == $b->tip_cod) selected @endif  value="{{ $b->tip_cod }}">{{ $b->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_pro }}" name="per_pro" class="form-control custom" placeholder="Profesión" required>
            </div>
            <div class="form-group">
                <select name="per_mcf" class="form-control custom" required>
                    <option value="">Mujer cabeza de familia</option>
                    <option @if($auth->per_mcf == "SI") selected @endif value="SI">Si</option>
                    <option @if($auth->per_mcf == "NO") selected @endif value="NO">No</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_sex" class="form-control custom" required>
                    <option value="">Sexo</option>
                    @foreach($genders as $g)
                        <option @if($auth->per_sex == $g->tip_cod) selected @endif  value="{{ $g->tip_cod }}">{{ $g->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_civ" class="form-control custom" required>
                    <option value="">Estado civil</option>
                    @foreach($civil as $c)
                        <option @if($auth->per_civ == $c->tip_cod) selected @endif  value="{{ $c->tip_cod }}">{{ $c->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_eda }}" name="per_eda" class="form-control custom" placeholder="Edad" required maxlength="2">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_pes }}" name="per_pes" class="form-control custom" placeholder="Peso" required maxlength="2">
            </div>
            <div class="form-group">
                <select name="per_ura" class="form-control custom" required>
                    <option value="">Estatura</option>
                    @foreach($height as $h)
                        <option @if($auth->per_ura == $h->tip_cod) selected @endif value="{{ $h->tip_cod }}">{{ $h->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_tca" class="form-control custom" required>
                    <option value="">Talla camisa</option>
                    @foreach($shirt_size as $s)
                        <option @if($auth->per_tca == $s->tip_cod) selected @endif value="{{ $s->tip_cod }}">{{ $s->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_tpa" class="form-control custom" required>
                    <option value="">Talla pantalón</option>
                    @foreach($pants_size as $p)
                        <option @if($auth->per_tpa == $p->tip_cod) selected @endif  value="{{ $p->tip_cod }}">{{ $p->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="per_tza" class="form-control custom" required>
                    <option value="">Talla zapatos</option>
                    @foreach($shoes_size as $s)
                        <option @if($auth->per_tza == $s->tip_cod) selected @endif  value="{{ $s->tip_cod }}">{{ $s->tip_des }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_gso}}" name="per_gso" class="form-control custom" placeholder="Grupo social">
            </div>
            <div class="form-group">
                <select name="per_get" class="form-control custom">
                    <option value="">Grupo étnico</option>
                    <option @if($auth->per_get == "AFROCOLOMBIANO") selected @endif value="AFROCOLOMBIANO">Afrocolombiano</option>
                    <option @if($auth->per_get == "INDÏGENA") selected @endif value="INDÍGENA">Indigena</option>
                    <option @if($auth->per_get == "RAIZAL") selected @endif value="RAIZAL">Raizal</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_her }}" name="per_her" class="form-control custom" placeholder="Nrº de hermanos">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_hij }}" name="per_hij" class="form-control custom" placeholder="Nrº de hijos">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_pac }}" name="per_pac" class="form-control custom" placeholder="Personas a cargo">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $auth->per_asp }}" name="per_asp" class="form-control custom" placeholder="Aspiración salarial">
            </div>
            <div class="form-group">
                <select name="per_tur" class="form-control custom" required>
                    <option value="">Disponibilidad de turnos</option>
                    <option @if($auth->per_tur == "SI") selected @endif value="SI">Si</option>
                    <option @if($auth->per_tur == "No") selected @endif value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_din" class="form-control custom" required>
                    <option value="">Disponibilidad inmediata</option>
                    <option @if($auth->per_din == "SI") selected @endif value="SI">Si</option>
                    <option @if($auth->per_din == "NO") selected @endif value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <select name="per_niv" class="form-control custom" required>
                    <option value="">Nivel académico</option>
                    @foreach($academic as $a)
                        <option @if($auth->per_niv == $a->tip_cod) selected @endif value="{{ $a->tip_cod }}">{{ $a->tip_des }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-7">
                <div class="franja mt-2"><button type="submit" class="b-sesion" style="font-size: 12pt">Guardar y continuar</button></div>
            </div>
            <div class="col-5 cancel-and-back">
                <a href="">Cancelar y regresar</a>
            </div>
        </div>
    </form>
@endsection
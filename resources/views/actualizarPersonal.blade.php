@extends('layouts.header')
@section('contenido')
<main>
<script type="text/javascript">
function activar() {
    document.getElementById("password").disabled = false;
    document.getElementById("rol").disabled = false;
    document.getElementById("area").disabled = false;
    document.getElementById("telefono").disabled = false;
    document.getElementById("estatus").disabled = false;
}
</script>

@foreach($infoPersonal as $personal)
<button><a href="{{URL::to('/consultaPersonal')}}"><span class="mif-arrow-left mif-4x"></span></a></button> 
<button onclick="activar()" style="Cursor:pointer"><a><span class="mif-pencil mif-4x"></span></a></button>
<form action = "{{url('guardarEditadoPersonal/'.$personal->correoInstitucional)}}" method = "POST">
{{ csrf_field() }} 
    <div>
        <div>
            <h1 class="titulo">ACTUALIZAR USUARIO</h1>
        </div>

        <div>
            <h4 class="titulo" style="font-size: 25px">{{$personal->nombre}} {{$personal->paterno}} {{$personal->materno}}</h4>
        </div>

        <div>
            <h4 class="titulo" style="font-size: 12px">{{$personal->correoInstitucional}}</h4>
        </div>

        <div>
            <label for="password" class="form-Nombres">Contraseña </label>
            <input type="password" class="form-Texto" id="password" name="password" disabled value="{{Crypt::decryptString($personal->password)}}" />
        </div><br>

        <div>
            <label for="rol" class="form-Nombres">Rol</label>
            <select disabled  id="rol" name="rol" class="form-Menu" style="text-align-last: center">
                    <?php
                        $rol = DB::select("SELECT nombre FROM rol WHERE idRol='$personal->idRol'");
                        switch($personal->idRol){
                            case 1:
                                echo "<option disabled selected value = '1'>".$rol[0]->nombre."</option>";
                                echo "<option value = '2'>REGIDOR (A)</option>";
                                echo "<option value = '3' >DIRECTOR (A)</option>";
                                echo "<option value = '4'>SECRETARIO (A)</option>";
                                break;
                            case 2:
                                echo "<option disabled selected value = '2'>".$rol[0]->nombre.' (A)'."</option>";
                                echo "<option value = '1'>SUPERUSUARIO</option>";
                                echo "<option value = '3' >DIRECTOR (A)</option>";
                                echo "<option value = '4'>SECRETARIO (A)</option>";
                                break;
                            case 3:
                                echo "<option disabled selected value = '3'>".$rol[0]->nombre.' (A)'."</option>";
                                echo "<option value = '1' >SUPERUSUARIO</option>";
                                echo "<option value = '2'>REGIDOR (A)</option>";
                                echo "<option value = '4'>SECRETARIO (A)</option>";
                                break;
                            case 4:
                                echo "<option disabled selected value = '4'>".$rol[0]->nombre.' (A)'."</option>";
                                echo "<option value = '1'>SUPERUSUARIO</option>";
                                echo "<option value = '2'>REGIDOR (A)</option>";
                                echo "<option value = '3' >DIRECTOR (A)</option>";
                                break;
                        }
                    ?>
                
           </select>
        </div><br>

        <div>
            <label for="area" class="form-Nombres">Área de trabajo</label>
            <select disabled id="area" name="area" class="form-Menu" style="text-align-last: center">
                <?php
                    $infoAreas = DB::select("SELECT idarea, nombre FROM tlv_1821_ar");
                    for($i=0; $i < count($infoAreas); $i++){
                        if($personal->idarea == $infoAreas[$i]->idarea){
                            echo "<option disabled selected value = '$personal->idarea'>".$infoAreas[$i]->nombre."</option>";            
                        }else{
                            echo "<option value = ".$infoAreas[$i]->idarea.">".$infoAreas[$i]->nombre."</option>";
                        }
                    }
                ?>
           </select>
        </div><br>

        <div>
            <label for="telefono" class="form-Nombres">Telefono</label>
            <input id="telefono" type="text" class="form-Texto" id="telefono" name="telefono" minlength="10" maxlength="10" disabled value="{{$personal->telefono}}" />
        </div><br>

        <div>
            <label for="status" class="form-Nombres">Estatus</label>
            <select disabled id="estatus" name="estatus" class="form-Menu" style="text-align-last: center">
                <?php
                    if($personal->status == 'AC'){ 
                        echo "<option disabled selected value = '$personal->status'>AC (ACTIVO)</option>";
                        echo "<option value = 'NA'>NA (NO ACTIVO)</option>";
                    }else{ 
                        echo "<option disabled selected value = '$personal->status'>NA (NO ACTIVO)</option>";
                        echo "<option value = 'AC'>AC (ACTIVO)</option>";
                    }
                ?>
           </select>
        </div><br>

        <button type="submit" class="boton-Cancelar" name="cancelar">Cancelar</button>
        <button type="submit" class="boton-Personalizado" name="actualizar">Actualizar</button>
        <br><br>
</form>
@endforeach
</main>
@endsection
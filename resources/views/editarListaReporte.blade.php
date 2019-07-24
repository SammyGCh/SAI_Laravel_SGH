@extends('layouts.header')
@section('contenido')

<main>
@foreach($listasReportes as $listaDeReportes)
<form action="{{url('guardarEditadoListaReporte/'.$listaDeReportes->idlistaReportes)}}" method = "POST">
{{ csrf_field() }}
        <div>
            <h1 class="titulo">ACTUALIZAR REPORTE</h1>
        </div>

        <div>
            <h3 class="titulo">{{$listaDeReportes->nombre}}</h3>
        </div>

        <div>
            <label for="estatus" class="form-Nombres">Estatus</label>
           <select name="estatus" class="form-Menu" style="text-align-last: center">
                <?php if($listaDeReportes->status == 'AC'){ 
                    echo "<option  disabled selected value = '$listaDeReportes->status'>AC (ACTIVO)</option>";
                    echo "<option value = 'NA'>NA (NO ACTIVO)</option>";
                }else{ 
                    echo "<option disabled selected value = '$listaDeReportes->status'>NA (NO ACTIVO)</option>";
                    echo "<option value = 'AC'>AC (ACTIVO)</option>";
                }?>
                
           </select>
        </div>

        <div>
            <label for="obervaciones" class="form-Nombres">Observaciones</label>
            <textarea name="observaciones" rows="8" placeholder="Procure ser claro y preciso">{{$listaDeReportes->observaciones}}</textarea>
        </div>

        <div>
            <label for="periodoAtencion" class="form-Nombres">Periodo de atención</label>
            <input type="text" class="form-Texto" id="periodoAtencion" name="periodoAtencion" value="{{$listaDeReportes->periodoAtencion}}" required/>
        </div>

        <br>
        <button type="submit" class="boton-Personalizado" name="actualizar">Actualizar</button>
        <button type="submit" class="boton-Cancelar" name="cancelar">Cancelar</button>
</form>
<br>
@endforeach
</main>

@endsection
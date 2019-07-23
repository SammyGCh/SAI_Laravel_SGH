@extends('layouts.header')
@section('contenido')

<main>
<script type="text/javascript">
function activar() {
    document.getElementById("destinatario").disabled = false;
    document.getElementById("tiempoRespuesta").disabled = false;
    document.getElementById("vigencia").disabled = false;
    document.getElementById("requisitos").disabled = false;
    document.getElementById("requisitos").disabled = false;
    document.getElementById("costo").disabled = false;
    document.getElementById("fundamentosJuridicos").disabled = false;
    document.getElementById("estatus").disabled = false;
    document.getElementById("descripcion").disabled = false;
    document.getElementById("adjunto").disabled = false;
}
</script>
    @foreach($infoTramites as $info)
    <br><button><a href="{{URL::to('/consultaTramite')}}"><span class="mif-arrow-left mif-4x"></span></a></button> 
    <button onclick="activar()" style="Cursor:pointer"><a><span class="mif-pencil mif-4x"></span></a></button>
    <form action="{{url('guardarEditadoTramite/'.$info->idtramites)}}" method = "POST">  
    {{ csrf_field() }}                                
                <div id="formulario">
                    

                        <div>
                              <h1 class="titulo">{{$info->nombre}}</h1>
                        </div>

                        <div>
                            <label for="destinatario" class="form-Nombres">Destinatario</label>
                            <input disabled value="{{$info->destinatario}}" type="text" class="form-Texto" id="destinatario" name="destinatario"/>
                        </div><br>

                        <div>
                            <label for="tiempoRespuesta" class="form-Nombres">Tiempo de respuesta</label>
                            <input disabled value="{{$info->tiempoRespuesta}}" type="text" class="form-Texto" id="tiempoRespuesta" name="tiempoRespuesta"/>
                        </div><br>

                        <div>
                            <label for="vigencia" class="form-Nombres">Vigencia</label>
                            <input disabled value="{{$info->vigencia}}" type="text" class="form-Texto" id="vigencia" name="vigencia"/>
                        </div><br>

                        <div>
                            <label for="requisitos" class="form-Nombres">Requisitos</label>
                            <textarea disabled value="" class="text-area" name="requisitos" id="requisitos" rows="8" placeholder="Procure ser claro y preciso">{{$info->requisitos}}</textarea>
                        </div><br>

                        <div>
                            <label for="costo" class="form-Nombres">Costo</label>
                            <input disabled value="{{$info->costo}}" type="text" class="form-Texto" id="costo" name="costo"/>
                        </div><br>

                        <div>
                            <label for="fundamentosJuridicos" class="form-Nombres">Fundamentos jurídicos</label>
                            <textarea  disabled class="text-area"  id="fundamentosJuridicos" name="fundamentosJuridicos" rows="8">{{$info->fundamentosJuridicos}}</textarea>
                        </div><br>

                        <div>
                            <label for="status" class="form-Nombres">Estatus</label>
                            <select  disabled id="estatus" name="estatus" class="form-Menu">
                                <?php 
                                if($info->status == 'AC'){ 
                                    echo "<option  disabled selected value = '$info->status'>AC (ACTIVO)</option>";
                                    echo "<option value = 'NA'>NA (NO ACTIVO)</option>";
                                }else{ 
                                    echo "<option disabled selected value = '$info->status'>NA (NO ACTIVO)</option>";
                                    echo "<option value = 'AC'>AC (ACTIVO)</option>";
                                }
                                ?>
                            </select>
                        </div><br>

                        <div>
                            <label for="descripcion" class="form-Nombres">Descripción</label>
                            <textarea disabled value="" class="text-area" id="descripcion" name="descripcion" rows="6" placeholder="Procure ser claro y preciso" required>{{$info->descripcion}}</textarea>
                        </div><br>

                        <div>
                            <label for="formato" class="form-Nombres">Formato</label>
                            <input disabled type="file" id="adjunto" name="adjunto" accept=".pdf" multiple>
                        </div><br><br>


                        <button type="submit" class="boton-Personalizado" name="guardar">Guardar</button>
                        <button type="submit" class="boton-Cancelar" name="cancelar">Cancelar</button>
                </div>
        </div>
</form>
    @endforeach
</main>
@endsection
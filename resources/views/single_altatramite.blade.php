@extends('layouts.single_header')
@section('contenido')
<main>
<section id="wrapper">
        <div class="contenido">
                <div id="formulario">
                    <form action="">

                        <div>
                            <h1 class="titulo">FORMULARIO DE TRÁMITES</h1>
                        </div>

                        <div>
                            <br><label for="nombre" class="form-Nombres">Nombre del trámite (*)</label>
                            <input type="text" class="form-Texto" id="nombre" name="nombre" required />
                        </div><br>


                        <div>
                            <label for="destinatario" class="form-Nombres">Destinatario (*)</label>
                            <input type="text" class="form-Texto" id="destinatario" name="destinatario" required />
                        </div><br>

                        <div>
                            <label for="tiempoRespuesta" class="form-Nombres">Tiempo de respuesta (*)</label>
                            <input type="text" class="form-Texto" id="tiempoRespuesta" name="tiempoRespuesta" required />
                        </div><br>

                        <div>
                            <label for="vigencia" class="form-Nombres">Vigencia (*)</label>
                            <input type="text" class="form-Texto" id="vigencia" name="vigencia" required />
                        </div><br>

                        <div>
                            <label for="requisitos" class="form-Nombres">Requisitos (*)</label>
                            <textarea class="text-area" name="requisitos" rows="8" placeholder="Procure ser claro y preciso" required></textarea>
                        </div><br>

                        <div>
                            <label for="costo" class="form-Nombres">Costo (*)</label>
                            <input type="text" class="form-Texto" id="costo" name="costo" required />
                        </div><br>

                        <div>
                            <label for="fundamentosJuridicos" class="form-Nombres">Fundamentos jurídicos (*)</label>
                            <textarea class="text-area"  name="fundamentosJuridicos" rows="8" required></textarea>
                        </div><br>

                        <div>
                            <label for="status" class="form-Nombres">Estatus (*)</label>
                            <select name="estatus" required class="form-Menu">
                                <option disabled selected value="0">Selecciona una opción</option>
                                <option value="1">AC (ACTIVO)</option>
                                <option value="2">NA (NO ACTIVO)</option>
                            </select>
                        </div><br>

                        <div>
                            <label for="descripcion" class="form-Nombres">Descripción (*)</label>
                            <textarea class="text-area" name="descripcion" rows="6" placeholder="Procure ser claro y preciso" required></textarea>
                        </div><br>

                        <div>
                            <label for="formato" class="form-Nombres">Formato</label>
                            <input type="file" name="adjunto" accept=".pdf" multiple>
                        </div><br><br>


                        <button type="submit" class="boton-Personalizado">Guardar</button>
                        <br><br>
                        <h6 class="form-Nombres">(*) Campos obligatorios</h6>
                    </form>

                </div>
        </div>
    </section>
    </main>
@endsection

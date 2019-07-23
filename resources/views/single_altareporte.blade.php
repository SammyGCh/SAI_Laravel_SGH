@extends('layouts.single_header')
@section('contenido')
<main>
<section id="wrapper">
                    <div class="contenido">
                            <div id="formulario">
                                <form action="">

                                    <div>
                                        <h1 class="titulo">FORMULARIO DE REPORTE</h1>
                                    </div>
                                <div class ="conten-form">
                                    <div>
                                        <label for="nombre" class="form-Nombres">Nombre del reporte (*)</label>
                                        <input type="text" class="form-Texto" id="nombre" name="nombre" required />
                                    </div>


                                    <div>
                                        <label for="estatus" class="form-Nombres">Estatus (*)</label>
                                        <!-- <input type="combo" class="form-Texto" id="estatus" name="estatus" required/>-->
                                        <select name="estatus" required class="form-Menu">
                                            <option disabled selected value="0">Selecciona una opción</option>
                                            <option value="1">AC</option>
                                            <option value="2">NA</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="obervaciones" class="form-Nombres">Observaciones</label>
                                        <textarea name="observaciones" class="form-Texto" rows="8" placeholder="Procure ser claro y preciso"></textarea>
                                    </div>

                                    <div>
                                        <label for="periodoAtencion" class="form-Nombres">Periodo de atención (*)</label>
                                        <input type="text" class="form-Texto" id="periodoAtencion" name="periodoAtencion" required />
                                    </div>

                                    <div>
                                        <label for="formato" class="form-Nombres">Formato</label>
                                        <input style = "max-width:85%;" type="file" name="adjunto" accept=".pdf" multiple>
                                    </div>

                                </div>
                                    <br><br><button type="submit" class="boton-Personalizado">Guardar</button>
                                    <!--<div class="button_cont"><a class="boton-Personalizado" href="add-website-here" target="_blank" rel="nofollow noopener">Guardar</a></div>-->
                                </form>
                            </div>
                    </div>
    </section>
    </main>
@endsection

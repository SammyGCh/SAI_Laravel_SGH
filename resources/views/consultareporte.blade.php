@extends('layouts.header')
@section('contenido')
<main>
    <section id="wrapper">
        <div class="table-container">
            <br>
            <h1 class="titulo">CONSULTA</h1>
            <center>
                <form autocomplete="off" action="{{url('consultaReporte/busqueda')}}" method="POST">
                    {{ csrf_field() }}
                        <div>
                                <select id="tipoReporte" name="tipoReporte" class="filter_query_field" style='width:120px; height:40px' data-dependent="areas">
                                    <option value="">Tipo</option>
                                    @foreach($all_listaReporte_info as $listaReporte)
                                            <option value="{{$listaReporte->idlistaReportes}}" >{{$listaReporte->nombre}}</option>
                                    @endforeach
                                </select>

                                <select name="estatus" class="filter_query_field" style='width:120px; height:40px'>
                                    <option value="">Estatus</option>
                                    <option value="EP">En proceso</option>
                                    <option value="SC">Solucionado</option>
                                    <option value="NS">No Solucionado</option>
                                </select>

                                <select name="colonias" class="filter_query_field" style='width:120px; height:40px'>
                                    <option value="">Colonia</option>
                                    @foreach($all_colonia_info as $colonias)
                                            <option value="{{$colonias->idcolonia}}" >{{$colonias->nombre}}</option>
                                    @endforeach
                                </select>

                                <select id="areas" name="areas" class="filter_query_field" style='width:120px; height:40px' data-dependent="tipoReporte">
                                    <option value="">Area</option>
                                    @foreach($all_area_info as $area)
                                            <option value="{{$area->idarea}}" >{{$area->nombre}}</option>
                                    @endforeach
                                </select>
                                <br> <br>
                                <div>
                                    <label for="tittle-fecha">Fecha: &nbsp;</label>
                                    <label for="from">De:</label>
                                    <input type="text" id="date_timepicker_start" name="date_timepicker_start">
                                    <i style="color:#7612b5;"><span class="mif-calendar mif-1x"></span></i>
                                    <label for="to">A:</label>
                                    <input type="text" id="date_timepicker_end" name="date_timepicker_end">
                                    <i style="color:#7612b5;"><span class="mif-calendar mif-1x"></span></i>
                                </div>
                                <br>
                                <input type="text" class="form-Texto2" id="seach_folio" name="search_folio" placeholder="Folio" maxlength="17" />
                                <br>
                                <input type="text" class="form-Texto2" id="seach_nombre" name="search_nombre" placeholder="Nombre del solicitante" maxlength="135" />
                                <br>
                                <button class="boton-Personalizado" style='width:120px; height:40px' type="submit"></a><span class="mif-file-text mif-search "></span> Buscar</button></br>

                            </div>

                </form>

                <br>
                <center>
                    <!-- tabla -->
                    <div id="div1">


                        <center>

                            <table class=".width200" border="1" cellpadding="0" cellspacing="1" style="border-collapse:collapse;border-color:#7612b5;">

                                <caption style="border-color:#666666; border-style:dashed; border-width:2px;"><strong>REPORTES</strong></caption>
                                <tr>

                                    <th bgcolor="#adabbc" width="150">TIPO</th>
                                    <th bgcolor="#adabbc" width="150">NOMBRE</th>
                                    <th bgcolor="#adabbc" width="150">FECHA</th>
                                    <th bgcolor="#adabbc" width="150">AREA</th>
                                    <th bgcolor="#adabbc" width="150">COLONIA</th>
                                    <th bgcolor="#adabbc" width="150">ESTATUS</th>
                                    <th bgcolor="#adabbc" width="150">VER</th>
                                    <th bgcolor="#adabbc" width="150">EDITAR</th>
                                    <th bgcolor="#adabbc" width="150">ELIMINAR</th>


                                </tr>



                                @foreach ($all_consultaReporte_info as $consultaReporte)
                                    <tr>
                                    <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                        <?php
                                            $nombre_tipo = DB::select("SELECT nombre FROM tlv_1821_lr WHERE idlistaReportes ='".$consultaReporte->idlistaReportes."'");
                                            echo $nombre_tipo[0]->nombre;
                                            ?>
                                       </TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">{{$consultaReporte->nombre}}</TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">{{$consultaReporte->fecha}}</TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                        <?php
                                            $nombre_area= DB::select("SELECT nombre FROM tlv_1821_ar WHERE idarea=(SELECT idarea FROM tlv_1821_lr WHERE idlistaReportes='".$consultaReporte->idlistaReportes."')");
                                            echo $nombre_area[0]->nombre;
                                            ?>
                                        </TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                        <?php
                                            $nombre_colonia= DB::select("SELECT nombre FROM colonia WHERE idcolonia='".$consultaReporte->idcolonia."'");
                                            echo $nombre_colonia[0]->nombre;
                                            ?>
                                        </TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">{{$consultaReporte->status}}</TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150"> <a href="#"><span class="mif-eye mif-2x "></span></a> </TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150"> <a href="#"><span class="mif-file-text mif-2x "></span></a> </TD>
                                        <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150"><a href=""><span class="mif-cross mif-2x "></span></a></TD>
                                    </tr>
                                    @endforeach

                            </table>
                            <br>
                    </div>

                    <div  name="export-files" style="border: 1px solid  #666666;">
                        <label style="color:#7612b5" for="export-file">Exportar:<br> </label>

                        <form action={{url('consultaReporte/exportacion')}} method="post">
                        <button class="boton-Personalizado" style='border:#ffffff; background-color:green;width:120px; height:40px' type="submit"></a><span class="mif-file-excel "></span> Exel</button>
                        <br> <br>
                        {{ csrf_field() }}
                        </form>
                        <form action="{{url('consultaReporte/PdfTabla')}}" target="_blank"  method="post">
                                <button class="boton-Personalizado" style='border:#ffffff; background-color:red; width:120px; height:40px' type="submit"></a><span class="mif-file-pdf "></span> PDF</button>
                                {{ csrf_field() }}
                                <br> <br>
                        </form>
                    </div>
                </center>

        </div>
    </section>
</main>

<style type="text/css">
    .filter_query_field {
        text-decoration: none;
        padding: 10px;
        font-weight: 600;
        font-size: 15px;
        color: #ffffff;
        background-color: #1883ba;
        border-radius: 6px;
        border: 1px solid #0016b0;
        }

        p {
            margin: 0 0 10px 0
        }

        table.width200,
        table.rwd_auto {
            border: 1px solid #ccc;
            width: 100%;
            margin: 0 0 50px 0
        }

        .width200 th,
        .rwd_auto th {
            background: #ccc;
            padding: 5px;
            text-align: center;
        }

        .width200 td,
        .rwd_auto td {
            border-bottom: 1px solid #ccc;
            padding: 5px;
            text-align: center
        }

        .width200 tr:last-child td,
        .rwd_auto tr:last-child td {
            border: 0
        }

        .rwd {
            width: 100%;
            overflow: auto;
        }

        .rwd table.rwd_auto {
            width: auto;
            min-width: 100%
        }

        .rwd_auto th,
        .rwd_auto td {
            white-space: nowrap;
        }

        @media only screen and (max-width: 760px),
        (min-width: 768px) and (max-width: 1024px) {

            table.width200,
            .width200 thead,
            .width200 tbody,
            .width200 th,
            .width200 td,
            .width200 tr {
                display: block;
            }

            .width200 thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            .width200 tr {
                border: 1px solid #ccc;
            }

            .width200 td {
                border: none;
                border-bottom: 1px solid #ccc;
                position: relative;
                padding-left: 50%;
                text-align: left
            }

            .width200 td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }


            .descarto {
                display: none;
            }

            .fontsize {
                font-size: 10px
            }
        }


    }
</style>

@endsection

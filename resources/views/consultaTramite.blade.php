@extends('layouts.header')
@section('contenido')
<main>

    <section id=".table-container">

        <div class="table-container">


            <br> <br>
            <center>
                <h1>CONSULTA</h1>

                <form action="">

                    <div>
                        <select class="boton_personalizado" style='width:120px; height:40px'>
                            <option value="">Tipo</option>
                            @foreach ($tipo_de_tramite_info as $tipo_de_tramite)
                        <option value="{{$tipo_de_tramite->idtipoTramite}}">{{$tipo_de_tramite->categoria}}</option>
                            @endforeach
                        </select>




                        <select class="boton_personalizado" style='width:120px; height:40px'>
                            <option value="">Estatus</option>
                            <option value="AC">Activo (AC)</option>
                            <option value="NA">No Activo (NA)</option>
                        </select>

                        <select class="boton_personalizado" style='width:120px; height:40px'>
                            <option value="">Area</option>
                            @foreach($all_area_info as $area)
                            <option value="{{$area->idarea}}">{{$area->nombre}}</option>
                            @endforeach
                        </select>
                        <br> <br>
                        <button class="boton-Personalizado" style='width:120px; height:40px' type="submit"></a><span
                                class="mif-file-text mif-search "></span> Buscar</button></br>



                    </div>
                </form>
                <br>


                <center>
                    <!-- tabla -->
                    <div id="div1">
                        <table class=".width200" border="1" cellpadding="0" cellspacing="1"
                            style="border-collapse:collapse;border-color:#7612b5;">
                            <caption style="border-color:#666666; border-style:dashed; border-width:2px;">
                                <strong>TLACOTALPAN</strong></caption>
                            <tr>
                                <TD bgcolor="#adabbc" width="150">ID</TD>
                                <TD bgcolor="#adabbc" width="150">AREA</TD>
                                <TD bgcolor="#adabbc" width="150">NOMBRE</TD>
                                <TD bgcolor="#adabbc" width="150">TIPO TRAMITE</TD>
                                <TD bgcolor="#adabbc" width="150">COSTO</TD>
                                <TD bgcolor="#adabbc" width="150">ESTATUS</TD>
                                <TD bgcolor="#adabbc" width="150">VER MAS</TD>

                                <!--	CONSULTA -->



                            </tr>



                            @foreach ($tramites_info as $tramites)

                            <tr>
                                <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                    {{$tramites->idtramites}}
                                </TD>
                                <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                        <?php
                                        $nombre_area= DB::select("SELECT nombre FROM tlv_1821_ar WHERE idarea='$tramites->idarea'");
                                        echo $nombre_area[0]->nombre;
                                        ?>
                                </TD>
                                <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                    {{$tramites->nombre}}
                                </TD>
                                <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                    <?php
                                    $tipo_tramite=DB::select("SELECT categoria FROM tipotramite WHERE idtipoTramite='$tramites->idtipoTramite'");
                                    echo $tipo_tramite[0]->categoria;
                                    ?>
                                </TD>
                                <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                    {{$tramites->costo}}
                                </TD>
                                <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                    {{$tramites->status}}
                                </TD>
                                <TD style="border-color:#666666; border-style:dashed; border-width:2px;" width="150">
                                    <a href="{{url('verMasTramites/'.$tramites->idtramites)}}"><span class="mif-eye mif-3x ">
                                        </span></a>
                                </TD>





                            </tr>
                            @endforeach

                        </table>

                    </div>
                </center>

        </div>

    </section>
</main>
<style type="text/css">
    .boton_personalizado {
        text-decoration: none;
        padding: 10px;
        font-weight: 600;
        font-size: 15px;
        color: #ffffff;
        background-color: #1883ba;
        border-radius: 6px;
        border: 1px solid #0016b0;


        body {
            margin: 0;
            padding: 50px
        }

        h2 {
            font-size: 36px;
            margin: 0 0 10px 0
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

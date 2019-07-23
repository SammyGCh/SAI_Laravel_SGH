<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF CONSULTA GENERAL</title>
</head>

<body>
    <main>
        <h2 align="center"><b>LISTADO DE REPORTES</b></h2>
        <table width="100%" border="0.2" cellspacing="1" cellpadding="1" class="table_pdf">
            <thead>
                <tr valign="bottom">
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>FOLIO</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>TIPO</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>ESTATUS</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>NOMBRE</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>TELÉFONO</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>DIRECCIÓN</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>FECHA</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>DESCRIPCIÓN</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>AREA</b></th>
                    <th bgcolor="#CB29FB" align="center" style="color: white"><b>COLONIA</b></th>
                </tr>
            </thead>
            <tbody>
                <?php $contador=0;    ?>
                @foreach ($all_consultaReporte_info_pdf as $consultaReporte)
                @if ($contador%2 != 0)
                <?php $color = '#EFBBFF'; ?>
                @else
                <?php $color = '#FFFFFF'; ?>
                @endif
                <tr bgcolor="<?php echo $color; ?>">
                    <td>{{$consultaReporte->folio}}</td>
                    <td>
                        <?php
                $nombre_tipo = DB::select("SELECT nombre FROM tlv_1821_lr WHERE idlistaReportes ='".$consultaReporte->idlistaReportes."'");
                echo $nombre_tipo[0]->nombre;
                ?>
                    </td>
                    <td>{{$consultaReporte->status}}</td>
                    <td>{{$consultaReporte->nombre}}</td>
                    <td>{{$consultaReporte->telefono}}</td>
                    <td>{{$consultaReporte->calle}}</td>
                    <td>{{$consultaReporte->fecha}}</td>
                    <td>{{$consultaReporte->descripcion}}</td>
                    <td><?php
                    $nombre_area= DB::select("SELECT nombre FROM tlv_1821_ar WHERE idarea=(SELECT idarea FROM tlv_1821_lr WHERE idlistaReportes='".$consultaReporte->idlistaReportes."')");
                    echo $nombre_area[0]->nombre;
                    ?>
                    </td>
                    <td>
                        <?php
                        $nombre_colonia= DB::select("SELECT nombre FROM colonia WHERE idcolonia='".$consultaReporte->idcolonia."'");
                        echo $nombre_colonia[0]->nombre;
                        ?>
                    </td>
                </tr>
                <?php $contador++; ?>
                @endforeach
            </tbody>
        </table>
        <h4 align="right">TOTAL DE REPORTES: {{$contador}}</h4>
    </main>
</body>

<style type="text/css">
    .table_pdf {
        table-layout: auto;
        padding: 5px;

    }
</style>

</html>

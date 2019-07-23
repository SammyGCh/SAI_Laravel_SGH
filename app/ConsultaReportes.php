<?php

namespace SAI;
use DB;

use Illuminate\Database\Eloquent\Model;

class ConsultaReportes extends Model
{
    protected $table = 'reportes';

    protected $fillable =[
    'folio',
    'nombre',
    'paterno',
    'materno',
    'idarea',
    'fecha',
    'status',
    'idcolonia',
    'idlistaReportes'];

    public function scopeNombre($query, $nombre_reporte){
        if(trim($nombre_reporte)!=""){
            $query->where(DB::raw("CONCAT(nombre,' ',paterno)"), "LIKE", "%$nombre_reporte%");
        }
    }
    public function scopeColonia($query, $idcolonia){
        if($idcolonia !=""){
            $query->where('idcolonia', "=", "$idcolonia");
        }
    }

    public function scopeEstatus($query, $status){
        if($status){
            $query->where('status', "LIKE", "$status");
        }
    }

    public function scopeTipo($query, $tipoReporte){

        if($tipoReporte){
            $query->where('idlistaReportes', "=", "$tipoReporte");
        }

    }

    public function scopeFecha($query, $fechaInicio, $fechaFin){

        if ($fechaInicio && $fechaFin) {
            $query->where('fecha', ">=", "$fechaInicio")->where('fecha', "<=", "$fechaFin");
        }
    }

    public function scopeFolio($query, $folio){
        if($folio){
            $query->where('folio',"=","$folio");
        }
    }
}

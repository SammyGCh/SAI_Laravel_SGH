<?php

namespace SAI\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromCollection, WithHeadings , ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return ['folio',
        'nombre',
        'fecha',
        'status',
        'colonia',
        'tipo de reporte',
        'Telefono',
        'correo',
        'calle', 'localidad',
        'descripcion',
        'Fecha Solucion'];
    }
    public function collection()
    {
         $table_reportes = DB::table('reportes')
         ->select('folio',
         DB::raw("CONCAT(nombre, ' ', paterno, ' ',materno)"),
         'fecha','status',
         DB::raw('(select nombre from colonia where colonia.idcolonia = reportes.idcolonia)'),
         DB::raw('(SELECT nombre from tlv_1821_lr where tlv_1821_lr.idlistaReportes = reportes.idlistaReportes)'),
         'telefono',
         'correo',
         'calle', 'localidad',
         'descripcion',
         'fechaSolucion'
         )->get();
         return $table_reportes;
    }
}

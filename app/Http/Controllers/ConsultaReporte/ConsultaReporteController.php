<?php

namespace SAI\Http\Controllers\ConsultaReporte;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use SAI\ConsultaReportes;
use Illuminate\Pagination\PaginationServiceProvider;
use SAI\Exports\ReportExport;
use TCPDF;
use Excel;

class ConsultaReporteController extends Controller
{
    protected $all_consultaReporte_info;
    protected $view;
    protected $search_colonia;
    protected $search_status;
    protected $search_areas;
    protected $search_folio;
    protected $search_tipoReporte;
    protected $search_fechaInicio;
    protected $search_fechaFin;

    public function setAll_consultaReporte_info($all_consultaReporte_info)
    {
        $this->all_consultaReporte_info = $all_consultaReporte_info;
    }
    public function getAll_consultaReporte_info()
    {
        return $this->all_consultaReporte_info;
    }



    public function index()
    {
        $all_area_info = DB::table('tlv_1821_ar')->get();
        $all_colonia_info = DB::table('colonia')->get();
        $all_listaReporte_info = DB::table('tlv_1821_lr')->get();
        $this->all_consultaReporte_info = DB::select('SELECT * FROM reportes ORDER BY
        fecha DESC;');


        $this->downloadPDF($this->all_consultaReporte_info);
        return view('consultareporte')
            ->with('all_consultaReporte_info', $this->all_consultaReporte_info)
            ->with('all_area_info', $all_area_info)
            ->with('all_listaReporte_info', $all_listaReporte_info)
            ->with('all_colonia_info', $all_colonia_info);

    }

    public function filtrado_reporte(Request $request)
    {
        $all_area_info = DB::table('tlv_1821_ar')->get();
        $all_colonia_info = DB::table('colonia')->get();
        $all_listaReporte_info = DB::table('tlv_1821_lr')->get();
        $this->search_nombre = $request->get('search_nombre');
        $this->search_colonia = $request->get('colonias');
        $this->search_status = $request->get('estatus');
        $this->search_areas = $request->get('areas');
        $this->search_folio = $request->get('search_folio');
        $this->search_tipoReporte = $request->get('tipoReporte');
        $this->search_fechaInicio = $request->get('date_timepicker_start');
        $this->search_fechaFin = $request->get('date_timepicker_end');

        if ($this->search_areas != "") {
            $this->all_consultaReporte_info = DB::select("SELECT * FROM reportes WHERE idlistaReportes IN (SELECT idlistaReportes FROM tlv_1821_lr WHERE idarea = '$this->search_areas')");

            $this->downloadPDF($this->all_consultaReporte_info);
        } else {
            $this->all_consultaReporte_info = ConsultaReportes::orderBy('fecha', 'desc')
                ->nombre($this->search_nombre)
                ->colonia($this->search_colonia)
                ->tipo($this->search_tipoReporte)
                ->estatus($this->search_status)
                ->fecha($this->search_fechaInicio, $this->search_fechaFin)
                ->folio($this->search_folio)
                ->get();

            $this->downloadPDF($this->all_consultaReporte_info);
        }


        return view('consultareporte')->with('all_consultaReporte_info', $this->all_consultaReporte_info)
            ->with('all_area_info', $all_area_info)
            ->with('all_listaReporte_info', $all_listaReporte_info)
            ->with('all_colonia_info', $all_colonia_info);
    }

    function fetch(Request $request)
    {
        $consultaReporte_fetch = DB::select('SELECT * FROM reportes ORDER BY
        fecha DESC;');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::select("SELECT nombre FROM tlv_1821_ar WHERE idarea=(SELECT idarea FROM tlv_1821_lr WHERE idlistaReportes='" . $consultaReporte_fetch->idlistaReportes . "')")
            ->get();
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }

    public function export(Request $request)
    {
        //return Excel::download(new ReportExport, 'reportes.xlsx');

       return Excel::create('Reportes', function($excel) {

            $excel->sheet('New sheet', function($sheet) {

                $sheet->loadView('Excel.excel_consulta');

            });

        })->download('xlsx');

    }

    public function vistaPDF()
    {
        $url = $_SERVER['DOCUMENT_ROOT'].'/temp/reporte.pdf';
        if (file_exists($url)) {
            return response()->file($url)->deleteFileAfterSend();
        } else{
            $this->index();
            return response()->file($url)->deleteFileAfterSend();
        }

    }

    public function downloadPDF($all_listaReporte_info)
    {
        $all_area_info = DB::table('tlv_1821_ar')->get();
        $all_colonia_info = DB::table('colonia')->get();
        $all_listaReporte_info = DB::table('tlv_1821_lr')->get();
        $all_consultaReporte_info_pdf = DB::select('SELECT * FROM reportes ORDER BY        fecha DESC;');
        $all_consultaReporte_info_pdf = $this->getAll_consultaReporte_info();

        $pdf = new MyPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('webmaster');
        $pdf->SetTitle('listadoReportes');
        $pdf->SetMargins(10, 40, 10);
        $pdf->SetFooterMargin(17); //36 20
        $pdf->SetAutoPageBreak(true, 30);
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();
        $view = \view('PDF.pdf_consulta_reportes')
            ->with('all_consultaReporte_info_pdf', $all_consultaReporte_info_pdf)
            ->with('all_area_info', $all_area_info)
            ->with('all_listaReporte_info', $all_listaReporte_info)
            ->with('all_colonia_info', $all_colonia_info);
        $html_content = $view->render();
        $pdf->writeHTML($html_content, true, false, true, false, '');
        $pdf->lastPage();

        $pdf->Output($_SERVER['DOCUMENT_ROOT'].'/temp/reporte.pdf', 'F');
    }
}
class MyPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        $contenido = '<img src = "img/pdf_header.jpg" width = "1000" height= "130">';
        $this->writeHTML($contenido, true, false, true, false, '');
    }

    // Page footer

    public function Footer()
    {
        $contenido = '';
        $contenido = '<img src = "img/pdf_footer.jpg" width = "10000" height= "600">';
        $this->writeHTML($contenido, true, false, true, false, '');
    }
}

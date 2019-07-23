<?php

namespace SAI\Http\Controllers;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use TCPDF;
use DB;

class PDFController extends Controller
{
    public function index(){
        $all_area_info = DB::table('tlv_1821_ar')->get();
        $all_colonia_info = DB::table('colonia')->get();
        $all_listaReporte_info = DB::table('tlv_1821_lr')->get();
        $all_consultaReporte_info_pdf = DB::select('SELECT * FROM reportes ORDER BY
        fecha DESC;');
        return view('PDF.pdf_consulta_reportes')
            ->with('all_consultaReporte_info_pdf', $all_consultaReporte_info_pdf)
            ->with('all_area_info', $all_area_info)
            ->with('all_listaReporte_info', $all_listaReporte_info)
            ->with('all_colonia_info', $all_colonia_info);
    }

    public function downloadPDF()
    {
        $all_area_info = DB::table('tlv_1821_ar')->get();
        $all_colonia_info = DB::table('colonia')->get();
        $all_listaReporte_info = DB::table('tlv_1821_lr')->get();
        $all_consultaReporte_info_pdf = DB::select('SELECT * FROM reportes ORDER BY
        fecha DESC;');

        $pdf = new MyPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('webmaster');
        $pdf->SetTitle('listadoReportes');
       // $pdf->setPrintFooter(true);
        $pdf->SetMargins(10, 40, 10);
        $pdf->SetFooterMargin(17); //36 20
        $pdf->SetAutoPageBreak(true, 30);
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();
        $view= \view('PDF/pdf_consulta_reportes')
        ->with('all_consultaReporte_info_pdf', $all_consultaReporte_info_pdf)
        ->with('all_area_info', $all_area_info)
        ->with('all_listaReporte_info', $all_listaReporte_info)
        ->with('all_colonia_info', $all_colonia_info);
        $html_content = $view->render();
        $pdf->writeHTML($html_content, true, false, true, false, '');
        $pdf->lastPage();
        $pdf->Output(uniqid().'_SamplePDF.pdf', 'I');

    }
}

class MyPDF extends TCPDF {

    //Page header
    public function Header() {
        $contenido = '<img src = "img/pdf_header.jpg" width = "1000" height= "130">';
        $this->writeHTML($contenido, true, false, true, false, '');
    }

    // Page footer

    public function Footer() {
        $contenido = '';
        $contenido = '<img src = "img/pdf_footer.jpg" width = "10000" height= "600">';
        $this->writeHTML($contenido, true, false, true, false, '');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 09/07/17
 * Time: 13:43
 */
class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiModel');
        $this->load->library('session');
        $this->load->helper(array('dompdf', 'file', 'utils'));
    }

    public function view()
    {
        $data['list_transaksi'] = $this->TransaksiModel->getAllTransaksi('confirmed');
        $this->load->view('export/to_pdf', $data);
    }

    public function pdf()
    {

//        $pdfFilePath = FCPATH . "transaksi.pdf";
//
//        $data['list_transaksi'] = $this->TransaksiModel->getAllTransaksi('confirmed');
//
//        if (file_exists($pdfFilePath) == FALSE) {
//
//            ini_set('memory_limit', '32M'); // boost the memory limit if it's low ;)
//
//            $stylesheet = file_get_contents(getcwd() . '/assets/bs/css/bootstrap.min.css');
//            $html = $this->load->view('export/to_pdf', $data, true); // render the view into HTML
//
//            $pdf = $this->pdf->load();
//
//            $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822));
//
//            $pdf->WriteHTML($stylesheet, 1); // write the HTML into the PDF
//            $pdf->WriteHTML($html, 2); // write the HTML into the PDF
//
//            if (file_exists(FCPATH . "transaksi.pdf")) {
//                unlink(FCPATH . "transaksi.pdf");
//            }
//
//            $pdf->Output($pdfFilePath, 'F'); // save to file because we can
//        }
//
//        redirect("transaksi.pdf");

        $data['list_transaksi'] = $this->TransaksiModel->getAllTransaksi('confirmed');
        $html = $this->load->view('export/to_pdf', $data, true);

        pdf_create($html, 'Hello World', true);
    }
}
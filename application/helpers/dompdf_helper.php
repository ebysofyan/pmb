<?php
/**
 * Created by PhpStorm.
 * User: eby
 * Date: 13/07/17
 * Time: 22:32
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html, $filename = '', $stream = TRUE)
{
    require_once(FCPATH . "vendor/dompdf/dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'landscape');
    $dompdf->render();

    if ($stream) {
        $dompdf->stream($filename . ".pdf");
    } else {
        return $dompdf->output();
    }
}

?>
<?php
/**
 * Created by PhpStorm.
 * User: eby
 * Date: 09/07/17
 * Time: 14:22
 */

function generate_pdf($html, $filename)
{
//    define('DOMPDF_ENABLE_AUTOLOAD', false);
//    require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
    require_once("./vendor/mpdf/mpdf/mpdf.php");

    $mpdf = new Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}

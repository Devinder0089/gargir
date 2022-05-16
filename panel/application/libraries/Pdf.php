<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf{
    
    function createPDF($html, $filename='', $download=FALSE, $paper='A4', $orientation='portrait'){
        $options = new Options();
        $options->set('isRemoteEnabled',true);     
        
        $dompdf = new Dompdf($options);;
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>
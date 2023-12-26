<?php
require_once 'autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf;
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml("Hola mundo en pdf");
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("file.pdf", array("Attachment"=>false));
?>
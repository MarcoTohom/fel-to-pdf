<?php
$xml = new XMLReader();
$xml->open('factura.xml');

$dteDatosGenerales = array();
$dteItems = array(); $countItem = 0;
while($xml->read()){
    if($xml->nodeType == XMLREADER::ELEMENT)  {
        $dteItem = array();
        /* $xml->read();
        echo $xml->value . '</br>'; */
        /*  DATOS GENERALES */
        if($xml->localName == 'dteDatosGenerales'){
            $dteDatosGeneral = array();
            $dteDatosGeneral['CodigoMoneda'] = $xml->getAttribute('CodigoMoneda');
            $dteDatosGeneral['FechaHoraEmision'] = $xml->getAttribute('FechaHoraEmision');
            $dteDatosGeneral['Tipo'] = $xml->getAttribute('Tipo');
            array_push($dteDatosGenerales, $dteDatosGeneral);
        }
        if($xml->localName == 'dteItem'){
            array_push($dteItems, $xml->getAttribute('BienOServicio'));
        }
        if($xml->localName == 'dteCantidad'){
            $xml->read();
            array_push($dteItems, $xml->value);
        }
    }
}
echo '<pre>';
print_r($dteDatosGenerales);
print_r($dteItems);
echo '</pre>';
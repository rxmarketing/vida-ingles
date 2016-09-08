<?php
$responseString = 'Hola <strong>'.$_POST['nombrecompleto'].'</strong>, Tu informaci&oacute;n de contacto ha sido guarda. ';
$responseString.= 'Nos has enviado la siguiente informaci&oacute;n: ';
$responseString.= '<br/>';
$responseString.= '<strong>E-mail:</strong> '.$_POST['email'];
$responseString.= '<br/>';
$responseString.= '<strong>Sexo:</strong> '.$_POST['sexo'];
$responseString.= '<br/>';
$responseString.= '<strong>Pa&iacute;s:</strong> '.$_POST['pais'];
echo $responseString;
?>
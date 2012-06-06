<?php
include_once 'autoload.inc.php';

$orgaos = new orgaos();

$lista = $orgaos->getPauta("2004", "01/01/2012", "30/04/2012");

echo "<pre>";
print_r($lista);

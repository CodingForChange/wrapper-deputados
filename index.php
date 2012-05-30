<?php
include_once 'autoload.inc.php';

$deputados = new deputados();

echo "<pre>";
print_r($deputados->findByUF("ES"));
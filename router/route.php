<?php
require_once("vendor/autoload.php");

use Pux\Mux;

$mux = new Mux;
$mux->any('/', ['Mvc\Controller\Controller', 'index']);
return $mux;

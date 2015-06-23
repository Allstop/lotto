<?php
require "vendor/autoload.php";
use Pux\Executor;

$mux = require "router/route.php";
$route = $mux->dispatch($_SERVER['DOCUMENT_URI']);
echo Executor::execute($route);

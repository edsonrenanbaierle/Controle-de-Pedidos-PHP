<?php

require_once __DIR__ . "/vendor/autoload.php";
header('Acces-Control-Allow-Origin: *');
header('Content-type: application/json');
date_default_timezone_set('America/Sao_Paulo');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\Core\Core;

require_once __DIR__ . "/src/Routes/routes.php";

$core = new Core();
$core->run($routes);

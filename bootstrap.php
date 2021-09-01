<?php
include "Services/OperacionesService.php";

use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();

/* SE ONTIENEN VALORES DEL ENV Y SE PARAMETRIZA LA CLASE CONTROLADOR */
use Dotenv\Dotenv;

$env = Dotenv::createImmutable(__DIR__);
$env->safeLoad();

$coin_market_url = $_ENV['COIN_MARKET_URL'];
$checker_api = $_ENV['CHECKER_API'];

$service = new OperacionesService($coin_market_url, $checker_api);
/*********************************************************************/
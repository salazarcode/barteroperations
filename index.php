<?php
include "bootstrap.php";
include "Services/Util.php";

use Symfony\Component\HttpFoundation\Request;

$res = null;

try
{               
    switch ($request->server->get("REQUEST_URI")) {
        case '/markets':
            $res = $service->GetCoinMarkets();
            break;
            
        case '/checker':
            $res = $service->CheckTransaction();
            break;
    }
    
    MyJsonResponse(true, $res, null)->send();
}
catch(Exception $ex)
{
    MyJsonResponse(false, null, $ex->getMessage())->send();
}
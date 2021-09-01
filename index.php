<?php
include "bootstrap.php";
include "Services/Util.php";

use Symfony\Component\HttpFoundation\Request;

$res = null;

try
{               
    switch ($request->server->get("REQUEST_URI")) {
        case '/market':
            $vs_currency = $request->get("vs_currency");
            $order = $request->get("order");
            $per_page = $request->get("per_page");
            $page = $request->get("page");
            $sparkline = $request->get("sparkline");

            $res = $service->GetCoinMarkets($vs_currency, $order, $per_page, $page, $sparkline);
            break;
            
        case '/check':
            $hash = $request->get("hash");
            $amount = $request->get("amount");

            $res = $service->CheckTransaction($hash, $amount);
            break;
    }
    
    MyJsonResponse(true, $res, null)->send();
}
catch(Exception $ex)
{
    MyJsonResponse(false, null, $ex->getMessage())->send();
}
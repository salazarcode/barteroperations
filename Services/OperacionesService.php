<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class OperacionesService
{   
    private $coin_market_url = null;
    private $checker_api_url = null;
    private $client = null;
    private $request = null;


    function __construct($request, $coin_market_url, $checker_api_url) 
    {
        $this->coin_market_url = $coin_market_url;
        $this->checker_api_url = $checker_api_url;
        $this->client = new Client();
        $this->request = $request;
    }


    public function GetCoinMarkets()
    {
        try{
            $vs_currency = $this->request->get("vs_currency");
            $order = $this->request->get("order");
            $per_page = $this->request->get("per_page");
            $page = $this->request->get("page");
            $sparkline = $this->request->get("sparkline");

            $res = $this->client->request("GET", $this->coin_market_url . 'coins/markets', [
                "query" => [
                    "vs_currency" => $vs_currency,
                    "order" => $order,
                    "per_page" => $per_page,
                    "page"=> $page,
                    "sparkline"=> $sparkline
                ]
            ]);
            $resString = $res->getBody()->getContents();

            return json_decode($resString);
        }catch(Exception $ex){
            throw $ex;
        }
    }

    public function CheckTransaction()
    {
        try{            
            $hash = $this->request->get("hash");
            $amount = $this->request->get("amount");

            $res = $this->client->request("GET", $this->checker_api_url, [
                "query" => [
                    "hash" => $hash,
                    "expectedAmount" => $amount
                ]
            ]);

            $resString = $res->getBody()->getContents();

            return json_decode($resString);
        }catch(Exception $ex){
            throw $ex;
        }
    }

}


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


    function __construct($coin_market_url, $checker_api_url) 
    {
        $this->coin_market_url = $coin_market_url;
        $this->checker_api_url = $checker_api_url;
        $this->client = new Client();
    }


    public function Market($vs_currency, $order, $per_page, $page, $sparkline)
    {
        try{

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

    public function Check()
    {
        try{            
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


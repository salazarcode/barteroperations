<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Dotenv\Dotenv;

class OperacionesService
{   
    private $coin_market_url = null;
    private $checker_api_url = null;
    private $client = null;

    function __construct() 
    {        
        $this->client = new Client();
        $env = Dotenv::createImmutable(__DIR__);
        $env->safeLoad();
        $this->coin_market_url = $_ENV['COIN_MARKET_URL'];
        $this->cointrader_api = $_ENV['COINTRADER_API'];
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

    public function Check($hash, $amount)
    {
        try{            
            $res = $this->client->request("GET", $this->cointrader_api, [
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


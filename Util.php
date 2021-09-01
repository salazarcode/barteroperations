<?php
include "vendor/autoload.php";
use Symfony\Component\HttpFoundation\JsonResponse;

function MyJsonResponse($success = true, $data = null, $message = null)
{
    return new JsonResponse([
        "success" => $success,
        "data" => $data,
        "message" => $message
    ]); 
}
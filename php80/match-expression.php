<?php

/**
 * PHP 8.0 match 함수
 */

namespace Php80;

require_once __DIR__ . "/../vendor/autoload.php";

function errorCode()
{
    return 500;
}

$responseCode = 200;
// $responseCode = "200";
// $responseCode = 500;
// $responseCode = 550;

$responseBody = match ($responseCode) {
    200 => "integer ok",
    "200" => "string ok",
    errorCode() => "error",
    default => "other",
};

dd($responseBody);

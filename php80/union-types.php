<?php

/**
 * PHP 8.0 유니온 타입
 */

namespace Php80;

require_once __DIR__ . "/../vendor/autoload.php";

function multiType(string|int $number): int
{
    if (is_int($number)) return $number;
    else return (int) $number;
}

$results = [
    multiType(100),
    multiType("100")
];

dd($results);

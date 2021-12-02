<?php

/**
 * PHP 8.0 널 세이프 예제
 */

namespace Php80;

require_once __DIR__ . "/../vendor/autoload.php";

class Session
{
    function __construct(public ?User $user = null)
    {
    }
}

$session = new Session();
$name = $session?->user?->getName();

dd($name);

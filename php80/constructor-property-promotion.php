<?php

/**
 * PHP 8.0 생성자 프로모션
 */

namespace Php80;

require_once __DIR__ . "/../vendor/autoload.php";

class Color
{
    function __construct(
        public int $red = 0,
        public int $green = 0,
        public int $blue = 0,
        public int $alpha = 1,
    ) {
    }
}

$color = new Color(255, 255, 255);

dd($color);

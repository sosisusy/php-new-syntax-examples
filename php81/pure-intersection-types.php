<?php

/**
 * PHP 8.1 Pure Intersection Types
 */

namespace Php81;

use ReflectionClass;

require_once __DIR__ . "/../vendor/autoload.php";

interface Arrayable
{
    public function toArray(): array;
}

abstract class Struct implements Arrayable
{
    public function toArray(): array
    {
        $results = [];
        $ref = new ReflectionClass($this);

        foreach ($ref->getProperties() as $property) {
            $results[$property->getName()] = $property->getValue($this);
        }

        return $results;
    }
}

class Tumbler extends Struct
{

    function __construct(
        public readonly string $productName,
        public readonly string $manufacturer,
        public readonly string $volume,
    ) {
    }
}

function production(Struct&Arrayable $struct, int $count = 1): array
{
    $results = [];

    for ($i = 0; $i < $count; $i++) $results[] = clone $struct;

    return $results;
}

$tumbler = new Tumbler("퓨어 텀블러", "락앤락", "450ml");
$result = production($tumbler, 2);

dd($result);

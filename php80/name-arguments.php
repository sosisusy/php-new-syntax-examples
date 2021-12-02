<?php

/**
 * PHP 8.0 네임 파라미터 예제
 */

namespace Php80;

require_once __DIR__ . "/../vendor/autoload.php";

class User
{
    function __construct(
        public string $name,
        public string $nickname,
        public int $age,
        public string $address,
    ) {
    }

    function getName(): string
    {
        return $this->name;
    }
}


$user = new User("홍길동", "감자", age: 18, address: "경기도");

dd($user);

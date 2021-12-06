<?php

/**
 * PHP 8.1 Enum
 */

namespace Php81;

require_once __DIR__ . "/../vendor/autoload.php";

interface Bark
{

    public function bark(): string;
}

enum AnimalType: string implements Bark
{
    case Cat = "cat";
    case Dog = "dog";
    case Tiger = "tiger";
    case Goose = "goose";

    function bark(): string
    {
        return match ($this) {
            AnimalType::Cat => "야옹",
            AnimalType::Dog => "멍멍",
            AnimalType::Tiger => "어흥",
            AnimalType::Goose => "꽥꽥",
        };
    }
}

function getAnimalType(AnimalType|string $animal): ?AnimalType
{
    if ($animal instanceof AnimalType) return $animal;

    return AnimalType::tryFrom($animal);
}

class Animal implements Bark
{

    function __construct(public AnimalType $animalType)
    {
    }

    public function bark(): string
    {
        return $this->animalType->bark();
    }
}

// 값 조회
// dd(AnimalType::Cat->value);

// 값으로 타입 조회
// dd(AnimalType::from("tiger"));
// dd(AnimalType::from("test"));

// 값으로 타입 조회, 조회 실패 시 null
// dd(AnimalType::tryFrom("tiger") ?? "other");
// dd(AnimalType::tryFrom("test") ?? "other");

// enum 메서드
// dd(AnimalType::Tiger->bark());

// 전체 타입
// dd(AnimalType::cases());

// class
// dd((new Animal(AnimalType::Cat))->bark());

// dd(getAnimalType(AnimalType::Cat));
// dd(getAnimalType("cat")?->bark());
// dd(getAnimalType("cat2")?->bark());
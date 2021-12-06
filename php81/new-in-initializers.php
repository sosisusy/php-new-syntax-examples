<?php

/**
 * PHP 8.1 New in initializers
 */

namespace Php81;

require_once __DIR__ . "/../vendor/autoload.php";

class Service
{
}

class UserService extends Service
{
    function __construct(
        protected UserRepository $repository = new UserRepository
    ) {
    }

    function getUsers(): array
    {
        return $this->repository->getUsers();
    }
}

class Repository
{
}

class UserRepository extends Repository
{

    function __construct()
    {
    }

    function getUsers(): array
    {
        $results = [];

        foreach (range(1, 3) as $num) {
            $results[] = (object) [
                "id" => $num,
                "name" => "user" . $num,
            ];
        }

        return $results;
    }
}

$userRepository = new UserRepository;

$userService = new UserService();
// $userService = new UserService(repository: $userRepository);

dd($userService->getUsers());

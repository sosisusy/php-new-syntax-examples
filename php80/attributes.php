<?php

/**
 * PHP 8.0 어노테이션 예제
 */

namespace Php80;

use ReflectionObject;

require_once __DIR__ . "/../vendor/autoload.php";

class RouterMethodType
{
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const PATCH = "PATCH";
    const DELETE = "DELETE";
}

class Router
{
    function __construct(protected string $path)
    {
    }

    function getPath()
    {
        return $this->path;
    }
}

class PostRouter extends Router
{
}

class GetRouter extends Router
{
}

class PutRouter extends Router
{
}

class PatchRouter extends Router
{
}

class DeleteRouter extends Router
{
}

/**
 * 베이스 컨트롤러
 */
class Controller
{
}

/**
 * 회원 컨트롤러
 */
class UserController extends Controller
{
    #[GetRouter(path: "/api/users")]
    function index()
    {
    }

    #[GetRouter(path: "/api/users/{id}")]
    function show($id)
    {
    }

    #[PostRouter(path: "/api/users")]
    function store()
    {
    }
}

/**
 * 주문 컨트롤러
 */
class OrderController extends Controller
{
    #[GetRouter(path: "/api/orders")]
    function index()
    {
    }

    #[GetRouter(path: "/api/orders/{id}")]
    function show()
    {
    }

    #[PostRouter(path: "/api/orders")]
    function store()
    {
    }

    #[PutRouter(path: "/api/orders/{id}")]
    function update($id)
    {
    }
}

/**
 * 라우트 메소드
 */
function getRouteMethod(string $routerClass)
{
    return match ($routerClass) {
        GetRouter::class => RouterMethodType::GET,
        PostRouter::class => RouterMethodType::POST,
        PutRouter::class => RouterMethodType::PUT,
        PatchRouter::class => RouterMethodType::PATCH,
        DeleteRouter::class => RouterMethodType::DELETE,
        default => null
    };
}

/**
 * 라우트 추가
 */
function appendRoutes(array &$routes, Controller $controller)
{
    $reflection = new ReflectionObject($controller);

    foreach ($reflection->getMethods() as $method) {
        $attributes = $method->getAttributes();

        foreach ($attributes as $attribute) {
            $routeMethod = getRouteMethod($attribute->getName());
            $args = $attribute->getArguments();
            $path = $args["path"] ?? null;

            if (is_null($routeMethod) || is_null($path)) continue;

            $routes[$routeMethod][$path] = [
                "class" => $controller::class,
                "method" => $method->getName(),
                "path" => $path,
            ];
        }
    }
}

$routes = [];

appendRoutes($routes, new UserController);
appendRoutes($routes, new OrderController);

dd($routes);

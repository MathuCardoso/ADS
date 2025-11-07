<?php

namespace App\routing;

require_once __DIR__ . "/../../autoload.php";

class Route
{

    public static function get(
        string $uri,
        array $action
    ) {
        self::handleRoute($uri, $action, "GET");
    }

    public static function post(
        string $uri,
        array $action
    ) {
        self::handleRoute($uri, $action, "POST");
    }

    public function delete(string $uri, array $action) {}

    private static function handleRoute(string $uri, array $action, string $httpMethod)
    {

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);


        if ($_SERVER['REQUEST_METHOD'] === $httpMethod) {
            if ($url === $uri) {

                [$className, $method] = $action;

                $class = new $className();
                $class->$method();
                exit;
            } else {
                return;
            }
        } else {
            return;
        }
    }
}

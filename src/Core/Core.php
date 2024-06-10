<?php

namespace App\Core;

use App\Http\Request;
use App\Controller\NaoEncontradoController;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, x-xsrf-token, x-csrftoken, X-Requested-With, Cache-Control");
header("Content-Type: application/json");
class Core
{

    public function run($route)
    {
        $method = Request::method();
        $url = $method . "/";

        if (isset($_GET["path"])) {
            $url = $url . $_GET["path"];
        }

        $rotaEncontrada = false;
        $prefixController = 'App\\Controller\\';

        foreach ($route as $path => $controller) {
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $path) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                $rotaEncontrada = true;
                array_shift($matches);

                [$currentController, $action] = explode('@', $controller);

                $controller = $prefixController . $currentController;
                $newController = new $controller();
                $newController->$action($matches);
            }
        }

        if ($rotaEncontrada == false) {
            $controller = new NaoEncontradoController();
            $controller->naoEncontradoRota();
        }
    }
}

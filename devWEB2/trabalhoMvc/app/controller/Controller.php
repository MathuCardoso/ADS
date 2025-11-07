<?php

namespace App\controller;

use App;
use App\controller\ViewController;

require_once __DIR__ . "/../../configs/App.php";

class Controller
{
    protected function loadView(string $view, array $var = [])
    {

        $view = App::URL_VIEW  . "{$view}.php";

        if (!file_exists($view)) {
            echo "<h1>A view: <br> <em>{$view}</em> <br> não existe!</h1>";
            return;
        }

        if ($var) {
            extract($var);
        }
        
        $viewController = new ViewController();

        require_once $view;
    }
}

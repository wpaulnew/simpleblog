<?php

namespace vendor\core;

class Router
{

    private $routes;

    public function __construct($routes)
    {
        if (is_array($routes)) {
            $this->routes = $routes;
        }
    }

    // Метод получает URI. Несколько вариантов представлены для надёжности.
    public function getLink()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

        if (!empty($_SERVER['PATH_INFO'])) {
            return trim($_SERVER['PATH_INFO'], '/');
        }

        if (!empty($_SERVER['QUERY_STRING'])) {
            return trim($_SERVER['PATH_INFO'], '/');
        }
    }

    public function match($link)
    {
        foreach ($this->routes as $pattern => $route) {
            // Если правило совпало.
            if (preg_match("~$pattern~", $link)) {
                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$pattern~", $route, $link); // В случае ошибки заменить #~ на ~
                // Разбиваем внутренний путь на сегменты.
                return explode('/', $internalRoute);
            }
        }
    }

    public function run()
    {
        // Получаем URL.
        $link = $this->getLink();
        // Возвращаем масив разделеный
        $segments = $this->match($link);


        if ($segments) {

//            echo "<pre>";
//            echo "OPEN NOW";
//            print_r($segments);

            if ($segments[0] == "admin") {
                array_shift($segments);
                $controller = "app\controllers\admin\\" . ucfirst(array_shift($segments)) . 'Controller';
                $obj = new $controller();
                $action = lcfirst(array_shift($segments)) . "Action";
                $parameters = $segments;
                call_user_func_array(array($obj, $action), $parameters);
                exit();
            } else {
                // Получаем название контролера
                $controller = "app\controllers\\" . ucfirst(array_shift($segments)) . 'Controller';
//            var_dump($controller);
                // Проверям существование класса
                if (class_exists($controller)) {
//                echo $controller . "     ";
                    // Создаем обьект контролера
                    $obj = new $controller();
                    $action = lcfirst(array_shift($segments)) . "Action";
                    if (method_exists($obj, $action)) {
                        // Записываем параметры
                        $parameters = $segments;
                        // проверяем существуют ли параметры
                        if (isset($parameters)) {
                            // Создаем обьект контролера и передаем экшену параметры
                            call_user_func_array(array($obj, $action), $parameters);
                        } else {
                            // Создаем обьект контролера без передачи параметров экшену
                            call_user_func(array($obj, $action));
                        }
                    }else{
                        echo "Action <b>" . $action . "</b> not found in obj <b>" . $controller . "</b>";
                    }
                }else{
                    echo "Controller " . $controller . " not found";
                }
            }

        } else {
            http_response_code(404);
            include("404.html");
        }
    }
}
<?php
namespace App\Core;

class Router {
    private array $routes = [];

    public function __construct() {
        $this->routes = [
            '/' => ['controller' => 'Home', 'action' => 'index'],
            '/about' => ['controller' => 'About', 'action' => 'index'],
            '/contact' => ['controller' => 'Contact', 'action' => 'index'],
            '/product/(?P<id>\d+)' => ['controller' => 'Product', 'action' => 'show']
        ];
    }

    public function dispatch(Request $request) {
        $uri = $request->getUri();

        foreach ($this->routes as $pattern => $route) {
            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                $controllerName = "App\\Controllers\\" . $route['controller'] . "Controller";
                $actionName = $route['action'];

                if (class_exists($controllerName)) {
                    $controller = new $controllerName($request);

                    $params = array_filter(
                        $matches,
                        fn($key) => !is_numeric($key),
                        ARRAY_FILTER_USE_KEY
                    );

                    if (method_exists($controller, $actionName)) {
                        return call_user_func_array(
                            [$controller, $actionName],
                            $params
                        );
                    }
                }
            }
        }

        http_response_code(404);
        echo "Страница не найдена";
        exit();
    }
}
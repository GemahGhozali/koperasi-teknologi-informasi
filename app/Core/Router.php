<?php

namespace App\Core;

class Router {
   private static array $routes = [];

   public static function addRoute(string $method, string $path, string $controller, string $action, array $middlewares = []) : void 
   {
      array_push(self::$routes, 
         [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "action" => $action,
            "middlewares" => $middlewares
         ]
      );
   }

   public static function dispatch() : void
   {      
      $path = $_SERVER["PATH_INFO"] ?? "/";
      $method = $_SERVER["REQUEST_METHOD"];
      
      foreach (self::$routes as $route) {
         $pattern = preg_replace("#:([a-zA-Z_][a-zA-Z0-9_]*)#", "([^/]+)", $route["path"]);
         $pattern = "#^" . $pattern . "$#";

         $routeAndPathExist = $route["method"] === $method && preg_match($pattern, $path, $matches);

         if ($routeAndPathExist) {
            self::runMiddlewares($route["middlewares"]);

            array_shift($matches);

            $controller = new $route["controller"];
            $action = $route["action"];

            $controller->$action(...$matches);
            return;
         }
      }

      http_response_code(404);
      require_once __DIR__ . "/../View/Error/page-not-found.php";
   }

   private static function runMiddlewares(array $middlewares) : void
   {
      foreach ($middlewares as $middleware) {
         if (is_object($middleware)) {
            $middleware->handle();
         }

         if (is_string($middleware)) {
            $middleware = new $middleware();
            $middleware->handle();
         }
      }
   }
}
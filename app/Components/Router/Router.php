<?php

namespace App\Components\Router;

use AltoRouter;
use App\Components\Viewer\View;
use Exception;
use JetBrains\PhpStorm\Pure;


class Router
{

    private AltoRouter $router;
    protected static AltoRouter $publicRoute;

    public function __construct()
    {
        $this->router = new AltoRouter();

        if (!isset(self::$publicRoute)) {
            self::$publicRoute = $this->router;
        }
    }


    /**
     * @param string $url
     * @param array|callable|string|null $action
     * @param string|null $name
     * @return $this
     * @throws Exception
     */
    public function get(string $url, array|callable|null|string $action, ?string $name = null): self
    {
        $this->router->map('GET', $url, $action, $name);
        return $this;
    }


    /**
     * @param string $url
     * @param array|callable|string|null $action
     * @param string|null $name
     * @return $this
     * @throws Exception
     */
    public function post(string $url, array|callable|null|string $action, ?string $name = null): self
    {
        $this->router->map('POST', $url, $action, $name);
        return $this;
    }


    /**
     * @param string $url
     * @param array|callable|string|null $action
     * @param string|null $name
     * @return $this
     * @throws Exception
     */
    public function match(string $url, array|callable|null|string $action, ?string $name = null): self
    {
        $this->router->map('POST|GET', $url, $action, $name);
        return $this;
    }


    /**
     * @param string $routeName
     * @param array $params
     * @return string
     */
    public function url(string $routeName, array $params = []): string
    {
        try {
            return "http://" . $_SERVER['HTTP_HOST'] . $this->router->generate($routeName, $params);
        } catch (Exception $e) {
            return "";
        }
    }

    /**
     * @param string $routeName
     * @param array $params
     * @return string
     * @throws Exception
     */
    public static function route(string $routeName, array $params = []): string
    {
//        try {
            return "http://" . $_SERVER['HTTP_HOST'] . self::$publicRoute->generate($routeName, $params);
//        } catch (Exception $e) {
//            return "";
//        }

    }

    #[Pure] public static function currentRoute(): string{
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?');
        foreach (self::$publicRoute->getRoutes() as $item){
            if ($item[1] == $uri){
                return $item[3];
            }
        }
        return "";
    }

    /**
     * Generate All Route from Index
     * @return $this
     */
    public function run(): self
    {
        try {
            $match = $this->router->match();
            if (is_array($match)) {
                $params = $match['params'];
                $class = new $match['target'][0]();
                $method = $match['target'][1];

                $blade = call_user_func_array([$class, $method], $params);
                echo $blade;
            } else {
                echo View::render('Errors.404');
            }
        } catch (Exception $e) {
            dd($e);
            $message = $e->getMessage();
            echo View::render('Errors.500', compact('message'));
        }
        return $this;
    }

}
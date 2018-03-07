<?php
namespace ChocolatineWp;

use Chocolatine\Helper;

class Router
{
    /**
     * List All Routes
     * @var array
     */
    public $routes;
    /**
     * Current Route
     * @var array
     */
    public $currentRoute;
    public function __construct()
    {
        $this->getRoutes();
        $this->useRoute();
    }
    public function getRoutes()
    {
        $this->routes = require Helper::get_path_app() . '/app/Config/routing.php';
    }
    public function useRoute()
    {
        $this->findRoute();

        if ( $this->currentRoute != false ) {
            $controller = new $this->currentRoute['controller'];
            call_user_func(array($controller, $this->currentRoute['method']));
        }
    }
    public function findRoute()
    {
        $post = \get_post();

        foreach ($this->routes as $route) {
            if ( !empty($route['postType']) && $route['postType'] == $post->post_type ) {
              return $this->currentRoute = $route;
            }
        }
        return false;
    }
}

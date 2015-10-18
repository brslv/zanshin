<?php

namespace Zanshin\Components\Router;

use Zanshin\Contracts\RouterContract;
use Zanshin\Contracts\SessionContract;

/**
 * Class AltoRouterComponent
 *
 * @author brslv
 * @package Zanshin\Components\Router
 */
class AltoRouterComponent implements RouterContract
{

    /**
     * @var SessionContract
     */
    private $session;

    /**
     * @var \AltoRouter
     */
    private $altoRouter;

    /**
     * @var string
     */
    private $controllerNamespace;

    /**
     * The default controller namespace.
     */
    const DEFAULT_CONTROLLER_NAMESPACE = '\App\Controllers\\';

    /**
     * The default base path.
     */
    const DEFAULT_BASE_PATH = "/";

    /**
     * The default separator for the target controller-action pair.
     */
    const DEFAULT_CONTROLLER_ACTION_SEPARATOR = "@";

    /**
     * Constructor.
     */
    public function __construct(SessionContract $session)
    {
        $this->session = $session;
        $this->altoRouter = new \AltoRouter();
        $this->altoRouter->setBasePath(self::DEFAULT_BASE_PATH);

        $this->controllerNamespace = self::DEFAULT_CONTROLLER_NAMESPACE;
    }

    /**
     * Adds a new route to the routes collection.
     *
     * @param string $httpMethods
     * @param string $route
     * @param string $action
     * @param null $name
     * @return mixed
     * @throws \Exception
     */
    public function add($httpMethods, $route, $action, $name = null)
    {
        $_route = $this->normalizeRoute($route);

        if ( ! $this->isValidAction($action)) {
            throw new \Exception(sprintf("Invalid action '%s'. Are you using '%s' as controller/action separator?",
                $action, self::DEFAULT_CONTROLLER_ACTION_SEPARATOR));
        }

        $this->altoRouter->map($httpMethods, $_route, $action, $name);

        return $this;
    }

    /**
     * Normalizes trailing slashes.
     *
     * @param string $route
     * @return string string
     */
    private function normalizeRoute($route)
    {
        return trim($route, "/");
    }

    /**
     * Checks if a given action is valid.
     *
     * @param string $action
     * @return bool
     */
    private function isValidAction($action)
    {
        return is_string($action) && strpos($action, self::DEFAULT_CONTROLLER_ACTION_SEPARATOR) > -1;
    }

    /**
     * Allows the user to add many routes, using array.
     *
     * @param array $routes
     * @return mixed
     */
    public function addSome(array $routes)
    {
        foreach ($routes as $route) {
            if (is_array($route) && count($route) >= 3) {
                $_method = $route[0];
                $_route = $route[1];
                $_action = $route[2];
                $name = null;

                if (isset($route[3])) {
                    $name = $route[3];
                }

                $this->add($_method, $_route, $_action, $name);
            }
        }

        return $this;
    }

    /**
     * Add a new pattern to the existing ones.
     *
     * @param string $alias The pattern alias.
     * @param string $pattern The regular expression pattern.
     * @return $this
     */
    public function addPattern($alias, $pattern)
    {
        $this->altoRouter->addMatchTypes([$alias, $pattern]);

        return $this;
    }

     /**
     * Generates url for a given route.
     *
     * @param string $route
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function generate($route, array $params = [])
    {
        return $this->altoRouter->generate($route, $params);
    }

    /**
     * Sets the controllers namespace for the app.
     *
     * @param string $namespace
     * @return mixed
     * @throws \Exception
     */
    public function setControllersNamespace($namespace)
    {
        $this->controllerNamespace = $this->normalizeNamespace($namespace);

        return $this;
    }

    /**
     * Normalizes a given namespace.
     *
     * @param string $namespace
     * @return string
     * @throws \Exception
     */
    private function normalizeNamespace($namespace)
    {
        $_namespace = trim($namespace);

        if ( ! is_string($_namespace) || empty($_namespace) || is_null($_namespace)) {
            throw new \Exception("Controller namespace cannot be empty or non-string value.", 500);
        }

        return rtrim($_namespace, "\\") . "\\";
    }

    /**
     * Performs a dispatching mechanism.
     *
     * @return void
     */
    public function dispatch()
    {
        $match = $this->altoRouter->match();

        if ( ! $match) {
            // 404.
            // TODO: Abstract the http_response_code function in a Response class.

            http_response_code(404);

            echo "404. Page not found.";
            exit;
        }

        $this->processMatch($match);
    }

    /**
     * Calls the controller/action if any match.
     *
     * @param array $match
     * @return void;
     */
    private function processMatch($match)
    {
        $action = $match["target"];
        $params = $match["params"];

        // If the action is a callable
        // it will be called.
        if (is_callable($action)) {
            call_user_func($action, $params);

            return;
        }

        list($controller, $action) = explode("@", $action);

        // Generate the path for the default view (composed from controller & action).
        $this->generatePathForDefaultView($controller, $action);

        $_controller = $this->controllerNamespace . $controller;

        // If a controller has been registered as a service
        // it will be called from the container.
        // If not - a new instance of the controller will be created.
        if (container()->offsetExists($_controller)) {
            $_controller = container($_controller);
        } else {
            $_controller = new $_controller;
        }

        call_user_func_array([$_controller, $action], $params);

        return;
    }

    // TODO: add this method to the contract.
    public function generatePathForDefaultView($controller, $action) 
    {
        $parentFolder = substr($controller, 0, strpos($controller, "Controller"));
        $_parentFolder = strtolower($parentFolder);
        $view = $action;

        $this->session->set("viewFolder", $_parentFolder);
        $this->session->set("viewFile", $view);
        $pathForDefaultView = $_parentFolder . "." . $view;
        $this->session->set("defaultView", $pathForDefaultView);

        // check if the folder/view exist
        // if exist -> set defaultView
        // if not -> don't do anything
        return $pathForDefaultView;
    }

}

<?php

namespace Laravel\Lumen\Routing;

use Illuminate\Support\Arr;

class Route
{
    /**
     * The URI pattern the route responds to.
     *
     * @var string
     */
    protected $uri;

    /**
     * The HTTP methods the route responds to.
     *
     * @var array
     */
    protected $methods;

    /**
     * The route action array.
     *
     * @var array
     */
    protected $action;

    /**
     * The array of matched parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Create a new Route instance.
     *
     * @param  array  $methods
     * @param  string  $uri
     * @param  \Closure|array  $action
     * @param  array $parameters
     * @return void
     */
    public function __construct(array $methods, $uri, $action, array $parameters)
    {
        $this->methods    = $methods;
        $this->uri        = $uri;
        $this->action     = $action;
        $this->parameters = $parameters;
    }

    /**
     * Get a given parameter from the route.
     *
     * @param  string  $name
     * @param  mixed   $default
     * @return string|object
     */
    public function parameter($name, $default = null)
    {
        return Arr::get($this->parameters, $name, $default);
    }

    /**
     * Get the HTTP verbs the route responds to.
     *
     * @return array
     */
    public function methods()
    {
        return $this->methods;
    }

    /**
     * Get the domain defined for the route.
     *
     * @return string|null
     */
    public function domain()
    {
        return null;
    }

    /**
     * Get the URI associated with the route.
     *
     * @return string
     */
    public function uri()
    {
        return $this->uri;
    }

    /**
     * Get the action name for the route.
     *
     * @return string
     */
    public function getActionName()
    {
        return isset($this->action['controller']) ? $this->action['controller'] : 'Closure';
    }

    /**
     * Get the action array for the route.
     *
     * @return array
     */
    public function getAction()
    {
        return $this->action;
    }
}

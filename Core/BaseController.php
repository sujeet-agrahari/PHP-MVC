<?php

namespace Core;


abstract class BaseController
{
    protected $roue_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    public function __call($name, $args)
    {
        $method = $name.'Action';
        if(method_exists($this,$method))
        {
            if($this->before())
            {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }

            
        } else {
            throw new \Exception("Method $method not found in controllerr " . get_class($this));
        }
    } 

    protected function before()
    {

    }
    protected function after()
    {
         
    }
}
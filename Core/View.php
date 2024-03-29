<?php

namespace Core;

class View
{
    public static function render($view, $args = [])
    {
        extract($args,EXTR_SKIP);
        $file = "../App/Views/$view";
        if(is_readable($file))
        {
            require $file;
        } else {
            throw new \Exception("View $file not found!");
        }
    }

    public static function renderTemplate($view, $args = [])
    {
     static $twig = null;
        if($twig === null)
        {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }
        echo $twig->render($view, $args);
    }
}
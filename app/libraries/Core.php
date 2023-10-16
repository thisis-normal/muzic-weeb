<?php

/*
 * App Core Class
 * Create URL & loads controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->getURL();
        //return error if url is null
        if (is_null($url)) {
            $url = $this->currentController;
        }
        //look in controllers for first value
        if (isset($url[0])) {
            $controller = $url[0];
            // Translate hyphenated controller to camelCase
            $controller = str_replace('-', ' ', $controller);
            $controller = ucwords($controller);
            $controller = str_replace(' ', '', $controller);
            if (file_exists('../app/controllers/' . $controller . '.php')) {
                //if exists, set as controller
                $this->currentController = $controller;
                //unset 0 index
                unset($url[0]);
            }
        }
//        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
//            //if exists, set as controller
//            $this->currentController = ucwords($url[0]);
//            //unset 0 index
//            unset($url[0]);
//        } else {
////            echo 'Controller not found' . '<br>';
//        }
        //require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        //instantiate controller class
        $this->currentController = new $this->currentController;
        //assign old value of $url (because we assign "$url = $this->getURL();" to handle null error)
        $url = $this->getURL();
        //check for second part of url
        if (isset($url[1])) {
            $method = $url[1];
            // Translate hyphenated method to camelCase
            $method = str_replace('-', ' ', $method);
            $method = ucwords($method);
//            var_dump($method);
            $method = str_replace(' ', '', $method);
//            var_dump($method);
            if (method_exists($this->currentController, $method)) {
                $this->currentMethod = $method;
                unset($url[1]);
            } else {
                //method not found
            }
        }
        //get params
        $this->params = $url ? array_values($url) : [];
        //call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public
    function getURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

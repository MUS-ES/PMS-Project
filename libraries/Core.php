<?php

/**
 * Core Class 
 * Loads Controller And Redirects Urls
 * URL FORMAT => /controller/method/params
 */

class Core
{
    protected $currentController = 'Users';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {

        $url = $this->getUrl();

        //Check If The Url First Value Is A Controller
        if (isset($url[0]) && file_exists('controllers/' . ucwords($url[0]) . '.php'))
        {
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once 'controllers/' . $this->currentController . '.php';
        // Instantiate controller class
        $this->currentController = new $this->currentController;
        //Check If The Url Second Value Is A Method From Current Controller
        if (isset($url[1]))
        {
            if (method_exists($this->currentController, $url[1]))
            {
                $this->currentMethod = $url[1];
            }

            unset($url[1]);
        }
        //  If There Is Other Values in Url it's A Params For Method
        $this->params = ($url) ? array_values($url) : [];
        //Call a callback With Array Of Params

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
    /**
     * This Function Get Url And Split It To His Paths
     */
    public function getUrl()
    {
        if (isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

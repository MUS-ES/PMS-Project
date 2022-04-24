<?php

/**
 * Parent Controller 
 * For Load The Model And The View
 */
class Controller
{
    public function model($model)
    {
        //Require model file
        require_once 'models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }

    //Load the view (checks for the file)
    public function view($view, $data = [])
    {
        if (file_exists('views/' . $view . '.php'))
        {
            require_once 'views/' . $view . '.php';
        }
        else if (file_exists('views/' . $view . '.html'))
        {
            require_once 'views/' . $view . '.html';
        }
        else
        {
            die("View does not exists.");
        }
    }
}

<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function home()
    {

        $this->view('home');
    }
    public function notactive()
    {


        $this->view('notactive');
    }
}

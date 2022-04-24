<?php

class Home extends Controller
{
    private $homeModel;
    public function __construct()
    {
    
    }

    public function index()
    {

        $this->dashboard();
    }
    public function dashboard()
    {


        $this->view('dashboard');
    }
}

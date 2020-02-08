<?php

class Template extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view("template/test");
    }

    public function test()
    {
        $this->load->view("test");
    }
}

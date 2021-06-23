<?php
defined("BASEPATH")or exit("Error");

class Tpa_controller extends CI_controller 
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view("dashboard_tpa");
    }
}

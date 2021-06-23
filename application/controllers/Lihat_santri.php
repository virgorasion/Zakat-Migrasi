<?php
defined("BASEPATH")or exit("ERROR");

class Lihat_santri extends CI_controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->view("pantau_santri_view");
    }
    
}

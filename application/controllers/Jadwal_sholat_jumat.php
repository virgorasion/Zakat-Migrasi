<?php
defined('BASEPATH') or exit('ERROR');

class Jadwal_sholat_jumat extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_jumat_model');
    }

    function index()
    {
        if ($_SESSION['username'] != NULL) {
            $this->load->view('Jadwal_jumat_view');
        }else {
            $this->session->set_flashdata('msg','Silahkan Login Dulu Untuk Memulai Session');
            redirect(site_url('home'));
        }
    }

    function test()
    {
        $post = new DateTime('28-09-2018');
        $post->modify('+7 day');
        echo $post->format('d F Y');
    }
}
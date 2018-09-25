<?php 
defined('BASEPATH') or exit('error');

class Jadwal_tarawih_ctrl extends CI_controller 
{ 
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('jadwal_tarawih_view');
        }
    }
}

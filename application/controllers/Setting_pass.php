<?php

defined('BASEPATH')or exit('ERROR');

class Setting_pass extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Setting_model");
    }

    public function index()
    {
        if ($_SESSION['username'] != "") {
            $this->load->view("Setting_view");
        }else {
            redirect("home");
        }
    }

    public function UbahProfil()
    {
        $mainID = $_SESSION['id_admin'];
        $nama = htmlspecialchars($this->input->post("gantiNama"));
        $user = htmlspecialchars($this->input->post("gantiUser"));
        $pass = $this->input->post("gantiPass");
        if ($this->input->post("gantiPass") == "") {
            $data = array(
                'nama' => $nama,
                'username' => $user,
            );
        }else {
            $data = array(
                'nama' => $nama,
                'username' => $user,
                'password' => md5($pass)
            );
        }
        $query = $this->Setting_model->UpdateProfil("master_login", $data, $mainID);
        if ($query) {
            $this->session->set_userdata("nama", $nama);
            $this->session->set_userdata("username", $user);
            $this->session->set_flashdata("succ", "Berhasil mengubah profile :)");
            redirect("Setting_pass");
        }else {
            $this->session->set_flashdata("fail", "Gagal mengubah profile, segera hubungi admin !");
            redirect("Setting_pass");
        }
    }
    
    
}
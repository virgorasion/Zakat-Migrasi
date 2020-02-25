<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();		
        $this->load->model('User_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        if (@$_SESSION['username'] !== null) {
            redirect(site_url('home'));
        }else{
            $this->load->view('login');
        }
    }
    function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $cek = $this->User_model->process_login($username,$password);
        if (count($cek->result())>0){ 
            foreach ($cek->result() as $row)
            {                   
                $this->session->set_userdata("username",$row->username);
                $this->session->set_userdata("nama",$row->nama);
                $this->session->set_userdata("id_admin",$row->id_admin);
                $this->session->set_userdata("kode_akses",$row->kode_akses);
                $this->session->set_userdata("hak_akses",$row->hak_akses);
                $this->session->set_userdata("menu",$this->generatemenu());
                $this->set_hak_akses();
                redirect(site_url('home'));
            }
        }else{
            $data['msg'] = "Username/Password Salah";
            $this->load->view('login', $data);
        }
        
    }

    public function set_hak_akses(){
        $data = $this->User_model->get_hak_akses();
        foreach ($data->result() as $row):
            $this->session->set_userdata($row->kode_menu_child."insert",$row->akses_insert);
            $this->session->set_userdata($row->kode_menu_child."view",$row->akses_view);
            $this->session->set_userdata($row->kode_menu_child."edit",$row->akses_edit);
            $this->session->set_userdata($row->kode_menu_child."delete",$row->akses_delete);
        endforeach;
    }

    public function generatemenu(){
        $select_header = $this->Menu_model->select_header()->result();
		$html = '';

		foreach ($select_header as $row) {
        $select_child = $this->Menu_model->select_child($row->kode_menu_header)->result();
        // var_dump($select_child);
        $key = $row->menu_child;
        if($key == 1) {
            $treeView = 'has-treeview';
        }else {
            $treeView = '';
        }
        if ($row->kode_menu_header == 6) {
            $html .= '<li class="nav-header">Content Manajemen</li>';
        }
        if ($row->kode_menu_header == 10) {
            $html .= '<li class="nav-header">Pengaturan</li>';
        }
        $html .=' <li class="nav-item '.$treeView.'">
                    <a href="'.site_url($row->link).'" class="nav-link">
                        <i class="nav-icon '.$row->icon.'"></i> <p>'.$row->menu_header;
        if ($key == 1){
        $html .= '      <i class="right fas fa-angle-left"></i>';
        }
        $html .='       </p> </a>';
        if ($key == 1) {
            $html .= '<ul class="nav nav-treeview">';
                foreach($select_child as $child){
                    $class = ($this->session->userdata($child->kode_menu_child."view") == "1") ? 'active' : '' ;
                $html .= '<li class="nav-item '.$class.'"><a href="'.site_url($child->file_php).'"><i class="far fa-circle nav-icon"></i>'.$child->menu_name.'</a></li>';
            }
            $html .= '</ul>';
        }
    }
        $html .= '</li>';
		return $html;
	}

    function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

 
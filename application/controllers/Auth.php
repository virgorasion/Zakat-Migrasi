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
        // die(print_r($select_child));
        $key = $row->menu_child;
        if($key == 1) {
            $treeView = ' class="treeview"';
        }else {
            $treeView = '';
        }
        $html .=' <li'.$treeView.'>
                    <a href="'.site_url($row->link).'">
                        <i class="'.$row->icon.'"></i> <span>'.$row->menu_header.'</span>';
        if ($key == 1){
        $html .= '      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>';
        }
        $html .='       </a>';
        if ($key == 1) {
            $html .= '<ul class="treeview-menu">';
                foreach($select_child as $child){
                    $class = ($this->session->userdata($child->kode_menu_child."view") == "1") ? ' class="active"' : '' ;
                $html .= '<li'.$class.'><a href="'.site_url($child->file_php).'"><i class="fa fa-circle-o"></i>'.$child->menu_name.'</a></li>';
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

 
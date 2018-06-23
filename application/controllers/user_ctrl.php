<?php

defined('BASEPATH')or exit('error');

class User_ctrl extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $cabang = $_SESSION['kode_cabang'];
        $data['data'] = $this->User_model->select_user($cabang)->result();
        $this->load->view('view_user',$data);
    }

    public function buatAkun()
    {
        $data = $this->input->post(array('NamaBru','UsernameBru','PasswordBru','AksesBru','CabangBru'));

        if ($_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2) {
            $arr = array(
                'nama' => $data['NamaBru'],
                'username' => $data['UsernameBru'],
                'password' => md5($data['PasswordBru']),
                'status_aktif' => 1,
                'kode_cabang' => $data['CabangBru'],
                'kode_akses' => $data['AksesBru']
            );
        }else{
            $arr = array(
                'nama' => $data['NamaBru'],
                'username' => $data['UsernameBru'],
                'password' => md5($data['PasswordBru']),
                'status_aktif' => 1,
                'kode_cabang' => $_SESSION['kode_cabang'],
                'kode_akses' => $data['AksesBru']
            );
        }
        try{
            $this->User_model->tambah($arr);
        }catch(Exception  $e){
            $this->session->set_flashdata('msg','Error' .$e->getMessage());
            redirect('user_ctrl');
        }
        $this->session->set_flashdata('msg','Berhasil Buat Akun');
        redirect('user_ctrl');
    }
}
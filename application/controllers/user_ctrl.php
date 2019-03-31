<?php

defined('BASEPATH')or exit('error');

class User_ctrl extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($_SESSION['username'] != null) {
            $data['data'] = $this->User_model->get_user()->result();
            $data['getHakAkses'] = $this->User_model->get_hakAkses()->result();
            $this->load->view('view_user',$data);
        }else{
            redirect('home');
        }
    }

    public function buatAkun()
    {
        $data = $this->input->post();

        $arr = array(
            'nama' => htmlspecialchars($data['NamaBru']),
            'username' => htmlspecialchars($data['UsernameBru']),
            'password' => md5($data['passBru']),
            'status_aktif' => 1,
            'kode_akses' => $data['aksesBru']
        );
        
        try{
            $this->User_model->tambah($arr);
            redirect('user_ctrl');
        }catch(Exception  $e){
            $this->session->set_flashdata('msg','Error' .$e->getMessage());
            redirect('user_ctrl');
        }
        $this->session->set_flashdata('msg','Berhasil Buat Akun');
        redirect('user_ctrl');
    }

    public function edit()
    {
        $post = $this->input->post();
        if ($post['passwordEdt'] == "") {
            $data = array(
                'nama' => htmlspecialchars($post['namaEdt']),
                'username' => htmlspecialchars($post['usernameEdt']),
                'status_aktif' => $post['statusEdt'],
                'kode_akses' => $post['aksesEdt']
            );
        }else{
            $data = array(
                'nama' => htmlspecialchars($post['namaEdt']),
                'username' => htmlspecialchars($post['usernameEdt']),
                'status_aktif' => $post['statusEdt'],
                'kode_akses' => $post['aksesEdt'],
                'password' => md5($post['passwordEdt'])
            );
        }
        $id = $post['id_admin'];
        $query = $this->User_model->updateData('master_login', $data, $id);
        if ($query != 1) {
            $this->session->set_flashdata('msg', 'Gagal edit user, segera hubungi admin !');
            redirect('user_ctrl');
        }else {
            $this->session->set_flashdata('msg', 'Berhasil edit user :)');
            redirect('user_ctrl');
        }
    }

    public function hapus($id)
    {
        $query = $this->User_model->deleteData('master_login',$id);
        if ($query != 0) {
            $this->session->set_flashdata('msg', 'Berhasil hapus data');
            redirect('user_ctrl');
        }else{
            $this->session->set_flashdata('msg', 'Gagal hapus data, segera hubungi admin !');
            redirect('user_ctrl');
        }
    }
}
<?php 

class Menu_level_controller extends CI_controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_level_model');
	}

	public function index()
	{
		$data['data'] = $this->Menu_level_model->tampil_data()->result();
		$this->load->view('Menu_level_view',$data);
	}

	public function Menu_setting($kode_akses){
        // $kode_akses = $this->input->post('kode_akses');
        $data['data'] =  $this->Menu_level_model->Data_setting($kode_akses)->result();
		$data['kode_akses'] = $kode_akses;
        $this->load->view('Menu_level_edit_view', $data);
	}

	public function update()
    {
        // $this->output->enable_profiler(TRUE);
        $menu = $this->Menu_level_model->get_menu_child()->result();  
        $kode_akses = $this->input->post('kode_akses');
        $this->Menu_level_model->delete_data('menu_level',$kode_akses);
        foreach ($menu as $row):
            $view = $this->input->post('view_'.$row->kode_menu_child);
            $insert = $this->input->post('insert_'.$row->kode_menu_child);
            $edit = $this->input->post('edit_'.$row->kode_menu_child);
            $delete = $this->input->post('delete_'.$row->kode_menu_child);
            $data = array(
                'kode_akses' => $kode_akses,
                'kode_menu_child' => $row->kode_menu_child,
                'akses_view' => ($view=="1")?"1":"0",
                'akses_insert' => ($insert=="1")?"1":"0",
                'akses_edit' => ($edit=="1")?"1":"0",
                'akses_delete' => ($delete=="1")?"1":"0",
                );
            $this->Menu_level_model->input_data($data, 'menu_level');   
        endforeach;            
            $this->session->set_flashdata('msg', 'Berhasil Simpan');  
	    redirect(site_url() . 'Menu_level/edit');
    }

}
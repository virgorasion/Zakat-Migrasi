<?php
	defined('BASEPATH') or exit('ERROR');

	class Hewan_kurban extends CI_controller{
		public function __construct(){
			parent::__construct();
			$this->load->model("Lap_kurban_model");
            $this->load->library("datatables");
		}
		public function index(){
			if(isset($_SESSION['username'])){
            if($this->input->post('t1')=="" && $this->input->post('t2')==""){
                $data['t1'] = date("01-F-Y");
                $data['t2'] = date("t-F-Y");
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $tanggalAwal = date_format($date1, "Ymd");
                $tanggalAkhir = date_format($date2, "Ymd");
                $data['data'] = "Hewan_kurban/dataTableKurban/".$tanggalAwal."/".$tanggalAkhir;
                $this->load->view('lap_hewan_kurban_view',$data);
            }
            else{
                $data['t1'] = $this->input->post('t1');
                $data['t2'] = $this->input->post('t2');
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $tanggalAwal = date_format($date1, "Ymd");
                $tanggalAkhir = date_format($date2, "Ymd");
                $data['data'] = "Hewan_kurban/dataTableKurban/".$tanggalAwal."/".$tanggalAkhir;
                $this->load->view('lap_hewan_kurban_view',$data);
            }
   
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function dataTableKurban($tanggalAwal, $tanggalAkhir)
    {
        header("Content-type: application/json");
        echo $this->Lap_kurban_model->getDataKurban($tanggalAwal,$tanggalAkhir);
    }

    public function laporan_print($t1,$t2)
    {
        $c1 = date_create($t1);
        $c2 = date_create($t2);
        $tgl1 = date_format($c1, "Ymd");
        $tgl2 = date_format($c2, "Ymd");
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $data['data'] = $this->Lap_kurban_model->sel_date($tgl1,$tgl2)->result();
        $this->load->view('prints/hewan_print',$data);
    }

    public function aksi()
    {
        $action = $this->input->post('action');
        $nomor = $this->input->post('idKurban');
        $id = $this->input->post('id_admin');
        $penyumbang = $this->input->post('penyumbang');
        $alamat = $this->input->post('alamat');
        $jenisHewan = $this->input->post('jenisHewan');
        $jumlah = $this->input->post('jumlah');
        $log_time = date('Y-m-d H:i:s');
        $tanggal = date('Y-m-d');
        
        if($action == 'add'){
            $data = array(
                'id_admin' => $_SESSION['id_admin'],
                'tanggal' => $tanggal,
                'penyumbang' => htmlspecialchars($penyumbang),
                'alamat' => htmlspecialchars($alamat),
                'jenis' => $jenisHewan,
                'jumlah' => htmlspecialchars($jumlah),
                'log_time' => $log_time
            );

            $query = $this->Lap_kurban_model->insert_data('hewan_kurban',$data);
            if ($query) {
                $this->session->set_flashdata("succ", "Berhasil tambah data");
                redirect(site_url('Hewan_kurban'));
            }else{
                $this->session->set_flashdata("fail", "Gagal tambah data, segera hubungi admin");
                redirect(site_url('Hewan_kurban'));
            }
        }else{
            $id = $nomor;
            $data = array(
                'penyumbang' => htmlspecialchars($penyumbang),
                'alamat' => htmlspecialchars($alamat),
                'jenis' => $jenisHewan,
                'jumlah' => htmlspecialchars($jumlah)
            );
            $query = $this->Lap_kurban_model->update_data('hewan_kurban',$data,$nomor);
            
            if ($query) {
                $this->session->set_flashdata("succ", "Berhasil update data");
                redirect(site_url('Hewan_kurban'));
            }else{
                $this->session->set_flashdata("fail", "Gagal update data, segera hubungi admin");
                redirect(site_url('Hewan_kurban'));
            }
        }
    }
    
    public function hapus($id)
    {
        $query = $this->Lap_kurban_model->delete_data('hewan_kurban',$id);
        if ($query) {
                $this->session->set_flashdata("succ", "Berhasil hapus data");
                redirect(site_url('Hewan_kurban'));
            }else{
                $this->session->set_flashdata("fail", "Gagal hapus data, segera hubungi admin");
                redirect(site_url('Hewan_kurban'));
            }
    }
 }
?>
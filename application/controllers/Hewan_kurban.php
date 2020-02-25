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
            if($this->input->post('searchByDate')==""){
                $t1 = date("Y-m-01");
                $t2 = date("Y-m-t");
                $data['date'] = date("m-01-Y - m-t-Y");
                $data['data'] = "Hewan_kurban/dataTableKurban/".$t1."/".$t2;
                $this->load->view('lap_hewan_kurban_view',$data);
            }
            else{
                $getDate = $this->input->post('searchByDate');
                $split = explode(" - ", $getDate);
                $date1 = date_create($split[0]);
                $date2 = date_create($split[1]);
                $t1 = date_format($date1, "Y-m-d");
                $t2 = date_format($date2, "Y-m-d");
                $data['date'] = $getDate;
                $data['data'] = "Hewan_kurban/dataTableKurban/".$t1."/".$t2;
                $this->load->view('lap_hewan_kurban_view',$data);
            }

        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function dataTableKurban($t1, $t2)
    {
        header("Content-type: application/json");
        echo $this->Lap_kurban_model->getDataKurban($t1,$t2);
    }

    public function laporan_print($tanggal)
    {
        $pisah = explode("%20-%20", $tanggal);
        $ganti[0] = explode("-", $pisah[0]);
        $ganti[1] = explode("-", $pisah[1]);
        $ganti[0] = implode("-", [$ganti[0][2],$ganti[0][0],$ganti[0][1]]);
        $ganti[1] = implode("-", [$ganti[1][2],$ganti[1][0],$ganti[1][1]]);
        $ganti[0] = date_create($ganti[0]);
        $ganti[1] = date_create($ganti[1]);
        $tgl1 = date_format($ganti[0], "Y-m-d");
        $tgl2 = date_format($ganti[1], "Y-m-d");
        $data['date'] = implode(" - ",$pisah);
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
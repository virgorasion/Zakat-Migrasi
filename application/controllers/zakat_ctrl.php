<?php 
    defined('BASEPATH') or exit('Error');

    class Zakat_ctrl extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Lap_zakat_model');
            $this->load->library("datatables");
        }

        public function index(){
           if(isset($_SESSION['username'])){
            if($this->input->post('searchByDate')==""){
                $t1 = date("Y-m-01");
                $t2 = date("Y-m-t");
                $data['t1'] = $t1;
                $data['t2'] = $t2;
                $data['date'] = date("m-01-Y - m-t-Y");
                $data['data'] = "zakat_ctrl/getDatatable/".$t1."/".$t2;
                $this->load->view('lap_zakat_view',$data);
            }
            else{
                $getDate = $this->input->post('searchByDate');
                $split = explode(" - ", $getDate);
                $date1 = date_create($split[0]);
                $date2 = date_create($split[1]);
                $t1 = date_format($date1, "Y-m-d");
                $t2 = date_format($date2, "Y-m-d");
                $data['t1'] = $t1;
                $data['t2'] = $t2;
                $data['date'] = $getDate;
                $data['data'] = "zakat_ctrl/getDatatable/".$t1."/".$t2;
                $this->load->view('lap_zakat_view', $data);
            }
        }
        else{
            redirect('home');
        }
    }

    public function getDatatable($t1, $t2)
    {
        header("Content-Type: application/json");
        echo $this->Lap_zakat_model->setDatatable($t1,$t2);
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
        $data['selBeli'] = $this->Lap_zakat_model->sel_beli($tgl1,$tgl2)->result();
        $data['data'] = $this->Lap_zakat_model->sel_date($tgl1,$tgl2)->result();
        $this->load->view('prints/zakat_print',$data);
    }

    public function action()
    {
        $post = $this->input->post();
        $zakatMall = str_replace(".", "", $post['actionMall']);
        $infaq = str_replace(".", "", $post['actionInfaq']);
        $tanggal = date("Y-m-d");
        if ($post['action'] == "add") {
            $data = [
                'nama' => htmlspecialchars($post['actionNama']),
                'alamat' => htmlspecialchars($post['actionAlamat']),
                'zakat_fitrah' => $post['actionFitrah'],
                'beli' => $post['actionBeli'],
                'zakat_mall' => $zakatMall,
                'infaq' => $infaq,
                'tanggal' => $tanggal,
                'id_admin' => $_SESSION['id_admin']
            ];
            $query = $this->Lap_zakat_model->add_data('list_zakat',$data);
            if ($query) {
                $this->session->set_flashdata('succ', 'Berhasil Tambah Data <i><b>Zakat</b></i>');
                redirect('zakat_ctrl');
            }else {
                $this->session->set_flashdata('fail', 'Gagal Tamabah Data Zakat, segera hubungi admin');
                var_dump($query);
                die();
                redirect('zakat_ctrl');
            }
        } elseif ($post['action'] == "edit") {
            $data = [
                'nama' => htmlspecialchars($post['actionNama']),
                'alamat' => htmlspecialchars($post['actionAlamat']),
                'zakat_fitrah' => $post['actionFitrah'],
                'beli' => $post['actionBeli'],
                'zakat_mall' => $zakatMall,
                'infaq' => $infaq,
                'id_admin' => $_SESSION['id_admin']
            ];
            $id = $post['idZakat'];
            $query = $this->Lap_zakat_model->update_data('list_zakat',$data,$id);
            if ($query) {
                $this->session->set_flashdata('succ', 'Berhasil Edit Data <i><b>Zakat</b></i>');
                redirect('zakat_ctrl');
            }else {
                $this->session->set_flashdata('fail', 'Gagal Edit Data Zakat, segera hubungi admin');
                redirect('zakat_ctrl');
            }
        } else {
            $this->session->set_flashdata('fail', 'Terjadi Kesalahan, Silahkan Refresh Halaman Anda Saat Ini');
            redirect('zakat_ctrl');
        }
    }

    public function hapus($nomor)
    {
        $query = $this->Lap_zakat_model->hapus($nomor);
        if ($query) {
            $this->session->set_flashdata('succ', 'Berhasil Hapus Data <i><b>Zakat</b></i>');
            redirect('zakat_ctrl');
        }else {
            $this->session->set_flashdata('fail', 'Gagal Hapus Data Zakat, segera hubungi admin');
            redirect('zakat_ctrl');
        }
    }

    public function synchronize($t1,$t2)
    {
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $t1 = str_replace("-","",$data['t1']);
        $t2 = str_replace("-","",$data['t2']);
        $pieces1 = explode("-",$data['t1']);
        $pieces2 = explode("-",$data['t2']);
        $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
        $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
        $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();

        echo json_encode($data['data']);
    }

 }
?>
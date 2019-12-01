<?php 

Defined("BASEPATH")or exit("Error");

class Kas_ctrl extends CI_controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kas_model');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            if($this->input->post('t1')=="" && $this->input->post('t2')==""){
                $data['t1'] = date("01-F-Y");
                $data['t2'] = date("t-F-Y");
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $t1 = date_format($date1, "Y-m-d");
                $t2 = date_format($date2, "Y-m-d");
                $data['data'] = "Kas_ctrl/ajaxTable/".$t1."/".$t2;
                $this->load->view('Kas_view',$data);
            }
            else{
                $data['t1'] = $this->input->post('t1');
                $data['t2'] = $this->input->post('t2');
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $t1 = date_format($date1, "Y-m-d");
                $t2 = date_format($date2, "Y-m-d");
                $data['data'] = "Kas_ctrl/ajaxTable/".$t1."/".$t2;
                $this->load->view('Kas_view',$data);
            }
        }else {
            $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect(site_url('home'));
        }
    }

    public function ajaxTable($t1,$t2)
    {
        header('Content-Type: application/json');
        echo $this->Kas_model->sel_date($t1,$t2);
    }

    public function tambah()
    {
        $nama = $this->input->post('addNama');
        $kategori = $this->input->post('addTipe');
        $jml = explode('.', $this->input->post('addJumlah'));
        $jumlah = implode('', $jml);
        $d = $this->input->post('addTanggal');
        $e = date_create($d);
        $date = date_format($e,"Y-m-d");
        $keterangan = $this->input->post('addKeterangan');

        $data = array(
            'nama_donatur' => $nama,
            'id_admin' => $_SESSION['id_admin'],
            'id_tipe' => $kategori,
            'jumlah' => $jumlah,
            'tanggal' => $date,
            'keterangan' => $keterangan
        );
        try{
            $this->Kas_model->insertData('kas_masjid',$data);
            $this->session->set_flashdata('msg','Berhasil Menambah Data');
        }catch(Exception $e){
            $this->session->set_flashdata('err',"Gagal Tambah Data Segera Hubungi Operator");
        }

        redirect('kas_ctrl');
    }

    public function edit()
    {
        $post = $this->input->post();
        $jml = explode('.', $post['editJumlah']);
        $jumlah = implode('',$jml);
        $data = array(
            'id_admin' => $_SESSION['id_admin'],
            'nama_donatur' => $post['editDonatur'],
            'jumlah' => $jumlah,
            'keterangan' => $post['editKeterangan'],
            'tanggal' => $this->UbahBulan($post['editTanggal']),
            'id_tipe' => $post['editTipe']
        );
        $id = $post['idEdit'];
        try {
            $this->Kas_model->updateData("kas_masjid", $data, $id);
            $this->session->set_flashdata("msg", "Berhasil mengubah data");
        } catch (Exception $e) {
            $this->session->set_flashdata("err", "Gagal mengubah data");        
        }
        redirect('Kas_ctrl');
    }

    public function hapus($id)
    {
        $id = $id;
        try{
            $this->Kas_model->deleteData('kas_model',$id);
            $this->session->set_flashdata('msg','Berhasil Delete Data');
        }catch (Exception $e){
            $this->session->set_flashdata('err','Gagal Hapus Data Segera Hubungi Operator');            
        }
        redirect('kas_ctrl');
    }

    public function print($t1,$t2)
    {
        $c1 = date_create($t1);
        $c2 = date_create($t2);
        $tgl1 = date_format($c1, "Y-m-d");
        $tgl2 = date_format($c2, "Y-m-d");
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $data['data'] = $this->Kas_model->get_kas_data_print($tgl1,$tgl2);
        $data['total'] = $this->Kas_model->get_total_kas_print($tgl1,$tgl2);
        $this->load->view('prints/Kas_masjid_print',$data);
    }

    private function UbahBulan($tanggal)
    {
        $pisah = explode("-", $tanggal);
        $tanggal = $pisah[0];
        $bulan = $pisah[1];
        $tahun = $pisah[2];
        $bln = "";

        switch ($bulan) {
            case 'January':
                $bln = "01";
                break;
            case 'February':
                $bln = "02";
                break;
            case 'Maret':
                $bln = "03";
                break;
            case 'April':
                $bln = "04";
                break;
            case 'May':
                $bln = "05";
                break;
            case 'June':
                $bln = "06";
                break;
            case 'July':
                $bln = "07";
                break;
            case 'August':
                $bln = "08";
                break;
            case 'September':
                $bln = "09";
                break;
            case 'October':
                $bln = "10";
                break;
            case 'November':
                $bln = "11";
                break;
            case 'December':
                $bln = "12";
                break;            
            default:
                $bln = date('m');
                break;
        }
        $result = $tahun."-".$bln."-".$tanggal;
        return $result;
    }
}
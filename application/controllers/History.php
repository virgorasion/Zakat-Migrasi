<?php
defined("BASEPATH") or die("ERROR");

class History extends CI_controller
{
    public function __constuct()
    {
        parent::__contruct();

    }

    public function index($id_admin)
    {
        if (isset($_SESSION['username'])) {
            $data['kas_masjid'] = $this->db->select("kas_masjid.nama_donatur,tipe_donasi.id_tipe,tipe_donasi.tipe,kas_masjid.jumlah,DATE_FORMAT(kas_masjid.tanggal, '%d-%M-%Y') as tanggal,master_login.nama,kas_masjid.id,kas_masjid.keterangan")->from("kas_masjid")->join("master_login", "master_login.id_admin = kas_masjid.id_admin")->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")->where("kas_masjid.id_admin", $id_admin)->get()->result();
            $data['hewan_kurban'] = $this->db->query("SELECT h.id,h.id_admin,h.penyumbang,h.jenis,h.jumlah,date_format(h.tanggal,'%d-%M-%Y') as tanggal_transaksi, h.tanggal,h.alamat,h.log_time, m.id_admin,m.nama AS admin,m.username FROM hewan_kurban h, master_login m WHERE h.id_admin = $id_admin AND m.id_admin = $id_admin ORDER BY h.tanggal ")->result();
            $data['lap_pengeluaran'] = $this->db->select("lap_pengeluaran.*,master_login.nama as admin,date_format(lap_pengeluaran.tanggal,'%d-%M-%Y') as tgl")->from("lap_pengeluaran,master_login")->where("lap_pengeluaran.id_admin",$id_admin)->where("master_login.id_admin",$id_admin)->get()->result();
            $data['zakat'] = $this->db->select("list_zakat.*,master_login.nama as admin,date_format(list_zakat.tanggal,'%d-%M-%Y') as tgl")->from("list_zakat,master_login")->where("list_zakat.id_admin",$id_admin)->where("master_login.id_admin",$id_admin)->order_by("list_zakat.tanggal", "DESC")->get()->result();
            $this->load->view('View_history',$data);
        }else {
            $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect(site_url('home'));
        }
    }
}

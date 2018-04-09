<?php 
    defined('BASEPATH') or exit('ERROR');

    class Lap_tarawih_model extends CI_model{

        private $DB = "lap_amal_tarawih";

       public function sel_date($t1,$t2){
        return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.petugas, l.tanggal,l.jumlah,l.log_time, m.id_admin,m.nama AS admin,m.username
          FROM lap_amal_tarawih l, master_login m
          WHERE l.id_admin = m.id_admin
          AND m.nama = '".$_SESSION['nama']."'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal,nomor DESC");
       }

       public function selTambah()
       {
           $this->db->get('lap_amal_tarawih')->result();
           return $this;
       }

       public function tambah($data)
       {
           $this->db->insert('lap_amal_tarawih',$data);
           return true;
       }

       public function hapus($id)
       {
           $this->db->where('nomor',$id);
           $this->db->delete('lap_amal_tarawih');
           return true;
       }

       public function editData($data,$key)
       {
           $this->db->where('nomor', $key);
           $this->db->update('lap_amal_tarawih',$data);
           return true;
       }

    }
?>
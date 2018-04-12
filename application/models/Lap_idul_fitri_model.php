<?php 
    defined('BASEPATH') or exit('ERROR');

    class Lap_idul_fitri_model extends CI_model{

       public function sel_date($t1,$t2){
        return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.tanggal,l.jumlah,l.log_time, m.id_admin,m.nama AS admin,m.username
          FROM lap_idul_fitri l, master_login m
          WHERE l.id_admin = m.id_admin
          AND m.nama = '".$_SESSION['nama']."'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal, nomor DESC");
       }

       public function add($data)
       {
           $this->db->insert('lap_idul_fitri',$data);
           return true;
       }
       public function ganti($data,$no)
       {
           $this->db->where('nomor',$no);
           $this->db->update('lap_idul_fitri',$data);
           return true;
       }
       public function hapus($key)
       {
           $this->db->delete('lap_idul_fitri',$key);
           return true;
       }
    }
?>
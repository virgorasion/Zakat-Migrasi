<?php 
    defined('BASEPATH') or exit('ERROR');

    class Lap_pengeluaran_modal extends CI_model{

       public function sel_date($t1,$t2){
        return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.tanggal,l.jumlah,l.log_time, m.id_admin,m.nama AS admin,m.username
          FROM lap_pengeluaran l, master_login m
          WHERE l.id_admin = m.id_admin
          AND m.nama = '".$_SESSION['nama']."'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
       }
    }
?>
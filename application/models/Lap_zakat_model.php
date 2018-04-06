<?php 
    defined('BASEPATH') or exit('ERROR');

    class Lap_zakat_model extends CI_model{

       public function select_zakat($tanggal){
       		$sql="SELECT *
				        From list_zakat
				        Where nomor
                AND tanggal = '$tanggal'
                ORDER BY nomor desc";
            $query = $this->db->query($sql);
			     return $query;
       }

       public function sel_date($t1,$t2){
        return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.tanggal, l.nama,l.alamat,l.zakat_fitrah,l.beli,l.zakat_mall,l.infaq,l.log_time, m.id_admin,m.nama AS admin,m.username
          FROM list_zakat l, master_login m
          WHERE l.id_admin = m.id_admin
          AND m.nama = '".$_SESSION['nama']."'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
       }

       public function sel_beli($t1, $t2)
       {
        return $this->db->query("SELECT SUM(l.zakat_fitrah) as zakat, m.id_admin,m.nama, l.id_admin 
          FROM list_zakat l, master_login m 
          WHERE l.id_admin = m.id_admin 
          AND m.nama = '".$_SESSION['nama']."' 
          AND l.beli = 'Beli'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
       }

       public function input($table,$nama,$alamat,$zakatFitrah,$pembelian,$zakatMal,$infaq,$tanggal)
       {
           $data = array(
            'nomor' => '',
            'id_admin' => $_SESSION['id_admin'],
            'tanggal' => $tanggal,
            'nama' => $nama,
            'alamat' => $alamat,
            'zakat_fitrah' => $zakatFitrah,
            'beli' => $pembelian,
            'zakat_mall' => $zakatMal,
            'infaq' => $infaq,
            'log_time' => ''
           );
           $this->db->insert($table,$data);
       }
    }
?>
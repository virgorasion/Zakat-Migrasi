<?php 
defined('BASEPATH') or exit('ERROR');

class Lap_zakat_model extends CI_model{

    public function select_zakat($nomor){
        $this->db->where('nomor', $nomor);
        return $this->db->get('list_zakat');
            
    }

    public function sel_date($t1,$t2){
    return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.tanggal, l.nama,l.alamat,l.zakat_fitrah,l.beli,l.zakat_mall,l.infaq,l.log_time, m.id_admin,m.nama AS admin,m.username
        FROM list_zakat l, master_login m
        WHERE l.id_admin = m.id_admin
        AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
        AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
        GROUP BY l.nomor
        ORDER BY l.tanggal DESC");
    }

    public function setDatatable($t1,$t2)
    {
        $this->datatables->select("list_zakat.nomor,list_zakat.id_admin,date_format(list_zakat.tanggal,'%d/%m/%Y') as tanggal_transaksi, list_zakat.tanggal, list_zakat.nama,list_zakat.alamat,list_zakat.zakat_fitrah,list_zakat.beli,list_zakat.zakat_mall,list_zakat.infaq, master_login.id_admin,master_login.nama AS admin");
        $this->datatables->from("list_zakat");
        $this->datatables->join("master_login", "master_login.id_admin = list_zakat.id_admin");
        $this->datatables->where("DATE_FORMAT(list_zakat.tanggal, \"%Y-%m-%d\") >=", $t1);
        $this->datatables->where("DATE_FORMAT(list_zakat.tanggal, \"%Y-%m-%d\") <=", $t2);
        $this->datatables->group_by("list_zakat.nomor");
        function callback_tanggal($tanggal){
            $date = date_create($tanggal);
            $format = date_format($date, "d-F-Y");
            return $format;
        }
        function callback_zakat_fitrah($zakatFitrah){
            $format = $zakatFitrah." KG";
            return $format;
        }
        function callback_format_uang($data){
            $format = number_format((double)$data,0,"," , ".");
            return $format;
        }
        function callback_pembelian($beli){
            if ($beli == 1) {
                $result = "Beli";
            }else{
                $result = "Tidak";
            }
            return $result;
        }
        $this->datatables->add_column("tgl","$1","callback_tanggal(tanggal)");
        $this->datatables->add_column("zakatFitrah","$1","callback_zakat_fitrah(zakat_fitrah)");
        $this->datatables->add_column("infaq_formated","$1","callback_format_uang(infaq)");
        $this->datatables->add_column("zakatMall","$1","callback_format_uang(zakat_mall)");
        $this->datatables->add_column("pembelian","$1","callback_pembelian(beli)");
        $this->datatables->add_column('action', '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" data-id="$1" data-nama="$5" data-alamat="$6" data-fitrah="$7" data-beli="$8" data-mall="$9" data-infaq="$10"><i class="far fa-edit"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-id="$1" data-alamat="$6" data-tanggal="$4" data-nama="$5"><i class="fas fa-trash-alt"></i></a>', 
        'nomor,id_admin,tanggal_transaksi,tanggal,nama,alamat,zakat_fitrah,beli,zakat_mall,infaq,log_time,id_admin,admin,username');
        return $this->datatables->generate();
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

    public function add_data($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function update_data($table,$data,$id)
    {
        $this->db->where('nomor', $id);
        $this->db->update($table,$data);
        return $this;
    }

    public function hapus($nomor)
    {
        $this->db->where('nomor',$nomor);
        $this->db->delete('list_zakat');
        return $this;
    }
}
?>
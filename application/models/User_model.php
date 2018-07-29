<?php 

    class User_model extends CI_model{
        
    function process_login($username,$password){
        $login = "SELECT * FROM master_login WHERE username= ".$this->db->escape($username)." AND password= ".$this->db->escape($password)." ";
        $result = $this->db->query($login);
        return $result;
    }

    function get_hak_akses(){
        return $this->db->query("SELECT l.kode_menu_level, l.kode_akses, l.kode_menu_child, l.akses_insert, l.akses_view, l.akses_edit, l.akses_delete
                                 from menu_level l, master_login u
                                 where l.kode_akses = u.kode_akses and
                                       u.username = '".$_SESSION['username']."'");
    }

    function select_user($cabang)
    {
       return $this->db->query('select ml.id_admin, ml.password, ml.status_aktif,ml.nama,ml.username,cb.nama_cabang,ha.hak_akses 
                        from master_login ml, master_cabang cb, menu_hak_akses ha
                        where ml.kode_cabang = '.$cabang.'
                        and ml.kode_cabang = cb.kode_cabang
                        and ml.kode_akses = ha.kode_akses
                        order by ml.kode_akses');
    }
    function tambah($arr)
    {
        $this->db->insert('master_login',$arr);
        return true;
    }
}
?>
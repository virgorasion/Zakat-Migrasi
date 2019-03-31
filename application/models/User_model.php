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

    function get_hakAkses()
    {
        $this->db->select('*')
            ->from('menu_hak_akses')
            ->where('status_aktif', 1)
            ->order_by('kode_akses', 'ASC');
        return $this->db->get();
    }

    function get_user()
    {
        return $this->db->query("SELECT master_login.*, menu_hak_akses.hak_akses 
                        FROM master_login, menu_hak_akses 
                        WHERE master_login.status_aktif = 1 
                        AND menu_hak_akses.kode_akses = master_login.kode_akses 
                        GROUP BY id_admin");
    }

    function tambah($arr)
    {
        $this->db->insert('master_login',$arr);
        return true;
    }

    function updateData($table, $data, $id)
    {
        $this->db->where('id_admin', $id);
        return $this->db->update($table, $data);
    }

    function deleteData($table,$id)
    {
        return $this->db->delete($table, array('id_admin' => $id));
    }
}
?>
<?php 

    class User_model extends CI_model{
        
        function process_login($username,$password){
            $con = "SELECT * FROM master_login WHERE username='$username' AND password='$password'";
            $result = $this->db->query($con);
            return $result;
        }

    function get_hak_akses(){
        return $this->db->query("SELECT l.kode_menu_level, l.kode_akses, l.kode_menu_child, l.akses_insert, l.akses_view, l.akses_edit, l.akses_delete
                                 from menu_level l, master_login u
                                 where l.kode_akses = u.kode_akses and
                                       u.username = '".$_SESSION['username']."'");
    }
}
?>
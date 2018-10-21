<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{

    public function __construct() 
    {
        parent::__construct();
    }
    
    function select_header(){
        return $this->db->query("SELECT distinct mh.kode_menu_header, mh.menu_header, mh.link, mh.icon, mh.menu_child
								from menu_header mh, menu_child mc, menu_level ml
								WHERE mc.kode_menu_child = ml.kode_menu_child
								and ml.kode_akses = ".$_SESSION['kode_akses']."
								and mh.status_aktif = 'YES'
								and ml.akses_view = 1
								order by mh.kode_menu_header asc");
    }
	
	function select_child($kode_menu_header){
        return $this->db->query('SELECT mc.kode_menu_child, mc.menu_name, mc.file_php
								from menu_header mh, menu_child mc, menu_level ml
								where mh.kode_menu_header = mc.kode_menu_header
								and mc.kode_menu_child = ml.kode_menu_child
								and ml.kode_akses = '.$_SESSION['kode_akses'].'
								and mc.kode_menu_header = '.$kode_menu_header.'
								and mc.status_aktif = "YES"
								and ml.akses_view = 1
								order by mc.kode_menu_child desc');
    }
}
?>

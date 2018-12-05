<?php

class Setting_model extends CI_model
{
    public function UpdateProfil($table,$data,$id)
    {
        return $this->db->update($table,$data,array("id_admin" => $id));
    }
}
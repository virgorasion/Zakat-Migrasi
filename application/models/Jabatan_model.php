<?php

class Jabatan_model extends CI_model
{
    public function getAll()
    {
        return $this->db->select('*')->from('jabatan')->get()->result();
    }
}
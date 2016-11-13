<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_kabupaten
 *
 * @author Melkikun
 */
class M_kabupaten extends CI_Model
{

    //put your code here

    public function __construct()
    {
        parent::__construct();
    }

    public function getKabupaten($prop)
    {
        $this->db->select("NO_KAB, NAMA_KAB");
        $this->db->from("SETUP_KAB");
        $this->db->where('NO_PROP', $prop);
        $this->db->order_by("NAMA_KAB ASC");
        $query = $this->db->get();
        return $query->result();
    }

    // public function test(){
    //     $this->db->select('field1, field2');
    //     $this->db->from('Table');
    //     $query = $this->db->get('Table', limit, offset);
    //     $this->db->where('Field / comparison', $Value);
    //     $this->db->limit(num);
    // }
}

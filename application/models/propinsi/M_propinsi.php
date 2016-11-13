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
class M_propinsi extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
     public function getPropinsi(){
        $this->db->select("NO_PROP, NAMA_PROP");
        $this->db->from("SETUP_PROP");
//        $this->db->where("NO_PROP", 35);
        $query = $this->db->get();
        return $query->result();
    }
}

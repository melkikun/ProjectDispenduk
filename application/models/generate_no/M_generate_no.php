<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_generate_no
 *
 * @author IT01
 */
class M_generate_no extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getRegLahirSeq(){
        $this->db->select("REGLAHIR_ID_SEQ.NEXTVAL");
        $this->db->from("DUAL");
        $query = $this->db->get();
        return $query->row()->NEXTVAL;
    }
}

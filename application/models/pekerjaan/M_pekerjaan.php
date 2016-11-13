<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_pekerjaan
 *
 * @author Melkikun
 */
class M_pekerjaan extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function getPekerjaan(){
        $this->db->order_by("DESCRIP", "ASC");
        $query = $this->db->get("PKRJN_MASTER");
        return $query->result();
    }
}

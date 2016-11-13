<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_kecamatan
 *
 * @author melkikun
 */
class M_kecamatan extends CI_Model {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function getKecamatan($prop, $kab) {
        $this->db->select("NO_KEC, NAMA_KEC");
        $this->db->from("SETUP_KEC");
        $this->db->where('NO_PROP', $prop);
        $this->db->where('NO_KAB', $kab);
        $this->db->order_by('NAMA_KEC ASC');
        $query = $this->db->get();
        return $query->result();
    }

}

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
class M_kelurahan extends CI_Model {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function getKelurahan($prop, $kab, $kec) {
        $this->db->select("NO_KEL, NAMA_KEL");
        $this->db->from("SETUP_KEL");
        $this->db->where('NO_PROP', $prop);
        $this->db->where('NO_KAB', $kab);
        $this->db->where('NO_KEC', $kec);
        $this->db->order_by('NAMA_KEL ASC');
        $query = $this->db->get();
        return $query->result();
    }

}

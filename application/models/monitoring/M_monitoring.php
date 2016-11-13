<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_monitoring
 *
 * @author miko
 */
class M_monitoring extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function cekNoregistrasi($param){
    	$this->db->select('*');
    	$this->db->from('REG_LAHIR');
    	$this->db->where('NOREG', "$param");
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
    public function cekNoregistrasiKtp($param){
    	$this->db->select('*');
    	$this->db->from('REG_KTP');
    	$this->db->where('NOREG', "$param");
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
    public function cekNoregistrasiKK($param){
    	$this->db->select('*');
    	$this->db->from('REG_KK');
    	$this->db->where('NOREG', "$param");
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
    public function cekNoregistrasiMati($param){
    	$this->db->select('*');
    	$this->db->from('REG_MATI');
    	$this->db->where('NOREG', "$param");
//        echo "dadasd";
//        echo $this->db->get_compiled_select();
    	$query = $this->db->get();
    	return $query->result_array();
    }
}

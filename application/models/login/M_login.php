<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_login
 *
 * @author Melkikun
 */
class M_login extends CI_Model{
    //put your code here
    
    public function cekLogin($request){
        $username = $request['username'];
        $password = $request['password'];
//        echo "$username.$password";
        $query = $this->db->query("SELECT * FROM USER_APP WHERE USER_NAME = '$username' AND USER_PASS = '$password'");
        $num_rows = $query->num_rows();
        if($num_rows == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }
}

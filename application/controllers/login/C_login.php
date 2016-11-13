<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_login
 *
 * @author Melkikun
 */
class C_login extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model("login/m_login");
    }
    
    public function redirectvlogin(){
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("login/v_login", $data);
    }

    public function cekUserLogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $request = array(
            "username" => $username,
            "password" => $password
        );

        $response = $this->m_login->cekLogin($request);
        if ($response != FALSE) {
            $username = "";
            foreach ($response as $value) {
                $username = $value->USER_NAME;
            }
            $this->session->set_userdata("nama", $username);
            echo json_encode("sukses");
        } else {
            echo json_encode("gagal");
        }
    }
    
     public function logut() {
        $this->session->sess_destroy();
        redirect('/', "refresh");
    }

}

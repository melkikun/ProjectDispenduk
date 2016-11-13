<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Melkikun
 */
class Home extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index() {
//        log_message("error", "asu");
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("homepage/v_homepage", $data);
    }

}

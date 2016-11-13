<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_services
 *
 * @author IT01
 */
class C_services extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model("services/m_services");
        $this->load->model("propinsi/m_propinsi");
        $this->load->model("kabupaten/m_kabupaten");
        $this->load->model("kecamatan/m_kecamatan");
        $this->load->model("kelurahan/m_kelurahan");
        $this->load->library("test");
    }

    public function cekKK() {
        $kk = $this->security->xss_clean(json_decode($this->input->get("kk")));
        $response = "";
        if (is_numeric($kk)) {
            $response = $this->m_services->cekkk(trim($kk));
        }
        echo json_encode($response);
    }

    public function cekNik() {
        $nikRequest = json_decode($this->input->get("nik"));
        $nik = $this->security->xss_clean($nikRequest);
        $response = $this->m_services->cekNik($nik);
        echo json_encode($response);
    }

    public function cekNikKtp() {
        $nikRequest = json_decode($this->input->get("nik"));
        $nik = $this->security->xss_clean($nikRequest);
        $response = $this->m_services->cekNikKtp($nik);
        echo json_encode($response);
    }

    public function cekNikForKK(){
        $nikRequest = json_decode($this->input->get("nik"));
        $nik = $this->security->xss_clean($nikRequest);
        $response = $this->m_services->cekNikForKK($nik);
        echo json_encode($response);
    }

    public function getDataKelurahan() {
        $request = json_decode($this->input->get('request'));
        $propinsi = $request->propinsi;
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;
        $response = $this->m_kelurahan->getKelurahan($propinsi, $kabupaten, $kecamatan);
        echo json_encode($response);
    }

    public function getDataKecamatan() {
        $request = json_decode($this->input->get('request'));
        $propinsi = $request->propinsi;
        $kabupaten = $request->kabupaten;
        $response = $this->m_kecamatan->getKecamatan($propinsi, $kabupaten);
        echo json_encode($response);
    }

    public function getDataKabupaten() {
        $request = json_decode($this->input->get('request'));
        $propinsi = $request->propinsi;
        $response = $this->m_kabupaten->getKabupaten($propinsi);
        echo json_encode($response);
    }

    public function getDataPropinsi() {
        $response = $this->m_propinsi->getPropinsi();
        echo json_encode($response);
    }

    public function cekKitap() {
        $kitapRequest = json_decode($this->input->get("request"));
        $kitap = $this->security->xss_clean($kitapRequest);
        $response = $this->m_services->cekKitap($kitap);
        echo json_encode($response);
    }
    
    
    public function popUp(){
        $noReg = urldecode($this->input->get("noReg"));
        $data = array(
            "noReg"=>"$noReg"
        );
        $this->load->view("print_registrasi/popup_print_registrasi", $data);
    }
}

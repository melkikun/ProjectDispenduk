<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_ktp
 *
 * @author melkikun
 */
class C_ktp extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model("pekerjaan/m_pekerjaan");
        $this->load->model("propinsi/m_propinsi");
        $this->load->model("kabupaten/m_kabupaten");
        $this->load->model("kecamatan/m_kecamatan");
        $this->load->model("kelurahan/m_kelurahan");
        $this->load->model("ktp/m_ktp");
        $this->load->model("services/m_services");
        $this->load->library('test');
    }

    public function index() {
        return redirect($this->redirectVMenuKtp());
    }

    public function redirectVMenuKtp() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view('ktp/v_menu_ktp', $data);
    }

    public function view_reg_ktp() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $data['propinsi'] = $this->m_propinsi->getPropinsi();
        $data['kabupaten'] = $this->m_kabupaten->getKabupaten(35);
        $data['kecamatan'] = $this->m_kecamatan->getKecamatan(35, 25);
        $data['kelurahan'] = $this->m_kelurahan->getKelurahan(35, 25, 1);
        $this->load->view('ktp/v_ktp_registrasi', $data);
    }

    public function view_upload_ktp() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view('ktp/v_ktp_upload', $data);
    }

    public function view_monitor_ktp() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view('ktp/v_ktp_monitoring', $data);
    }

    public function submitData() {
        $request = json_decode($this->input->post('request'));
        $alamatPemohon = $this->security->xss_clean($request->alamatPemohon);
        $jenisPenduduk = $this->security->xss_clean($request->jenisPenduduk);
        $kabupatenPemohon = $this->security->xss_clean($request->kabupatenPemohon);
        $kdPosPemohon = $this->security->xss_clean($request->kdPosPemohon);
        $kecamatanPemohon = $this->security->xss_clean($request->kecamatanPemohon);
        $kelurahanPemohon = $this->security->xss_clean($request->kelurahanPemohon);
        $namaPemohon = $this->security->xss_clean($request->namaPemohon);
        $nikPemohon = $this->security->xss_clean($request->nikPemohon);
        $propinsiPemohon = $this->security->xss_clean($request->propinsiPemohon);
        $rtPemohon = $this->security->xss_clean($request->rtPemohon);
        $rwPemohon = $this->security->xss_clean($request->rwPemohon);
        $tglberakhirKitap = $this->security->xss_clean($request->tglberakhirKitap);
        $tlpPemohon = $this->security->xss_clean($request->tlpPemohon);
        $noKitap = $this->security->xss_clean($request->noKitap);
        $noKK = $this->security->xss_clean($request->noKK);

        $district = $this->m_services->getDistrictFromKK($noKK);
        $propinsi = "35";
        $kabupaten = "25";
        $kecamatan = "16";
        $kelurahan = "1001";
        foreach ($district as $value) {
            $propinsi = $value->NO_PROP;
            $kabupaten = $value->NO_KAB;
            $kecamatan = $value->NO_KEC;
            $kelurahan = $value->NO_KEL;
        }


        $sentReq = str_replace("'", "", preg_replace('/\s+/', "", $namaPemohon));
        $xxx = str_replace('.', '', $sentReq);
        $lastNomer = $this->m_services->getLastRegister('ktp');
        $nomer = $this->generateRegistrasi($xxx, $lastNomer, "T");
//        
        $data = array(
            'NOREG' => $nomer,
            'JENISPERMOHONAN' => 'A',
            'JENISPENDUDUK' => $jenisPenduduk,
            'NOKITAP' => $noKitap,
            'KKPEMOHON' => $noKK,
            'NIKPEMOHON' => $nikPemohon,
            'NAMAPEMOHON' => $namaPemohon,
            'ALAMATPEMOHON' => $alamatPemohon,
            'KDPOSPEMOHON' => $kdPosPemohon,
            'RTPEMOHON' => $rtPemohon,
            'RWPEMOHON' => $rwPemohon,
            'TLPPEMOHON' => $tlpPemohon,
            'PROPPEMOHON' => $propinsiPemohon,
            'KABPEMOHON' => $kabupatenPemohon,
            'KECPEMOHON' => $kecamatanPemohon,
            'KELPEMOHON' => $kelurahanPemohon,
            'PROPDISTRICT' => $propinsi,
            'KABDISTRICT' => $kabupaten,
            'KECDISTRICT' => $kecamatan,
            'KELDISTRICT' => $kelurahan,
            'ISACTIVE' => '1',
        );
        $requestToDb = array(
            "data" => $data,
            "tglakhirkitap" => $tglberakhirKitap
        );
        $response = $this->m_ktp->SubmitKTP($requestToDb);
        $return = array(
            "nomer" => $nomer,
            "status" => $response
        );
        echo json_encode($return);
    }

    function cekNoReg() {
        $request = json_decode($this->input->get("request"));
        $noReg = $this->security->xss_clean($request);
        $response = $this->m_ktp->cekNoReg($noReg);
        $return = array();
        foreach ($response as $value) {
            $data['NOREG'] = $value['NOREG'];
            $data['JENISPENDUDUK'] = $value['JENISPENDUDUK'];
            if ($value['F_PASPHOTO'] == NULL)
                $data['F_PASPHOTO'] = false;
            else
                $data['F_PASPHOTO'] = true;
            if ($value['F_KK'] == NULL)
                $data['F_KK'] = false;
            else
                $data['F_KK'] = true;
            if ($value['F_AKTA_LAHIR'] == NULL)
                $data['F_AKTA_LAHIR'] = false;
            else
                $data['F_AKTA_LAHIR'] = true;
            if ($value['F_AKTA_NIKAH'] == NULL)
                $data['F_AKTA_NIKAH'] = false;
            else
                $data['F_AKTA_NIKAH'] = true;
            if ($value['F_KET_PINDAH'] == NULL)
                $data['F_KET_PINDAH'] = false;
            else
                $data['F_KET_PINDAH'] = true;
            if ($value['F_KITAP'] == NULL)
                $data['F_KITAP'] = false;
            else
                $data['F_KITAP'] = true;
            if ($value['F_PASPOR'] == NULL)
                $data['F_PASPOR'] = false;
            else
                $data['F_PASPOR'] = true;
            if ($value['F_SKCK'] == NULL)
                $data['F_SKCK'] = false;
            else
                $data['F_SKCK'] = true;
            array_push($return, $data);
        }
        echo json_encode($return);
    }

    public function uploadSingleImage() {
        $response = false;
        $status = false;
        if (isset($_FILES['file']['tmp_name'])) {
            if ($_FILES['file']['size'] <= 750000) {
                $noReg = $this->input->post('noReg');
                $file = $_FILES['file']['tmp_name'];
                $type = $this->input->post("type");
                $request = array(
                    "no_reg" => $noReg,
                    "tmp_file" => $file,
                    "type" => $type
                );
                $response = $this->m_ktp->uploadSingleImage($request);
                $status = true;
            } else {
                $status = 'File tidak boleh lebih dari 750 KB';
            }
        } else {
            $status = "File Tidak Boleh Kosong";
        }
        $return = array(
            "return" => $response,
            "status" => $status
        );
        echo json_encode($return);
    }

    public function generateRegistrasi($nama, $lastNomer, $kode) {
        $this->test->setNama("$nama");
        $this->test->setTglInput(date("d"));
        $this->test->setLahirPemohon(date("d.M.Y"));
        $fn = $this->test->getFirstName();
        $tn = $this->test->getThirdName();
        $kb = $this->test->getKodeBulan();
        $tglinput = $this->test->getTglInput();
        return strtoupper("$tglinput" . $fn . $tn . $lastNomer . $kb . "$kode");
    }

}

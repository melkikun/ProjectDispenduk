<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_kk
 *
 * @author Melkikun
 */
class C_kk extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model("pekerjaan/m_pekerjaan");
        $this->load->model("propinsi/m_propinsi");
        $this->load->model("kabupaten/m_kabupaten");
        $this->load->model("kecamatan/m_kecamatan");
        $this->load->model("kelurahan/m_kelurahan");
        $this->load->model("services/m_services");
        $this->load->model('kk/m_kk');
        $this->load->library('test');
    }

    public function index() {
        redirect($this->redirectVMenuKk(), TRUE);
    }

    public function redirectVMenuKk() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kk/v_menu_kk", $data);
    }

    public function view_reg_kk() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $data['propinsi'] = $this->m_propinsi->getPropinsi();
        $data['kabupaten'] = $this->m_kabupaten->getKabupaten(35);
        $data['kecamatan'] = $this->m_kecamatan->getKecamatan(35, 25);
        $data['kelurahan'] = $this->m_kelurahan->getKelurahan(35, 25, 1);
        $data['pekerjaan'] = $this->m_pekerjaan->getPekerjaan();
        $this->load->view("kk/v_kk_registrasi", $data);
    }

    public function view_upload_kk() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kk/v_kk_upload", $data);
    }

    public function view_monitor_kk() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kk/v_kk_monitoring", $data);
    }

    public function submiData() {
        $request = json_decode($this->input->post("request"));
        $alamatPemohon = $this->security->xss_clean($request->alamatPemohon);
        $alasanPermohonan = $this->security->xss_clean($request->alasanPermohonan);
        $hubungankeluarga = $this->security->xss_clean($request->hubungankeluarga);
        $jenisPenduduk = $this->security->xss_clean($request->jenisPenduduk);
        $jenisPernikahan = $this->security->xss_clean($request->jenisPernikahan);
        $propinsiPemohon = $this->security->xss_clean($request->propinsiPemohon);
        $kabupatenPemohon = $this->security->xss_clean($request->kabupatenPemohon);
        $kecamatanPemohon = $this->security->xss_clean($request->kecamatanPemohon);
        $kelurahanPemohon = $this->security->xss_clean($request->kelurahanPemohon);
        $namaAnggota = $this->security->xss_clean($request->namaAnggota);
        $namaPemohon = $this->security->xss_clean($request->namaPemohon);
        $nikAnggota = $this->security->xss_clean($request->nikAnggota);
        $nikPemohon = $this->security->xss_clean($request->nikPemohon);
        $noKitap = $this->security->xss_clean($request->noKitap);
        $rtPemohon = $this->security->xss_clean($request->rtPemohon);
        $rwPemohon = $this->security->xss_clean($request->rwPemohon);
        $tglberakhirKitap = $this->security->xss_clean($request->tglberakhirKitap);
        $propinsi = $this->security->xss_clean($request->propinsi);
        $kabupaten = $this->security->xss_clean($request->kabupaten);
        $kecamatan = $this->security->xss_clean($request->kecamatan);
        $kelurahan = $this->security->xss_clean($request->kelurahan);
        $kdPosPemohon = $this->security->xss_clean($request->kdPosPemohon);
        $pekerjaanPemohon = $this->security->xss_clean($request->pekerjaanPemohon);
        $tlpPemohon = $this->security->xss_clean($request->tlpPemohon);
        $kkAsal = $this->security->xss_clean($request->kkAsal);
        $alamatBaru = $this->security->xss_clean($request->alamatBaru);
        $rtBaru = $this->security->xss_clean($request->rtBaru);
        $rwBaru = $this->security->xss_clean($request->rwBaru);
        $kdPosBaru = $this->security->xss_clean($request->kdPosBaru);

        $sentReq = str_replace("'", "", preg_replace('/\s+/', "", $namaPemohon));
        $xxx = str_replace('.', '', $sentReq);
        $lastNomer = $this->m_services->getLastRegister('kk');
        $nomer = $this->generateRegistrasi($xxx, $lastNomer, "K");

        $noREg = $nomer;
        $data1 = array(
            "NOREG" => $noREg,
            "ALASANPERMOHONAN" => "$alasanPermohonan",
            "JENISPERNIKAHAN" => "$jenisPernikahan",
            "JENISPENDUDUK" => "$jenisPenduduk",
            "NOKITAP" => "$noKitap",
            "KKSEMULA" => "$kkAsal",
            "NIKPEMOHON" => "$nikPemohon",
            "NAMAPEMOHON" => "$namaPemohon",
            "ALAMATPEMOHON" => "$alamatPemohon",
            "PROPPEMOHON" => "$propinsiPemohon",
            "KABPEMOHON" => "$kabupatenPemohon",
            "KECPEMOHON" => "$kecamatanPemohon",
            "KELPEMOHON" => "$kelurahanPemohon",
            "KDPOSPEMOHON" => "$kdPosPemohon",
            "RTPEMOHON" => "$rtPemohon",
            "RWPEMOHON" => "$rwPemohon",
            "TLPPEMOHON" => "$tlpPemohon",
            "PEKERJAANPEMOHON" => "$pekerjaanPemohon",
            "PROPDISTRICT" => "$propinsi",
            "KABDISTRICT" => "$kabupaten",
            "KECDISTRICT" => "$kecamatan",
            "KELDISTRICT" => "$kelurahan",
            "ALAMATBARU" => "$alamatBaru",
            "RTBARU" => "$rtBaru",
            "RWBARU" => "$rwBaru",
            "KDPOSBARU" => "$kdPosBaru",
            "ISACTIVE" => '1'
        );
        $data2 = array();
        for ($i = 0; $i < count($nikAnggota); $i++) {
            $ar['NOREG'] = $noREg;
            $ar['NIK'] = $nikAnggota[$i];
            $ar['NAMA'] = $namaAnggota[$i];
            $ar['HUBUNGAN'] = $hubungankeluarga[$i];
            $ar['KKASAL'] = $kkAsal;
            $ar['ISACTIVE'] = 1;
            array_push($data2, $ar);
        }
        $requestToDb = array(
            "data_master" => $data1,
            "data_detail" => $data2,
            "tgl_kitap" => $tglberakhirKitap
        );
        $response = $this->m_kk->SubmitKK($requestToDb);
        $response = array(
            "status" => $response,
            "nomer" => $nomer
        );
        echo json_encode($response);
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
                $response = $this->m_kk->uploadSingleImage($request);
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

    public function cekDuplikatNikAnggotaKK() {
        $nikRequest = json_decode($this->input->get("nik"));
        $nik = $this->security->xss_clean($nikRequest);
        $response = $this->m_kk->cekDuplikatNikKK($nik);
        echo json_encode($response);
    }

    public function cekNoReg() {
        $request = json_decode($this->input->get("request"));
        $noReg = $this->security->xss_clean($request);
        $response = $this->m_kk->cekNoRegistrasi($noReg);
        $return = array();
        foreach ($response as $value) {
            $data['NOREG'] = $value['NOREG'];
            $data['JENISPENDUDUK'] = $value['JENISPENDUDUK'];
            if ($value['F_AKTANIKAH'] == NULL)
                $data['F_AKTANIKAH'] = false;
            else
                $data['F_AKTANIKAH'] = true;
            if ($value['F_KITAP'] == NULL)
                $data['F_KITAP'] = false;
            else
                $data['F_KITAP'] = true;
            if ($value['F_SKPD_DALAMNEGERI'] == NULL)
                $data['F_SKPD_DALAMNEGERI'] = false;
            else
                $data['F_SKPD_DALAMNEGERI'] = true;
            if ($value['F_SKD_LUARNEGERI'] == NULL)
                $data['F_SKD_LUARNEGERI'] = false;
            else
                $data['F_SKD_LUARNEGERI'] = true;
            array_push($return, $data);
        }
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

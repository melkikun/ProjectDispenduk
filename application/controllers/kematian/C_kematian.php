<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_kematian
 *
 * @author IT01
 */
class C_kematian extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model("kelahiran/m_kelahiran");
        $this->load->model("pekerjaan/m_pekerjaan");
        $this->load->model("propinsi/m_propinsi");
        $this->load->model("kabupaten/m_kabupaten");
        $this->load->model("kecamatan/m_kecamatan");
        $this->load->model("kelurahan/m_kelurahan");
        $this->load->model("services/m_services");
        $this->load->model("kematian/m_kematian");
        $this->load->library('Test');
    }

    public function index() {
        redirect($this->redirectVMenuKematian(), "refresh");
    }

    public function redirectVMenuKematian() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kematian/v_menu_kematian", $data);
    }

    public function view_reg_mati() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $data['pekerjaan'] = $this->m_pekerjaan->getpekerjaan();
        $data['propinsi'] = $this->m_propinsi->getPropinsi();
        $data['kabupaten'] = $this->m_kabupaten->getKabupaten(35, 25);
        $data['kecamatan'] = $this->m_kecamatan->getKecamatan(35, 25, 1);
        $data['kelurahan'] = $this->m_kelurahan->getKelurahan(35, 25, 1, 2019);
        $this->load->view("kematian/v_kematian_registrasi", $data);
    }

    public function view_upload_mati() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kematian/v_kematian_upload", $data);
    }

    public function view_monitor_mati() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kematian/v_kematian_monitoring", $data);
    }

    public function submitData() {
        $request = json_decode($this->input->post("request"));
        //status penduduk
        $statusPenduduk = $this->security->xss_clean($request->statusPenduduk);
        //pelapor
        $nikPelapor = $this->security->xss_clean($request->nikPelapor);
        $namaPelapor = $this->security->xss_clean($request->namaPelapor);
        $alamatPelapor = $this->security->xss_clean($request->alamatPelapor);
        $rtPelapor = $this->security->xss_clean($request->rtPelapor);
        $rwPelapor = $this->security->xss_clean($request->rwPelapor);
        $propPelapor = $this->security->xss_clean($request->propPelapor);
        $kabPelapor = $this->security->xss_clean($request->kabPelapor);
        $kecPelapor = $this->security->xss_clean($request->kecPelapor);
        $kelPelapor = $this->security->xss_clean($request->kelPelapor);
        $tgllahirPelapor = $this->security->xss_clean($request->tgllahirPelapor);
        $umurPelapor = $this->security->xss_clean($request->umurPelapor);
        $pekerjaanPelapor = $this->security->xss_clean($request->pekerjaanPelapor);
        $teleponPelapor = $this->security->xss_clean($request->teleponPelapor);
        //jenazah
        $nikJenazah = $this->security->xss_clean($request->nikJenazah);
        $kkJenazah = $this->security->xss_clean($request->kkJenazah);
        $namaJenazah = $this->security->xss_clean($request->namaJenazah);
        $alamatJenazah = $this->security->xss_clean($request->alamatJenazah);
        $rtJenazah = $this->security->xss_clean($request->rtJenazah);
        $rwJenazah = $this->security->xss_clean($request->rwJenazah);
        $propinsiJenazah = $this->security->xss_clean($request->propinsiJenazah);
        $kabupatenJenazah = $this->security->xss_clean($request->kabupatenJenazah);
        $kecamatanJenazah = $this->security->xss_clean($request->kecamatanJenazah);
        $kelurahanJenazah = $this->security->xss_clean($request->kelurahanJenazah);
        $anakKe = $this->security->xss_clean($request->anakKe);
        $tglLahirJenazah = $this->security->xss_clean($request->tglLahirJenazah);
        $umurJenazah = $this->security->xss_clean($request->umurJenazah);
        $propinsiKelahiranJenazah = $this->security->xss_clean($request->propinsiKelahiranJenazah);
        $kabupatenKelahiranJenazah = $this->security->xss_clean($request->kabupatenKelahiranJenazah);
        $agamaJenazah = $this->security->xss_clean($request->agamaJenazah);
        $pekerjaanJenazah = $this->security->xss_clean($request->pekerjaanJenazah);
        $tglKematian = $this->security->xss_clean($request->tglKematian);
        $jamKematian = $this->security->xss_clean($request->jamKematian);
        $tempatKematian = $this->security->xss_clean($request->tempatKematian);
        $penyebabKematian = $this->security->xss_clean($request->penyebabKematian);
        $yangMenerangkan = $this->security->xss_clean($request->yangMenerangkan);
        $kelaminJenazah = $this->security->xss_clean($request->kelaminJenazah);
//ayah
        $nikAyah = $this->security->xss_clean($request->nikAyah);
        $namaAyah = $this->security->xss_clean($request->namaAyah);
        $alamatAyah = $this->security->xss_clean($request->alamatAyah);
        $rtAyah = $this->security->xss_clean($request->rtAyah);
        $rwAyah = $this->security->xss_clean($request->rwAyah);
        $propAyah = $this->security->xss_clean($request->propAyah);
        $kabupatenAyah = $this->security->xss_clean($request->kabupatenAyah);
        $kecamatanAyah = $this->security->xss_clean($request->kecamatanAyah);
        $kelurahanAyah = $this->security->xss_clean($request->kelurahanAyah);
        $tglLahirAyah = $this->security->xss_clean($request->tglLahirAyah);
        $umurAyah = $this->security->xss_clean($request->umurAyah);
        $pekerjaanAyah = $this->security->xss_clean($request->pekerjaanAyah);
        $kwnAyah = $this->security->xss_clean($request->kwnAyah);
//ibu
        $nikIbu = $this->security->xss_clean($request->nikIbu);
        $namaIbu = $this->security->xss_clean($request->namaIbu);
        $alamatIbu = $this->security->xss_clean($request->alamatIbu);
        $rtIbu = $this->security->xss_clean($request->rtIbu);
        $rwIbu = $this->security->xss_clean($request->rwIbu);
        $propIbu = $this->security->xss_clean($request->propIbu);
        $kabupatenIbu = $this->security->xss_clean($request->kabupatenIbu);
        $kecamatanIbu = $this->security->xss_clean($request->kecamatanIbu);
        $kelurahanIbu = $this->security->xss_clean($request->kelurahanIbu);
        $tglLahirIbu = $this->security->xss_clean($request->tglLahirIbu);
        $umurIbu = $this->security->xss_clean($request->umurIbu);
        $pekerjaanIbu = $this->security->xss_clean($request->pekerjaanIbu);
        $kwnIbu = $this->security->xss_clean($request->kwnIbu);
//saksi1
        $nikSaksi1 = $this->security->xss_clean($request->nikSaksi1);
        $namaSaksi1 = $this->security->xss_clean($request->namaSaksi1);
        $alamatSaksi1 = $this->security->xss_clean($request->alamatSaksi1);
        $rtSaksi1 = $this->security->xss_clean($request->rtSaksi1);
        $rwSaksi1 = $this->security->xss_clean($request->rwSaksi1);
        $propSaksi1 = $this->security->xss_clean($request->propSaksi1);
        $kabSaksi1 = $this->security->xss_clean($request->kabSaksi1);
        $kecSaksi1 = $this->security->xss_clean($request->kecSaksi1);
        $kelSaksi1 = $this->security->xss_clean($request->kelSaksi1);
        $umurSaksi1 = "1";
        $pekerjaanSaksi1 = "1";
//saksi2
        $nikSaksi2 = $this->security->xss_clean($request->nikSaksi2);
        $namaSaksi2 = $this->security->xss_clean($request->namaSaksi2);
        $alamatSaksi2 = $this->security->xss_clean($request->alamatSaksi2);
        $rtSaksi2 = $this->security->xss_clean($request->rtSaksi2);
        $rwSaksi2 = $this->security->xss_clean($request->rwSaksi2);
        $propSaksi2 = $this->security->xss_clean($request->propSaksi2);
        $kabSaksi2 = $this->security->xss_clean($request->kabSaksi2);
        $kecSaksi2 = $this->security->xss_clean($request->kecSaksi2);
        $kelSaksi2 = $this->security->xss_clean($request->kelSaksi2);
        $propinsi = $this->security->xss_clean($request->propinsi);
        $kabupaten = $this->security->xss_clean($request->kabupaten);
        $kecamatan = $this->security->xss_clean($request->kecamatan);
        $kelurahan = $this->security->xss_clean($request->kelurahan);
        $umurSaksi2 = "1";
        $pekerjaanSaksi2 = "1";

        $sentReq = str_replace("'", "", preg_replace('/\s+/', "", $namaJenazah));
        $xxx = str_replace('.', '', $sentReq);
        $lastNomer = $this->m_services->getLastRegister('mati');
        $nomer = $this->generateRegistrasi($xxx, $lastNomer, "M");
        $noREg = $nomer;
        $data = array(
            "NOREG" => $noREg,
            "CREATIONDATE" => date("d.M.Y h:i:s"),
            //jenazah
            "NIKJENAZAH" => $nikJenazah,
            "KKJENAZAH" => $kkJenazah,
            "NAMAJENAZAH" => $namaJenazah,
            "KELAMINJENAZAH" => $kelaminJenazah,
            "ANAKKEJENAZAH" => $anakKe,
            "TGLLAHIRJENAZAH" => $tglLahirJenazah,
            "UMURJENAZAH" => $umurJenazah,
            "AGAMAJENAZAH" => $agamaJenazah,
            "PEKERJAANJENAZAH" => $pekerjaanJenazah,
            "NEGARAJENAZAH" => 1,
            "ALAMATJENAZAH" => $alamatJenazah,
            "PROPJENAZAH" => $propinsiJenazah,
            "KABJENAZAH" => $kabupatenJenazah,
            "KECJENAZAH" => $kecamatanJenazah,
            "KELJENAZAH" => $kelurahanJenazah,
            "PROPKELAHIRAN" => $propinsiKelahiranJenazah,
            "KABKELAHIRAN" => $kabupatenKelahiranJenazah,
            "TGLKEMATIAN" => $tglKematian,
            "SEBABKEMATIAN" => $penyebabKematian,
            "TEMPATKEMATIAN" => $tempatKematian,
            "YANGMENERANGKAN" => $yangMenerangkan,
            //pelapor
            'NIKPELAPOR' => $nikPelapor,
            'NAMAPELAPOR' => $namaPelapor,
            'PEKERJAANPELAPOR' => $pekerjaanPelapor,
            'TLPPELAPOR' => $teleponPelapor,
            'TGLLAHIRPELAPOR' => $tgllahirPelapor,
            'UMURPELAPOR' => $umurPelapor,
            'ALAMATPELAPOR' => $alamatPelapor,
            'RTPELAPOR' => $rtPelapor,
            'RWPELAPOR' => $rwPelapor,
            'PROPPELAPOR' => $propPelapor,
            'KABPELAPOR' => $kabPelapor,
            'KECPELAPOR' => $kecPelapor,
            'KELPELAPOR' => $kelPelapor,
            //ayah
            'NIKAYAH' => $nikAyah,
            'NAMAAYAH' => $namaAyah,
            'ALAMATAYAH' => $alamatAyah,
            'PROPAYAH' => $propAyah,
            'KABAYAH' => $kabupatenAyah,
            'KECAYAH' => $kecamatanAyah,
            'KELAYAH' => $kelurahanAyah,
            'RTAYAH' => $rtAyah,
            'RWAYAH' => $rwAyah,
            'TGLLAHIRAYAH' => $tglLahirAyah,
            'UMURAYAH' => $umurAyah,
            'NEGARAAYAH' => $kwnAyah,
            'PEKERJAANAYAH' => $pekerjaanAyah,
            //ibu
            'NIKIBU' => $nikIbu,
            'NAMAIBU' => $namaIbu,
            'ALAMATIBU' => $alamatIbu,
            'PROPIBU' => $propIbu,
            'KABIBU' => $kabupatenIbu,
            'KECIBU' => $kecamatanIbu,
            'KELIBU' => $kelurahanIbu,
            'RTIBU' => $rtIbu,
            'RWIBU' => $rwIbu,
            'TGLLAHIRIBU' => $tglLahirIbu,
            'UMURIBU' => $umurIbu,
            'NEGARAIBU' => $kwnIbu,
            'PEKERJAANIBU' => $pekerjaanIbu,
            //saksi
            'NIKSAKSI1' => $nikSaksi1,
            'NAMASAKSI1' => $namaSaksi1,
            'UMURSAKSI1' => $umurSaksi1,
            'PEKERJAANSAKSI1' => $pekerjaanSaksi1,
            'ALAMATSAKSI1' => $alamatSaksi1,
            'RTSAKSI1' => $rtSaksi1,
            'RWSAKSI1' => $rwSaksi1,
            'PROPSAKSI1' => $propSaksi1,
            'KABSAKSI1' => $kabSaksi1,
            'KECSAKSI1' => $kecSaksi1,
            'KELSAKSI1' => $kelSaksi1,
            //saksi2    
            'NIKSAKSI2' => $nikSaksi2,
            'NAMASAKSI2' => $namaSaksi2,
            'UMURSAKSI2' => $umurSaksi2,
            'PEKERJAANSAKSI2' => $pekerjaanSaksi2,
            'ALAMATSAKSI2' => $alamatSaksi2,
            'RTSAKSI2' => $rtSaksi2,
            'RWSAKSI2' => $rwSaksi2,
            'PROPSAKSI2' => $propSaksi2,
            'KABSAKSI2' => $kabSaksi2,
            'KECSAKSI2' => $kecSaksi2,
            'KELSAKSI2' => $kelSaksi2,
            'NO_KK' => $kkJenazah,
            'NAMAKK' => 'kk jenaazh',
            //distrik
            'PROPDISTRICT' => $propinsi,
            'KABDISTRICT' => $kabupaten,
            'KECDISTRICT' => $kecamatanAyah,
            'KELDISTRICT' => $kelurahan,
            'ISACTIVE' => '1',
        );
        $response = $this->m_kematian->submitData($data);
        $response = array(
            "status" => $response,
            "nomer" => $nomer
        );
        echo json_encode($response);
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

    public function cekNoReg() {
        $noReg = $this->security->xss_clean(json_decode($this->input->get('noReg')));
        $response = $this->m_kematian->cekreg(trim($noReg));
        $return = array();
        foreach ($response as $value) {
            $data['NOREG'] = $value['NOREG'];
            $data['NEGARAJENAZAH'] = $value['NEGARAJENAZAH'];
            if ($value['F_KTP'] == NULL)
                $data['F_KTP'] = false;
            else
                $data['F_KTP'] = true;
            if ($value['F_KK'] == NULL)
                $data['F_KK'] = false;
            else
                $data['F_KK'] = true;
            if ($value['F_SURAT_KEMATIAN'] == NULL)
                $data['F_SURAT_KEMATIAN'] = false;
            else
                $data['F_SURAT_KEMATIAN'] = true;
            if ($value['F_AKTA_LAHIR'] == NULL)
                $data['F_AKTA_LAHIR'] = false;
            else
                $data['F_AKTA_LAHIR'] = true;
            if ($value['F_AKTA_NIKAH'] == NULL)
                $data['F_AKTA_NIKAH'] = false;
            else
                $data['F_AKTA_NIKAH'] = true;
            if ($value['F_KTPSAKSI1'] == NULL)
                $data['F_KTPSAKSI1'] = false;
            else
                $data['F_KTPSAKSI1'] = true;
            if ($value['F_KTPSAKSI2'] == NULL)
                $data['F_KTPSAKSI2'] = false;
            else
                $data['F_KTPSAKSI2'] = true;
            if ($value['F_VISA'] == NULL)
                $data['F_VISA'] = false;
            else
                $data['F_VISA'] = true;
            if ($value['F_PASPOR'] == NULL)
                $data['F_PASPOR'] = false;
            else
                $data['F_PASPOR'] = true;
            if ($value['F_KITAS'] == NULL)
                $data['F_KITAS'] = false;
            else
                $data['F_KITAS'] = true;
            if ($value['F_KITAP'] == NULL)
                $data['F_KITAP'] = false;
            else
                $data['F_KITAP'] = true;
            array_push($return, $data);
        }
        echo json_encode($return, JSON_PRETTY_PRINT);
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
                $response = $this->m_kematian->uploadSingleImage($request);
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

    public function uploadDoubleImage() {
        $response = false;
        $status = false;
        if (isset($_FILES['file1']['tmp_name']) && isset($_FILES['file2']['tmp_name'])) {
            if ($_FILES['file1']['size'] <= 750000 && $_FILES['file2']['size'] <= 750000) {
                $noReg = $this->input->post('noReg');
                $file1 = $_FILES['file1']['tmp_name'];
                $file2 = $_FILES['file2']['tmp_name'];
                $type = $this->input->post("type");
                $request = array(
                    "no_reg" => $noReg,
                    "tmp_file1" => $file1,
                    "tmp_file2" => $file2,
                    "type" => $type
                );
                $response = $this->m_kematian->uploadDoubleImage($request);
                $status = true;
            } else {
                $status = "FILE UPLOAD TIDAK BOLEH MELEBIHI 750 MB";
            }
        } else if (!isset($_FILES['file1']['tmp_name']) || !isset($_FILES['file2']['tmp_name'])) {
            $status = "FILE UPLOAD KURANG / TIDAK SESUAI";
        }
        $return = array(
            "return" => $response,
            "status" => $status
        );
        echo json_encode($return);
    }

}

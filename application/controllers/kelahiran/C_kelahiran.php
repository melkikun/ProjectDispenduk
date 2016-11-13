<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_kelahiran
 *
 * @author IT01
 */
class C_kelahiran extends CI_Controller {

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
        $this->load->library('Test');
    }

    public function index() {
        redirect($this->redirectVKelahiran(), "refresh");
    }

    public function redirectVMenuKelahiran() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kelahiran/v_menu_kelahiran", $data);
    }

    public function view_reg_lahir() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $data['pekerjaan'] = $this->m_pekerjaan->getpekerjaan();
        $data['propinsi'] = $this->m_propinsi->getPropinsi();
        $data['kabupaten'] = $this->m_kabupaten->getKabupaten(35, 25);
        $data['kecamatan'] = $this->m_kecamatan->getKecamatan(35, 25, 1);
        $data['kelurahan'] = $this->m_kelurahan->getKelurahan(35, 25, 1, 2019);
        $this->load->view("kelahiran/v_kelahiran_registrasi", $data);
    }

    public function view_upload_lahir() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kelahiran/v_kelahiran_upload", $data);
    }

    public function view_monitor_lahir() {
        $sess['session'] = $this->session->userdata('nama');
        $data['branding'] = $this->load->view('include/branding', $sess, true);
        $this->load->view("kelahiran/v_kelahiran_monitoring", $data);
    }

    public function ceknoreg() {
        $noReg = $this->security->xss_clean(json_decode($this->input->get('noReg')));
        $response = $this->m_kelahiran->cekreg(trim($noReg));
        $return = array();
        foreach ($response as $value) {
            $data['NOREG'] = $value['NOREG'];
            $data['NEGARAAYAH'] = $value['NEGARAAYAH'];
            $data['NEGARAIBU'] = $value['NEGARAIBU'];
            if ($value['F_KK'] == NULL)
                $data['F_KK'] = false;
            else
                $data['F_KK'] = true;
            if ($value['F_SURATKELAHIRAN'] == NULL)
                $data['F_SURATKELAHIRAN'] = false;
            else
                $data['F_SURATKELAHIRAN'] = true;
            if ($value['F_AKTANIKAH'] == NULL)
                $data['F_AKTANIKAH'] = false;
            else
                $data['F_AKTANIKAH'] = true;
            if ($value['F_KTPAYAH'] == NULL)
                $data['F_KTPAYAH'] = false;
            else
                $data['F_KTPAYAH'] = true;
            if ($value['F_KTPIBU'] == NULL)
                $data['F_KTPIBU'] = false;
            else
                $data['F_KTPIBU'] = true;
            if ($value['F_KTPSAKSI1'] == NULL)
                $data['F_KTPSAKSI1'] = false;
            else
                $data['F_KTPSAKSI1'] = true;
            if ($value['F_KTPSAKSI1'] == NULL)
                $data['F_KTPSAKSI1'] = false;
            else
                $data['F_KTPSAKSI1'] = true;
            if ($value['F_KTPSAKSI2'] == NULL)
                $data['F_KTPSAKSI2'] = false;
            else
                $data['F_KTPSAKSI2'] = true;
            if ($value['F_PASPOR'] == NULL)
                $data['F_PASPOR'] = false;
            else
                $data['F_PASPOR'] = true;
            if ($value['F_KITAP'] == NULL)
                $data['F_KITAP'] = false;
            else
                $data['F_KITAP'] = true;
            if ($value['F_BAP_POLISI'] == NULL)
                $data['F_BAP_POLISI'] = false;
            else
                $data['F_BAP_POLISI'] = true;
            if ($value['F_PERTANGGUNGANMUTLAK'] == NULL)
                $data['F_PERTANGGUNGANMUTLAK'] = false;
            else
                $data['F_PERTANGGUNGANMUTLAK'] = true;
            array_push($return, $data);
        }
        echo json_encode($return, JSON_PRETTY_PRINT);
    }

    public function submitData() {
        $statusOrtu = $this->input->post('statusOrtu');
        $namaBayi = $this->input->post('namaBayi');
        $kelaminBayi = $this->input->post('kelaminBayi');
        $beratBayi = $this->input->post('beratBayi');
        $panjangBayi = $this->input->post('panjangBayi');
        $kelahiranKe = $this->input->post('kelahiranKe');
        $tanggalLahir = $this->input->post('tanggalLahir');
        $waktuLahir = $this->input->post('waktuLahir');
        $jenisLahir = $this->input->post('jenisLahir');
        $penolongLahir = $this->input->post('penolongLahir');
        $tempatLahir = $this->input->post('tempatLahir');
        $propLahir = $this->input->post('propLahir');
        $kabLahir = $this->input->post('kabLahir');
        //ayah
        $nikAyah = $this->input->post('nikAyah');
        $namaAyah = $this->input->post('namaAyah');
        $alamatAyah = $this->input->post('alamatAyah');
        $rtAyah = $this->input->post('rtAyah');
        $rwAyah = $this->input->post('rwAyah');
        $propAyah = $this->input->post('propAyah');
        $kabupatenAyah = $this->input->post('kabupatenAyah');
        $kecamatanAyah = $this->input->post('kecamatanAyah');
        $kelurahanAyah = $this->input->post('kelurahanAyah');
        $tglLahirAyah = $this->input->post('tglLahirAyah');
        $umurAyah = $this->input->post('umurAyah');
        $pekerjaanAyah = $this->input->post('pekerjaanAyah');
        $kwnAyah = $this->input->post('kwnAyah');
        $kebangsaanAyah = $this->input->post('kebangsaanAyah');
        //ibu
        $nikIbu = $this->input->post('nikIbu');
        $namaIbu = $this->input->post('namaIbu');
        $alamatIbu = $this->input->post('alamatIbu');
        $rtIbu = $this->input->post('rtIbu');
        $rwIbu = $this->input->post('rwIbu');
        $propIbu = $this->input->post('propIbu');
        $kabupatenIbu = $this->input->post('kabupatenIbu');
        $kecamatanIbu = $this->input->post('kecamatanIbu');
        $kelurahanIbu = $this->input->post('kelurahanIbu');
        $tglLahirIbu = $this->input->post('tglLahirIbu');
        $umurIbu = $this->input->post('umurIbu');
        $pekerjaanIbu = $this->input->post('pekerjaanIbu');
        $kwnIbu = $this->input->post('kwnIbu');
        $kebangsaanIbu = $this->input->post('kebangsaanIbu');
        $tglKawinIbu = $this->input->post('tglKawinIbu');
        //pelapor
        $nikPelapor = $this->input->post('nikPelapor');
        $namaPelapor = $this->input->post('namaPelapor');
        $alamatPelapor = $this->input->post('alamatPelapor');
        $propPelapor = $this->input->post('propPelapor');
        $kabPelapor = $this->input->post('kabPelapor');
        $kecPelapor = $this->input->post('kecPelapor');
        $kelPelapor = $this->input->post('kelPelapor');
        $kelaminPelapor = $this->input->post('kelaminPelapor');
        $umurPelapor = $this->input->post('umurPelapor');
        $pekerjaanPelapor = $this->input->post('pekerjaanPelapor');
        $teleponPelapor = $this->input->post('teleponPelapor');
        $rtPelapor = $this->input->post('rtPelapor');
        $rwPelapor = $this->input->post('rwPelapor');
        //saksi1
        $nikSaksi1 = $this->input->post('nikSaksi1');
        $namaSaksi1 = $this->input->post('namaSaksi1');
        $alamatSaksi1 = $this->input->post('alamatSaksi1');
        $rtSaksi1 = $this->input->post('rtSaksi1');
        $rwSaksi1 = $this->input->post('rwSaksi1');
        $propSaksi1 = $this->input->post('propSaksi1');
        $kabSaksi1 = $this->input->post('kabSaksi1');
        $kecSaksi1 = $this->input->post('kecSaksi1');
        $kelSaksi1 = $this->input->post('kelSaksi1');
        $umurSaksi1 = $this->input->post('umurSaksi1');
        $pekerjaanSaksi1 = $this->input->post('pekerjaanSaksi1');
        //saksi2
        $nikSaksi2 = $this->input->post('nikSaksi2');
        $namaSaksi2 = $this->input->post('namaSaksi2');
        $alamatSaksi2 = $this->input->post('alamatSaksi2');
        $rtSaksi2 = $this->input->post('rtSaksi2');
        $rwSaksi2 = $this->input->post('rwSaksi2');
        $propSaksi2 = $this->input->post('propSaksi2');
        $kabSaksi2 = $this->input->post('kabSaksi2');
        $kecSaksi2 = $this->input->post('kecSaksi2');
        $kelSaksi2 = $this->input->post('kelSaksi2');
        $umurSaksi2 = $this->input->post('umurSaksi2');
        $pekerjaanSaksi2 = $this->input->post('pekerjaanSaksi2');
        //registrasi dimana akan dikirim
        $kk = $this->input->post('kk');
        $namaKK = $this->input->post('namaKK');
        $propinsi = $this->input->post('propinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');

        $sentReq = "";
        if ($statusOrtu == 3) {
            $sentReq = str_replace("'", "", preg_replace('/\s+/', "", $namaKK));
        } else {
            $sentReq = str_replace("'", "", preg_replace('/\s+/', "", $namaIbu));
        }
        $xxx = str_replace('.', '', $sentReq);
        $lastNomer = $this->m_services->getLastRegister('lahir');
        $nomer = $this->generateRegistrasi($xxx, $lastNomer, "L");

        //REGISTRASI REG LAHIR
        $data1 = array(
            'NOREG' => $nomer,
            'CREATIONDATE' => date("d.M.Y h:i:s"),
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
            'UMURAYAH' => $umurAyah,
            'PEKERJAANAYAH' => $pekerjaanAyah,
            'NEGARAAYAH' => $kwnAyah,
            'BANGSAAYAH' => $kebangsaanAyah,
            'TGLLAHIRAYAH' => $tglLahirAyah,
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
            'UMURIBU' => $umurIbu,
            'PEKERJAANIBU' => $pekerjaanIbu,
            'NEGARAIBU' => $kwnIbu,
            'BANGSAIBU' => $kebangsaanIbu,
            'TGLLAHIRIBU' => $tglLahirIbu,
            'TGLKAWINIBU' => $tglKawinIbu,
            //pelapor
            'NIKPELAPOR' => $nikPelapor,
            'NAMAPELAPOR' => $namaPelapor,
            'UMURPELAPOR' => $umurPelapor,
            'KELAMINPELAPOR' => $kelaminPelapor,
            'PEKERJAANPELAPOR' => $pekerjaanPelapor,
            'TLPPELAPOR' => $teleponPelapor,
            'ALAMATPELAPOR' => $alamatPelapor,
            'RTPELAPOR' => $rtPelapor,
            'RWPELAPOR' => $rwPelapor,
            'PROPPELAPOR' => $propPelapor,
            'KABPELAPOR' => $kabPelapor,
            'KECPELAPOR' => $kecPelapor,
            'KELPELAPOR' => $kelPelapor,
            //saksi1
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
            //kk
            'NO_KK' => $kk,
            'NAMAKK' => $namaKK,
            //distrik
            'PROPDISTRICT' => $propinsi,
            'KABDISTRICT' => $kabupaten,
            'KECDISTRICT' => $kecamatan,
            'KELDISTRICT' => $kelurahan,
            'ISACTIVE' => '1',
        );
        $data2 = array();
        for ($i = 0; $i < count($namaBayi); $i++) {
            $ar['NOREG'] = $nomer;
            $ar['NAMA'] = $namaBayi[$i];
            $ar['KELAMIN'] = $kelaminBayi[$i];
            $ar['BERAT'] = $beratBayi[$i];
            $ar['PANJANG'] = $panjangBayi[$i];
            $ar['TGLLAHIR'] = $tanggalLahir[$i];
            $ar['JENISKELAHIRAN'] = $jenisLahir[$i];
            $ar['KELAHIRANKE'] = $kelahiranKe[$i];
            $ar['PENOLONG'] = $penolongLahir[$i];
            $ar['TEMPATLAHIR'] = $tempatLahir[$i];
            $ar['PROPINSIBAYI'] = $propLahir[$i];
            $ar['KABUPATENBAYI'] = $kabLahir[$i];
            array_push($data2, $ar);
        }

        $reg_lahir = $this->security->xss_clean($data1);
        $reg_bayi = $this->security->xss_clean($data2);
        $requestToDb = array(
            "reg_lahir" => $reg_lahir,
            "reg_bayi" => $reg_bayi
        );
        $response = $this->m_kelahiran->submitLahir($requestToDb);
        $return = array(
            "status" => $response,
            "nomer" => $nomer
        );
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
                $response = $this->m_kelahiran->uploadSingleImage($request);
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
                $response = $this->m_kelahiran->uploadDoubleImage($request);
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

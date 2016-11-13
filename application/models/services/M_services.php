<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_services
 *
 * @author IT01
 */
class M_services extends CI_Model {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function cekKK($param) {
        $this->db->select("NO_KK, NAMA_KEP AS NAMA_LGKP_AYAH, NO_PROP, NO_KAB, NO_KEC, NO_KEL");
        $this->db->distinct();
        $this->db->from('DATA_KELUARGA');
        $this->db->where('NO_KK', $param);
//        $this->db->limit(1);
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result();
    }

    public function cekNik($param) {
        $this->db->select("WNI.NO_KK, WNI.NAMA_LGKP, NAMA_KEL, WNI.NO_PROP, WNI.NO_KAB, "
            . "WNI.NO_KEC, WNI.NO_KEC, WNI.NO_KEL, TO_CHAR(WNI.TGL_LHR, 'DD.MON.YYYY') AS TGL_LHR, "
            . "WNI.JENIS_PKRJN, TO_CHAR(WNI.TGL_KWN, 'DD.MON.YYYY') AS TGL_KAWIN, WNI.JENIS_KLMIN, "
            . "DATA_KELUARGA.KODE_POS INST_KODE_POS, WNI.NO_KK, FLOOR((SYSDATE-TGL_LHR)/360) AS UMUR, WNI.AGAMA,"
            . "DATA_KELUARGA.NO_RT, DATA_KELUARGA.NO_RW, DATA_KELUARGA.ALAMAT, WNI.STAT_KWN");
        $this->db->from('WNI');
        $this->db->join('SETUP_PROP', 'SETUP_PROP.NO_PROP=WNI.NO_PROP');
        $this->db->join('SETUP_KAB', 'SETUP_KAB.NO_KAB=WNI.NO_KAB AND SETUP_KAB.NO_PROP = WNI.NO_PROP');
        $this->db->join('SETUP_KEC', 'SETUP_KEC.NO_KEC = WNI.NO_KEC AND SETUP_KEC.NO_KAB=WNI.NO_KAB AND SETUP_KEC.NO_PROP = WNI.NO_PROP');
        $this->db->join('SETUP_KEL', 'SETUP_KEL.NO_KEL = WNI.NO_KEL AND SETUP_KEL.NO_KEC = WNI.NO_KEC AND SETUP_KEL.NO_KAB=WNI.NO_KAB AND SETUP_KEL.NO_PROP = WNI.NO_PROP');
        $this->db->join('PKRJN_MASTER', 'PKRJN_MASTER.NO = WNI.JENIS_PKRJN');
        $this->db->join('DATA_KELUARGA', 'DATA_KELUARGA.NO_KK = WNI.NO_KK');
        $this->db->where('WNI.NIK', $param);
        $query = $this->db->get();
//         echo $this->db->last_query();
        return $query->result();
    }
    
    public function cekNikKtp($param) {
        $this->db->select("WNI.NO_KK, WNI.NAMA_LGKP, NAMA_KEL, WNI.NO_PROP, WNI.NO_KAB, "
            . "WNI.NO_KEC, WNI.NO_KEC, WNI.NO_KEL, TO_CHAR(WNI.TGL_LHR, 'DD.MON.YYYY') AS TGL_LHR, "
            . "WNI.JENIS_PKRJN, TO_CHAR(WNI.TGL_KWN, 'DD.MON.YYYY') AS TGL_KAWIN, WNI.JENIS_KLMIN, "
            . "DATA_KELUARGA.KODE_POS INST_KODE_POS, WNI.NO_KK, FLOOR((SYSDATE-TGL_LHR)/360) AS UMUR, WNI.AGAMA,"
            . "DATA_KELUARGA.NO_RT, DATA_KELUARGA.NO_RW, DATA_KELUARGA.ALAMAT, WNI.STAT_KWN");
        $this->db->from('WNI');
        $this->db->join('SETUP_PROP', 'SETUP_PROP.NO_PROP=WNI.NO_PROP');
        $this->db->join('SETUP_KAB', 'SETUP_KAB.NO_KAB=WNI.NO_KAB AND SETUP_KAB.NO_PROP = WNI.NO_PROP');
        $this->db->join('SETUP_KEC', 'SETUP_KEC.NO_KEC = WNI.NO_KEC AND SETUP_KEC.NO_KAB=WNI.NO_KAB AND SETUP_KEC.NO_PROP = WNI.NO_PROP');
        $this->db->join('SETUP_KEL', 'SETUP_KEL.NO_KEL = WNI.NO_KEL AND SETUP_KEL.NO_KEC = WNI.NO_KEC AND SETUP_KEL.NO_KAB=WNI.NO_KAB AND SETUP_KEL.NO_PROP = WNI.NO_PROP');
        $this->db->join('PKRJN_MASTER', 'PKRJN_MASTER.NO = WNI.JENIS_PKRJN');
        $this->db->join('DATA_KELUARGA', 'DATA_KELUARGA.NO_KK = WNI.NO_KK');
        $this->db->where('WNI.NIK', $param);
        $this->db->where('WNI.NIK NOT IN (SELECT NIKPEMOHON FROM REG_KTP)', NULL, FALSE);
        $query = $this->db->get();
//         echo $this->db->last_query();
        return $query->result();
    }

    public function cekNikForKK($param) {
        $this->db->select("WNI.NO_KK, WNI.NAMA_LGKP, NAMA_KEL, WNI.NO_PROP, WNI.NO_KAB, "
            . "WNI.NO_KEC, WNI.NO_KEC, WNI.NO_KEL, TO_CHAR(WNI.TGL_LHR, 'DD.MON.YYYY') AS TGL_LHR, "
            . "WNI.JENIS_PKRJN, TO_CHAR(WNI.TGL_KWN, 'DD.MON.YYYY') AS TGL_KAWIN, WNI.JENIS_KLMIN, "
            . "DATA_KELUARGA.KODE_POS INST_KODE_POS, WNI.NO_KK, FLOOR((SYSDATE-TGL_LHR)/360) AS UMUR, WNI.AGAMA,"
            . "DATA_KELUARGA.NO_RT, DATA_KELUARGA.NO_RW, DATA_KELUARGA.ALAMAT, WNI.STAT_KWN");
        $this->db->from('WNI');
        $this->db->join('SETUP_PROP', 'SETUP_PROP.NO_PROP=WNI.NO_PROP');
        $this->db->join('SETUP_KAB', 'SETUP_KAB.NO_KAB=WNI.NO_KAB AND SETUP_KAB.NO_PROP = WNI.NO_PROP');
        $this->db->join('SETUP_KEC', 'SETUP_KEC.NO_KEC = WNI.NO_KEC AND SETUP_KEC.NO_KAB=WNI.NO_KAB AND SETUP_KEC.NO_PROP = WNI.NO_PROP');
        $this->db->join('SETUP_KEL', 'SETUP_KEL.NO_KEL = WNI.NO_KEL AND SETUP_KEL.NO_KEC = WNI.NO_KEC AND SETUP_KEL.NO_KAB=WNI.NO_KAB AND SETUP_KEL.NO_PROP = WNI.NO_PROP');
        $this->db->join('PKRJN_MASTER', 'PKRJN_MASTER.NO = WNI.JENIS_PKRJN');
        $this->db->join('DATA_KELUARGA', 'DATA_KELUARGA.NO_KK = WNI.NO_KK');
        $this->db->where('WNI.NIK', $param);
        $this->db->where('WNI.NIK NOT IN (SELECT NIKPEMOHON FROM REG_KK)', NULL, FALSE);
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result();
    }

    public function getDistrictFromKK($noKK) {
        $this->db->select("NO_PROP, NO_KAB, NO_KEC, NO_KEL");
        $this->db->from("DATA_KELUARGA");
        $this->db->where("NO_KK", $noKK);
        $query = $this->db->get();
        return $query->result();
    }

    public function generate() {
        $this->db->select("URUTAN.NEXTVAL");
        $this->db->from("DUAL");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLastRegister($param) {
        $tableName = "";
        switch ($param) {
            case "lahir":
            $tableName = "REG_LAHIR";
            break;
            case "kk":
            $tableName = "REG_KK";
            break;
            case "ktp":
            $tableName = "REG_KTP";
            break;
            case "mati":
            $tableName = "REG_MATI";
            break;
            default:
            break;
        }
        $today = date("m/d/Y");
        $lastNomer = "";
        $sql = "SELECT MAX(SUBSTR (NOREG, LENGTH (NOREG) - 4, 3)) AS NOMER
  FROM   $tableName
 WHERE   CREATIONDATE BETWEEN TO_DATE ('$today 00:00:00',
                                       'MM/DD/YYYY HH24:MI:SS')
                          AND  TO_DATE ('$today 23:59:59',
                          'MM/DD/YYYY HH24:MI:SS')";
                          $query = $this->db->query($sql);

                          foreach ($query->result_array() as $row) {
                            $lastNomer = intval($row['NOMER']);
                        }
                        if ($lastNomer == "") {
                            $lastNomer = 1;
                        } else {
                            $lastNomer += 1;
                        }
                        return str_pad($lastNomer, 3, 0, STR_PAD_LEFT);
//        return $sql;
                    }
                    
                    public function cekKitap($param){
                        $sql = "SELECT FLOOR(TO_DATE('$param 23:29:59', 'dd.mon,yyyy hh24:mi:ss')-(SYSDATE + 30)) AS SELISIH FROM DUAL";
//        echo $sql;
                        $query = $this->db->query($sql);
                        return $query->result();
                    }

                }

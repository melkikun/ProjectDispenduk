<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_ktp
 *
 * @author Mikie
 */
class M_kk extends CI_Model {

    //put your code here

    private $conn;

    public function __construct() {
        parent::__construct();
        $this->conn = $this->db->conn_id;
    }

    public function SubmitKK($request) {
        $data_master = $request['data_master'];
        $data_detail = $request['data_detail'];
        $tgl_kitap = "";
        if ($request['tgl_kitap'] != "") {
            $tgl_kitap = "TO_DATE('$request[tgl_kitap]', 'DD.MON.YYYY')";
        } else {
            $tgl_kitap = "''";
        }
        $flag = "";
        $response = FALSE;
        $this->db->trans_begin();
        $this->db->set('CREATIONDATE', "SYSDATE", FALSE);
        $this->db->set('TGLAKHIRKITAP', "$tgl_kitap", FALSE);
        $this->db->insert('REG_KK', $data_master);
        if ($this->db->trans_status() === FALSE) {
            $flag .= 0;
        } else {
            $flag .= 1;
            $this->db->insert_batch('ANGGOTA_KELUARGA_SEMENTARA', $data_detail);
            if ($this->db->trans_status() === FALSE) {
                $flag .= 0;
            } else {
                $flag .= 1;
            }
        }
         if (strpos($flag, '0') === 0) {
            $response = FALSE;
            $this->db->trans_rollback();
        } else {
            $response = TRUE;
            $this->db->trans_commit();
        }
        return $response;
    }

    public function uploadSingleImage($request) {
        $tmp_file = $request['tmp_file'];
        $no_reg = $this->db->escape($request['no_reg']);
        $type = $request['type'];
        $response = false;
        switch ($type) {

            case "akta-nikah":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KK SET F_AKTANIKAH = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_AKTANIKAH into :IMG";
                $insertImageParse = oci_parse($this->conn, $insertImageSql);
                oci_bind_by_name($insertImageParse, ':IMG', $lob, -1, OCI_B_BLOB);
                $response = oci_execute($insertImageParse, OCI_NO_AUTO_COMMIT);
                if ($response) {
                    $lob->savefile($tmp_file);
                    oci_commit($this->conn);
                    oci_free_statement($insertImageParse);
                    $response = true;
                } else {
                    oci_rollback($this->conn);
                    $response = false;
                }
                return $response;
                break;
            case "kitap":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KK SET F_KITAP = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_KITAP into :IMG";
                $insertImageParse = oci_parse($this->conn, $insertImageSql);
                oci_bind_by_name($insertImageParse, ':IMG', $lob, -1, OCI_B_BLOB);
                $response = oci_execute($insertImageParse, OCI_NO_AUTO_COMMIT);
                if ($response) {
                    $lob->savefile($tmp_file);
                    oci_commit($this->conn);
                    oci_free_statement($insertImageParse);
                    $response = true;
                } else {
                    oci_rollback($this->conn);
                    $response = false;
                }
                return $response;
                break;
            case "dalam-negri":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KK SET F_SKPD_DALAMNEGERI = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_SKPD_DALAMNEGERI into :IMG";
                $insertImageParse = oci_parse($this->conn, $insertImageSql);
                oci_bind_by_name($insertImageParse, ':IMG', $lob, -1, OCI_B_BLOB);
                $response = oci_execute($insertImageParse, OCI_NO_AUTO_COMMIT);
                if ($response) {
                    $lob->savefile($tmp_file);
                    oci_commit($this->conn);
                    oci_free_statement($insertImageParse);
                    $response = true;
                } else {
                    oci_rollback($this->conn);
                    $response = false;
                }
                return $response;
                break;
            case "luar-negri":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KK SET F_SKD_LUARNEGERI = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_SKD_LUARNEGERI into :IMG";
                $insertImageParse = oci_parse($this->conn, $insertImageSql);
                oci_bind_by_name($insertImageParse, ':IMG', $lob, -1, OCI_B_BLOB);
                $response = oci_execute($insertImageParse, OCI_NO_AUTO_COMMIT);
                if ($response) {
                    $lob->savefile($tmp_file);
                    oci_commit($this->conn);
                    oci_free_statement($insertImageParse);
                    $response = true;
                } else {
                    oci_rollback($this->conn);
                    $response = false;
                }
                return $response;
                break;
            default:
                break;
        }
    }

    public function cekDuplikatNikKK($request) {
        $this->db->select("NIK, NAMA_LGKP");
        $this->db->from("WNI");
        $this->db->where("NIK", $request);
//        $this->db->where("NIK NOT IN (SELECT NIK FROM ANGGOTA_KELUARGA_SEMENTARA)", NULL, FALSE);
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result();
    }

    public function cekNoRegistrasi($request) {
        $this->db->select("NOREG, JENISPENDUDUK, F_AKTANIKAH, F_KITAP, F_SKPD_DALAMNEGERI, F_SKD_LUARNEGERI");
        $this->db->from("REG_KK");
        $this->db->where("NOREG", $request);
        $query = $this->db->get();
        return $query->result_array();
    }

}

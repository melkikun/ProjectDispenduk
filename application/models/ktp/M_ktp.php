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
class M_ktp extends CI_Model {

    //put your code here

    private $conn;

    public function __construct() {
        parent::__construct();
        $this->conn = $this->db->conn_id;
    }

    public function SubmitKTP($request) {
        $data = $request['data'];
        $response = FALSE;
        $this->db->trans_begin();
        $tgl_kitap = "''";
        if ($request['tglakhirkitap'] != "") {
            $tgl_kitap = "TO_DATE('$request[tglakhirkitap]', 'DD.MON.YYYY')";
        } else {
            $tgl_kitap = "''";
        }
        $this->db->set('CREATIONDATE', "SYSDATE", FALSE);
        $this->db->set('TGLAKHIRKITAP', "$tgl_kitap", FALSE);
        $this->db->insert('REG_KTP', $data);
        if ($this->db->trans_status() === FALSE) {
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
            case "foto":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KTP SET F_PASPHOTO = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_PASPHOTO into :IMG";
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
            case "kk":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KTP SET F_KK = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_KK into :IMG";
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
            case "akta-lahir":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KTP SET F_AKTA_LAHIR = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_AKTA_LAHIR into :IMG";
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
            case "akta-nikah":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KTP SET F_AKTA_NIKAH = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_KK into :IMG";
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
            case "pindah":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KTP SET F_KET_PINDAH = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_KK into :IMG";
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
            case "paspor":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KTP SET F_PASPOR = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_PASPOR into :IMG";
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
                $insertImageSql = "UPDATE REG_KTP SET F_KITAP = EMPTY_BLOB() WHERE NOREG = $no_reg "
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
            case "skck":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_KTP SET F_SKCK = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_SKCK into :IMG";
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
                return $response;
        }
    }

    public function cekNoReg($request) {
        $this->db->select("*");
        $this->db->from("REG_KTP");
        $this->db->where("NOREG", $request);
        $query = $this->db->get();
        return $query->result_array();
    }

}

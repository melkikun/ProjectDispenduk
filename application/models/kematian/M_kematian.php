<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_kematian
 *
 * @author IT01
 */
class M_kematian extends CI_Model {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->conn = $this->db->conn_id;
    }

    public function submitData($request) {
        $response = FALSE;
        $this->db->trans_begin();
        $this->db->insert('REG_MATI', $request);
        if ($this->db->trans_status() === FALSE) {
            $response = FALSE;
            $this->db->trans_rollback();
        } else {
            $response = TRUE;
            $this->db->trans_commit();
        }
        return $response;
    }

    public function cekreg($param) {
        $this->db->select("NOREG, NEGARAJENAZAH, F_KTP, F_KK, "
                . "F_SURAT_KEMATIAN, F_AKTA_LAHIR, F_AKTA_NIKAH, "
                . "F_KTPSAKSI1,F_KTPSAKSI2, F_VISA, "
                . "F_PASPOR, F_KITAS, F_KITAP");
        $this->db->distinct();
        $this->db->from('REG_MATI');
        $this->db->where('NOREG', $param);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function uploadSingleImage($request) {
        $tmp_file = $request['tmp_file'];
        $no_reg = $this->db->escape($request['no_reg']);
        $type = $request['type'];
        $response = false;
        switch ($type) {
            case "rs":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_MATI SET F_SURAT_KEMATIAN = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_SURAT_KEMATIAN into :IMG";
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
                $insertImageSql = "UPDATE REG_MATI SET F_KK = EMPTY_BLOB() WHERE NOREG = $no_reg "
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
            case "ktp":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_MATI SET F_KTP = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_KTP into :IMG";
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
                $insertImageSql = "UPDATE REG_MATI SET F_AKTA_LAHIR = EMPTY_BLOB() WHERE NOREG = $no_reg "
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
                $insertImageSql = "UPDATE REG_MATI SET F_AKTA_NIKAH = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_AKTA_NIKAH into :IMG";
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
            case "kitas":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_MATI SET F_KITAS = EMPTY_BLOB() WHERE NOREG = $no_reg "
                        . "returning F_KITAS into :IMG";
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
                $insertImageSql = "UPDATE REG_MATI SET F_KITAP = EMPTY_BLOB() WHERE NOREG = $no_reg "
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
            default:
                break;
                return $response;
        }
    }

    public function uploadDoubleImage($request) {
        $tmp_file1 = $request['tmp_file1'];
        $tmp_file2 = $request['tmp_file1'];
        $no_reg = $this->db->escape($request['no_reg']);
        $type = $request['type'];
        $response = false;
        switch ($type) {
            case "saksi":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_MATI SET F_KTPSAKSI1 = EMPTY_BLOB(), F_KTPSAKSI2 = EMPTY_BLOB() "
                        . "WHERE NOREG = $no_reg "
                        . "returning F_KTPSAKSI1, F_KTPSAKSI2 into :IMG, :IMG2 ";
                $insertImageParse = oci_parse($this->conn, $insertImageSql);
                oci_bind_by_name($insertImageParse, ':IMG', $lob, -1, OCI_B_BLOB);
                oci_bind_by_name($insertImageParse, ':IMG2', $lob, -1, OCI_B_BLOB);
                $response = oci_execute($insertImageParse, OCI_NO_AUTO_COMMIT);
                if ($response) {
                    $lob->savefile($tmp_file1);
                    $lob->savefile($tmp_file2);
                    oci_commit($this->conn);
                    oci_free_statement($insertImageParse);
                    $response = true;
                } else {
                    oci_rollback($this->conn);
                    $response = false;
                }
                break;
            case "visa":
                $lob = oci_new_descriptor($this->conn, OCI_D_LOB);
                $insertImageSql = "UPDATE REG_MATI SET F_PASPOR = EMPTY_BLOB(), F_VISA = EMPTY_BLOB() "
                        . "WHERE NOREG = $no_reg "
                        . "returning F_PASPOR, F_VISA into :IMG, :IMG2 ";
                $insertImageParse = oci_parse($this->conn, $insertImageSql);
                oci_bind_by_name($insertImageParse, ':IMG', $lob, -1, OCI_B_BLOB);
                oci_bind_by_name($insertImageParse, ':IMG2', $lob, -1, OCI_B_BLOB);
                $response = oci_execute($insertImageParse, OCI_NO_AUTO_COMMIT);
                if ($response) {
                    $lob->savefile($tmp_file1);
                    $lob->savefile($tmp_file2);
                    oci_commit($this->conn);
                    oci_free_statement($insertImageParse);
                    $response = true;
                } else {
                    oci_rollback($this->conn);
                    $response = false;
                }
                break;
            default:
                break;
        }
        return $response;
    }

}

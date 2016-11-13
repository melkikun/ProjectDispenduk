<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author Mikie
 */
class test {

//    public function printx() {
//        echo "123";
//    }
    
    private $nama;
    private $tglInput;
    private $lahirPemohon;
    
    function getNama() {
        return $this->nama;
    }

    function getTglInput() {
        return intval($this->tglInput);
    }

    function getLahirPemohon() {
        return $this->lahirPemohon;
    }

    function setNama($nama) {
        $this->nama = $nama;
    }

    function setTglInput($tglInput) {
        $this->tglInput = $tglInput;
    }

    function setLahirPemohon($lahirPemohon) {
        $this->lahirPemohon = $lahirPemohon;
    }
    
    public function getFirstName(){
        return substr($this->getNama(), 0, 1);
    }

    public function getThirdName(){
        return substr($this->getNama(), 2, 1);
    }

    public function getKodeBulan(){
        $tgl = substr($this->getLahirPemohon(), 3, 3);
        $return = "";
        switch ($tgl) {
            case 'Jan':
                $return = "A";
                break;
             case 'Feb':
                $return = "B";
                break;
                 case 'Mar':
                $return = "C";
                break;
                 case 'Apr':
                $return = "D";
                break;
                 case 'May':
                $return = "E";
                break;
                 case 'Jun':
                $return = "F";
                break;
                 case 'Jul':
                $return = "G";
                break;
                 case 'Aug':
                $return = "H";
                break;
                 case 'Sep':
                $return = "I";
                break;
                case 'Oct':
                $return = "J";
                break;
                case 'Nov':
                $return = "K";
                break;
                case 'Dec':
                $return = "L";
                break;
            default:
                $return = "X";
                break;
        }
        return $return;
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'home';
$route['404_override'] = 'home';
$route['translate_uri_dashes'] = FALSE;


//routing untuk kelahiran
$route['kelahiran'] = "kelahiran/c_kelahiran/redirectVMenuKelahiran";
$route['kelahiran/registrasi'] = "kelahiran/c_kelahiran/view_reg_lahir";
$route['kelahiran/upload'] = "kelahiran/c_kelahiran/view_upload_lahir";
$route['kelahiran/monitor'] = "kelahiran/c_kelahiran/view_monitor_lahir";
$route['kelahiran/ceknik'] = "kelahiran/c_kelahiran/cekNik";
$route['kelahiran/cekk'] = "kelahiran/c_kelahiran/cekKK";
$route['kelahiran/submit'] = "kelahiran/c_kelahiran/submitData";
$route['kelahiran/ceknoreg/(:any)'] = 'kelahiran/c_kelahiran/ceknoreg/$1';
$route['upload'] = 'kelahiran/c_kelahiran/testUpload';
$route['kelahiran/uploadsingle'] = 'kelahiran/c_kelahiran/uploadSingleImage';
$route['kelahiran/ceknoreg'] = 'kelahiran/c_kelahiran/ceknoreg';

//routing untuk register dan login
$route['login'] = "login/c_login/redirectvlogin";
$route['cek_login'] = "login/c_login/cekUserLogin";
$route['logout'] = "login/c_login/logut";
//$route['register'] = "login/v_login";
//
//routing untuk KTP
$route['ktp'] = "ktp/c_ktp/redirectvmenuktp";
$route['ktp/registrasi'] = "ktp/c_ktp/view_reg_ktp";
$route['ktp/upload'] = "ktp/c_ktp/view_upload_ktp";
$route['ktp/monitor'] = "ktp/c_ktp/view_monitor_ktp";
$route['ktp/submit'] = "ktp/c_ktp/submitData";
$route['ktp/ceknoreg'] = "ktp/c_ktp/cekNoReg";

//routing untuk KK
$route['kk'] = "kk/c_kk/redirectvmenukk";
$route['kk/registrasi'] = "kk/c_kk/view_reg_kk";
$route['kk/upload'] = "kk/c_kk/view_upload_kk";
$route['kk/monitor'] = "kk/c_kk/view_monitor_kk";
$route['kk/submit'] = "kk/c_kk/submiData";
$route['kk/ceknikkk'] = "kk/c_kk/cekDuplikatNikAnggotaKK";
$route['kk/ceknoreg'] = "kk/c_kk/cekNoReg";

//routing untuk cek nik dan kk
$route['ceknik'] = "services/C_services/cekNik";
$route['cekk'] = "services/C_services/cekKK";
$route['ceknikktp'] = "services/C_services/cekNikKtp";
$route['ceknikforkk'] = "services/C_services/cekNikForKK";
//route untuk cek kab kelurahan
$route['gekelurahan'] = "services/C_services/getDataKelurahan";
$route['getkecamatan'] = "services/C_services/getDataKecamatan";
$route['getkabupaten'] = "services/C_services/getDataKabupaten";
$route['getpropinsi'] = "services/C_services/getDataPropinsi";


//kematian
$route['kematian'] = "kematian/C_kematian/redirectVMenuKematian";
$route['kematian/registrasi'] = "kematian/C_kematian/view_reg_mati";
$route['kematian/upload'] = "kematian/C_kematian/view_upload_mati";
$route['kematian/monitor'] = "kematian/C_kematian/view_monitor_mati";
$route['kematian/submit'] = "kematian/C_kematian/submitData";
$route['kematian/ceknoreg'] = "kematian/C_kematian/cekNoReg";


//cek kadaluarsa nomer kitap
$route['cekkitap'] = "services/C_services/cekKitap";



//pop up window
$route['ktp/print'] = "services/C_services/popUp";
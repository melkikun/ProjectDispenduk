<!--<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>-->
<!DOCTYPE html>
<html>
    <head>
        <!-- META -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

        <!-- SEO -->
        <meta name="description" content="">    
        <meta name="keywords" content="">
        <meta content="<?php echo $this->security->get_csrf_hash(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" />

        <!-- STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/main.min.css">

        <link href="<?php echo base_url(); ?>resources/css/font-awesome/font.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap/bootstrap.min.css">
        <link href="<?php echo base_url(); ?>resources/css/bootstrap-select/select.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/bootstrap/dtp.min.css">


        <link href="<?php echo base_url(); ?>resources/css/jquery-ui/core.min.css" rel="stylesheet" type="text/css">

        <!-- Autocomplete -->
        <link href="<?php echo base_url(); ?>resources/css/jquery-ui/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>resources/css/jquery-ui/autocomplete.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>resources/css/form/fp.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>resources/css/form/color/olive.min.css" rel="stylesheet" type="text/css">

        <!--animation-->
        <link href="<?php echo base_url() ?>resources/css/animation.css" rel="stylesheet" type="text/css">


        <!-- SCRIPTS JQuery-->
        <script src="<?php echo base_url(); ?>resources/js/jquery/v1/jquery.min.js"></script>
        <!-- BOOTSTRAP -->
        <script src="<?php echo base_url(); ?>resources/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>       
        <script src="<?php echo base_url(); ?>resources/js/bootstrap-select/select.min.js" type="text/javascript"></script>
        <!-- SCRIPTS bikinan SENDIRI-->
        <script src="<?php echo base_url(); ?>resources/js/main.js"></script>

        <title>Registrasi KartuKeluarga</title>


    </head>

    <body>
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo $branding; ?>
        <div id="contentArea" class="container-fluid">
            <div class="loading">Loading&#8230;</div>
            <form id="fRegMati" action="#" method="post" class="spaced-p-form p-form-spaced-olive form-inline" 
                  novalidate="novalidate"	data-js-validate="true" data-js-highlight-state-msg="true" 
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align:center; ">
                        Pembuatan Akta Kematian&nbsp;&nbsp;<i
                            class="fa fa-pencil-square-o"></i>
                    </div>
                    <!-- End: title -->

                    <div class="p-form-steps-wrap p-steps-icons">
                        <ul class="p-form-steps" data-js-stepper="registrationSteps">
                            <li class="active" data-js-step="jenisPendudukBlock" style="display:none">
                                <span class="p-step">
                                    <span class="p-step-text">1</span>
                                </span>
                            </li>
                            <li data-js-step="informasiBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">2</span>
                                </span>
                            </li>
                            <li data-js-step="pelaporBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">3</span>
                                </span>
                            </li>
                            <li data-js-step="jenazahBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">4</span>
                                </span>
                            </li>
                            <li data-js-step="ortuBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">5</span>
                                </span>
                            </li>
                            <li data-js-step="saksiBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">6</span>
                                </span>
                            </li>
                            <!-- <li data-js-step="districtBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">7</span>
                                </span>
                            </li> -->
                            <li data-js-step="selesaiBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">7</span>
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div data-js-block="jenisPendudukBlock" data-js-validation-block="" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Jenis Penduduk</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin:auto;">
                            <div class="form-group">
                                <label for="jenisPenduduk" class="control-label" style="font-size: 18px; padding-bottom: 5px;">Kewarganegaraan Almarhum</label>

                                <div class="p-form-cg pt-form-inline">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPenduduk" value="1" required="required" 
                                                   class="form-control" onclick="jenisPendudukOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label" style="font-size:14px;">Warga Negara Indonesia</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPenduduk" value="2" required="required" 
                                                   class="form-control" onclick="jenisPendudukOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label" style="font-size:14px;">Warga Negara Asing</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-button text-right row">
                            <a href="#" class="btn" data-js-show-step="registrationSteps:2">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="informasiBlock" data-js-validation-block="" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Informasi Pembuatan KTP Baru</span>
                        </div>
                        <!-- End: subtitle -->

                        <div id="panelInformasiWni" class="panel-informasi" style="display:none">

                            <b>Alur pendaftaran kematian (secara online) bagi WNI, adalah sebagai berikut :</b>
                            <br/>
                            <ol> 
                                <li>Melakukan Registrasi / Pendaftaran, dengan cara mengikuti alur yang ada di halaman ini hingga selesai</li>
                                <li>Upload dokumen pendukung yang diperlukan
                                    <ol style="list-style-type: circle;">
                                        <li>Surat Keterangan kematian dari RS / Desa / Kelurahan</li>
                                        <li>Kartu Keluarga</li>
                                        <li>KTP</li>
                                        <li>Akta Kelahiran</li>
                                        <li>Akta Nikah (untuk yang sudah nikah)</li>
                                        <li>KTP 2 Saksi</li>
                                    </ol>
                                </li>
                                <li>Datang ke Kelurahan masing-masing untuk proses pengabSAHan</li>
                            </ol>
                            <br/>
                        </div>

                        <div id="panelInformasiAsing" class="panel-informasi" style="display:none">

                            <b>Alur pendaftaran kematian (secara online) bagi OrangAsing, adalah sebagai berikut :</b>
                            <br/>
                            <ol> 
                                <li>Melakukan Registrasi / Pendaftaran, dengan cara mengikuti alur yang ada di halaman ini hingga selesai</li>
                                <li>Upload dokumen pendukung yang diperlukan
                                    <ol style="list-style-type: circle;">
                                        <li>Surat kematian (Visum) dari RS / Paramedis</li>
                                        <li>Akta Kelahiran (jika ada)</li>
                                        <li>Akta Nikah (untuk yang sudah nikah)</li>
                                        <li>KTP 2 Saksi</li>
                                        <li>Dokumen Keimigrasian</li>
                                        <li>Keterangan Izin Tinggal Terbatas (jika ada)</li>
                                        <li>Keterangan Izin Tinggal Tetap (jika ada)</li>
                                    </ol>
                                </li>
                                <li>Datang ke Kelurahan masing-masing untuk proses pengabSAHan</li>
                            </ol>
                            <br/>
                        </div>


                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a class="btn" data-js-show-step="registrationSteps:3">
                                Lanjut </a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="pelaporBlock"  class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Data Pelapor</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="row">
                            <div class="col-md-5 form-group">
                                <h4 style="float: left;">NIK</h4>
                                <div class="input-group p-has-icon" style="float: right">
                                    <input id="nikPel" name="nikPelapor" required="required" type="text"
                                           placeholder="namor nik,," class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                    <span class="input-group-btn" style="width:60px">
                                        <button type="button" class="btn" onclick="CekNik('pelapor')">Cek-NIK</button>
                                    </span>
                                </div>
                            </div>

                        </div>

                        <div class="row">	
                            <div class="form-group col-md-6">
                                <label for="namPel" class="control-label p-label-required">
                                    Nama</label>
                                <div class="input-group p-has-icon">
                                    <input id="namPel" name="namaPelapor" required="required" type="text"
                                           placeholder="name" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>		

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="alPel" class="control-label p-label-required">Alamat</label>
                                <div class="input-group p-has-icon">
                                    <input id="alPel" name="alamatPelapor" required="required"
                                           type="text" placeholder="alamat" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rtP" class="control-label p-label-required">RT</label>
                                <div class="input-group p-has-icon">
                                    <input id="rtP" name="rtPelapor" data-js-input-type="number"
                                           required type="number" placeholder="RT" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rwP" class="control-label p-label-required">RW</label>
                                <div class="input-group p-has-icon">
                                    <input id="rwP" name="rwPelapor" data-js-input-type="number"
                                           required type="number" placeholder="RW" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="prPel">Propinsi</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="prPel" class="selectpicker form-control" 
                                                name="propinsiPelapor"	required 
                                                title="pilih salah satu">
                                            <option value="35" selected="">Jawa Timur</option>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kabPel">
                                        Kabupaten/Kota</label> 
                                    <label class="input-group p-custom-arrow">
                                        <select id="kabPel" class="selectpicker form-control"
                                                name="kabupatenPelapor" required 
                                                title="pilih salah satu">
                                            <option value="25" selected="">Gresik</option>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">  
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kecPel">Kecamatan</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kecPel" class="selectpicker form-control"
                                                name="kecamatanPelapor" required 
                                                data-live-search="true" title="pilih salah satu"  onchange="ChangeKecamatan('pelapor');">
                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kecamatan as $value) {
                                                if ($value->NO_KEC == 1) {
                                                    echo "<option value='$value->NO_KEC' selected=''>$value->NAMA_KEC</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                }
//                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="pkjAy">Kelurahan</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kelPel" class="selectpicker form-control" 
                                                name="kelurahanPelapor"	required
                                                data-live-search="true"	title="pilih salah satu">
                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kelurahan as $value) {
//                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                if ($value->NO_KEL == 2019) {
                                                    echo "<option value='$value->NO_KEL' selected=''>$value->NAMA_KEL</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="control-label p-label-required">TanggalLahir</label>
                                <div class="input-group p-has-icon">
                                    <input id="tglLP" class="form-control" name="tglLahirPelapor"
                                           placeholder="tgl.btn.tahun" data-js-datetimepick="true"
                                           data-date-format="DD.MMM.YYYY" type="text" required /> <span
                                           class="input-group-state"> <span class="p-position">
                                            <span class="p-text"> <span class="p-valid-text">
                                                    <i class="fa fa-check"></i>
                                                </span> <span class="p-error-text"> <i class="fa fa-times"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </span> <span class="p-field-cb"></span> <span class="input-group-icon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label p-label-required">Umur</label>
                                <div class="input-group">
                                    <input name="umurPelapor" data-js-input-type="number" id="uPel"
                                           required type="text" placeholder="umur" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-addon"> 
                                        <span class="p-addon-bg">Tahun</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="tPel" class="control-label p-label-required">Telepon</label>
                                <div class="input-group p-has-icon">
                                    <input id="tPel" name="teleponPelapor" required="required"
                                           type="text" placeholder="nomor" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="pkPel">Pekerjaan</label>
                                    <label class="input-group p-custom-arrow"> <select
                                            id="pkPel" class="selectpicker form-control"
                                            name="pekerjaanPelapor" data-show-subtext="true" required
                                            data-live-search="true" titile="pilih salah satu">
                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($pekerjaan as $value) {
                                                echo "<option value='$value->NO'>$value->DESCRIP</option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="p-field-cb"></div> <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <button id="btn-skip-step4" class="btn" disabled="">Lanjut</button>
                            <a href="#" class="btn hide" data-js-show-step-force="registrationSteps:4">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="jenazahBlock"  class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Data Jenazah</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <h4 style="float: left;">NIK</h4>
                                <div class="input-group p-has-icon" style="float: right">
                                    <input id="nikPel" name="nikJenazah" required="required" type="text"
                                           placeholder="namor nik,," class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                    <span class="input-group-btn" style="width:60px">
                                        <button type="button" class="btn" onclick="CekNik('jenazah')">Cek-NIK</button>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6  form-group hide">
                                <h4 style="float: left;">Nomor Kartu Keluarga</h4>
                                <div class="input-group p-has-icon" style="float: right">
                                    <input id="kkJenazah" name="kkJenazah" required="required" type="text"
                                           placeholder="namor kk,," class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                    <span class="input-group-btn" style="width:60px">
                                        <button type="button" class="btn" onclick="CekKK()">Cek-KK</button>
                                    </span>
                                </div>
                            </div>
                            <!-- 						<div class="col-md-1 form-group"> -->
                            <!-- 							<button class="btn" style="margin-top: 40px;" type="button">Cek</button> -->
                            <!-- 						</div> -->
                        </div>

                        <div class="row">	
                            <div class="form-group col-md-6">
                                <label for="namPel" class="control-label p-label-required">
                                    Nama</label>
                                <div class="input-group p-has-icon">
                                    <input id="namPel" name="namaJenazah" required="required" type="text"
                                           placeholder="name" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>		
                        </div>

                        <div class="row">
                            <div class="col-md-8">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label for="aljz" class="control-label p-label-required">Alamat Tinggal Semasa Hidup</label>
                                    <div class="input-group p-has-icon">
                                        <input id="aljz" name="alamatJenazah" required="required"
                                               type="text" placeholder="alamat" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rtJ" class="control-label p-label-required">RT</label>
                                <div class="input-group p-has-icon">
                                    <input id="rtJ" name="rtJenazah" data-js-input-type="number"
                                           required type="number" placeholder="RT" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rwJ" class="control-label p-label-required">RW</label>
                                <div class="input-group p-has-icon">
                                    <input id="rwJ" name="rwJenazah" data-js-input-type="number"
                                           required type="number" placeholder="RW" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="prJ">Propinsi</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="prJ" class="selectpicker form-control" 
                                                name="propinsiJenazah"	required 
                                                data-live-search="true"	title="pilih salah satu" onchange="ChangePropinsi('jenazah');">

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($propinsi as $value) {
                                                if ($value->NO_PROP == 35) {
                                                    echo "<option value='$value->NO_PROP' selected=''>$value->NAMA_PROP</option>";
                                                } else {
                                                    echo "<option value='$value->NO_PROP'>$value->NAMA_PROP</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kabJ">Kabupaten</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kabJ" class="selectpicker form-control" 
                                                name="kabupatenJenazah"	required 
                                                data-live-search="true"	title="pilih salah satu" onchange="ChangeKabupaten('jenazah');">

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kabupaten as $value) {
                                                if ($value->NO_KAB == 25) {
                                                    echo "<option value='$value->NO_KAB' selected=''>$value->NAMA_KAB</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KAB'>$value->NAMA_KAB</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kecJ">Kecamatan</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kecJ" class="selectpicker form-control" 
                                                name="kecamatanJenazah"	required 
                                                data-live-search="true"	title="pilih salah satu" onchange="ChangeKecamatan('jenazah');">
                                            <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kecamatan as $value) {
                                                if ($value->NO_KEC == 1) {
                                                    echo "<option value='$value->NO_KEC' selected=''>$value->NAMA_KEC</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                }
//                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                            }
                                            ?>

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kJz">Kelurahan / Desa</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kJz" class="selectpicker form-control" 
                                                name="kelurahanJenazah"	required 
                                                data-live-search="true"	title="pilih salah satu">

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kelurahan as $value) {
//                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                if ($value->NO_KEL == 2019) {
                                                    echo "<option value='$value->NO_KEL' selected=''>$value->NAMA_KEL</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="p-label-required">JenisKelamin</label>
                                <div class="p-form-cg pt-form-inline">
                                    <div class="radio">
                                        <label> <input type="radio" name="kelaminJenazah"
                                                       value=1 required class="form-control"> <span
                                                       class="p-check-icon"> <span class="p-check-block"></span>
                                            </span> <span class="p-label">Laki-Laki</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label> <input type="radio" name="kelaminJenazah"
                                                       value=2 required class="form-control"> <span
                                                       class="p-check-icon"> <span class="p-check-block"></span>
                                            </span> <span class="p-label">Perempuan</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2 " style="width: 120px">
                                <label class="control-label p-label-required">Anak Ke-</label>
                                <div class="input-group">
                                    <input data-js-input-type="number" required="" name="kelahiranKe" class="form-control" type="number">
                                    <div class="p-field-cb"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 col-md-offset-1" >
                                <label class="control-label p-label-required">TanggalLahir</label>
                                <div class="input-group p-has-icon">
                                    <input id="tglAy" class="form-control" name="tglLahirJenazah"
                                           placeholder="tgl.bln.tahun" data-js-datetimepick="true"
                                           data-date-format="DD.MMM.YYYY" type="text" required /> <span
                                           class="input-group-state"> <span class="p-position">
                                            <span class="p-text"> <span class="p-valid-text">
                                                    <i class="fa fa-check"></i>
                                                </span> <span class="p-error-text"> <i class="fa fa-times"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </span> <span class="p-field-cb"></span> <span class="input-group-icon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2" >
                                <label for="umAy" class="control-label p-label-required">Umur</label>
                                <div class="input-group">
                                    <input id="umurAy" name="umurJenazah" data-js-input-type="number"
                                           required type="text" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-addon"> <span class="p-addon-bg">Tahun</span>
                                    </span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="prPel">Propinsi Kelahiran</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="prPel" class="selectpicker form-control" 
                                                name="propinsiKelahiranJenazah"	required 
                                                data-live-search="true"	title="pilih salah satu" onchange="ChangePropinsi('propinsi_kelahiran')">

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($propinsi as $value) {
                                                if ($value->NO_PROP == 35) {
                                                    echo "<option value='$value->NO_PROP' selected=''>$value->NAMA_PROP</option>";
                                                } else {
                                                    echo "<option value='$value->NO_PROP'>$value->NAMA_PROP</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="prPel">Kabupaten Kelahiran</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="prPel" class="selectpicker form-control" 
                                                name="kabupatenKelahiranJenazah" required 
                                                data-live-search="true"	title="pilih salah satu">

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kabupaten as $value) {
                                                if ($value->NO_KAB == 25) {
                                                    echo "<option value='$value->NO_KAB' selected=''>$value->NAMA_KAB</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KAB'>$value->NAMA_KAB</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="agm">Agama</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="agm" class="selectpicker form-control" 
                                                name="agamaJenazah"	required title="pilih salah satu">

                                            <option value="1">ISLAM</option>
                                            <option value="2">KRISTEN</option>
                                            <option value="3">KATHOLIK</option>
                                            <option value="4">HINDU</option>
                                            <option value="5">BUDHA</option>
                                            <option value="6">KONGHUCHU</option>
                                            <option value="7">ALIRAN KEPERCAYAAN</option>

                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="pkjz">Pekerjaan</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="pkjz" class="selectpicker form-control" 
                                                name="pekerjaanJenazah"	required 
                                                data-live-search="true"	title="pilih salah satu">

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                            <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($pekerjaan as $value) {
                                                echo "<option value='$value->NO'>$value->DESCRIP</option>";
                                            }
                                            ?>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="control-label p-label-required">Tanggal Kematian</label>
                                <div class="input-group p-has-icon">
                                    <input id="tglM" class="form-control" name="tglKematian"
                                           placeholder="tgl.bln.tahun" data-js-datetimepick="true"
                                           data-date-format="DD.MMM.YYYY" type="text" required /> <span
                                           class="input-group-state"> <span class="p-position">
                                            <span class="p-text"> <span class="p-valid-text">
                                                    <i class="fa fa-check"></i>
                                                </span> <span class="p-error-text"> <i class="fa fa-times"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </span> <span class="p-field-cb"></span> <span class="input-group-icon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label p-label-required">Pukul :</label>
                                <div class="input-group p-has-icon">
                                    <input data-date-format="HH:mm" data-js-datetimepick="true" required
                                           name="waktuKematian" class="form-control" type="text" placeholder="hh:mm">
                                    <span class="input-group-state">
                                        <span class="p-position">
                                            <span class="p-text">
                                                <span class="p-valid-text">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                <span class="p-error-text">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="p-field-cb"></span>
                                    <span class="input-group-icon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tkm" class="control-label p-label-required">Tempat Kematian</label>
                                <div class="input-group p-has-icon">
                                    <input id="tkm" name="tempatKematian" required="required"
                                           type="text" placeholder="alamat, kota/kabupaten" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="sbk">Penyebab Kematian</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="sbk" class="selectpicker form-control" 
                                                name="sebabKematian" required title="pilih salah satu">

                                            <option value="1">Sakit Biasa / Tua</option>
                                            <option value="2">Wabah Penyakit</option>
                                            <option value="3">Kecelakaan</option>
                                            <option value="4">Kriminalitas</option>
                                            <option value="5">Bunuh Diri</option>
                                            <option value="6">Lainnya</option>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">	
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="ymK">Yang Menerangkan</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="ymK" class="selectpicker form-control" 
                                                name="menerangkanKematian"	required title="pilih salah satu">

                                            <option value="1">Dokter</option>
                                            <option value="2">Tenaga Kesehatan</option>
                                            <option value="3">Kepolisian</option>
                                            <option value="4">Lainnya</option>
                                        </select>

                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a href="#" class="btn" data-js-show-step-force="registrationSteps:5">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="ortuBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Data Ayah dan Ibu</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default">
                            <h3>Data Ayah</h3>
                            <div class="row"> 
                                <div class="col-md-5 form-group">
                                    <h4 style="float: left;">NIK</h4>
                                    <div class="input-group p-has-icon" style="float: right">
                                        <input id="nikAy" name="nikAy" required="required" type="text"
                                               placeholder="namor nik,," class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                        <span class="input-group-btn" style="width: 60px">
                                            <button type="button" class="btn" onclick="CekNik('ayah');">Cek-NIK</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group col-md-6">
                                    <label for="namaAy" class="control-label p-label-required">
                                        NamaLengkap</label>
                                    <div class="input-group p-has-icon">
                                        <input id="namaAy" name="namaAy" required="required"
                                               type="text" placeholder="name" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>	
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="alAy" class="control-label p-label-required">Alamat</label>
                                    <div class="input-group p-has-icon">
                                        <input id="alAy" name="alamatAy" required="required"
                                               type="text" placeholder="alamat" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rtAy" class="control-label p-label-required">RT</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rtAy" name="rtAy" data-js-input-type="number"
                                               required type="number" placeholder="RT" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rwAy" class="control-label p-label-required">RW</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rwAy" name="rwAy" data-js-input-type="number"
                                               required type="number" placeholder="RW" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" >Propinsi</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="propAy" class="selectpicker form-control"
                                                    name="propinsiAy" required 
                                                    data-live-search="true" title="pilih salah satu" onchange="ChangePropinsi('ayah');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($propinsi as $value) {
                                                    if ($value->NO_PROP == 35) {
                                                        echo "<option value='$value->NO_PROP' selected=''>$value->NAMA_PROP</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_PROP'>$value->NAMA_PROP</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required">
                                            Kabupaten/Kota</label> 
                                        <label class="input-group p-custom-arrow">
                                            <select id="kabAy" class="selectpicker form-control"
                                                    name="kabupatenAy" required 
                                                    data-live-search="true" title="pilih salah satu" onchange="ChangeKabupaten('ayah');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kabupaten as $value) {
                                                    if ($value->NO_KAB == 25) {
                                                        echo "<option value='$value->NO_KAB' selected=''>$value->NAMA_KAB</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KAB'>$value->NAMA_KAB</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>	
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required">Kecamatan</label>
                                        <label class="input-group p-custom-arrow"> <select
                                                id="kecAy" class="selectpicker form-control"
                                                name="kecamatanAy" required
                                                data-live-search="true" title="pilih salah satu" onchange="ChangeKecamatan('ayah');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kecamatan as $value) {
                                                    if ($value->NO_KEC == 1) {
                                                        echo "<option value='$value->NO_KEC' selected=''>$value->NAMA_KEC</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                    }
//                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>	
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required">Kelurahan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kelAy" class="selectpicker form-control"
                                                    name="kelurahanAy" required
                                                    data-live-search="true" title="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kelurahan as $value) {
//                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    if ($value->NO_KEL == 2019) {
                                                        echo "<option value='$value->NO_KEL' selected=''>$value->NAMA_KEL</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="control-label p-label-required">TanggalLahir</label>
                                    <div class="input-group p-has-icon">
                                        <input id="tglAy" class="form-control" name="tglLahirAy"
                                               placeholder="tgl.btn.tahun" data-js-datetimepick="true"
                                               data-date-format="DD.MMM.YYYY" type="text" required /> <span
                                               class="input-group-state"> <span class="p-position">
                                                <span class="p-text"> <span class="p-valid-text">
                                                        <i class="fa fa-check"></i>
                                                    </span> <span class="p-error-text"> <i class="fa fa-times"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span> <span class="p-field-cb"></span> <span
                                            class="input-group-icon"> <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="umAy" class="control-label p-label-required">Umur</label>
                                    <div class="input-group">
                                        <input id="umurAy" name="umurAy" data-js-input-type="number"
                                               required type="text" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-addon"> <span
                                                class="p-addon-bg">Tahun</span>
                                        </span>
                                    </div>
                                </div>	
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" >Pekerjaan</label>
                                        <label class="input-group p-custom-arrow"> <select
                                                id="pkjAy" class="selectpicker form-control"
                                                name="pekerjaanAy"  data-show-subtext="true" required
                                                data-live-search="true" titile="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($pekerjaan as $value) {
                                                    echo "<option value='$value->NO'>$value->DESCRIP</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label p-label-required"
                                               >Kewarganegaraan</label>
                                        <div class="p-form-cg pt-form-inline">
                                            <div class="radio" required>
                                                <label> 
                                                    <input type="radio" name="kewarganegaraanAy"
                                                           value=1 required class="form-control"> 
                                                    <span class="p-check-icon">
                                                        <span class="p-check-block"></span>
                                                    </span> 
                                                    <span class="p-label">Indonesia</span>
                                                </label>
                                            </div>
                                            <div class="radio" required>
                                                <label> <input type="radio"  name="kewarganegaraanAy" 
                                                               value=2 required  class="form-control"> 
                                                    <span class="p-check-icon">
                                                        <span class="p-check-block"></span>
                                                    </span> 
                                                    <span class="p-label">Non-Indonesia</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>  
                            </div>
                        </div>

                        <br/>
                        <div class="panel panel-default">
                            <h3>Data Ibu</h3>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <h4 style="float: left;">NIK</h4>
                                    <div class="input-group p-has-icon" style="float: right">
                                        <input id="nikIb" name="nikIb" type="text"
                                               placeholder="namor,," class="form-control" required>
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                        <span class="input-group-btn" style="width: 60px">
                                            <button type="button" class="btn" onclick="CekNik('ibu');">Cek-NIK</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="kepalaKeluarga"
                                           class="control-label p-label-required">Nama Lengkap</label>
                                    <div class="input-group p-has-icon">
                                        <input id="namaIb" name="namaIb" required type="text"
                                               placeholder="name" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>	
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="alIb" class="control-label p-label-required">Alamat</label>
                                    <div class="input-group p-has-icon">
                                        <input id="alIb" name="alamatIb" required="required"
                                               type="text" placeholder="alamat" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rtIb" class="control-label p-label-required">RT</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rtIb" name="rtIb" data-js-input-type="number"
                                               required type="number" placeholder="RT" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rwP" class="control-label p-label-required">RW</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rwP" name="rwIb" data-js-input-type="number"
                                               required type="number" placeholder="RW" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="propIb">Propinsi</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="propIb" class="selectpicker form-control" 
                                                    title="pilih salah satu"
                                                    name="propinsiIb" required data-show-subtext="true" 
                                                    data-live-search="true" titile="pilih salah satu" onchange="ChangePropinsi('ibu');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($propinsi as $value) {
                                                    if ($value->NO_PROP == 35) {
                                                        echo "<option value='$value->NO_PROP' selected=''>$value->NAMA_PROP</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_PROP'>$value->NAMA_PROP</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kabIb">Kabupaten / Kota</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kabIb" class="selectpicker form-control" title="pilih salah satu"
                                                    name="kabupatenIb" required data-show-subtext="true"
                                                    data-live-search="true" titile="pilih salah satu" onchange="ChangeKabupaten('ibu');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kabupaten as $value) {
                                                    if ($value->NO_KAB == 25) {
                                                        echo "<option value='$value->NO_KAB' selected=''>$value->NAMA_KAB</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KAB'>$value->NAMA_KAB</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kecIb">Kecamatan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kecIb" class="selectpicker form-control" title="pilih salah satu"
                                                    name="kecamatanIb" required data-show-subtext="true"
                                                    data-live-search="true" titile="pilih salah satu" onchange="ChangeKecamatan('ibu');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kecamatan as $value) {
                                                    if ($value->NO_KEC == 1) {
                                                        echo "<option value='$value->NO_KEC' selected=''>$value->NAMA_KEC</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                    }
//                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kelIb">Kelurahan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kelIb" class="selectpicker form-control" title="pilih salah satu"
                                                    name="kelurahanIb" required data-show-subtext="true"
                                                    data-live-search="true" titile="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kelurahan as $value) {
//                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    if ($value->NO_KEL == 2019) {
                                                        echo "<option value='$value->NO_KEL' selected=''>$value->NAMA_KEL</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="control-label p-label-required">TanggalLahir</label>
                                    <div class="input-group p-has-icon">
                                        <input id="tglIb" class="form-control" name="tglLahirIb"
                                               placeholder="tgl.bln.thn" data-js-datetimepick="true"
                                               data-date-format="DD.MMM.YYYY" type="text" required /> <span
                                               class="input-group-state"> <span class="p-position">
                                                <span class="p-text"> <span class="p-valid-text">
                                                        <i class="fa fa-check"></i>
                                                    </span> <span class="p-error-text"> <i class="fa fa-times"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span> <span class="p-field-cb"></span> <span
                                            class="input-group-icon"> <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="control-label p-label-required">Umur</label>
                                    <div class="input-group">
                                        <input id="umurIb" name="umurIb" data-js-input-type="number"
                                               required type="text" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-addon"> <span
                                                class="p-addon-bg">Tahun</span>
                                        </span>
                                    </div>
                                </div>		
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required">Pekerjaan</label>
                                        <label class="input-group p-custom-arrow"> <select
                                                id="pkjIb" class="selectpicker form-control"
                                                name="pekerjaanIb"  data-show-subtext="true" required
                                                data-live-search="true" titile="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($pekerjaan as $value) {
                                                    echo "<option value='$value->NO'>$value->DESCRIP</option>";
                                                }
                                                ?>

                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label p-label-required">Kewarganegaraan</label>
                                        <div class="p-form-cg pt-form-inline">
                                            <div class="radio" required>
                                                <label> <input type="radio" name="kewarganegaraanIb" 
                                                               class="form-control" value=1 required> 
                                                    <span class="p-check-icon">
                                                        <span class="p-check-block"></span>
                                                    </span> 
                                                    <span class="p-label">Indonesia</span>
                                                </label>
                                            </div>
                                            <div class="radio" required>
                                                <label> <input type="radio" name="kewarganegaraanIb"
                                                               value=2 required  class="form-control"> 
                                                    <span class="p-check-icon">
                                                        <span class="p-check-block"></span>
                                                    </span> 
                                                    <span class="p-label">Non-Indonesia</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a href="#" class="btn" data-js-show-step-force="registrationSteps:6">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="saksiBlock" class="collapse"  data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Data Saksi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default">
                            <h3>Data Saksi 1</h3>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <h4 style="float: left;">NIK</h4>
                                    <div class="input-group p-has-icon" style="float: right">
                                        <input id="nikSak1" name="nikSaksi1" required="required" type="text"
                                               placeholder="namor nik,," class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span> 
                                        <span class="input-group-btn" style="width: 60px">
                                            <button type="button" class="btn" onclick="CekNik('saksi1');">Cek-NIK</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="namaSak1" class="control-label p-label-required">
                                        Nama Lengkap</label>
                                    <div class="input-group p-has-icon">
                                        <input id="namaSak1" name="namaSaksi1" required="required"
                                               type="text" placeholder="name" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="uS2" class="control-label p-label-required">Umur</label>
                                    <div class="input-group p-has-icon">
                                        <input id="uS2" name="umurSaksi1" data-js-input-type="number"
                                               required type="number" placeholder="umur" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="pkSak2">Pekerjaan</label>
                                        <label class="input-group p-custom-arrow"> <select
                                                id="pkSak2" class="selectpicker form-control"
                                                name="pekerjaanSaksi1" data-show-subtext="true" required
                                                data-live-search="true" titile="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($pekerjaan as $value) {
                                                    echo "<option value='$value->NO'>$value->DESCRIP</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="alS1" class="control-label p-label-required">Alamat</label>
                                    <div class="input-group p-has-icon">
                                        <input id="alS1" name="alamatSaksi1" required="required"
                                               type="text" placeholder="alamat" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rtS1" class="control-label p-label-required">RT</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rtS1" name="rtSaksi1" data-js-input-type="number"
                                               required type="number" placeholder="RT" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rwS1" class="control-label p-label-required">RW</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rwS1" name="rwSaksi1" data-js-input-type="number"
                                               required type="number" placeholder="RW" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="prop1">Propinsi</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select
                                                id="prop1" class="selectpicker form-control"
                                                name="propinsiSaksi1" required data-show-subtext="true"
                                                data-live-search="true" title="pilih salah satu" onchange="ChangePropinsi('saksi1');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($propinsi as $value) {
                                                    if ($value->NO_PROP == 35) {
                                                        echo "<option value='$value->NO_PROP' selected=''>$value->NAMA_PROP</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_PROP'>$value->NAMA_PROP</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kab1">
                                            Kabupaten/Kota</label> 
                                        <label class="input-group p-custom-arrow">
                                            <select id="kab1" class="selectpicker form-control"
                                                    name="kabupatenSaksi1" required data-show-subtext="true"
                                                    data-live-search="true" title="pilih salah satu" onchange="Changekabupaten('saksi1');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kabupaten as $value) {
                                                    if ($value->NO_KAB == 25) {
                                                        echo "<option value='$value->NO_KAB' selected=''>$value->NAMA_KAB</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KAB'>$value->NAMA_KAB</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kec1">Kecamatan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kec1" class="selectpicker form-control"
                                                    name="kecamatanSaksi1" required 
                                                    data-live-search="true" title="pilih salah satu" onchange="ChangeKecamatan('saksi1');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kecamatan as $value) {
                                                    if ($value->NO_KEC == 1) {
                                                        echo "<option value='$value->NO_KEC' selected=''>$value->NAMA_KEC</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                    }
//                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kel1">Kelurahan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kel1" class="selectpicker form-control"
                                                    name="kelurahanSaksi1" required 
                                                    data-live-search="true" title="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kelurahan as $value) {
//                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    if ($value->NO_KEL == 2019) {
                                                        echo "<option value='$value->NO_KEL' selected=''>$value->NAMA_KEL</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <h3>Data Saksi 2</h3>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <h4 style="float: left;">NIK</h4>
                                    <div class="input-group p-has-icon" style="float: right">
                                        <input id="nikSak2" name="nikSaksi2" required="required"
                                               type="text" placeholder="namor nik,," class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span> <span class="input-group-btn" style="width: 60px">
                                            <button type="button" class="btn" onclick="CekNik('saksi2');">Cek-NIK</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="namaSak2" class="control-label p-label-required">
                                        NamaLengkap</label>
                                    <div class="input-group p-has-icon">
                                        <input id="namaSak2" name="namaSaksi2" required="required"
                                               type="text" placeholder="name" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group col-md-2">
                                    <label for="uS2" class="control-label p-label-required">Umur</label>
                                    <div class="input-group p-has-icon">
                                        <input id="uS2" name="umurSaksi2" data-js-input-type="number"
                                               required type="number" placeholder="umur" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="pkSak2">Pekerjaan</label>
                                        <label class="input-group p-custom-arrow"> <select
                                                id="pkSak2" class="selectpicker form-control"
                                                name="pekerjaanSaksi2" data-show-subtext="true" required
                                                data-live-search="true" titile="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($pekerjaan as $value) {
                                                    echo "<option value='$value->NO'>$value->DESCRIP</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="alS2" class="control-label p-label-required">Alamat</label>
                                    <div class="input-group p-has-icon">
                                        <input id="alS2" name="alamatSaksi2" required="required"
                                               type="text" placeholder="alamat" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rtS2" class="control-label p-label-required">RT</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rtS2" name="rtSaksi2" data-js-input-type="number"
                                               required type="number" placeholder="RT" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rwS2" class="control-label p-label-required">RW</label>
                                    <div class="input-group p-has-icon">
                                        <input id="rwS2" name="rwSaksi2" data-js-input-type="number"
                                               required type="number" placeholder="RW" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="prop2">Propinsi</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select
                                                id="prop2" class="selectpicker form-control"
                                                name="propinsiSaksi2" required data-show-subtext="true"
                                                data-live-search="true" title="pilih salah satu" onchange="ChangePropinsi('saksi2');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($propinsi as $value) {
                                                    if ($value->NO_PROP == 35) {
                                                        echo "<option value='$value->NO_PROP' selected=''>$value->NAMA_PROP</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_PROP'>$value->NAMA_PROP</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>	
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kab2">
                                            Kabupaten/Kota</label> 
                                        <label class="input-group p-custom-arrow">
                                            <select id="kab2" class="selectpicker form-control"
                                                    name="kabupatenSaksi2" required data-show-subtext="true"
                                                    data-live-search="true" title="pilih salah satu" onchange="ChangeKabupaten('saksi2');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kabupaten as $value) {
                                                    if ($value->NO_KAB == 25) {
                                                        echo "<option value='$value->NO_KAB' selected=''>$value->NAMA_KAB</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KAB'>$value->NAMA_KAB</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kec2">Kecamatan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kec2" class="selectpicker form-control"
                                                    name="kecamatanSaksi2" required 
                                                    data-live-search="true" title="pilih salah satu" onchange="ChangeKecamatan('saksi2');">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kecamatan as $value) {
                                                    if ($value->NO_KEC == 1) {
                                                        echo "<option value='$value->NO_KEC' selected=''>$value->NAMA_KEC</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                    }
//                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="kel2">Kelurahan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kel2" class="selectpicker form-control"
                                                    name="kelurahanSaksi2" required 
                                                    data-live-search="true" title="pilih salah satu">
                                                <!--                                                <option value="1">Tolong di auto generate!!!</option>
                                                <option value="2">TErimakasih</option>-->
                                                <?php
                                                foreach ($kelurahan as $value) {
//                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    if ($value->NO_KEL == 2019) {
                                                        echo "<option value='$value->NO_KEL' selected=''>$value->NAMA_KEL</option>";
                                                    } else {
                                                        echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="p-field-cb"></div> 
                                            <span class="p-select-arrow">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="p-button text-right row">
                            <a href="#" class="btn" onclick="getData();">
                                Lanjut
                            </a> 
                            <a href="#" class="btn hide" data-js-show-step="registrationSteps:7">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>


                    <div data-js-block="selesaiBlock" data-js-validation-block="" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Selesai</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel-informasi" style="text-align: center;">
                            <p>"Terimakasih kami sampaikan 
                                <br/>atas Partisipasi warga dalam upaya penertiban administrasi kependudukan"<br/>	
                                "Pendaftaran kelahiran yang telah baru saja anda lakukan akan <b>segera</b>
                                <br/> kami proses setelah anda meng-Upload 
                                <br/>seluruh dokumen persyaratan yang dibutuhkan"
                                <br/>
                                <br/>
                                "Segera Upload dokumen persyaratan yang dibutuhkan 
                                <br/>agar pendaftaran yang telah anda lakukan bisa segera kami proses"</p>
                        </div>

                        <div class="panel-informasi" style="margin: auto; width: 450px">
                            <h4 style="color: red; float: left;">No. Registrasi anda adalah : </h4>
                            <input id="noReg" name="noReg" class="noReg" value="HLJFIDOU" size=9 
                                   style="height: 40px" >
                            <br/>	
                            <br/>	
                            <h4>Nomor Registrasi anda akan terus digunakan hingga Akta Kematian selesai di kerjakan.</h4>
                            <h4>Jadi simpan dengan baik nomer registrasi anda.</h4>
                        </div>


                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a href="#" class="btn" onClick="PrintNomorRegistrasi();"><i class="fa fa-print"></i>&nbsp;Print</a>
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-check fa-2x"></i>&nbsp;Selesai</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <input type="hidden" id="nik-jenazah">
        <input type="hidden" id="kk-jenazah">

        <script type="text/javascript">
            /**
             * List, nama attribute yang ada di halaman ini :
             * 		noReg,	
             *      jenisPenduduk, 			-- value = 1 (wni) | 2(orang asing)
             *		alasanPermohonan,
             *		jenisPernikahan,
             *		noKitap, tglAkhirKitap,   	--> Keterangan Izin Tinggal Tetap
             *
             *		nikKepala, namaKepala, alamatKepala, propinsiKepala, 
             *			kabupatenKepala, kecamatanKepala,  kelurahanKepala,
             *			kdPosKepala, rtKepala, rwKepala, tlpKepala, pekerjaanKepala.   --> data Kepala Keluarga
             *		
             *		nikAnggota, namaAnggota, kkAnggota   --> data Anggota Keluarga  
             * 		
             *		hubunganKeluarga(arrAnggota[ke-i])             --> data hubungan keluarga
             *
             *		propinsi, kabupaten, kecamatan, kelurahan		 --> data district area/ wil.Pemerintahan
             *
             **/

            var arrAnggota = new Array();

            $(document).ready(function () {

                //--- Activate Plugin SelectPicker ---//
                $('.selectpicker').selectpicker();

                document.forms['fRegMati'].reset();



// 			var myBtn = $('#btnAnggotaLanjut'),  stepper = $('[data-js-stepper="registrationSteps"]');
// 		   		 alert(stepper.data('fpStepper'));
// 			if( stepper.length && stepper.data('fpStepper') ){
// 		   		 // if you need to force move to specific step
// 		   		 // stepper.data('fpStepper').showStep( step, $myBtn, force );

// 		   		 // move to next step with validation
// 		   		 stepper.data('fpStepper').nextStepOnCheck( myBtn );
// 			}
            })

            var jnsPenduduk;

            function jenisPendudukOnClick(myRadio) {
                var piAsing = document.getElementById("panelInformasiAsing");
                var piWni = document.getElementById("panelInformasiWni");

                if (myRadio.value == 1) {
                    piAsing.style = "display:none";
                    piWni.style = "display:block";
                    jnsPenduduk = 1;
                } else if (myRadio.value == 2) {
                    piAsing.style = "display:block";
                    piWni.style = "display:none";
                    jnsPenduduk = 2;
                }
            }
            var baseUrl = "<?php echo base_url(); ?>";
        </script>

        <!-- jquery ui -->
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui/core.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui/widget.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui/mouse.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui/position.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui/menu.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui/autocomplete.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui/slider.js"></script>

        <script src="<?php echo base_url(); ?>resources/js/jquery-ui-touch-punch/touch-punch.min.js"></script>

        <!-- Validation plugin -->
        <script src="<?php echo base_url(); ?>resources/js/jquery-validation/validate.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/jquery-validation/add-methods.min.js"></script>

        <!-- Helpers -->
        <script src="<?php echo base_url(); ?>resources/js/moment/nt.min.js"></script>

        <!-- Field mask plugin -->
        <script src="<?php echo base_url(); ?>resources/js/jquery-masked-input/maskedinput.min.js"></script>
        <!-- Bootstrap datetimepicker -->
        <script src="<?php echo base_url(); ?>resources/js/bootstrap/dtp.min.js"></script>
        <!-- ajax: jQuery Form Plugin -->
        <script src="<?php echo base_url(); ?>resources/js/jquery-form-plugin/form.min.js"></script>


        <!-- Forms Plus plugins/helpers -->
        <script src="<?php echo base_url(); ?>resources/js/form-plus/forms.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/validation.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/value.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/field.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/file.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/block.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/elements.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/autocomplete.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/ajax.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/stp.min.js" type="text/javascript"></script>       
        <!-- Forms Plus init -->
        <script src="<?php echo base_url(); ?>resources/js/form-plus/script.js"></script>
        <!--js utama-->
        <script src="<?php echo base_url(); ?>resources/myjs/kematian.js"></script>

        <script src="<?php echo base_url(); ?>resources/myjs/printJs.js"></script>
        <!--<button type="button" class="btn btn-danger" onclick="getData();">Click</button>-->
    </body>
</html>
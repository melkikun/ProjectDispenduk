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
            <form id="fRegKKBaru" action="#" method="post" class="spaced-p-form p-form-spaced-olive form-inline" 
                  novalidate="novalidate"	data-js-validate="true" data-js-highlight-state-msg="true" 
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align:center; ">
                        Pendaftaran Kartu Keluarga Baru&nbsp;&nbsp;<i
                            class="fa fa-pencil-square-o"></i>
                    </div>
                    <!-- End: title -->

                    <div class="p-form-steps-wrap p-steps-icons" >
                        <ul class="p-form-steps" data-js-stepper="registrationSteps">
                            <li class="active" data-js-step="jenisPendudukBlock" style="display: none">
                                <span class="p-step"> 
                                    <span class="p-step-text">1</span>
                                </span>
                            </li>
                            <li data-js-step="informasiBlock" style="display: none">
                                <span class="p-step"> 
                                    <span class="p-step-text">2</span>
                                </span>
                            </li>
                            <li data-js-step="alasanPermohonanBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">3</span>
                                </span>
                            </li>
                            <li data-js-step="jenisPernikahanBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">4</span>
                                </span>
                            </li>
                            <li data-js-step="kitapBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">5</span>
                                </span>
                            </li>
                            <li data-js-step="pemohonBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">6</span>
                                </span>
                            </li>
                            <li data-js-step="anggotaBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">7</span>
                                </span>
                            </li>

                            <li data-js-step="alamatBlock"  style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">8</span>
                                </span>
                            </li>
                            <li data-js-step="selesaiBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">9</span>
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div data-js-block="jenisPendudukBlock" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Jenis Penduduk</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 400px; margin:auto;">
                            <div class="form-group">
                                <label for="jenisPenduduk" class="control-label" style="font-size: 18px">Status Kependudukan</label>
                                <div class="p-form-cg pt-form-inline">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPenduduk" value="1" required="required" 
                                                   class="form-control" onclick="jenisPendudukOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Warga Negara Indonesia</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPenduduk" value="2" required="required" 
                                                   class="form-control" onclick="jenisPendudukOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Orang Asing</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a href="#" class="btn" data-js-show-step-force="registrationSteps:2">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="informasiBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Informasi Pendafataran pembuatan Kartu Keluarga Baru</span>
                        </div>
                        <!-- End: subtitle -->

                        <div id="panelInformasiWni" class="panel-informasi"style="display: none;">
                            <p>
                                Kartu Keluarga, yang selanjutnya disingkat KK, adalah kartu identitas keluarga yang 
                                memuat data tentang nama, susunan dan hubungan dalam keluarga, serta identitas 
                                anggota keluarga
                            </p>
                            <b>Alur registrasi pembuatan Kartu Keluarga baru (secara online) bagi WNI, adalah sebagai berikut :</b>
                            <br/>
                            <ol> 
                                <li>Melakukan Registrasi / Pendaftaran, dengan cara mengikuti alur yang ada di halaman ini hingga selesai</li>
                                <li>Upload dokumen pendukung yang diperlukan
                                    <ol style="list-style-type: circle;">
                                        <li>Akta Nikah</li>
                                        <li>Surat keterangan Pindah Datang (untuk yang datang dari dalam negeri)</li>
                                        <li>Surat Keterangan Datang dari Luar Negeri (untuk yang datang dari luar negeri)</li>
                                    </ol>
                                </li>
                                <li>Datang ke Kelurahan masing-masing untuk proses pengabSAHan</li>
                            </ol>
                        </div>

                        <div id="panelInformasiAsing" class="panel-informasi" style="display:none">
                            <p>
                                Kartu Keluarga, yang selanjutnya disingkat KK, adalah kartu identitas keluarga yang 
                                memuat data tentang nama, susunan dan hubungan dalam keluarga, serta identitas 
                                anggota keluarga
                            </p>
                            <b>Alur registrasi pembuatan Kartu Keluarga baru (secara online) bagi OrangAsing, adalah sebagai berikut :</b>
                            <br/>
                            <ol> 
                                <li>Melakukan Registrasi / Pendaftaran, dengan cara mengikuti alur yang ada di halaman ini hingga selesai</li>
                                <li>Upload dokumen pendukung yang diperlukan
                                    <ol style="list-style-type: circle;">
                                        <li>Akta Nikah</li>
                                        <li>Izin Tinggal Tetap</li>
                                        <li>Surat keterangan Pindah Datang (untuk yang pindah dari dalam negeri)</li>
                                        <li>Surat Keterangan Datang dari Luar Negeri (untuk yang pindah dari luar negeri)</li>
                                    </ol>
                                </li>
                                <li>Datang ke Kelurahan masing-masing untuk proses pengabSAHan</li>
                            </ol>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a  href="#" class="btn" data-js-show-step="registrationSteps:3">
                                Lanjut </a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="alasanPermohonanBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Alasan Permohonan</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 400px; margin:auto;">
                            <div class="form-group">
                                <label for="jenisPenduduk" class="control-label" style="font-size: 18px;">Alasan Permohonan</label>
                                <div class="p-form-cg">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="alasanPermohonan" value="1" required="required" 
                                                   class="form-control" onclick="alasanPermohonanOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label" style="font-size: 16px;">Karena Membentuk Rumah Tangga Baru</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="alasanPermohonan" value="2" required="required" 
                                                   class="form-control" onclick="alasanPermohonanOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label" style="font-size: 16px;">Karena Kartu Keluarga Hilang/Rusak</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="alasanPermohonan" value="3" required="required" 
                                                   class="form-control" onclick="alasanPermohonanOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label" style="font-size: 16px;">Karena Penambahan Anggota</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="alasanPermohonan" value="4" required="required" 
                                                   class="form-control" onclick="alasanPermohonanOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label" style="font-size: 16px;">Karena Pengurangan Anggota</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a id="btnAlasanLanjut" href="#" class="btn" data-js-show-step="registrationSteps:4">
                                Lanjut</a> 
                            <a id="btnAlasanTidakLanjut" href="#" class="btn collapse" onclick="alert('Maaf sistem baru bisa melayani untuk keperluan rumah tangga baru');">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="jenisPernikahanBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Jenis Pernikahan</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 480px; margin:auto;">
                            <div class="form-group">
                                <label for="jenisPenduduk" class="control-label" style="font-size: 18px;">Jenis Pernikahan</label>
                                <div class="p-form-cg pt-form-inline">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPernikahan" value="1" required="required" 
                                                   class="form-control" onclick="jenisPernikahanOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Nikah dengan WNI</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPernikahan" value="2" required="required" 
                                                   class="form-control" onclick="jenisPernikahanOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Nikah dengan Orang Asing</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="p-button text-right row">
                            <a id="btnPernikahanLanjutAsing" href="#" class="btn" data-js-show-step="registrationSteps:5">
                                Lanjut</a> 
                            <a id="btnPernikahanLanjutWni" href="#" class="btn collapse" data-js-show-step-force="registrationSteps:5" data-js-show-step="registrationSteps:6">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="kitapBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Keterangan Izin Tinggal Tetap (KITAP) untuk Orang Asing</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: 0 auto">
                            <div class="form-group ">
                                <label style="width: 115px; text-align: right" class="control-label p-label-required" 
                                       for="nokitap">No. KITAP :</label> 
                                <div class="input-group" style="width:300px">
                                    <input class="form-control"  id="nokitap" name="noKitap" type="text" required>
                                    <div class="p-field-cb"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="width: 115px; text-align: right; " class="control-label p-label-required" 
                                       for="endK">Tgl.Berakhir :</label>
                                <div class="input-group p-has-icon" style="width:200px">
                                    <input id="endK" class="form-control" name="tglAkhirKitap"
                                           placeholder="dd.mm.yyyy" data-js-datetimepick="true"
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
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a href="#" class="btn" onclick="CekKitap();">Lanjut</a>
                            <a href="#" class="btn hide" data-js-show-step="registrationSteps:6" id="kitap-ok">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="pemohonBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Identitas Pemohon</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default">
                            <h3>Data Pemohon</h3>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <h4 style="float: left;">NIK</h4>
                                    <div class="input-group p-has-icon" style="float: right">
                                        <input id="nikKep" name="nikPemohon" type="text"
                                               placeholder="namor nik,," class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                        <span class="input-group-btn" style="width:60px">
                                            <button type="button" class="btn" onclick="CekNikPemohon();">Cek-NIK</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nPem" class="control-label p-label-required">
                                        Nama Lengkap</label>
                                    <div class="input-group p-has-icon">
                                        <input id="nPem" name="namaPemohon" required="required" readonly=""
                                               type="text" placeholder="name" class="form-control">
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
                                        <input id="alPel" name="alamatPemohon" required="required" readonly=""
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
                                        <input id="rtP" name="rtPemohon" data-js-input-type="number" readonly=""
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
                                        <input id="rwP" name="rwPemohon" data-js-input-type="number" readonly=""
                                               required type="number" placeholder="RW" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="kdPos" class="control-label p-label-required">KodePos</label>
                                    <div class="input-group p-has-icon">
                                        <input id="kdPos" name="kdPosPemohon" data-js-input-type="number" readonly=""
                                               required type="text" placeholder="kode pos"
                                               class="form-control">
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
                                        <label class="control-label p-label-required" for="propKep">Propinsi</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="propKep" class="selectpicker form-control" 
                                                    title="pilih salah satu"
                                                    name="propinsiPemohon" required data-show-subtext="true" disabled=""
                                                    data-live-search="true" titile="pilih salah satu" onchange="ChangePropinsiPemohon();">

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
                                        <label class="control-label p-label-required" for="kabKep">Kabupaten / Kota</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kabKep" class="selectpicker form-control" title="pilih salah satu"
                                                    name="kabupatenPemohon" required data-show-subtext="true" disabled=""
                                                    data-live-search="true" titile="pilih salah satu" onchange="ChangeKabupatenPemohon();">
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
                                        <label class="control-label p-label-required" for="kecKep">Kecamatan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kecKep" class="selectpicker form-control" title="pilih salah satu"
                                                    name="kecamatanPemohon" required data-show-subtext="true" disabled=""
                                                    data-live-search="true" titile="pilih salah satu" onchange="ChangeKecamatanPemohon();">
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
                                        <label class="control-label p-label-required" for="kelKep">Kelurahan</label>
                                        <label class="input-group p-custom-arrow"> 
                                            <select	id="kelKep" class="selectpicker form-control" title="pilih salah satu"
                                                    name="kelurahanPemohon" required data-show-subtext="true" disabled=""
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
                                    <label for="tlpAy" class="control-label p-label-required">Telepon</label>
                                    <div class="input-group p-has-icon">
                                        <input id="tlpAy" name="tlpPemohon" required type="text"
                                               placeholder="telepon" class="form-control">
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-pencil-square-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group p-custom-arrow" style="width: 100%">
                                        <label class="control-label p-label-required" for="pkjAy">Pekerjaan</label>
                                        <label class="input-group p-custom-arrow"> <select
                                                id="pkjAy" class="selectpicker form-control"
                                                name="pekerjaanPemohon" required data-show-subtext="true"
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
                        </div>

                        <div class="p-button text-right row">
                            <a href="#" class="btn" data-js-show-step="registrationSteps:7">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="anggotaBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Anggota Keluarga Baru</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="text-center">
                            <button class="button-tambah" type="button" onclick="tambahAnggota();">Tambah Anggota</button>
                            <button class="button-tambah" type="button" onclick="kurangiAnggota();">Kurangi Anggota</button>
                        </div>

                        <br/>
                        <br/>
                        <div id="panelAnggota" class="panel panel-default">
                        </div>

                        <br/> 
                        <br/>
                        <div class="p-button text-right row">
                            <a id="btnAnggotaLanjutOff" class="btn" href="#" disabled="">
                                Lanjut</a> 
                            <a id="btnAnggotaLanjutOn" href="#" class="btn collapse" 
                               data-js-show-step="registrationSteps:8">Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="alamatBlock" class="collapse"  data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Alamat KartuKeluarga Baru</span>
                        </div>
                        <!-- End: subtitle -->

                        <div calss="row">
                            <div class="form-group col-md-6">
                                <label for="alK" class="control-label p-label-required">Alamat</label>
                                <div class="input-group p-has-icon">
                                    <input id="alK" name="alamatKK" required="required"
                                           type="text" placeholder="alamat" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rtK" class="control-label p-label-required">RT</label>
                                <div class="input-group p-has-icon">
                                    <input id="rtK" name="rtKK" data-js-input-type="number"
                                           required type="number" placeholder="RT" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rwK" class="control-label p-label-required">RW</label>
                                <div class="input-group p-has-icon">
                                    <input id="rwK" name="rwKK" data-js-input-type="number"
                                           required type="number" placeholder="RW" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="kdPK" class="control-label p-label-required">KodePos</label>
                                <div class="input-group p-has-icon">
                                    <input id="kdPK" name="kdPosKK" data-js-input-type="number"
                                           required type="text" placeholder="kode pos"
                                           class="form-control">
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
                                    <label class="control-label p-label-required" for="prPn">Propinsi</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="propinsi" class="selectpicker form-control"
                                                name="propinsi" required data-show-subtext="true"
                                                title="pilih salah satu">
                                            <option class="p-select-default" value="35" selected="">Jawa Timur</option>

                                        </select>
                                        <div class="p-field-cb"></div> <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kabPn">Kabupaten</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kabupaten" class="selectpicker form-control"
                                                name="kabupaten" required data-show-subtext="true"
                                                title="pilih salah satu">
                                            <option class="p-select-default" value="25" selected="">Gresik</option>
                                        </select>
                                        <div class="p-field-cb"></div> <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kecPn">Kecamatan</label>
                                    <label class="input-group p-custom-arrow"> <select
                                            id="kecamatan" class="selectpicker form-control"
                                            name="kecamatan" required data-show-subtext="true"
                                            data-live-search="true" title="pilih salah satu" onchange="ChangeKecamatan();">
                                            <!--                                            <option  value="1" >Auto-Generate</option>
                                                                                        <option  value="2" >Terimakasih</option>-->
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
                                    <label class="control-label p-label-required" for="kelPn">Kelurahan</label>
                                    <label class="input-group p-custom-arrow"> <select
                                            id="kelurahan" class="selectpicker form-control"
                                            name="kelurahan" required data-show-subtext="true"
                                            data-live-search="true" title="pilih salah satu">
                                            <!--                                            <option  value="1" >Auto-Generate</option>
                                                                                        <option  value="2" >Terimakasih</option>-->
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

                        <br/> 
                        <br/>
                        <div class="p-button text-right row">
                            <a onclick="SubmitKK()" href="#" class="btn" >Lanjut</a>
                            <a id="btnLanjutOnAnggotBlock" href="#" class="btn hide" 
                               data-js-show-step="registrationSteps:9">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="selesaiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Selesai</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel-informasi" style="text-align: center;">
                            <p>"Terimakasih kami sampaikan 
                                <br/>atas Partisipasi warga dalam upaya penertiban administrasi kependudukan"<br/>	
                                "Pendaftaran layanan pembuatan kartu keluarga baru yang telah baru saja anda lakukan 
                                <br/> akan <b>segera</b> kami proses setelah anda meng-Upload 
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
                            <h4>Nomor Registrasi anda akan terus digunakan hingga Kartu Keluarga Baru selesai di kerjakan.</h4>
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
            &nbsp;
            <!--<button type="button" onclick="SubmitKK();">test</button>-->
            <input type="hidden" name="kk-old" id="kk-old">
            <input type="hidden" name="alamat-baru" id="alamat-baru">
            <input type="text" name="status-wni" id="status-wni">
        </div>
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
        <script src="<?php echo base_url(); ?>resources/js/form-plus/forms-plus-spinner.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/block.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/elements.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/autocomplete.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/ajax.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resources/js/form-plus/stp.min.js" type="text/javascript"></script>       
        <!-- Forms Plus init -->
        <script src="<?php echo base_url(); ?>resources/js/form-plus/script.js"></script>
        <script src="<?php echo base_url(); ?>resources/myjs/kk.js"></script>
        
        <script src="<?php echo base_url(); ?>resources/myjs/printJs.js"></script>
        <script>
                                /**
                                 * List, nama attribute yang ada di halaman ini :
                                 * 		noReg,	
                                 *      jenisPenduduk, 			-- value = 1 (wni) | 2(orang asing)
                                 *		alasanPermohonan,
                                 *		jenisPernikahan,
                                 *		noKitap, tglAkhirKitap,   	--> Keterangan Izin Tinggal Tetap
                                 *
                                 *		nikPemohon, namaPemohon, alamatPemohon, propinsiPemohon, 
                                 *			kabupatenPemohon, kecamatanPemohon,  kelurahanPemohon,
                                 *			kdPosPemohon, rtPemohon, rwPemohon, tlpPemohon, pekerjaanPemohon.  
                                 *		
                                 *		nikAnggota, namaAnggota, kkAnggota   --> data Anggota Keluarga  
                                 * 		
                                 *		hubunganKeluarga(arrAnggota[ke-i])             --> data hubungan keluarga
                                 *
                                 *		propinsi, kabupaten, kecamatan, kelurahan		 --> data district area/ wil.Pemerintahan
                                 *
                                 **/
                                var baseUrl = "<?php echo base_url(); ?>";
        </script>
    </body>
</html>

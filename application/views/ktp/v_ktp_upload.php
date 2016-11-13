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
        <!-- SCRIPTS bikinan SENDIRI-->
        <script src="<?php echo base_url(); ?>resources/js/main.js"></script>

        <title>Upload Persyaratan</title>
    </head>
    <body>
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo "$branding"; ?>
        <div id="contentArea" class="container-fluid">
            <div class="loading">Loading&#8230;</div>
            <form id="formUploadKtp" action="#" method="post" class="spaced-p-form p-form-spaced-olive form-inline" 
                  novalidate="novalidate" data-js-validate="true" data-js-highlight-state-msg="true" 
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align: center;">
                        Upload Persyaratan Pembuatan KTP Baru&nbsp;&nbsp;<i
                            class="fa fa-pencil-square-o"></i>
                    </div>
                    <!-- End: title -->

                    <div class="p-form-steps-wrap p-steps-icons">
                        <ul class="p-form-steps" data-js-stepper="uploadSteps">
                            <li class="active" data-js-step="validasiNoRegBlock"
                                style="display: none"><span class="p-step"> <span
                                        class="p-step-text">1</span>
                                </span></li>
                            <li data-js-step="informasiBlock" style="display: none">
                                <span class="p-step"> <span class="p-step-text">2</span>
                                </span>
                            </li>
                            <li data-js-step="pasPhotoBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">3</span>
                                </span></li>
                            <li data-js-step="kkBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">4</span>
                                </span></li>
                            <li data-js-step="aktaLahirBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">5</span>
                                </span></li>
                            <li data-js-step="aktaNikahBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">6</span>
                                </span></li>
                            <li data-js-step="skPindahBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">7</span>
                                </span></li>
                            <li data-js-step="pasporBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">8</span>
                                </span></li>
                            <li data-js-step="kitapBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">9</span>
                                </span></li>
                            <li data-js-step="skckBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">10</span>
                                </span></li>
                            <li data-js-step="selesaiBlock" style="display: none"><span
                                    class="p-step"> <span class="p-step-text">11</span>
                                </span></li>
                        </ul>
                    </div>


                    <div data-js-block="validasiNoRegBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Validasi Nomer Registrasi</span>
                        </div>
                        <!-- End: subtitle -->

                        <br />
                        <div class="panel panel-default"
                             style="width: 500px; margin: 0 auto">
                            <div class="form-group">
                                <label class="control-label" for="noReg"
                                       style="font-size: 16px; width: 186px"> <b>Nomer
                                        Registrasi :</b>
                                </label>
                                <div class="input-group" style="width: 300px">
                                    <input class="form-control" id="noReg" name="noReg" required
                                           style="height: 40px;" type="text" placeholder="">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-btn">
                                        <button id="cek-no-reg" type="button" class="btn" onclick="CekNoReg();">Cek No</button>
                                    </span>
                                </div>

                            </div>
                        </div>

                        <br /> <br />
                        <div class="p-button text-right">
                            <button type="button" class="btn" data-js-show-step="uploadSteps:2" disabled="" id="next-step2">Lanjut</button> 
                            <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="informasiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Informasi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div id="panelInformasiWni" class="panel-informasi" >
                            <b>Persyaratan-Persyaratan yang diperlukan untuk Membuat KTP
                                baru bagi WNI adalah sebagai berikut :</b> <br /> <br />
                            <ol style="list-style-type: circle;">
                                <li>Kartu Keluarga</li>
                                <li>Akta Kelahiran</li>
                                <li>Akta Nikah (untuk yang sudah nikah)</li>
                                <li>Surat Keterangan Pindah (untuk yang pindah domisili)</li>
                            </ol>
                        </div>
                        <div id="panelInformasiAsing" class="panel-informasi" style="display:none">
                            <b>Persyaratan-Persyaratan yang diperlukan untuk Membuat KTP
                                baru bagi Orang Asing adalah sebagai berikut :</b> <br /> <br />
                            <ol style="list-style-type: circle;">
                                <li>Kartu Keluarga</li>
                                <li>Akta Kelahiran</li>
                                <li>Akta Nikah (untuk yang belum berusia 17 tahun)</li>
                                <li>Paspor</li>
                                <li>Surat Izin Tinggal Tetap</li>
                                <li>Surat Keterangan Catatan Kepolisian</li>
                            </ol>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:3" id="lanjut-step3">Lanjut</a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:4" id="lanjut-step4" data-js-show-step-force="registrationSteps:3">Lanjut </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:5" id="lanjut-step5" data-js-show-step-force="registrationSteps:4">Lanjut  </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:6" id="lanjut-step6" data-js-show-step-force="registrationSteps:5">Lanjut  </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:7" id="lanjut-step7" data-js-show-step-force="registrationSteps:6">Lanjut </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:8" id="lanjut-step8" data-js-show-step-force="registrationSteps:7">Lanjut </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:9" id="lanjut-step9" data-js-show-step-force="registrationSteps:8">Lanjut </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:10" id="lanjut-step10" data-js-show-step-force="registrationSteps:9">Lanjut </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:11" id="lanjut-step11" data-js-show-step-force="registrationSteps:11">Lanjut </a> 
                            <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="pasPhotoBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Pas Photo</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label p-label-required">Upload Pas Photo</label> 
                                    <input id="fPP" name="fPasPhoto" type="file" accept="image/*"
                                           placeholder="select file..."
                                           onchange="document.getElementById('fPP-fake').value = this.value;"
                                           required />

                                    <div class="input-group p-has-icon">
                                        <input id="fPP-fake" class="form-control" type="text"
                                               placeholder="select file..." required />
                                        <span class="input-group-state"> <span
                                                class="p-position"> <span class="p-text"> <span
                                                        class="p-required-text"> <i class="fa fa-star"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-download"></i>
                                        </span> <span class="input-group-btn">
                                            <button type="button" class="btn">browse</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /> <br />

                        <div class="p-button text-center row">
                            <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('foto')"> 
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:4"> 
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a> 
                            <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;
                                Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="kkBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Kartu Keluarga</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label p-label-required">Upload Kartu
                                        Keluarga</label> 
                                    <input id="fKK" name="fKartuKeluarga" type="file"  accept="image/*"
                                           placeholder="select file..."
                                           onchange="document.getElementById('fKK-fake').value = this.value;"
                                           required />

                                    <div class="input-group p-has-icon">
                                        <input id="fKK-fake" class="form-control" type="text"
                                               placeholder="select file..." required />
                                        <span class="input-group-state"> <span
                                                class="p-position"> <span class="p-text"> <span
                                                        class="p-required-text"> <i class="fa fa-star"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-download"></i>
                                        </span> <span class="input-group-btn">
                                            <button type="button" class="btn">browse</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /> <br />

                        <div class="p-button text-center row">
                            <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('kk')"> 
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:5"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a> <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="aktaLahirBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Akta Lahir</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group" >
                                <div class="p-file-wrap" >
                                    <label class="control-label p-label-required">Akta Kelahiran</label> 
                                    <input 
                                        name="fAktaLahir" type="file"  accept="image/*"
                                        placeholder="select file..."
                                        onchange="document.getElementById('fAl-fake').value = this.value;"
                                        required />
                                    <div class="input-group p-has-icon">
                                        <input id="fAl-fake" class="form-control" type="text" style="display:100%;"
                                               placeholder="select file..."  required />
                                        <span class="input-group-state"> <span
                                                class="p-position"> <span class="p-text"> <span
                                                        class="p-required-text"> <i class="fa fa-star"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-download"></i>
                                        </span> <span class="input-group-btn">
                                            <button type="button" class="btn">browse</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /> <br />
                        <div class="p-button text-center row">
                            <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('akta-lahir')"> 
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:6"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a> <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="aktaNikahBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Akta Nikah</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fAn">Akta Nikah</label> 
                                    <input
                                        id="fAn" name="fAktaNikah" type="file"  accept="image/*"
                                        placeholder="select file..."
                                        onchange="document.getElementById('fAn-fake').value = this.value;" />
                                    <div class="input-group p-has-icon">
                                        <input id="fAn-fake" class="form-control" type="text"
                                               placeholder="select file..." required />
                                        <span class="input-group-state"> <span
                                                class="p-position"> <span class="p-text"> <span
                                                        class="p-required-text"> <i class="fa fa-star"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-download"></i>
                                        </span> <span class="input-group-btn">
                                            <button type="button" class="btn">browse</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /> <br />
                        <div class="p-button text-center row">
                            <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('akta-nikah')"> 
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>
<!--                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:7" id="go-step7"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload wni
                            </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:8" data-js-show-step-force="registrationSteps:7" id="skip-step7"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload wna
                            </a> -->
                            <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="skPindahBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Surat Keterangan Pindah</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" >Surat Keterangan
                                        Pindah</label> <input  name="fSKPindah" type="file"  accept="image/*"
                                                           placeholder="select file..."
                                                           onchange="document.getElementById('fSK-fake').value = this.value;"
                                                           required="required" />
                                    <div class="input-group p-has-icon">
                                        <input id="fSK-fake" class="form-control" type="text"
                                               placeholder="select file..." class="form-control" required />
                                        <span class="input-group-state"> <span
                                                class="p-position"> <span class="p-text"> <span
                                                        class="p-required-text"> <i class="fa fa-star"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-download"></i>
                                        </span> <span class="input-group-btn">
                                            <button type="button" class="btn">browse</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /> <br />
                        <div class="p-button text-center row">
                            <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('pindah')"> 
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>
<!--                            <a href="#" class="btn" data-js-show-step="uploadSteps:11"  data-js-show-step-force="registrationSteps:9"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>-->
                            <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="pasporBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Foto Copy Paspor</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" >Paspor</label> 
                                    <input
                                        name="fPaspor" type="file"  accept="image/*"
                                        placeholder="select file..."
                                        onchange="document.getElementById('fPs-fake').value = this.value;"
                                        required="required" />
                                    <div class="input-group p-has-icon">
                                        <input id="fPs-fake" class="form-control" type="text"
                                               placeholder="select file..." class="form-control" required />
                                        <span class="input-group-state"> <span
                                                class="p-position"> <span class="p-text"> <span
                                                        class="p-required-text"> <i class="fa fa-star"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <div class="p-field-cb"></div>
                                        <span class="input-group-icon"> <i
                                                class="fa fa-download"></i>
                                        </span> <span class="input-group-btn">
                                            <button type="button" class="btn">browse</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /> <br />
                        <div class="p-button text-center row">
                            <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('paspor')"> 
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>
                           <!--  <a href="#" class="btn hide" data-js-show-step="uploadSteps:9"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload -->
                        </a> <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                    </a>
                </div>
            </div>

            <div data-js-block="kitapBlock" class="collapse" data-js-validation-block="">
                <!-- Start: subtitle -->
                <div class="p-subtitle">
                    <span class="p-title-side">Upload Keterangan Izin Tinggal
                        Tetap</span>
                </div>
                <!-- End: subtitle -->

                <div class="panel panel-default" style="width: 450px; margin: auto">
                    <div class="form-group">
                        <div class="p-file-wrap">
                            <label class="control-label">Surat Keterangan
                                Izin Tinggal Tetap (KITAP)</label> 
                            <input name="fKitap"
                                   type="file" placeholder="select file..."  accept="image/*"
                                   onchange="document.getElementById('fKit-fake').value = this.value;"
                                   required="required" />
                            <div class="input-group p-has-icon">
                                <input id="fKit-fake" class="form-control" type="text"
                                       placeholder="select file..." class="form-control" required />
                                <span class="input-group-state"> <span
                                        class="p-position"> <span class="p-text"> <span
                                                class="p-required-text"> <i class="fa fa-star"></i>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                                <div class="p-field-cb"></div>
                                <span class="input-group-icon"> <i
                                        class="fa fa-download"></i>
                                </span> <span class="input-group-btn">
                                    <button type="button" class="btn">browse</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <br /> 
                <br />
                <div class="p-button text-center row">
                    <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('kitap')"> 
                        <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                    </a>
                    <a href="#" class="btn hide" data-js-show-step="uploadSteps:10"> <i
                            class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                    </a> <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                    </a>
                </div>
            </div>

            <div data-js-block="skckBlock" class="collapse" data-js-validation-block="">
                <!-- Start: subtitle -->
                <div class="p-subtitle">
                    <span class="p-title-side">Upload Keterangan Izin Tinggal
                        Tetap</span>
                </div>
                <!-- End: subtitle -->

                <div class="panel panel-default" style="width: 450px; margin: auto">
                    <div class="form-group">
                        <div class="p-file-wrap">
                            <label class="control-label" >Surat Keterangan Catatan Kepolisian (SKCK)</label> 
                            <input name="fSkck"
                                   type="file" placeholder="select file..."  accept="image/*"
                                   onchange="document.getElementById('fKit-fake').value = this.value;"
                                   required="required" />
                            <div class="input-group p-has-icon">
                                <input id="fKit-fake" class="form-control" type="text"
                                       placeholder="select file..." class="form-control" required />
                                <span class="input-group-state"> <span
                                        class="p-position"> <span class="p-text"> <span
                                                class="p-required-text"> <i class="fa fa-star"></i>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                                <div class="p-field-cb"></div>
                                <span class="input-group-icon"> <i
                                        class="fa fa-download"></i>
                                </span> <span class="input-group-btn">
                                    <button type="button" class="btn">browse</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <br /> 
                <br />
                <div class="p-button text-center row">
                    <a href="#" class="btn" id="btn-upload-foto" onclick="UploadSingleImage('skck')"> 
                        <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                    </a>
                    <a href="#" class="btn hide" data-js-show-step="uploadSteps:11"> <i
                            class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                    </a> <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                    </a>
                </div>
            </div>

            <div data-js-block="selesaiBlock" class="collapse">
                <!-- Start: subtitle -->
                <div class="p-subtitle">
                    <span class="p-title-side">Selesai</span>
                </div>
                <!-- End: subtitle -->

                <div class="panel-informasi" style="text-align: center;">Persyratan Pendaftaran pembuatan
                    KTP baru sudah lengkap. TErimakasih</div>

                <br/>
                <br/>
                <div class="p-button text-center row">
                    <a class="btn" href="<?php echo base_url(); ?>"> <i
                            class="fa fa-check fa-3x"></i>&nbsp;Selesai
                    </a>
                </div>

            </div>
        </div>
    </form>
    <input type="hidden" id="status-wni" value="">
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
<script src="<?php echo base_url(); ?>resources/js/form-plus/block.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>resources/js/form-plus/elements.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>resources/js/form-plus/autocomplete.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>resources/js/form-plus/ajax.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>resources/js/form-plus/stp.min.js" type="text/javascript"></script>       
<!-- Forms Plus init -->
<script src="<?php echo base_url(); ?>resources/js/form-plus/script.js"></script>
<script src="<?php echo base_url(); ?>resources/myjs/ktp_upload.js"></script>
<script type>
                        $(document).ready(function () {
                            document.forms['formUploadKtp'].reset();
                        });

                        var baseUrl = "<?php echo base_url(); ?>";
</script>
</body>
</html>
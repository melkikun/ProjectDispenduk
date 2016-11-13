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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/main.css">

        <link href="<?php echo base_url() ?>resources/css/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/bootstrap/bootstrap-datetimepicker.min.css">


        <link href="<?php echo base_url() ?>resources/css/jquery-ui/core.css" rel="stylesheet" type="text/css">

        <!-- Autocomplete -->
        <link href="<?php echo base_url() ?>resources/css/jquery-ui/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>resources/css/jquery-ui/autocomplete.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>resources/css/form/forms-plus.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url() ?>resources/css/form/color/forms-plus-olive.css" rel="stylesheet" type="text/css">
        <!--animation-->
        <link href="<?php echo base_url() ?>resources/css/animation.css" rel="stylesheet" type="text/css">
        <!-- SCRIPTS JQuery-->
        <script src="<?php echo base_url() ?>resources/js/jquery/v1/jquery.min.js"></script>
        <!-- SCRIPTS bikinan SENDIRI-->
        <script src="<?php echo base_url() ?>resources/js/main.js"></script>

        <title>Upload Persyaratan</title>
    </head>
    <body>
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo $branding; ?>
        <div id="contentArea" class="container-fluid">
            <div class="loading">Loading&#8230;</div>
            <form id="formUpload" action="#" method="post" class="spaced-p-form p-form-spaced-olive form-inline" 
                  novalidate="novalidate"	data-js-validate="true" data-js-highlight-state-msg="true" 
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align:center; ">
                        Upload Persyaratan Pendaftaran Kelahiran&nbsp;&nbsp;<i
                            class="fa fa-pencil-square-o"></i>
                    </div>
                    <!-- End: title -->

                    <div class="p-form-steps-wrap p-steps-icons" >
                        <ul class="p-form-steps" data-js-stepper="uploadSteps">
                            <li class="active" data-js-step="validasiNoRegBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">1</span>
                                </span>
                            </li>
                            <li data-js-step="informasiBlock" style="display: none">
                                <span class="p-step"> 
                                    <span class="p-step-text">2</span>
                                </span>
                            </li>
                            <li data-js-step="kkBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">3</span>
                                </span>
                            </li>
                            <li data-js-step="ktpOrtuBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">4</span>
                                </span>
                            </li>
                            <li data-js-step="aktaNikahBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">5</span>
                                </span>
                            </li>
                            <li data-js-step="suratKelahiranBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">6</span>
                                </span>
                            </li>
                            <li data-js-step="ktpSaksiBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">7</span>
                                </span>
                            </li>
                            <li data-js-step="pasporBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">8</span>
                                </span>
                            </li>
                            <li data-js-step="kitapBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">9</span>
                                </span>
                            </li>
                            <li data-js-step="bapBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">10</span>
                                </span>
                            </li>
                            <li data-js-step="spBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">11</span>
                                </span>
                            </li>
                            <li data-js-step="selesaiBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">12</span>
                                </span>
                            </li>
                        </ul>
                    </div>


                    <div data-js-block="validasiNoRegBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Validasi Nomer Registrasi</span>
                        </div>
                        <!-- End: subtitle -->

                        <br/>
                        <div class="panel panel-default" style="width: 500px; margin: 0 auto">
                            <div class="form-group">
                                <label class="control-label" for="noReg" style="font-size: 16px;width: 186px">
                                    <b>Nomer Registrasi :</b>
                                </label>
                                <div class="input-group" style="width: 300px">
                                    <input class="form-control"  id="noReg" name="noReg" required
                                           style="height: 40px;" type="text" placeholder="" > 
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn" onclick="CekNoReg();">Cek No</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right">
                            <a href="#" class="btn" id="disabled-step2" disabled="">Lanjut</a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:2" id="go-step2">Lanjut</a> 
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="informasiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Informasi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel-informasi">
                            <b>Persyaratan-Persyaratan yang diperlukan untuk Mendaftarkan Kelahiran adalah sebagai berikut :</b>
                            <br/>
                            <ol style="list-style-type: circle;">
                                <li>Surat kelahiran dari bidan/rs/klinik</li>
                                <li>Akta Nikah</li>
                                <li>Kartu Keluarga Orang Tua Bayi</li>
                                <li>KTP Ayah</li>
                                <li>KTP Ibu</li>
                                <li>KTP 2 Orang Saksi</li>
                            </ol>
                        </div>

                        <div class="p-button text-center row">
                            <span id="upload-wni" class="hide">
                                <a href="#" class="btn hide" data-js-show-step="uploadSteps:3" id="wni-kk">Lanjut</a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:3" data-js-show-step="uploadSteps:4" id="wni-ktp">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:4" data-js-show-step="uploadSteps:5" id="wni-akta-nikah">Lanjut  </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:5" data-js-show-step="uploadSteps:6" id="wni-surat-lahir">Lanjut  </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:6" data-js-show-step="uploadSteps:7" id="wni-saksi">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:9" data-js-show-step="uploadSteps:12" id="wni-finish">Lanjut </a>
                            </span>
                            <span id="upload-wna" class="hide">
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:4" data-js-show-step="uploadSteps:5" id="wna-akta-nikah">Lanjut  </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:5" data-js-show-step="uploadSteps:6" id="wna-surat-lahir">Lanjut  </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:6" data-js-show-step="uploadSteps:7" id="wna-saksi">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:7" data-js-show-step="uploadSteps:8" id="wna-paspor">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:8" data-js-show-step="uploadSteps:9" id="wna-kitap">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:11" data-js-show-step="uploadSteps:12" id="wna-finish">Lanjut </a>
                            </span>
                            <span id="upload-tt" class="">
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:6" data-js-show-step="uploadSteps:7" id="tt-saksi">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:9" data-js-show-step="uploadSteps:10" id="tt-bap">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:10" data-js-show-step="uploadSteps:11" id="tt-sp">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:11" data-js-show-step="uploadSteps:12" id="tt-finish">Lanjut </a>
                            </span>
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="kkBlock" class="collapse" data-js-validation-block="" id="div-upload-kk" hidden="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Kartu Keluarga Orang Tua Bayi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fKK">Upload Kartu Kelurga</label> 
                                    <input id="fKK" name="fKK" type="file" placeholder="select file..." accept="image/*"
                                           onchange="document.getElementById('fKK-fake').value = this.value;" required />

                                    <div class="input-group p-has-icon">
                                        <input id="fKK-fake" class="form-control" type="text"
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

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a class="btn" onclick="UploadSingleImage('kk')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>
                            <a href="#" class="btn hide" id="go-step4"
                               data-js-show-step="uploadSteps:4">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="ktpOrtuBlock" class="collapse" data-js-validation-block=""  id="div-upload-ktp">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload KTP Ayah dan Ibu</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="p-file-wrap">
                                        <label class="conrol-label" for="fKTPAy">KTP Ayah</label> <input id="fKTPAy"  accept="image/*"
                                                                                                         name="fKTPAy" type="file" placeholder="select file..."
                                                                                                         onchange="document.getElementById('fKTPAy-fake').value = this.value;"
                                                                                                         required />
                                        <div class="input-group p-has-icon">
                                            <input id="fKTPAy-fake" class="form-control" type="text"
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="p-file-wrap">
                                        <label class="control-label" for="fKTPIb">KTP Ibu</label> <input id="fKTPIb"  accept="image/*"
                                                                                                         name="fKTPIb" type="file" placeholder="select file..."
                                                                                                         onchange="document.getElementById('fKTPIb-fake').value = this.value;"
                                                                                                         required />
                                        <div class="input-group p-has-icon">
                                            <input id="fKTPIb-fake" class="form-control" type="text"
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
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a class="btn" onclick="UploadDoubleImage('ktp')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a href="#" class="btn hide" id="go-step5"
                               data-js-show-step="uploadSteps:5">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="aktaNikahBlock" class="collapse" data-js-validation-block="" id="div-upload-akta-nikah">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Akta Nikah</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fAktaNikah">Akta Nikah</label>
                                    <input id="fAktaNikah" name="fAktaNikah" type="file" accept="image/*"
                                           placeholder="select file..."
                                           onchange="document.getElementById('fAktaNikah-fake').value = this.value;"
                                           required />
                                    <div class="input-group p-has-icon">
                                        <input id="fAktaNikah-fake" class="form-control" type="text"
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


                        <div class="p-button text-center row">
                            <a href="#" class="btn" onclick="UploadSingleImage('akta-nikah')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a href="#" class="btn hide" id="go-step6"
                               data-js-show-step="uploadSteps:6">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="suratKelahiranBlock" class="collapse" data-js-validation-block="" id="div-upload-surat-lahir">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Surat Kelahiran dari RS / Bidan / Klinik / Puskesmas</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fSK">Surat Kelahiran</label> <input
                                        id="fSK" name="fSK" type="file" placeholder="select file..." accept="image/*"
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

                        <div class="p-button text-center row">
                            <a href="#" class="btn" onclick="UploadSingleImage('surat-kelahiran')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a> 
                            <a href="#" class="btn hide" id="go-step7"
                               data-js-show-step="uploadSteps:7">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="ktpSaksiBlock" class="collapse" data-js-validation-block=""  id="div-upload-ktp-saksi">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload KTP 2 Orang Saksi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="form-group col-md-6">
                            <div class="p-file-wrap">
                                <label class="control-label" for="fKTPSaksi1">KTP Saksi 1</label> 
                                <input	id="fKTPSaksi1" name="fKTPSaksi1" type="file"
                                       placeholder="select file..." accept="image/*"
                                       onchange="document.getElementById('fKTPSaksi1-fake').value = this.value;"
                                       required />
                                <div class="input-group p-has-icon">
                                    <input id="fKTPSaksi1-fake" class="form-control" type="text"
                                           placeholder="select file..." class="form-control" required /> 
                                    <span class="input-group-state"> 
                                        <span class="p-position">
                                            <span class="p-text"> 
                                                <span class="p-required-text">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i class="fa fa-download"></i>
                                    </span> <span class="input-group-btn">
                                        <button type="button" class="btn">browse</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="p-file-wrap">
                                <label class="control-label" for="fKTPSaksi2">KTP Saksi 2</label> 
                                <input	id="fKTPSaksi2" name="fKTPSaksi2" type="file"  accept="image/*"
                                       placeholder="select file..."
                                       onchange="document.getElementById('fKTPSaksi2-fake').value = this.value;"
                                       required />
                                <div class="input-group p-has-icon">
                                    <input id="fKTPSaksi2-fake" class="form-control" type="text"
                                           placeholder="select file..." class="form-control" required /> 
                                    <span class="input-group-state"> 
                                        <span class="p-position">
                                            <span class="p-text"> 
                                                <span class="p-required-text">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i class="fa fa-download"></i>
                                    </span> <span class="input-group-btn">
                                        <button type="button" class="btn">browse</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-button text-center row">
                            <a href="#" class="btn" onclick="UploadDoubleImage('saksi')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a href="#" class="btn hide" id="go-step8"
                               data-js-show-step="uploadSteps:8">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="pasporBlock" class="collapse" data-js-validation-block=""  id="div-upload-paspor">
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
                                        name="fPaspor" type="file" id="fPaspor"
                                        placeholder="select file..." accept="image/*"
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
                            <a class="btn" onclick="UploadSingleImage('paspor')"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a> 
                            <a href="#" class="btn hide" data-js-show-step="uploadSteps:9" id="go-step9"> <i
                                    class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>
                            <a class="btn" href="<?php echo base_url() ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                            </a>
                        </div>
                    </div>

                    <div data-js-block="kitapBlock" class="collapse" data-js-validation-block=""  id="div-upload-kitap">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Keterangan Izin Tinggal Tetap</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fitt">Izin Tinggal Tetap</label> 
                                    <input name="fIzinTT" id="fIzinTT" type="file" placeholder="select file..." accept="image/*"
                                           onchange="document.getElementById('fitt-fake').value = this.value;"
                                           required />
                                    <div class="input-group p-has-icon">
                                        <input id="fitt-fake" class="form-control" type="text"
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
                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a class="btn" onclick="UploadSingleImage('ijintt')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a href="#" class="btn hide" id="go-step10"
                               data-js-show-step="uploadSteps:10">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="bapBlock" class="collapse" data-js-validation-block=""  id="div-upload-bap">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Berita Acara Penemuan Bayi dari Kepolisian</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fBap">Berita Acara Penemuan Bayi</label> 
                                    <input id="fBeritaAcara" name="fBeritaAcara" type="file" placeholder="select file..."
                                           onchange="document.getElementById('fBap-fake').value = this.value;"
                                           data-rule-filesize="760KB" required />
                                    <div class="input-group p-has-icon">
                                        <input id="fBap-fake" class="form-control" type="text"
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

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a class="btn" onclick="UploadSingleImage('bap')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a href="#" class="btn hide" id="go-step11"
                               data-js-show-step="uploadSteps:11">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="spBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Surat Pertanggung-jawaban Mutlak dari Desa / Kelurahan</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fSptj">Surat Pertanggung-jawaban Mutlak</label> 
                                    <input id="fSuratPertanggungJawaban" name="fSuratPertanggungJawaban" type="file" placeholder="select file..."
                                           onchange="document.getElementById('fSptj-fake').value = this.value;"
                                           data-rule-filesize="760KB" required />
                                    <div class="input-group p-has-icon">
                                        <input id="fSptj-fake" class="form-control" type="text"
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

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a class="btn" onclick="UploadSingleImage('sp')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a href="#" class="btn hide" id="go-step12"
                               data-js-show-step="uploadSteps:12">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="selesaiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Selesai</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel-informasi">
                            Persyratan Pendaftaran pembuatan Akta Kelahiran sudah lengkap. TErimakasih
                        </div>

                        <div class="p-button text-center row">

                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-check fa-3x"></i>&nbsp;Selesai</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <input type="hidden" name="status-wni" id="status-wni" value="0">

        <script type="text/javascript">
            /**
             * 	Nama-Nama attribute yang ada di halaman ini :
             *	```	
             * 		fKTPSaksi1 , fKTPSaksi2  (file ktp saksi)
             *    	fSK  (fileSurat Kelahiran),
             *		fAktaNikah (file Akta Nikah),
             *		fKK (file KK),
             *
             *  	fKTPIb (file KTP ibu),	fKTPAy (file KTp ayah),
             *		fPaspor,
             *		fIzinTT,
             *
             *		noReg
             *  
             */
//            $(function () {
//                $('#btnStatusOrtu').click(function (event) {
//                    /* Act on the event */
//                    alert("test123");
//                });
//            });

            var baseUrl = "<?php echo base_url(); ?>";

        </script>

        <!-- jquery ui -->
        <script src="<?php echo base_url() ?>resources/js/jquery-ui/core.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-ui/widget.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-ui/mouse.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-ui/position.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-ui/menu.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-ui/autocomplete.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-ui/slider.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <!-- Validation plugin -->
        <script src="<?php echo base_url() ?>resources/js/jquery-validation/jquery.validate.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-validation/additional-methods.js"></script>

        <!-- Helpers -->
        <script src="<?php echo base_url() ?>resources/js/moment/moment.js"></script>

        <!-- Field mask plugin -->
        <script src="<?php echo base_url() ?>resources/js/jquery-masked-input/jquery.maskedinput.js"></script>
        <!-- Bootstrap datetimepicker -->
        <script src="<?php echo base_url() ?>resources/js/bootstrap/bootstrap-datetimepicker.js"></script>
        <!-- ajax: jQuery Form Plugin -->
        <script src="<?php echo base_url() ?>resources/js/jquery-form-plugin/jquery.form.js"></script>

        <!-- captcha: Realperson plugin -->
        <script src="<?php echo base_url() ?>resources/js/jquery-realperson/jquery.plugin.js"></script>
        <script src="<?php echo base_url() ?>resources/js/jquery-realperson/jquery.realperson.js"></script>


        <!-- Forms Plus plugins/helpers -->
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-validation.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-value.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-field.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-file.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-spinner.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-block.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-elements.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-gelements.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-slider.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-autocomplete.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-ajax.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>resources/js/form-plus/forms-plus-steps.js" type="text/javascript"></script>       
        <!-- Forms Plus init -->
        <script src="<?php echo base_url() ?>resources/js/form-plus/script.js"></script>
        <script src="<?php echo base_url() ?>resources/myjs/kelahiran_upload.js"></script>
    </body>
</html>
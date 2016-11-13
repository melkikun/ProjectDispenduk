<!--<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
pageEncoding="ISO-8859-1"%>-->
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
        <!--animation-->
        <link href="<?php echo base_url() ?>resources/css/animation.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>resources/css/jquery-ui/core.min.css" rel="stylesheet" type="text/css">

        <!-- Autocomplete -->
        <link href="<?php echo base_url(); ?>resources/css/jquery-ui/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>resources/css/jquery-ui/autocomplete.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>resources/css/form/fp.min.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>resources/css/form/color/olive.min.css" rel="stylesheet" type="text/css">

        <!-- SCRIPTS JQuery-->
        <script src="<?php echo base_url(); ?>resources/js/jquery/v1/jquery.min.js"></script>

        <!-- SCRIPTS bikinan SENDIRI-->
        <script src="<?php echo base_url(); ?>resources/js/main.js"></script>

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
                        Upload Persyaratan Pendaftaran Kematian&nbsp;&nbsp;<i
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
                            <li data-js-step="ketKematianBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">3</span>
                                </span>
                            </li>
                            <li data-js-step="kkBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">4</span>
                                </span>
                            </li>
                            <li data-js-step="ktpBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">5</span>
                                </span>
                            </li>
                            <li data-js-step="ktpSaksiBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">6</span>
                                </span>
                            </li>
                            <li data-js-step="aktaLahirBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">7</span>
                                </span>
                            </li>
                            <!-- 						<li data-js-step="aktaKematianBlock" style="display: none"> -->
                            <!-- 							<span class="p-step"> -->
                            <!-- 								<span class="p-step-text">8</span> -->
                            <!-- 							</span> -->
                            <!-- 						</li> -->
                            <li data-js-step="aktaNikahBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">8</span>
                                </span>
                            </li>
                            <li data-js-step="imigrasiBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">9</span>
                                </span>
                            </li>
                            <li data-js-step="kitasBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">10</span>
                                </span>
                            </li>
                            <li data-js-step="kitapBlock" style="display: none">
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
                            <a href="#" class="btn" id="skip-step2" disabled="">Lanjut</a>
                            <a href="#" class="btn hide" id="lanjut-step2" 
                               data-js-show-step="uploadSteps:2">Lanjut </a> 
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="informasiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Informasi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div id="panelInformasiWni" class="panel-informasi">
                            <b>Persyaratan-Persyaratan yang diperlukan untuk Mendaftarkan Kematian adalah sebagai berikut :</b>
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
                        </div>

                        <div id="panelInformasiAsing" class="panel-informasi" style="display:none">
                            <b>Persyaratan-Persyaratan yang diperlukan untuk Mendaftarkan Kematian adalah sebagai berikut :</b>
                            <br/>
                            <ol style="list-style-type: circle;">
                                <li>Surat kematian (Visum) dari RS / Paramedis</li>
                                <li>Akta Kelahiran (jika ada)</li>
                                <li>Akta Nikah (untuk yang sudah nikah)</li>
                                <li>KTP 2 Saksi</li>
                                <li>Dokumen Keimigrasian</li>
                                <li>Keterangan Izin Tinggal Terbatas (jika ada)</li>
                                <li>Keterangan Izin Tinggal Tetap (jika ada)</li>
                            </ol>
                        </div>

                        <div class="p-button text-center row">
                            <span id="upload-wni" class="hide">
                                <a href="#" class="btn hide" data-js-show-step="uploadSteps:3" 
                                   id="wni-rs">Lanjut</a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:3" data-js-show-step="uploadSteps:4" id="wni-kk">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:4" data-js-show-step="uploadSteps:5" id="wni-ktp">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:5" data-js-show-step="uploadSteps:6" id="wni-saksi">Lanjut </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:6" data-js-show-step="uploadSteps:7" id="wni-akta-lahir">Lanjut  </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:7" data-js-show-step="uploadSteps:8" id="wni-akta-nikah">Lanjut  </a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:11" data-js-show-step="uploadSteps:12" id="wni-finish">Lanjut </a>
                            </span>
                            <span id="upload-wna" class="hide">
                                <a href="#" class="btn hide" data-js-show-step="uploadSteps:3" 
                                   id="wna-rs">Lanjut </a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:5" data-js-show-step="uploadSteps:6" id="wna-saksi">Lanjut  </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:6" data-js-show-step="uploadSteps:7" id="wna-akta-lahir">Lanjut  </a> 
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:7" data-js-show-step="uploadSteps:8" id="wna-akta-nikah">Lanjut  </a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:8" data-js-show-step="uploadSteps:9" id="wna-visa">Lanjut </a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:9" data-js-show-step="uploadSteps:10" id="wna-kitas">Lanjut </a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:10" data-js-show-step="uploadSteps:11" id="wna-kitap">Lanjut </a>
                                <a href="#" class="btn hide" data-js-show-step-force="uploadSteps:11" data-js-show-step="uploadSteps:12" id="wna-finish">Lanjut </a>
                            </span>
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="ketKematianBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Surat Keterangan Kematian </span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fKK">Surat Keterangan Kematian dari RS / Desa / Kelurahan</label> 
                                    <input id="fRS" data-rule-filesize="760KB" required
                                           name="fRS" type="file" placeholder="select file..."
                                           onchange="document.getElementById('fKK-fake').value = this.value;"/>

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
                            <a href="#" class="btn" onclick="UploadSingleImage('rs')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>
                    <input type="hidden" id="status-wni">
                    <div data-js-block="kkBlock" class="collapse" >
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Kartu Keluarga Orang Tua Bayi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fKK">Upload Kartu Kelurga</label> 
                                    <input id="fKK" data-rule-filesize="760KB" required
                                           name="fKK" type="file" placeholder="select file..."
                                           onchange="document.getElementById('fKK-fake').value = this.value;" />

                                    <div class="input-group p-has-icon">
                                        <input id="fKK-fake" class="form-control" type="text"
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
                            <a href="#" class="btn" onclick="UploadSingleImage('kk')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="ktpBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload KTP Almarhum</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="conrol-label" for="fKTPAy">KTP Almarhum</label> 
                                    <input
                                        id="fKTP" required name="fKTPAy"
                                        type="file" placeholder="select file..."
                                        onchange="document.getElementById('fKTPAy-fake').value = this.value;" />
                                    <div class="input-group p-has-icon">
                                        <input id="fKTPAy-fake" class="form-control" type="text"
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
                            <a href="#" class="btn" onclick="UploadSingleImage('ktp')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="ktpSaksiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload KTP 2 Orang Saksi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="form-group col-md-6">
                            <div class="p-file-wrap">
                                <label class="control-label" for="fKTPSaksi1">KTP Saksi 1</label> 
                                <input	id="fKTPSaksi1" name="fKTPSaksi1" type="file"
                                       placeholder="select file..." data-rule-filesize="760KB" required
                                       onchange="document.getElementById('fKTPSaksi1-fake').value = this.value;" />
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
                                <input	id="fKTPSaksi2" name="fKTPSaksi2" type="file"
                                       placeholder="select file..." data-rule-filesize="760KB" required
                                       onchange="document.getElementById('fKTPSaksi2-fake').value = this.value;" />
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
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="aktaLahirBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Akta Kelahiran</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fAktaNikah">Akta Kelahiran</label>
                                    <input id="fAktaLahir" name="fAktaNikah" type="file"
                                           placeholder="select file..." data-rule-filesize="760KB" required
                                           onchange="document.getElementById('fAktaNikah-fake').value = this.value;" />
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
                            <a href="#" class="btn" onclick="UploadSingleImage('akta-lahir')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="aktaNikahBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Akta Nikah</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 400px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fAktaNikah">Akta Nikah</label>
                                    <input id="fAktaNikah" name="fAktaNikah" type="file"
                                           placeholder="select file..." data-rule-filesize="760KB" required
                                           onchange="document.getElementById('fAktaNikah-fake').value = this.value;" />
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
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="imigrasiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Dokumen Keimigrasian</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="row panel panel-default">
                            <div class="col-md-6 form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" >Visa</label> 
                                    <input id="fVisa" name="fVisa" type="file"
                                           placeholder="select file..." data-rule-filesize="760KB" required
                                           onchange="document.getElementById('fVs-fake').value = this.value;" />
                                    <div class="input-group p-has-icon">
                                        <input id="fVs-fake" class="form-control" type="text"
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
                            <div class="col-md-6 form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" >Paspor</label> 
                                    <input id="fPaspor" name="fPaspor" type="file"
                                           placeholder="select file..." data-rule-filesize="760KB" required
                                           onchange="document.getElementById('fPs-fake').value = this.value;" />
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
                            <a href="#" class="btn" onclick="UploadDoubleImage('visa')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                        </a> <a class="btn" href="<?php echo base_url(); ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar
                    </a>
                </div>
            </div>

            <div data-js-block="kitasBlock" class="collapse">
                <!-- Start: subtitle -->
                <div class="p-subtitle">
                    <span class="p-title-side">Upload Keterangan Izin Tinggal Sementara</span>
                </div>
                <!-- End: subtitle -->

                <div class="panel panel-default" style="width: 450px; margin: auto">
                    <div class="form-group">
                        <div class="p-file-wrap">
                            <label class="control-label" for="fitt">Izin Tinggal Sementara</label> 
                            <input id="fKitas" data-rule-filesize="760KB" required
                                   name="fKitas" type="file" placeholder="select file..."
                                   onchange="document.getElementById('fits-fake').value = this.value;"/>
                            <div class="input-group p-has-icon">
                                <input id="fits-fake" class="form-control" type="text"
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
                    <a href="#" class="btn" onclick="UploadSingleImage('kitas')">
                        <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>    
                    <a class="btn" href="<?php echo base_url(); ?>">
                        <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                </div>
            </div>

            <div data-js-block="kitapBlock" class="collapse">
                <!-- Start: subtitle -->
                <div class="p-subtitle">
                    <span class="p-title-side">Upload Keterangan Izin Tinggal Tetap</span>
                </div>
                <!-- End: subtitle -->

                <div class="panel panel-default" style="width: 450px; margin: auto">
                    <div class="form-group">
                        <div class="p-file-wrap">
                            <label class="control-label" for="fitt">Izin Tinggal Tetap</label> 
                            <input id="fKitap" data-rule-filesize="760KB" required
                                   name="fKitap" type="file" placeholder="select file..."
                                   onchange="document.getElementById('fitt-fake').value = this.value;"/>
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
                    <a href="#" class="btn" onclick="UploadSingleImage('kitap')">
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
                    Persyratan Pendaftaran pembuatan Akta Kematian sudah lengkap. TErimakasih
                </div>

                <br/>
                <br/>
                <div class="p-button text-center row">

                    <a class="btn" href="<?php echo base_url(); ?>">
                        <i class="fa fa-check fa-3x"></i>&nbsp;Selesai</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.forms['formUpload'].reset();
    });
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
<script src="<?php echo base_url() ?>resources/myjs/kematian_upload.js"></script>
</body>
</html>
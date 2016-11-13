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
        <!--animation-->
        <link href="<?php echo base_url() ?>resources/css/animation.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url() ?>resources/css/jquery-ui/core.css" rel="stylesheet" type="text/css">

        <!-- Autocomplete -->
        <link href="<?php echo base_url() ?>resources/css/jquery-ui/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>resources/css/jquery-ui/autocomplete.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>resources/css/form/forms-plus.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url() ?>resources/css/form/color/forms-plus-olive.css" rel="stylesheet" type="text/css">

        <!-- SCRIPTS JQuery-->
        <script src="<?php echo base_url() ?>resources/js/jquery/v1/jquery.min.js"></script>
        <!-- SCRIPTS bikinan SENDIRI-->
        <script src="<?php echo base_url() ?>resources/js/main.js"></script>

        <title>Upload Persyaratan</title>
    </head>
    <body>
            <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo "$branding"; ?>
        <div id="contentArea" class="container-fluid">
            <div class="loading">Loading&#8230;</div>
            <form id="formUploadKK" action="#" method="post" class="spaced-p-form p-form-spaced-olive form-inline" 
                  novalidate="novalidate"	data-js-validate="true" data-js-highlight-state-msg="true" 
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align:center; ">
                        Upload Persyaratan Pendaftaran Kartu Keluarga&nbsp;&nbsp;<i
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
                            <li data-js-step="aktaNikahBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">3</span>
                                </span>
                            </li>
                            <li data-js-step="skpdBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">4</span>
                                </span>
                            </li>

                            <li data-js-step="skpdLNBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">5</span>
                                </span>
                            </li>
                            <li data-js-step="kitapBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">6</span>
                                </span>
                            </li>
                            <li data-js-step="selesaiBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">7</span>
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
                                <label class="control-label"  style="font-size: 16px;width: 186px">
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
                            <a href="#" class="btn hide" id="go-step2"
                               data-js-show-step="uploadSteps:2">Lanjut 
                            </a> 
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
                            <b>Persyaratan-Persyaratan yang diperlukan untuk Pembuatan Kartu keluarga Baru adalah sebagai berikut :</b>
                            <br/>
                            <br/>
                            <ol style="list-style-type: circle;">
                                <li>Akta Nikah (untuk yang sudah nikah)</li>
                                <li>Keterangan Izin Tinggal Tetap (untuk orang asing)</li>
                                <li>Kartu Keluarga</li>
                                <li>Surat Keterangan Pindah Datang (untuk yang pindah dari Dalam Negeri)</li>
                                <li>Surat Keterangan Datang dari LuarNegeri (untuk yang pindah dari luar Negeri)</li>
                            </ol>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-center row">

                            <a href="#" class="btn hide" id="step2-step3"
                               data-js-show-step="uploadSteps:3">Lanjut
                            </a> 
                            <a href="#" class="btn hide" id="step2-step4"
                               data-js-show-step="uploadSteps:4" data-js-show-step-force="registrationSteps:3">Lanjut
                            </a>
                            <a href="#" class="btn hide" id="step2-step5"
                               data-js-show-step="uploadSteps:5" data-js-show-step-force="registrationSteps:4">Lanjut
                            </a>
                            <a href="#" class="btn hide" id="step2-step6"
                               data-js-show-step="uploadSteps:6" data-js-show-step-force="registrationSteps:5">Lanjut
                            </a>
                            <a href="#" class="btn hide" id="step2-step7"
                               data-js-show-step="uploadSteps:7" data-js-show-step-force="registrationSteps:6">Lanjut
                            </a>
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar
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
                                    <label class="control-label">Upload Akta Nikah</label> 
                                    <input id="fAktaNikah"
                                           name="fAktaNikah" type="file" placeholder="select file..." accept="image/*"
                                           onchange="document.getElementById('fan-fake').value = this.value;"
                                           required />

                                    <div class="input-group p-has-icon">
                                        <input id="fan-fake" class="form-control" type="text"
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
                            <a href="#" class="btn" onclick="UploadSingleImage('akta-nikah')">Lanjut </a> 
                            <a href="#" class="btn hide" id="go-step4"
                               data-js-show-step="uploadSteps:4">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="skpdBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Surat Keterangan Pindah Datang (Dalam Negeri)</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label">Surat Keterangan Pindah Datang</label> 
                                    <input
                                        id="fSKPD" name="fSKPD" type="file"
                                        placeholder="select file..."  accept="image/*"
                                        onchange="document.getElementById('fskpd-fake').value = this.value;" />
                                    <div class="input-group p-has-icon">
                                        <input id="fskpd-fake" class="form-control" type="text"
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

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a href="#" class="btn" onclick="UploadSingleImage('dalam-negri')">
                                <i class="glyphicon glyphicon-upload"></i>Upload </a>
                            <a href="#" class="btn" id="go-step5"
                               data-js-show-step="uploadSteps:5"></i>&nbsp;Abaikan</a>
                            <a href="#" class="btn hide" id="go-step5"
                               data-js-show-step="uploadSteps:5">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="skpdLNBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Surat Keterangan Pindah Datang (Dari Luar-Negeri)</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label">Surat Keterangan Pindah Datang (dari Luar Negeri)</label> 
                                    <input id="fSKPDLN"
                                           name="fSKPDLN" type="file" placeholder="select file..."  accept="image/*"
                                           onchange="document.getElementById('fskpdln-fake').value = this.value;"
                                           required="required" />
                                    <div class="input-group p-has-icon">
                                        <input id="fskpdln-fake" class="form-control" type="text"
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
                            <a href="#" class="btn" onclick="UploadSingleImage('luar-negri')">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a> 
                            <a href="#" class="btn hide" id="abaikan-wna" data-js-show-step="uploadSteps:6">
                                Abaikan
                            </a>
                            <a href="#" class="btn hide" id="abaikan-wni" data-js-show-step="uploadSteps:7" 
                               data-js-show-step-force="registrationSteps:6">
                                Abaikan
                            </a>
                            <a href="#" class="btn hide" id="go-step6" data-js-show-step="uploadSteps:6">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>  
                            <a href="#" class="btn hide" id="skip-step6" data-js-show-step="uploadSteps:7" 
                               data-js-show-step-force="registrationSteps:6">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                            </a>  
                            <a class="btn" href="<?php echo base_url() ?>"> <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="kitapBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Upload Keterangan Izin Tinggal Tetap</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: auto">
                            <div class="form-group">
                                <div class="p-file-wrap">
                                    <label class="control-label" for="fitt">Izin Tinggal Tetap</label> 
                                    <input id="fIzinTT"
                                           name="fIzinTT" type="file" placeholder="select file..." accept="image/*"
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
                            <a href="#" class="btn" onclick="UploadSingleImage('kitap')">Lanjut </a> 
                            <a href="#" class="btn hide" id="go-step7"
                               data-js-show-step="uploadSteps:7">
                                <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>  
                            <a class="btn" href="<?php echo base_url() ?>">
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
                            Persyratan Pembuatan Kartu Keluarga Baru sudah lengkap. TErimakasih
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-check fa-3x"></i>&nbsp;Selesai</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <input type="hidden" id="status-penduduk" value="">
        <script type="text/javascript">
            /**
             *	Nama-Nama attribute yang ada dihalaman ini :
             *	noReg,
             *	fAktaNikah
             *	fSKPD
             *	fSKPDLN
             *	fIzinTT   -->Izin Tinggal Tetap / KITAP
             *
             *
             *
             **/
            var baseUrl = "<?php echo base_url(); ?>";

            $(document).ready(function () {
                document.forms['formUploadKK'].reset();
            });
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
        <script src="<?php echo base_url() ?>resources/myjs/kk_upload.js"></script>

    </body>
</html>
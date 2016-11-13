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

        <link href="<?php echo base_url() ?>resources/css/tsf/gsi-step-indicator.css" rel="stylesheet" type="text/css">
        <!--animation-->
        <link href="<?php echo base_url() ?>resources/css/animation.css" rel="stylesheet" type="text/css">


        <!-- SCRIPTS JQuery-->
        <script src="<?php echo base_url() ?>resources/js/jquery/v1/jquery.js"></script>
        <!-- SCRIPTS bikinan SENDIRI-->
        <script src="<?php echo base_url() ?>resources/js/main.js"></script>

        <title>Monitoring Status Layanan</title>

    </head>
    <body>
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo $branding; ?>
        <div id="contentArea" class="container-fluid">
            <div class="loading">Loading&#8230;</div>
            <form id="formMonitoring" action="#" method="post"
                  class="spaced-p-form p-form-spaced-olive form-inline"
                  novalidate="novalidate" data-js-validate="true"
                  data-js-highlight-state-msg="true" data-js-show-valid-msg="true">

                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align:center; ">
                        Monitoring Layanan Kartu Keluarga&nbsp;&nbsp;<i
                            class="fa fa-pencil-square-o"></i>
                    </div>
                    <!-- End: title -->

                    <div class="p-form-steps-wrap p-steps-icons" >
                        <ul class="p-form-steps" data-js-stepper="monitoringSteps">
                            <li class="active" data-js-step="informasiBlock" style="display:none">
                                <span class="p-step"> 
                                    <span class="p-step-text">Informasi</span>
                                </span>
                            </li>
                            <li data-js-step="monitoringBlock" style="display: none">
                                <span class="p-step"> 
                                    <span class="p-step-text">Monitoring Layanan</span>
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div data-js-block="informasiBlock">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Informasi</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel-informasi">
                            <b>Dengan memasukkan noRegistrasi layanan yang pernah anda dapatkan, anda bisa mengetahui progress dari layanan yang anda minta.</b>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a href="#" class="btn" 
                               data-js-show-step="monitoringSteps:2">Lanjut </a> 
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="monitoringBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Monitoring Layanan</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 600px; margin: 0 auto">
                            <div class="form-group">
                                <label style="width: 145px; text-align: right" class="control-label" 
                                       for="noReg">No. Registrasi :</label> 
                                <div class="input-group" style="width:400px">
                                    <input class="form-control"  id="noReg" name="noKK" type="text">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-btn">
                                        <!--                                <a style="font-size: 16px;text-decoration: underline;background-color: orange"  href=# onclick="cekNoKK()">cek no kk</a> -->

                                        <button type="button" class="btn" 
                                                onclick="cekNoReg(document.getElementById('noReg').value);">
                                            Cek
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>


                        <!-- BEGIN STEP INDICATOR-->
                        <div id="progressIndicatorPanel" class="hide" >
                            <ul class="yus-step-indicator yusuf-style  gsi-transition">
                                <li data-target="step-1"><a href="#0"> <span
                                            class="number">1</span> <span class="desc"> <label>Ter-Registrasi</label>
                                        </span>
                                    </a></li>
                                <li data-target="step-2"><a href="#0"> <span
                                            class="number">2</span> <span class="desc"> <label>Kelurahan</label>
                                        </span>
                                    </a></li>
                                <li data-target="step-3"><a href="#0"> <span
                                            class="number"> 3 </span> <span class="desc"> <label>Kecamatan</label>
                                        </span>
                                    </a></li>
                                <li data-target="step-4"><a href="#0"> <span
                                            class="number"> 4 </span> <span class="desc"> <label>Dispenduk</label>
                                        </span>
                                    </a></li>
                                <li data-target="step-5"><a href="#0"> <span
                                            class="number"> 5 </span> <span class="desc"> <label>Sudah
                                                Selesai</label>
                                        </span>
                                    </a></li>
                            </ul>
                             <!-- END STEP INDICATOR -->
                            <div id="descStep1">
                                <h4>Keterangan</h4>
                                <ul>
                                    <div  id="status-1" class="hide">
                                        <li>Anda sudah berhasil registrasi. Namun, ada persyaratan 
                                            yang belum anda lengkapi. Silakan upload persayaratan 
                                            yang belum anda lengkapi
                                        </li>
                                    </div>
                                    <div  id="status-2" class="hide">
                                        <li>Permohonan anda sedang diproses di kelurahan. 
                                        </li>
                                        <li class="msg-from-kelurahan">
                                            <span class="memo-header">Memo : </span><br>
                                            <span>Mohon anda datang ke Kelurahan agar permohonan anda bisa diproses lebih lanjut.</span>
                                        </li>
                                    </div>
                                    <div  id="status-3" class="hide">
                                        <li>Permohonan anda sedang diproses di Kecamatan. 
                                        </li>
                                        <li class="msg-from-kelurahan">
                                            <span class="memo-header">Memo : </span><br>
                                            <span>Mohon anda datang ke Kecamatan agar permohonan anda bisa diproses lebih lanjut.</span><br>
                                            <span id="memo-3"></span>
                                        </li>
                                    </div>
                                    <div  id="status-4" class="hide">
                                        <li>Permohonan anda sedang diproses di Dispenduk. 
                                        </li>
                                        <li class="msg-from-kelurahan">
                                            <span class="memo-header">Memo : </span><br>
                                            <span>Mohon anda datang ke Dispenduk agar permohonan anda bisa diproses lebih lanjut.</span><br>
                                            <span id="memo-4"></span>
                                        </li>
                                    </div>
                                    <div  id="status-5" class="hide">
                                        <li>Permohonan anda Sudah Complete
                                        </li>
                                        <li class="msg-from-kelurahan">
                                            <span class="memo-header">Memo : </span><br>
                                            <span>Permohonan anda telah selesai di proses.</span><br>
                                            <span id="memo-5">Complete boss</span>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </div>


                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a class="btn" href="<?php echo base_url() ?>">
                                <i class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>


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

        <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('.loading').hide();
                                                    });
                                                    var isRegistered = true;
                                                    var baseUrl = "<?php echo base_url(); ?>";
                                                    function cekNoReg(noReg) {
//                                                        console.log(noReg);
                                                        var request = {
                                                            action: "kelahiran",
                                                            noReg: noReg
                                                        }
                                                        $.ajax({
                                                            type: 'GET',
                                                            data: {request: JSON.stringify(request)},
                                                            dataType: 'JSON',
                                                            url: baseUrl + "monitoring/C_monitoring/cekRegKtp",
                                                            beforeSend: function (xhr) {
                                                                $('li[data-target="step-1"]').removeClass('current');
                                                                $('li[data-target="step-2"]').removeClass('current');
                                                                $('li[data-target="step-4"]').removeClass('current');
                                                                $('li[data-target="step-5"]').removeClass('current');
                                                                $('li[data-target="step-3"]').removeClass('current');
                                                                $("#progressIndicatorPanel").addClass('hide');
                                                                $('div[id^=status]').addClass("hide");
                                                                $('.loading').show();
                                                            },
                                                            success: function (response, textStatus, jqXHR) {
                                                                var nomer = response.lastMemo;
                                                                if (nomer != 0) {
                                                                    $('li[data-target="step-' + nomer + '"]').addClass('current');
                                                                    $("#progressIndicatorPanel").removeClass('hide');
                                                                    $('#status-' + nomer).removeClass("hide");
                                                                    $('#memo-' + nomer).html(response.memo)
                                                                } else {
                                                                    alert("Nomer Regstrasi Tidak ada");
                                                                }

                                                            },
                                                            complete: function (jqXHR, textStatus) {
                                                                $('.loading').hide();
                                                            }
                                                        });
                                                    }

                                                    $(document).ready(function () {
                                                        document.forms['formMonitoring'].reset();
                                                    })
        </script>
    </body>
</html>
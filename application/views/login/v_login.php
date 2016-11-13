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


        <!-- STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/main.css">

        <link href="<?php echo base_url() ?>resources/css/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/bootstrap/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/bootstrap-select/bootstrap-select.min.css">


        <link href="<?php echo base_url() ?>resources/css/jquery-ui/core.css" rel="stylesheet" type="text/css">

        <!-- Autocomplete -->
        <link href="<?php echo base_url() ?>resources/css/jquery-ui/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>resources/css/jquery-ui/autocomplete.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>resources/css/form/forms-plus.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url() ?>resources/css/form/color/forms-plus-olive.css" rel="stylesheet" type="text/css">


        <!-- SCRIPTS JQuery-->
        <script src="<?php echo base_url() ?>resources/js/jquery/v1/jquery.min.js"></script>
        <!-- BOOTSTRAP -->
        <script src="<?php echo base_url() ?>resources/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>resources/js/bootstrap-select/bootstrap-select.js"></script>

        <!-- SCRIPTS bikinan SENDIRI-->
        <script src="<?php echo base_url() ?>resources/js/main.js"></script>

        <title>Registrasi</title>
    </head>
    <body>
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo $branding;?>
        <div id="contentArea" class="container-fluid">
            <!-- Start: spaced skin - Login -->
            <form method="post" class="spaced-p-form p-form-spaced-olive form-inline"
                  action="#" data-js-validate="true" data-js-highlight-state-msg="true"
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center">
                        Login&nbsp;&nbsp;<i class="fa fa-sign-in"></i>
                    </div>
                    <!-- End: title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <!-- Start: subtitle -->
                                <div class="p-subtitle p-no-offs">
                                    <span class="p-title-side">or login</span>
                                </div>
                                <!-- End: subtitle -->
                                <!-- Start: login <input:text> -->
                                <div class="form-group">
                                    <label for="login" class="p-label-required">Login</label>
                                    <div class="input-group p-has-icon">
                                        <input type="text" id="login" name="login" placeholder="Login" required="required" class="form-control" >
                                        <span class="input-group-state">
                                            <span class="p-position">
                                                <span class="p-text">
                                                    <span class="p-required-text"><i class="fa fa-star"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="p-field-cb"></span>
                                        <span class="input-group-icon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                                <!-- End: login <input:text> -->
                                <!-- Start: password <input:password> -->
                                <div class="form-group">
                                    <label for="password" class="p-label-required">Password</label>
                                    <div class="input-group p-has-icon">
                                        <input type="password" id="password" name="password" placeholder="Password" 
                                               required="required" minlength="6" maxlength="10" 
                                               data-msg-minlength="Password should have at least 6 characters" 
                                               data-msg-maxlength="Password should have max 10 characters" 
                                               class="form-control" />
                                        <span class="input-group-state">
                                            <span class="p-position">
                                                <span class="p-text">
                                                    <span class="p-required-text"><i class="fa fa-star"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="p-field-cb"></span>
                                        <span class="input-group-icon"><i class="fa fa-lock"></i></span>
                                    </div>
                                </div>
                                <!-- End: password <input:password> -->
                                <p>
                                    <a class="p-colored-link" href="#">Forgot password?</a>
                                </p>
                                <div class="clearfix"></div>
                                <!-- Start: keepLogged <checkbox> -->
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="keep-logged" name="keepLogged" />
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Keep me logged in</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- End: keepLogged <checkbox> -->
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn" type="submit" name="confirm">
                            <i class="fa fa-sign-in"></i>&nbsp;login
                        </button>
                    </div>
                </div>
            </form>
            <!-- End: spaced skin - Login -->
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
    </body>
</html>
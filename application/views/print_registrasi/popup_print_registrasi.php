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

        <title>Registrasi KTP</title>


    </head>

    <body onload="window.print(); window.close();">
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <div id="contentArea" class="container-fluid">
            <!--<button type="button" class="btn" onclick='window.open("print", "_blank", "width=500,height=500");'><i class="fa fa-print"></i>&nbsp;Print</button>-->
            <form id="fRegKtpBaru" action="#" method="post" class="spaced-p-form p-form-spaced-olive form-inline" 
                  novalidate="novalidate"	data-js-validate="true" data-js-highlight-state-msg="true" 
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align:center; ">
                        Nomer Registrasi :
                        <span><?php echo $noReg;?></span>
                    </div>
                </div>

            </form>
            &nbsp;
        </div>
    </body>
</html>
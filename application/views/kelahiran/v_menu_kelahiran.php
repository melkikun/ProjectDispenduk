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

        <script src="<?php echo base_url() ?>resources/js/main.js"></script>

        <title>Menu Kelahiran</title>
    </head>
    <body>
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo $branding; ?>
        <div id="contentArea">
            <div class="row">
                <div class="col-md-12">
                    <header class="content-header">Menu Layanan Kelahiran</header>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-md-offset-3 panel-button-besar" >
                    <a href="<?php echo base_url(); ?>kelahiran/registrasi">
                        <i class="fa fa-registered"></i>
                        <span class="main-icon-text">Registrasi</span>
                        <span class="main-icon-text">Kelahiran</span>
                    </a>
                </div>

                <div class="col-md-2 panel-button-besar" >
                    <a href="<?php echo base_url(); ?>kelahiran/upload">
                        <i class="fa fa-cloud-upload"></i>
                        <span class="main-icon-text">Upload</span>
                        <span class="main-icon-text">Document</span>
                    </a>
                </div>

                <div class="col-md-2 panel-button-besar" >
                    <a href="<?php echo base_url(); ?>kelahiran/monitor">
                        <img id="iconMonitoring" src="<?php echo base_url() ?>resources/img/monitoring112.png" />
                        <span class="main-icon-text">Monitoring</span>
                    </a>
                </div>

            </div>

        </div>
    </body>
</html>
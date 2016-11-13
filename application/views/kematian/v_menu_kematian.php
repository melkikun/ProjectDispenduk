<!--<%@ page language="java" contentType="text/html; charset=UTF-8"
pageEncoding="UTF-8"%>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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

        <script src="<?php echo base_url(); ?>resources/js/main.js"></script>

        <title>Menu Kematian</title>
    </head>
    <body>
        <!--<%@include file="/pages/include/branding.jsp" %>-->
        <?php echo $branding; ?>
        <div id="contentArea">
            <div class="row">
                <div class="col-md-12">
                    <header class="content-header">Menu Layanan Kematian</header>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-md-offset-3 panel-button-besar" >
                    <a href="<?php echo base_url(); ?>kematian/registrasi">
                        <i class="fa fa-registered"></i>
                        <span class="main-icon-text" style="font-size: 17px;">Registrasi</span>
                        <span class="main-icon-text" style="font-size: 17px;">Kematian</span>
                    </a>
                </div>

                <div class="col-md-2 panel-button-besar" >
                    <a href="<?php echo base_url(); ?>kematian/upload">
                        <i class="fa fa-cloud-upload"></i>
                        <span class="main-icon-text">Upload</span>
                        <span class="main-icon-text">Document</span>
                    </a>
                </div>

                <div class="col-md-2 panel-button-besar" >
                    <a href="<?php echo base_url(); ?>kematian/monitor">
                        <img id="iconMonitoring" src="<?php echo base_url(); ?>resources/img/monitoring112.png" />
                        <span class="main-icon-text">Monitoring</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
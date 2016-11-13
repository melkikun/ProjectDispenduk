<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="stylesheet" type="text/css" href="/ProjectDispenduk/resources/css/normalize.css"></link>
        <link rel="stylesheet" type="text/css" href="/ProjectDispenduk/resources/css/bootstrap/bootstrap.css"></link>
        <link  rel="stylesheet" type="text/css" href="/ProjectDispenduk/resources/css/font-awesome/font-awesome.css">

        <link rel="stylesheet" type="text/css" href="resources/css/main.css"/>
        <script type="text/javascript" src="resources/js/main.js"></script>

        <title>DISPENDUK GRESIK</title>

    </head>
    <body onresize="bodyResizePerformed()">
        <?php echo "$branding"; ?>
        <div id="contentArea">
            <div class="row">
                <div class="col-md-12">
                    <header class="content-header">Menu Layanan Publik</header>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2 col-md-offset-2 panel-button-besar" >
                    <img id="iconKelahiran" src="resources/img/baby112.png"></img>
                    <span	class="main-icon-text">Layanan Kelahiran</span>
                    <button class="button-primary button-pendaftaran"
                            id="buttonPendaftaranKelahiran"
                            onclick="window.location.href = '<?php echo base_url();?>kelahiran'">
                        <!-- 					onclick="window.location.href='pages/kelahiran/registration.jsp'"> -->
                        Selengkapnya</button>
                </div>

                <div class="col-md-2 panel-button-besar">
                    <img id="iconKematian" src="resources/img/kematian112.png" /> 
                    <span	class="main-icon-text" >Layanan Kematian</span>
                    <button class="button-primary button-pendaftaran"
                            id="buttonPendaftaranKematian" onclick="window.location.href = '<?php echo base_url();?>kematian'">
                        Selengkapnya</button>
                </div>
                <div class="col-md-2 panel-button-besar">
                    <img id="iconKTP" src="resources/img/ktp-laki112.png" /> 
                    <span	class="main-icon-text">Layanan KTP</span>
                    <button class="button-primary button-pendaftaran"
                            id="buttonPendaftaranKTP" onclick="window.location.href = '<?php echo base_url();?>ktp'">
                        Selengkapnya</button>
                </div>
                <div class="col-md-2 panel-button-besar">
                    <img id="iconKK" src="resources/img/kk112.png" />  
                    <span class="main-icon-text">Layanan KK</span>
                    <button class="button-primary button-pendaftaran"
                            id="buttonPendaftaranKK" onclick="window.location.href = '<?php echo base_url();?>kk'">
                        Selengkapnya</button>
                </div>
                <div class="col-md-2">&nbsp;</div>
            </div>

        </div>

        <div id="panelPerhatian">
            <span style="color: red; font-size: 22px; font-weight: 200">Perhatian !!!</span>
            <br/>
            <span style="font-weight: 500">Barang siapa dengan sengaja melakukan pemalsuan identitas diri atau dokumen terhadap instansi pelaksana,</span>
            <br/>
            <span style="font-weight: 500">maka dapat terancam hukuman pidana 6 tahun atau denda sebesar 50 juta Rupiah"</span>
            <br/>
            <span style="font-weight: 500">Undang-Undang No.23 Tahun 2006 Bab 12</span>
        </div>
    </body>
</html>

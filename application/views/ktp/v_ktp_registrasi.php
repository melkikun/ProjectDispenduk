
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

    <body>
        <?php echo "$branding"; ?>
        <div id="contentArea" class="container-fluid">
            <!--<button type="button" class="btn" onclick='window.open("print", "_blank", "width=500,height=500");'><i class="fa fa-print"></i>&nbsp;Print</button>-->
            <div class="loading">Loading&#8230;</div>
            <form id="fRegKtpBaru" action="#" method="post" class="spaced-p-form p-form-spaced-olive form-inline" 
                  novalidate="novalidate"	data-js-validate="true" data-js-highlight-state-msg="true" 
                  data-js-show-valid-msg="true">
                <div class="p-form p-shadowed p-form-md p-form-sm">
                    <!-- Start: title -->
                    <div class="p-title text-center" style="text-align:center; ">
                        Pendaftaran KTP Baru&nbsp;&nbsp;<i
                            class="fa fa-pencil-square-o"></i>
                    </div>
                    <!-- End: title -->

                    <div class="p-form-steps-wrap p-steps-icons" >
                        <ul class="p-form-steps" data-js-stepper="registrationSteps">
                            <li class="active" data-js-step="jenisPendudukBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">1</span>
                                </span>
                            </li>
                            <li data-js-step="informasiBlock" style="display: none">
                                <span class="p-step"> 
                                    <span class="p-step-text">2</span>
                                </span>
                            </li>

                            <li data-js-step="kitapBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">3</span>
                                </span>
                            </li>
                            <li data-js-step="pemohonBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">4</span>
                                </span>
                            </li>
                            <!-- 						<li data-js-step="kkBlock" style="display: none"> -->
                            <!-- 							<span class="p-step"> -->
                            <!-- 								<span class="p-step-text">5</span> -->
                            <!-- 							</span> -->
                            <!-- 						</li> -->
                            <!-- 						<li data-js-step="districtBlock" style="display: none"> -->
                            <!-- 							<span class="p-step"> -->
                            <!-- 								<span class="p-step-text">5</span> -->
                            <!-- 							</span> -->
                            <!-- 						</li> -->
                            <li data-js-step="selesaiBlock" style="display: none">
                                <span class="p-step">
                                    <span class="p-step-text">6</span>
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div data-js-block="jenisPendudukBlock" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Jenis Penduduk</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 400px; margin:auto;">
                            <div class="form-group">
                                <label for="jenisPenduduk" class="control-label">Jenis Penduduk</label>
                                <div class="p-form-cg pt-form-inline">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPenduduk" value="1" required="required" 
                                                   class="form-control" onclick="jenisPendudukOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Warga Negara Indonesia</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenisPenduduk" value="2" required="required" 
                                                   class="form-control" onclick="jenisPendudukOnClick(this)"/>
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Orang Asing</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="p-button text-right row">
                            <a href="#" class="btn" data-js-show-step="registrationSteps:2">
                                Lanjut
                            </a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="informasiBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Informasi Pembuatan KTP Baru</span>
                        </div>
                        <!-- End: subtitle -->

                        <div id="panelInformasiWni" class="panel-informasi" style="display:none">
                            <p>
                                Kartu Tanda Penduduk, yang selanjutnya disingkat KTP, adalah identitas resmi 
                                Penduduk sebagai bukti diri yang diterbitkan oleh Dinas Kependudukan dan 
                                Pencatatan Sipil yang berlaku di seluruh wilayah Negara Kesatuan Republik Indonesia
                            </p>

                            <b>Alur pendaftaran pembuatan KTP baru (secara online) bagi WNI, adalah sebagai berikut :</b>
                            <br/>
                            <ol> 
                                <li>Melakukan Registrasi / Pendaftaran, dengan cara mengikuti alur yang ada di halaman ini hingga selesai</li>
                                <li>Upload dokumen pendukung yang diperlukan
                                    <ol style="list-style-type: circle;">
                                        <li>Kartu Keluarga</li>
                                        <li>Akta Kelahiran</li>
                                        <li>Akta Nikah (untuk yang sudah nikah)</li>
                                        <li>Surat Keterangan Pindah (untuk yang pindah domisili)</li>
                                    </ol>
                                </li>
                                <li>Datang ke Kelurahan masing-masing untuk proses pengabSAHan</li>
                            </ol>
                            <br/>
                            <span class="memo-header">Catatan : &nbsp</span>
                            <span>layanan ini hanya bisa digunakan oleh warga yang sudah menikah atau sudah berusia >= 17thn</span>
                        </div>

                        <div id="panelInformasiAsing" class="panel-informasi" style="display:none">
                            <p>
                                Kartu Tanda Penduduk, yang selanjutnya disingkat KTP, adalah identitas resmi 
                                Penduduk sebagai bukti diri yang diterbitkan oleh Dinas Kependudukan dan 
                                Pencatatan Sipil yang berlaku di seluruh wilayah Negara Kesatuan Republik Indonesia
                            </p>

                            <b>Alur pendaftaran pembuatan KTP baru (secara online) bagi OrangAsing, adalah sebagai berikut :</b>
                            <br/>
                            <ol> 
                                <li>Melakukan Registrasi / Pendaftaran, dengan cara mengikuti alur yang ada di halaman ini hingga selesai</li>
                                <li>Upload dokumen pendukung yang diperlukan
                                    <ol style="list-style-type: circle;">
                                        <li>Akta Kelahiran</li>
                                        <li>Akta Nikah (untuk yang sudah nikah)</li>
                                        <li>Kartu Keluarga</li>
                                        <li>Paspor</li>
                                        <li>Surat Izin Tinggal Tetap</li>
                                        <li>Surat Keterangan Catatan Kepolisian</li>
                                    </ol>
                                </li>
                                <li>Datang ke Kelurahan masing-masing untuk proses pengabSAHan</li>
                            </ol>
                            <br/>
                            <span class="memo-header">Catatan : &nbsp</span>
                            <span>layanan ini hanya bisa digunakan oleh warga yang sudah menikah atau sudah berusia >= 17thn</span>
                        </div>


                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a id="btnInformasiLanjutAsing" href="#" class="btn collapse" data-js-show-step="registrationSteps:3">
                                Lanjut </a> 
                            <a id="btnInformasiLanjutWni" href="#" class="btn collapse" data-js-show-step-force="registrationSteps:4">
                                Lanjut </a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Keluar</a>
                        </div>
                    </div>

                    <div data-js-block="kitapBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Surat Keterangan Izin Tinggal Tetap (KITAP) untuk Orang Asing</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel panel-default" style="width: 450px; margin: 0 auto">
                            <div class="form-group ">
                                <label style="width: 115px; text-align: right" class="control-label p-label-required" 
                                       for="nokitap">No. KITAP :</label> 
                                <div class="input-group" style="width:300px">
                                    <input class="form-control"  id="nokitap" name="noKitap" type="text" required>
                                    <div class="p-field-cb"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="width: 115px; text-align: right; " class="control-label p-label-required" 
                                       for="endK">Tgl.Berakhir :</label>
                                <div class="input-group p-has-icon" style="width:200px">
                                    <input id="endK" class="form-control" name="tglAkhirKitap"
                                           placeholder="dd.mm.yyyy" data-js-datetimepick="true"
                                           data-date-format="DD.MMM.YYYY" type="text" required/> <span
                                           class="input-group-state"> <span class="p-position">
                                            <span class="p-text"> <span class="p-valid-text">
                                                    <i class="fa fa-check"></i>
                                                </span> <span class="p-error-text"> <i class="fa fa-times"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </span> <span class="p-field-cb"></span> <span class="input-group-icon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="p-button text-right row">
                            <a href="#" class="btn" onclick="CekKitap()">Lanjut</a>
                            <a href="#" class="btn hide" data-js-show-step="registrationSteps:4">
                                Lanjut</a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>

                    <div data-js-block="pemohonBlock" class="collapse" data-js-validation-block="">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Data Pemohon</span>
                        </div>
                        <!-- End: subtitle -->

                        <h3>Data Pemohon</h3>

                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="nik" class="control-label">NIK :</label>
                                <div class="input-group p-has-icon">
                                    <input id="nik" name="nikPemohon" 
                                           type="text" placeholder="nik" class="form-control">
                                    <div class="p-field-cb"></div>

                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                    <span class="input-group-btn" style="width:60px">
                                        <button type="button" class="btn" onclick="CekNikPemohon();">Cek-NIK</button>
                                    </span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="namP" class="control-label p-label-required">Nama Lengkap</label>
                                <div class="input-group p-has-icon">
                                    <input id="namP" name="namaPemohon" required="required" type="text" readonly=""
                                           placeholder="name" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="alPel" class="control-label p-label-required">Alamat</label>
                                <div class="input-group p-has-icon">
                                    <input id="alPel" name="alamatPemohon" required="required" readonly=""
                                           type="text" placeholder="alamat" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="propP">Propinsi</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="propP" class="selectpicker form-control" 
                                                name="propinsiPemohon" required  disabled=""
                                                data-live-search="true" title="pilih salah satu" onchange="ChangePropinsiPemohon(this);"> 

                                            <option class="p-select-default" value="35" selected="">JAWA TIMUR</option>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kabP">Kabupaten / Kota</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kabP" class="selectpicker form-control" 
                                                name="kabupatenPemohon" required  disabled=""
                                                data-live-search="true" title="pilih salah satu" onchange="ChangeKabupatenPemohon(this);">
                                            <option class="p-select-default" value="25" selected="">GRESIK</option>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kecP">Kecamatan</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kecP" class="selectpicker form-control"  disabled=""
                                                name="kecamatanPemohon" required 
                                                data-live-search="true" title="pilih salah satu"  onchange="ChangeKecamatanPemohon();">

                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                                                                        <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kecamatan as $value) {
                                                if ($value->NO_KEC == 1) {
                                                    echo "<option value='$value->NO_KEC' selected=''>$value->NAMA_KEC</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                                }
//                                                    echo "<option value='$value->NO_KEC'>$value->NAMA_KEC</option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group p-custom-arrow" style="width: 100%">
                                    <label class="control-label p-label-required" for="kelP">Kelurahan</label>
                                    <label class="input-group p-custom-arrow"> 
                                        <select	id="kelP" class="selectpicker form-control" 
                                                name="kelurahanPemohon"	required  disabled=""
                                                data-live-search="true" title="pilih salah satu">
                                            <!--                                            <option value="1">Tolong di auto generate!!!</option>
                                                                                        <option value="2">TErimakasih</option>-->
                                            <?php
                                            foreach ($kelurahan as $value) {
//                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                if ($value->NO_KEL == 2019) {
                                                    echo "<option value='$value->NO_KEL' selected=''>$value->NAMA_KEL</option>";
                                                } else {
                                                    echo "<option value='$value->NO_KEL'>$value->NAMA_KEL</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="p-field-cb"></div> 
                                        <span class="p-select-arrow">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="kdPos" class="control-label p-label-required">KodePos</label>
                                <div class="input-group p-has-icon">
                                    <input id="kdPos" name="kdPosPemohon" data-js-input-type="number"
                                           required type="text" placeholder="kode pos" readonly=""
                                           class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="rtAy" class="control-label p-label-required">RT</label>
                                <div class="input-group p-has-icon">
                                    <input id="rtAy" name="rtPemohon" data-js-input-type="number" readonly=""
                                           required type="number" placeholder="RT" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rwAy" class="control-label p-label-required">RW</label>
                                <div class="input-group p-has-icon">
                                    <input id="rwAy" name="rwPemohon" data-js-input-type="number" readonly=""
                                           required type="number" placeholder="RW" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-md-offset-1 ">
                                <label for="tlpAy" class="control-label p-label-required">Telepon</label>
                                <div class="input-group p-has-icon">
                                    <input id="tlpAy" name="tlpPemohon" required type="text" 
                                           placeholder="telepon" class="form-control">
                                    <div class="p-field-cb"></div>
                                    <span class="input-group-icon"> <i
                                            class="fa fa-pencil-square-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>


                        <br/> 
                        <br/>
                        <div class="p-button text-right row">
                            <a href="#" class="btn" onclick="Submit();">
                                Lanjut
                            </a> 
                            <a href="#" class="btn" data-js-show-step="registrationSteps:5" style="display: none;">
                                Lanjut
                            </a> 
                            <a class="btn" href="<?php echo base_url(); ?>"><i
                                    class="fa fa-ban"></i>&nbsp;Cancel</a>
                        </div>
                    </div>


                    <!-- 				<div data-js-block="districtBlock" class="collapse" > -->
                    <!-- 					Start: subtitle -->
                    <!-- 					<div class="p-subtitle"> -->
                    <!-- 						<span class="p-title-side">Wilayah Pelayanan</span> -->
                    <!-- 					</div> -->
                    <!-- 					End: subtitle -->

                    <!-- 					<div class="row"> -->
                    <!-- 						<div class="col-md-6"> -->
                    <!-- 							<div class="form-group p-custom-arrow" style="width: 100%"> -->
                    <!-- 								<label class="control-label p-label-required" >Propinsi</label> -->
                    <!-- 								<label class="input-group p-custom-arrow">  -->
                    <!-- 									<select	id="prop" class="selectpicker form-control"  -->
                    <!-- 											name="propinsi" required data-show-subtext="true">  -->

                    <!-- 										<option class="p-select-default" value="35">JAWA TIMUR</option> -->
                    <!-- 									</select> -->
                    <!-- 									<div class="p-field-cb"></div>  -->
                    <!-- 									<span class="p-select-arrow"> -->
                    <!-- 										<i class="fa fa-caret-down"></i> -->
                    <!-- 									</span> -->
                    <!-- 								</label> -->
                    <!-- 							</div> -->
                    <!-- 						</div> -->

                    <!-- 						<div class="col-md-6"> -->
                    <!-- 							<div class="form-group p-custom-arrow" style="width: 100%"> -->
                    <!-- 								<label class="control-label p-label-required">Kabupaten / Kota</label> -->
                    <!-- 								<label class="input-group p-custom-arrow">  -->
                    <!-- 									<select	id="kab" class="selectpicker form-control"  -->
                    <!-- 											name="kabupaten" required> -->
                    <!-- 										<option class="p-select-default" value="25">GRESIK</option> -->
                    <!-- 									</select> -->
                    <!-- 									<div class="p-field-cb"></div>  -->
                    <!-- 									<span class="p-select-arrow"> -->
                    <!-- 										<i class="fa fa-caret-down"></i> -->
                    <!-- 									</span> -->
                    <!-- 								</label> -->
                    <!-- 							</div> -->
                    <!-- 						</div> -->
                    <!-- 					</div> -->
                    <!-- 					<div class="row"> -->
                    <!-- 						<div class="col-md-6"> -->
                    <!-- 							<div class="form-group p-custom-arrow" style="width: 100%"> -->
                    <!-- 								<label class="control-label p-label-required">Kecamatan</label> -->
                    <!-- 								<label class="input-group p-custom-arrow">  -->
                    <!-- 									<select	id="kec" class="selectpicker form-control"  -->
                    <!-- 											name="kecamatan" required data-live-search="true">  -->

                    <!-- 										<option value="1">Tolong di auto generate!!!</option> -->
                    <!-- 										<option value="2">TErimakasih</option> -->

                    <!-- 									</select> -->
                    <!-- 									<div class="p-field-cb"></div>  -->
                    <!-- 									<span class="p-select-arrow"> -->
                    <!-- 										<i class="fa fa-caret-down"></i> -->
                    <!-- 									</span> -->
                    <!-- 								</label> -->
                    <!-- 							</div> -->
                    <!-- 						</div> -->

                    <!-- 						<div class="col-md-6"> -->
                    <!-- 							<div class="form-group p-custom-arrow" style="width: 100%"> -->
                    <!-- 								<label class="control-label p-label-required" >Kelurahan</label> -->
                    <!-- 								<label class="input-group p-custom-arrow">  -->
                    <!-- 									<select	id="kel" class="selectpicker form-control" name="kelurahan" -->
                    <!-- 											required data-live-search="true"> -->
                    <!-- 										<option value="1">Tolong di auto generate!!!</option> -->
                    <!-- 										<option value="2">TErimakasih</option> -->
                    <!-- 									</select> -->
                    <!-- 									<div class="p-field-cb"></div>  -->
                    <!-- 									<span class="p-select-arrow"> -->
                    <!-- 										<i class="fa fa-caret-down"></i> -->
                    <!-- 									</span> -->
                    <!-- 								</label> -->
                    <!-- 							</div> -->
                    <!-- 						</div> -->
                    <!-- 					</div> -->

                    <!-- 					<br/>  -->
                    <!-- 					<br/> -->
                    <!-- 					<div class="p-button text-right row"> -->
                    <!-- 							<a href="#" class="btn" data-js-show-step="registrationSteps:6"> -->
                    <!-- 								Lanjut</a>  -->
                    <!-- 							<a class="btn" href="<?php echo base_url(); ?>"><i -->
                    <!-- 								class="fa fa-ban"></i>&nbsp;Cancel</a> -->
                    <!-- 					</div>	 -->
                    <!-- 				</div> -->

                    <div data-js-block="selesaiBlock" class="collapse">
                        <!-- Start: subtitle -->
                        <div class="p-subtitle">
                            <span class="p-title-side">Selesai</span>
                        </div>
                        <!-- End: subtitle -->

                        <div class="panel-informasi" style="text-align: center;">
                            <p>"Terimakasih kami sampaikan 
                                <br/>atas Partisipasi warga dalam upaya penertiban administrasi kependudukan"<br/>	
                                "Pendaftaran layanan pembuatan KTP baru yang telah baru saja anda lakukan 
                                <br/> akan<b>segera</b> kami proses setelah anda meng-Upload 
                                <br/>seluruh dokumen persyaratan yang dibutuhkan"
                                <br/>
                                <br/>
                                "Segera Upload dokumen persyaratan yang dibutuhkan 
                                <br/>agar pendaftaran yang telah anda lakukan bisa segera kami proses"</p>

                        </div>

                        <div class="panel-informasi" style="margin: auto; width: 450px">
                            <h4 style="color: red; float: left;">No. Registrasi anda adalah : </h4>
                            <input id="noReg" name="noReg" class="noReg" value="" size=9 
                                   style="height: 40px" >
                            <br/>	
                            <br/>	
                            <h4>Nomor Registrasi anda akan terus digunakan hingga Akta Kelahiran selesai di kerjakan.</h4>
                            <h4>Jadi simpan dengan baik nomer registrasi anda.</h4>
                        </div>


                        <br/>
                        <br/>
                        <div class="p-button text-center row">
                            <a href="#" class="btn" onClick="PrintNomorRegistrasi();"><i class="fa fa-print"></i>&nbsp;Print</a>
                            <a class="btn" href="<?php echo base_url(); ?>">
                                <i class="fa fa-check fa-2x"></i>&nbsp;Selesai</a>
                        </div>
                    </div>
                </div>

            </form>
            &nbsp;
        </div>
        <input type="hidden" id="kk-old" name="kk-old" value="">

        <script type="text/javascript">
            /**
             * List, nama attribute yang ada di halaman ini :
             * 		noReg,	
             *	    jenisPenduduk,  -- value = 1 (wni) | 2(orang asing)
             *
             *		noKitap, tglAkhirKitap
             *
             *		nikPemohon, nomerKKPemohon, namaPemohon, alamatPemohon,	propinsiPemohon,  
             *	 		kabupatenPemohon, kecamatanPemohon, kelurahanPemohon. 
             *			kdPosPemohon, rtPemohon,rwPemohon, tlpPemohon.           --> data Pemohon		 		
             *		
             *		propinsi, kabupaten, kecamatan, kelurahan		--> District area / Wilayah Pelayanan
             *
             **/

            $(document).ready(function () {
                $('.selectpicker').selectpicker();

                document.forms['fRegKtpBaru'].reset();

            })

            function jenisPendudukOnClick(myRadio) {
                var piAsing = document.getElementById("panelInformasiAsing");
                var piWni = document.getElementById("panelInformasiWni");

                var btnAsing = document.getElementById("btnInformasiLanjutAsing");
                var btnWni = document.getElementById("btnInformasiLanjutWni");

                if (myRadio.value == 1) {
                    piAsing.style = "display:none";
                    piWni.style = "display:block";

                    btnAsing.style = "display:none";
                    btnWni.style = "display:inline-block";
                } else if (myRadio.value == 2) {
                    piAsing.style = "display:block";
                    piWni.style = "display:none";

                    btnAsing.style = "display:inline-block";
                    btnWni.style = "display:none";
                }
            }
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

        <!--<button type="button" onclick="Test();">Test</button>-->
        <script src="<?php echo base_url(); ?>resources/myjs/ktp.js"></script>
        
        <script src="<?php echo base_url(); ?>resources/myjs/printJs.js"></script>
        <!--<button type="button" onclick="xxx();">dads</button>-->
<!--        <script>
            function xxx() {
                var metax = $('meta[name="token_name"]').attr("content");
                console.log(metax)
            }
        </script>-->
    </body>
</html>
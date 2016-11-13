var arrAnggota = new Array();
//var baseUrl = "<?php echo base_url(); ?>";
$(document).ready(function () {
    //--- Activate Plugin SelectPicker ---//
    $('.selectpicker').selectpicker();
    document.forms['fRegKKBaru'].reset();
    $('.loading').hide();
})
var jnsPenduduk;
var jumlahkeluarga = 0;

function jenisPendudukOnClick(myRadio) {
    var piAsing = document.getElementById("panelInformasiAsing");
    var piWni = document.getElementById("panelInformasiWni");

    if (myRadio.value == 1) {
        piAsing.style = "display:none";
        piWni.style = "display:block";
        jnsPenduduk = 1;
    } else if (myRadio.value == 2) {
        piAsing.style = "display:block";
        piWni.style = "display:none";
        jnsPenduduk = 2;
    }
}

function alasanPermohonanOnClick(radio) {
    var btn1 = document.getElementById("btnAlasanLanjut");
    var btn2 = document.getElementById("btnAlasanTidakLanjut");

    if (radio.value == 1) {
        btn1.style = "display:inline-block";
        btn2.style = "display:none";
    } else {
        btn1.style = "display:none";
        btn2.style = "display:inline-block";


    }
}

function jenisPernikahanOnClick(myRadio) {
    var btnAsing = document.getElementById("btnPernikahanLanjutAsing");
    var btnWni = document.getElementById("btnPernikahanLanjutWni");

    if (myRadio.value == 1 && jnsPenduduk == 1) {
        btnWni.style = "display:inline-block";
        btnAsing.style = "display:none";
    } else {
        btnWni.style = "display:none";
        btnAsing.style = "display:inline-block";
    }
}

function dropDownHubunganKeluarga() {
    var option = "";
    var kepala = "<option value='1'>Kepala Keluarga</option>";
    var suami = "<option value='2'>Suami</option>";
    var istri = "<option value='3'>Istri</option>";
    var anak = "<option value='4'>Anak</option>";
    var menantu = "<option value='5'>Menantu</option>";
    var cucu = "<option value='6'>CUcu</option>";
    var ortu = "<option value='7'>Ortu</option>";
    var mertua = "<option value='8'>Mertua</option>";
    var famili = "<option value='9'>Famili</option>";
    var pembantu = "<option value='10'>Pembantu</option>";
    var lainnya = "<option value='11'>Lainnya</option>";

    option += kepala + suami + istri + anak + menantu + cucu + ortu + mertua + famili + pembantu + lainnya;
    return option;
}

function tambahAnggota() {
    var x = "<div id='anggota" + jumlahkeluarga + "' class='row'>" +
            '<div class="col-md-4"><div class="form-group" style="width: 100%;"><label class="control-label p-label-required">NIK :</label><div class="input-group"><input class="form-control" required="" id="nikAnggota' + jumlahkeluarga + '" name="nikAnggota" placeholder="nik" onchange="RubahNik(this)"><div class="p-field-cb"></div><span class="input-group-btn" style="width: 60px;"><button class="btn" type="button" onclick=CekNik("' + jumlahkeluarga + '")>Cek-Nik</button></span></div></div></div>' +
            '<div class="col-md-5"><div class="form-group" style="width: 100%;"><label class="control-label p-label-required">Nama :</label><div class="input-group"><input class="form-control" required="" id="namaAnggota' + jumlahkeluarga + '" name="namaAnggota" placeholder="nama"><div class="p-field-cb"></div></div></div></div>' +
            '<div class="col-md-3">' +
            '<div class="form-group" style="width: 100%;">' +
            '<label class="control-label p-label-required">Nama :</label>' +
            '<div class="input-group">' +
            '<select class="selectpicker" data-live-search="true" name="hubunganKeluarga">' + dropDownHubunganKeluarga() + '</option></select>' +
            '<div class="p-field-cb"></div>' +
            '<input type="hidden" id="validasi-nik' + jumlahkeluarga + '" name="validasi-nik' + jumlahkeluarga + '" value="0">' +
            '</div>' +
            '</div>' +
            '</div>' +
            "</div>";
    $('#panelAnggota').append(x);

    $('.selectpicker').selectpicker();
    disableNextStep();
    jumlahkeluarga++;
}

function kurangiAnggota() {
    var last = "";
    $('div[id^=anggota]').each(function () {
        last = $(this).attr("id").replace("anggota", "");
    });
    $('#anggota' + last).remove();
    var nikSukses = cekNikSukses();
    if (nikSukses == true) {
        enableNextStep();
    } else {
        disableNextStep();
    }
}

function CekNik(param) {
    var nikPemohon = $('input[name=nikPemohon]').val();
    var nikAnggota = $('#nikAnggota' + param).val();
    var duplikat = 0;
    $('input[id^=nikAnggota]').each(function () {
        if (nikAnggota == $(this).val()) {
            duplikat++;
        }
    });
    if (duplikat > 1) {
        alert("DUPLIKAT NIK TIDAK DIIJINKAN");
        $('#nikAnggota' + param).val("");
        $('#namaAnggota' + param).val("");
        disableNextStep();
    } else {
        $.ajax({
            type: 'GET',
            url: baseUrl + "kk/ceknikkk",
            dataType: 'JSON',
            data: {nik: JSON.stringify(nikAnggota)},
            beforeSend: function (xhr) {
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.length != 0) {
                    $('#validasi-nik' + param).val(1);
                    $('#namaAnggota' + param).val(response[0].NAMA_LGKP);
                } else {
                    alert("NIK SUDAH TERDAFTAR DI KK ATAU NIK TIDAK ADA");
                    $('#validasi-nik' + param).val(0);
                    $('#namaAnggota' + param).val("");
                }
            },
            complete: function (jqXHR, textStatus) {
                var nikSukses = cekNikSukses();
                if (nikSukses == false) {
                    disableNextStep();
                } else {
                    enableNextStep();
                }
                $('.loading').hide();
            }
        });
    }
}

function cekNikSukses() {
    var niksukses = true;
    $('input[id^=validasi-nik]').each(function () {
        var value = $(this).val();
        if (value == 0) {
            niksukses = false;
            return false;
        } else {
            niksukses = true;
        }
    });
    return niksukses;
}

function disableNextStep() {
    var btnLanjutOn = document.getElementById("btnAnggotaLanjutOn");
    var btnLanjutOff = document.getElementById("btnAnggotaLanjutOff");

    btnLanjutOff.style = "display:inline-block";
    btnLanjutOn.style = "display:none";
}

function enableNextStep() {
    var btnLanjutOn = document.getElementById("btnAnggotaLanjutOn");
    var btnLanjutOff = document.getElementById("btnAnggotaLanjutOff");

    btnLanjutOn.style = "display:inline-block";
    btnLanjutOff.style = "display:none";
}

function RubahNik(param) {
    var id = $(param).attr("id");
    var nikAnggota = $('#' + id).val();
    var noId = nikAnggota.replace("nikAnggota", "");
    var duplikat = 0;
    $('input[id^=nikAnggota]').each(function () {
        if (nikAnggota == $(this).val()) {
            duplikat++;
        }
    });
    if (duplikat > 1) {
        alert("DUPLIKAT NIK TIDAK DIIJINKAN");
        $('#' + id).val("");
        $('#namaAnggota' + noId).val("");
        disableNextStep();
    }
}

function getDistrictArea() {
    var propinsi = $('select[name=propinsi]').val();
    var kabupaten = $('select[name=kabupaten]').val();
    var kecamatan = $('select[name=kecamatan]').val();
    var kelurahan = $('select[name=kelurahan]').val();
    var alamatBaru = $('input[name=alamatKK]').val();
    var rtBaru = $('input[name=rtKK]').val();
    var rwBaru = $('input[name=rwKK]').val();
    var kdPosBaru = $('input[name=kdPosKK]').val();
    var response = {
        propinsi: propinsi,
        kabupaten: kabupaten,
        kecamatan: kecamatan,
        kelurahan: kelurahan,
        alamatBaru: alamatBaru,
        rtBaru: rtBaru,
        rwBaru: rwBaru,
        kdPosBaru: kdPosBaru
    };

    return response;
}

function getAnggotakeluarga() {
    var nikAnggota = [];
    var namaAnggota = [];
    var hubungankeluarga = [];
    $('div[id^=anggota]').each(function () {
        nikAnggota.push($(this).find('input[name=nikAnggota]').val());
        namaAnggota.push($(this).find('input[name=namaAnggota]').val());
        hubungankeluarga.push($(this).find('select[name=hubunganKeluarga]').val());
    });

    var response = {
        nikAnggota: nikAnggota,
        namaAnggota: namaAnggota,
        hubungankeluarga: hubungankeluarga
    };

    return response;
}

function getPemohon() {
    var nikPemohon = $('input[name=nikPemohon]').val();
    var namaPemohon = $('input[name=namaPemohon]').val();
    var alamatPemohon = $('input[name=alamatPemohon]').val();
    var propinsiPemohon = $('select[name=propinsiPemohon]').val();
    var kabupatenPemohon = $('select[name=kabupatenPemohon]').val();
    var kecamatanPemohon = $('select[name=kecamatanPemohon]').val();
    var kelurahanPemohon = $('select[name=kelurahanPemohon]').val();
    var kdPosPemohon = $('input[name=kdPosPemohon]').val();
    var rtPemohon = $('input[name=rtPemohon]').val();
    var rwPemohon = $('input[name=rwPemohon]').val();
    var tlpPemohon = $('input[name=tlpPemohon]').val();
    var pekerjaanPemohon = $('select[name=pekerjaanPemohon]').val();
    var kkAsal = $('input[name=kk-old]').val();
    var response = {
        nikPemohon: nikPemohon,
        namaPemohon: namaPemohon,
        alamatPemohon: alamatPemohon,
        propinsiPemohon: propinsiPemohon,
        kabupatenPemohon: kabupatenPemohon,
        kecamatanPemohon: kecamatanPemohon,
        kelurahanPemohon: kelurahanPemohon,
        kdPosPemohon: kdPosPemohon,
        rtPemohon: rtPemohon,
        rwPemohon: rwPemohon,
        tlpPemohon: tlpPemohon,
        pekerjaanPemohon: pekerjaanPemohon,
        kkAsal: kkAsal
    };
    return response;
}

function getKitap() {
    var noKitap = "";
    var tglberakhirKitap = "";
    noKitap = $('input[name=noKitap]').val();
    tglberakhirKitap = $('input[name=tglAkhirKitap]').val();

    var response = {
        noKitap: noKitap,
        tglberakhirKitap: tglberakhirKitap
    };
    return response;
}

function getPenduduk() {
    var jenisPenduduk = "";
    $.each($('input[name=jenisPenduduk]'), function () {
        if ($(this).is(":checked")) {
            jenisPenduduk = $(this).val();
        }
    });
    var response = {
        jenisPenduduk: jenisPenduduk
    };
    return response;
}

function getAlasanPermohonan() {
    var alasanPermohonan = "";
    $.each($('input[name=alasanPermohonan]'), function () {
        if ($(this).is(":checked")) {
            alasanPermohonan = ($(this).val());
        }
    });
    var response = {
        alasanPermohonan: alasanPermohonan
    };
    return response;
}

function getJenisPernikahan() {
    var jenisPernikahan = "";
    $.each($('input[name=jenisPernikahan]'), function () {
        if ($(this).is(":checked")) {
            jenisPernikahan = ($(this).val());
        }
    });
    var response = {
        jenisPernikahan: jenisPernikahan
    };
    return response;
}

function CekNikPemohon() {
    var nik = $('input[name=nikPemohon]').val();
    if (!isNaN(nik)) {
        $.ajax({
            type: 'GET',
            url: baseUrl + "ceknikforkk",
            data: {nik: JSON.stringify(nik)},
            dataType: 'JSON',
            beforeSend: function (xhr) {
                $('input[name=namaPemohon]').val("");
                $('input[name=alamatPemohon]').val("");
                $('input[name=kdPosPemohon]').val("");
                $('input[name=rtPemohon]').val("");
                $('input[name=rwPemohon]').val("");
                $('input[name=tlpPemohon]').val("");
                $('input[name=kk-old]').val("");
                $('input[name=alamat-baru').val("");
                $('#status-wni').val("");
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.length !== 0) {
                    $('input[name=namaPemohon]').val(response[0].NAMA_LGKP);
                    $('input[name=alamatPemohon]').val(response[0].ALAMAT);
                    $('select[name=propinsiPemohon]').val(response[0].NO_PROP).selectpicker('refresh');
                    ChangePropinsiPemohonx(response[0].NO_PROP, response[0].NO_KAB);
                    ChangeKabupatenPemohonx(response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC);
                    ChangeKecamatanPemohonx(response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC, response[0].NO_KEL);
                    $('input[name=kdPosPemohon]').val(response[0].INST_KODE_POS);
                    $('input[name=rtPemohon]').val(response[0].NO_RT);
                    $('input[name=rwPemohon]').val(response[0].NO_RW);
                    $('input[name=tlpPemohon]').val("");
                    $('select[name=pekerjaanPemohon]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                    $('input[name=kk-old]').val(response[0].NO_KK);
                    $('input[name=alamat-baru').val(response[0].ALAMAT);
                }else{
                    alert("NIK sudah terdaftar atau nik tidak tersedia");
                }
            },
            complete: function (jqXHR, textStatus) {
                $('.loading').hide();
                var status_wni = getPenduduk().jenisPenduduk;
                $('#status-wni').val(status_wni);
            }
        });
    }
}

function ChangeKecamatanPemohon() {
    var kecamatan = $('select[name=kecamatanPemohon]').val();
    var kabupaten = $('select[name=kabupatenPemohon]').val();
    var propinsi = $('select[name=propinsiPemohon]').val();
    var request = {
        kecamatan: kecamatan,
        kabupaten: kabupaten,
        propinsi: propinsi
    };

    $.ajax({
        type: 'GET',
        url: baseUrl + "gekelurahan",
        data: {request: JSON.stringify(request)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=kelurahanPemohon]').empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (key == 0) {
                    option += "<option value='" + value.NO_KEL + "' selected=''>" + value.NAMA_KEL + "</option>";
                } else {
                    option += "<option value='" + value.NO_KEL + "'>" + value.NAMA_KEL + "</option>";

                }
            });
            $('select[name=kelurahanPemohon]').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=kelurahanPemohon]').selectpicker('refresh');
        }
    });
}

function ChangeKabupatenPemohon() {
    var kabupaten = $('select[name=kabupatenPemohon]').val();
    var propinsi = $('select[name=propinsiPemohon]').val();
    var request = {
        kabupaten: kabupaten,
        propinsi: propinsi
    };

    $.ajax({
        type: 'GET',
        url: baseUrl + "getkecamatan",
        data: {request: JSON.stringify(request)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=kecamatanPemohon]').empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (key == 0) {
                    option += "<option value='" + value.NO_KEC + "' selected=''>" + value.NAMA_KEC + "</option>";
                } else {
                    option += "<option value='" + value.NO_KEC + "'>" + value.NAMA_KEC + "</option>";

                }
            });
            $('select[name=kecamatanPemohon]').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=kecamatanPemohon]').selectpicker('refresh');
            ChangeKecamatanPemohon();
        }
    });
}

function ChangePropinsiPemohon() {
    var propinsi = $('select[name=propinsiPemohon]').val();
    var request = {
        propinsi: propinsi
    };

    $.ajax({
        type: 'GET',
        url: baseUrl + "getkabupaten",
        data: {request: JSON.stringify(request)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=kabupatenPemohon]').empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (key == 0) {
                    option += "<option value='" + value.NO_KAB + "' selected=''>" + value.NAMA_KAB + "</option>";
                } else {
                    option += "<option value='" + value.NO_KAB + "'>" + value.NAMA_KAB + "</option>";

                }
            });
            $('select[name=kabupatenPemohon]').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=kabupatenPemohon]').selectpicker('refresh');
            ChangeKabupatenPemohon();
        }
    });
}

function ChangeKecamatan() {
    var kecamatan = $('select[name=kecamatan]').val();
    var kabupaten = $('select[name=kabupaten]').val();
    var propinsi = $('select[name=propinsi]').val();
    var request = {
        kecamatan: kecamatan,
        kabupaten: kabupaten,
        propinsi: propinsi
    };

    $.ajax({
        type: 'GET',
        url: baseUrl + "gekelurahan",
        data: {request: JSON.stringify(request)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=kelurahan]').empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (key == 0) {
                    option += "<option value='" + value.NO_KEL + "' selected=''>" + value.NAMA_KEL + "</option>";
                } else {
                    option += "<option value='" + value.NO_KEL + "'>" + value.NAMA_KEL + "</option>";

                }
            });
            $('select[name=kelurahan]').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=kelurahan]').selectpicker('refresh');
        }
    });
}

function SubmitKK() {
    var districtArea = getDistrictArea();
    var anggotaKeluarga = getAnggotakeluarga();
    var pemohon = getPemohon();
    var kitap = getKitap();
    var penduduk = getPenduduk();
    var alasanPermohonan = getAlasanPermohonan();
    var jenisPernikahan = getJenisPernikahan();

    var request = $.extend({}, districtArea, anggotaKeluarga, pemohon, kitap, alasanPermohonan, penduduk, jenisPernikahan);
    var token_name = $('meta[name="token_name"]').attr("content");
    var cf = confirm("APA ANDA YAKIN DENGAN DATA YANG ANDA INPUT?");
    if (cf == true) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "kk/submit",
            dataType: 'JSON',
            data: {token_name: token_name, request: JSON.stringify(request)},
            beforeSend: function (xhr) {
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.status === true) {
//                    alert("berhasil submit");
                    $('#noReg').val(response.nomer);
                    $('a[data-js-show-step="registrationSteps:9"]').click();
                } else {
                    alert("gagal submit");
                }
            },
            complete: function (jqXHR, textStatus) {
                $('.loading').hide();
            }
        });
    }
}

function ChangePropinsiPemohonx(propinsi, kabupaten) {
//    var propinsi = $('select[name=propinsiPemohon]').val();
    var request = {
        propinsi: propinsi
    };

    $.ajax({
        type: 'GET',
        url: baseUrl + "getkabupaten",
        data: {request: JSON.stringify(request)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=kabupatenPemohon]').empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (value.NO_KAB == kabupaten) {
                    option += "<option value='" + value.NO_KAB + "' selected=''>" + value.NAMA_KAB + "</option>";
                } else {
                    option += "<option value='" + value.NO_KAB + "'>" + value.NAMA_KAB + "</option>";

                }
            });
            $('select[name=kabupatenPemohon]').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=kabupatenPemohon]').selectpicker('refresh');
//            ChangeKabupatenPemohon();
        }
    });
}

function ChangeKabupatenPemohonx(propinsi, kabupaten, kecamatan) {
//    var kabupaten = $('select[name=kabupatenPemohon]').val();
//    var propinsi = $('select[name=propinsiPemohon]').val();
    var request = {
        kabupaten: kabupaten,
        propinsi: propinsi
    };

    $.ajax({
        type: 'GET',
        url: baseUrl + "getkecamatan",
        data: {request: JSON.stringify(request)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=kecamatanPemohon]').empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (value.NO_KEC == kecamatan) {
                    option += "<option value='" + value.NO_KEC + "' selected=''>" + value.NAMA_KEC + "</option>";
                } else {
                    option += "<option value='" + value.NO_KEC + "'>" + value.NAMA_KEC + "</option>";

                }
            });
            $('select[name=kecamatanPemohon]').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=kecamatanPemohon]').selectpicker('refresh');
//            ChangeKecamatanPemohon();
        }
    });
}

function ChangeKecamatanPemohonx(propinsi, kabupaten, kecamatan, kelurahan) {
//    var kecamatan = $('select[name=kecamatanPemohon]').val();
//    var kabupaten = $('select[name=kabupatenPemohon]').val();
//    var propinsi = $('select[name=propinsiPemohon]').val();
    var request = {
        kecamatan: kecamatan,
        kabupaten: kabupaten,
        propinsi: propinsi
    };

    $.ajax({
        type: 'GET',
        url: baseUrl + "gekelurahan",
        data: {request: JSON.stringify(request)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=kelurahanPemohon]').empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (value.NO_KEL == kelurahan) {
                    option += "<option value='" + value.NO_KEL + "' selected=''>" + value.NAMA_KEL + "</option>";
                } else {
                    option += "<option value='" + value.NO_KEL + "'>" + value.NAMA_KEL + "</option>";

                }
            });
            $('select[name=kelurahanPemohon]').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=kelurahanPemohon]').selectpicker('refresh');
        }
    });
}

function CekKitap() {
    var tglAkhirKitap = $('input[name=tglAkhirKitap]').val();
//    alert(tglAkhirKitap);
    $.ajax({
        type: 'GET',
        url: baseUrl + "cekkitap",
        data: {request: JSON.stringify(tglAkhirKitap)},
        dataType: 'JSON',
        beforeSend: function (xhr) {

        },
        success: function (response, textStatus, jqXHR) {
            if (response[0].SELISIH < 0) {
                alert("TGL KITAP SUDAH KADALUARSA");
            } else {
                alert("klik");
                $('#kitap-ok').click();
            }
        },
        complete: function (jqXHR, textStatus) {

        }
    });
}
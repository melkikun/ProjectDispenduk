function Submit() {
    var pemohon = getPemohon();
    var kitap = getKitap();
    var penduduk = getPenduduk();

    var request = $.extend({}, pemohon, kitap, penduduk);
    var token_name = $('meta[name="token_name"]').attr("content");
    var cf = confirm("APA ANDA INGIN SUBMIT?");
    if (cf == true) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "ktp/submit",
            dataType: 'JSON',
            data: {token_name: token_name, request: JSON.stringify(request)},
            beforeSend: function (xhr) {
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.status === true) {
                    $('a[data-js-show-step="registrationSteps:5"]').click();
                    $('#noReg').val(response.nomer);
                } else {
                    alert("gagal register");
                }
            },
            complete: function (jqXHR, textStatus) {
                $('.loading').hide();
            }
        });
    }
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
    var pekerjaanPemohon = $('input[name=pekerjaanPemohon]').val();
    var noKK = $('input[name=kk-old]').val();

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
        noKK: noKK
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

function CekNikPemohon() {
    var nik = $('input[name=nikPemohon]').val();
    if (!isNaN(nik)) {
        var kecamatan = "";
        var kelurahan = "";
        $.ajax({
            type: 'GET',
            url: baseUrl + "ceknikktp",
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
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.length !== 0) {
                    $('input[name=namaPemohon]').val(response[0].NAMA_LGKP);
                    $('input[name=alamatPemohon]').val(response[0].ALAMAT);
                    $('select[name=propinsiPemohon]').val(response[0].NO_PROP).selectpicker('refresh');
                    $('select[name=kabupatenPemohon]').val(response[0].NO_KAB).selectpicker('refresh');
                    $('select[name=kecamatanPemohon]').val(response[0].NO_KEC).selectpicker('refresh');
                    $('select[name=kelurahanPemohon]').val(response[0].NO_KEL).selectpicker('refresh');
                    $('input[name=kdPosPemohon]').val(response[0].INST_KODE_POS);
                    $('input[name=rtPemohon]').val(response[0].NO_RT);
                    $('input[name=rwPemohon]').val(response[0].NO_RW);
                    $('input[name=tlpPemohon]').val("");
                    $('select[name=pekerjaanPemohon]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                    $('input[name=kk-old]').val(response[0].NO_KK);
                    kecamatan = response[0].NO_KEC;
                    kelurahan = response[0].NO_KEL;
                    ChangeKecamatanPemohon();
                } else {
                    alert("NOMER NIK TIDAK ADA/SUDAH TERDAFTAR DI KTP");
                }
            },
            complete: function (jqXHR, textStatus) {
                ChangeKecamatanPemohonWithValue(kelurahan);
                $('.loading').hide();
            }
        });
    }
}

function ChangeKecamatanPemohonWithValue(kelurahan) {
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
                $('a[data-js-show-step="registrationSteps:4"]').click();
            }
        },
        complete: function (jqXHR, textStatus) {

        }
    });
}



$(document).ready(function () {
    $('.loading').hide();
});
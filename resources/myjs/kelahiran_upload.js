function UploadSingleImage(param) {
    var noReg = $('#noReg').val();
    var wni = $('#status-wni').val();
    var data = new FormData();
    switch (param) {
        case "kk":
            var file = $('#fKK')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "akta-nikah":
            var file = $('#fAktaNikah')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "surat-kelahiran":
            var file = $('#fSK')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "paspor":
            var file = $('#fPaspor')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "ijintt":
            var file = $('#fIzinTT')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "bap":
            var file = $('#fBeritaAcara')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "sp":
            var file = $('#fSuratPertanggungJawaban')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
    }
    $.ajax({
        type: 'POST',
        url: baseUrl + "kelahiran/c_kelahiran/uploadSingleImage",
        data: data,
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (xhr) {
            $('#sukses-upload-kk').addClass('hide');
            $('#sukses-upload-nikah').addClass('hide');
            $('#sukses-upload-surat-lahir').addClass('hide');
            $('.loading').show();
        },
        success: function (response, textStatus, jqXHR) {
            if (response.return == true) {
                switch (param) {
                    case "kk":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-ktp').click();
                        }
                        break;
                    case "akta-nikah":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-surat-lahir').click();
                        } else if (wni == 2) {
                            alert("berhasil upload");
                            $('#wna-surat-lahir').click();
                        }
                        break;
                    case "surat-kelahiran":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-saksi').click();
                        } else if (wni == 2) {
                            alert("berhasil upload");
                            $('#wna-saksi').click();
                        }
                        break;
                    case "paspor":
                        alert("berhasil upload");
                        $('#wna-kitap').click();
                        break;
                    case "ijintt":
                        alert("berhasil upload");
                        $('#tt-finish').click();
                        break;
                    case "bap":
                        alert("berhasil upload");
                        $('#tt-sp').click()
                        break;
                    case "sp":
                        alert("berhasil upload");
                        $('#tt-finish').click()
                        break;
                }
            } else {
                alert(response.status)
            }
        },
        complete: function (jqXHR, textStatus) {
            $('.loading').hide();
        }
    });
}

function UploadDoubleImage(param) {
    var noReg = $('#noReg').val();
    var wni = $('#status-wni').val();
    var data = new FormData();
    switch (param) {
        case "ktp":
            var ktpAyah = $("#fKTPAy")[0].files[0];
            var ktpIbu = $("#fKTPIb")[0].files[0];
            data.append("noReg", noReg);
            data.append("file1", ktpAyah);
            data.append("file2", ktpIbu);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "saksi":
            var saksi1 = $("#fKTPSaksi1")[0].files[0];
            var saksi2 = $("#fKTPSaksi2")[0].files[0];
            data.append("noReg", noReg);
            data.append("file1", saksi1);
            data.append("file2", saksi2);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
            break;
    }
    $.ajax({
        type: 'POST',
        url: baseUrl + "kelahiran/c_kelahiran/uploadDoubleImage",
        data: data,
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (xhr) {
            $('#sukses-upload-kk').addClass('hide');
            $('.loading').show();
        },
        success: function (response, textStatus, jqXHR) {
            if (response.return == true) {
                switch (param) {
                    case "ktp":
                        alert("berhasil upload");
                        $('#wni-akta-nikah').click();
                        break;
                    case "saksi":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-finish').click();
                        } else if (wni == 2) {
                            alert("berhasil upload");
                            $('#wna-paspor').click();
                        } else {
                            alert("berhasil upload");
                            $('#tt-bap').click();
                        }
                        break;
                }
            } else {
                alert(response.status)
            }
        },
        complete: function (jqXHR, textStatus) {
            $('.loading').hide();
        }
    });
}

function CekNoReg() {
    var noReg = document.getElementById("noReg").value;
    if (noReg == "") {
    } else {
        $.ajax({
            type: 'GET',
            url: baseUrl + "kelahiran/ceknoreg",
            data: {
                noReg: JSON.stringify(noReg)
            },
            dataType: 'JSON',
            beforeSend: function (xhr) {
                $('#upload-wni').addClass("hide");
                $('#upload-wna').addClass("hide");
                $('#upload-tidak-tahu').addClass("hide");
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.length == 0 || response == "") {
                    alert("no registrasi tidak ada");
                    $('#disabled-step2').removeClass("hide");
                    $('#go-step2').addClass("hide");
                } else {
//                    alert("no registrasi ada");
                    $('#disabled-step2').addClass("hide");
                    $('#go-step2').removeClass("hide");
                    var F_SURATKELAHIRAN = response[0].F_SURATKELAHIRAN;
                    var F_AKTANIKAH = response[0].F_AKTANIKAH;
                    var F_KK = response[0].F_KK;
                    var F_KTPAYAH = response[0].F_KTPAYAH;
                    var F_KTPIBU = response[0].F_KTPIBU;
                    var F_KTPSAKSI1 = response[0].F_KTPSAKSI1;
                    var F_KTPSAKSI2 = response[0].F_KTPSAKSI2;
                    var F_PASPOR = response[0].F_PASPOR;
                    var F_KITAP = response[0].F_KITAP;
                    var F_BAP_POLISI = response[0].F_BAP_POLISI;
                    var F_PERTANGGUNGANMUTLAK = response[0].F_PERTANGGUNGANMUTLAK;
                    var negaraAyah = response[0].NEGARAAYAH;
                    var negaraIbu = response[0].NEGARAIBU;

                    if (negaraAyah == 1 || negaraIbu == 1) {
//                        alert('wni');
                        $('#status-wni').val(1); //untuk wni
                        $('#upload-wni').removeClass("hide");
                        if (F_KK == true && F_KTPAYAH == false && F_KTPIBU == false) {
                            $('#wni-ktp').removeClass("hide");
                        } else if (F_KTPAYAH == true && F_KTPIBU == true && F_AKTANIKAH == false) {
                            $('#wni-akta-nikah').removeClass("hide");
                        } else if (F_AKTANIKAH == true && F_SURATKELAHIRAN == false) {
                            $('#wni-surat-lahir').removeClass("hide");
                        } else if (F_SURATKELAHIRAN == true && F_KTPSAKSI1 == false && F_KTPSAKSI2 == false) {
                            $('#wni-saksi').removeClass("hide");
                        } else if (F_KTPSAKSI1 == true && F_KTPSAKSI2 == true) {
                            $('#wni-finish').removeClass("hide");
                        } else {
                            $('#wni-kk').removeClass("hide");
                        }
                    } else if (negaraAyah == 2 && negaraIbu == 2) {
//                        alert('wna');
                        $('#status-wni').val(2); //untuk wna
                        $('#upload-wna').removeClass("hide");
                        if (F_AKTANIKAH == true && F_SURATKELAHIRAN == false) {
                            $('#wna-surat-lahir').removeClass("hide");
                        } else if (F_SURATKELAHIRAN == true && F_KTPSAKSI1 == false && F_KTPSAKSI2 == false) {
                            $('#wna-saksi').removeClass("hide");
                        } else if (F_KTPSAKSI1 == true && F_KTPSAKSI2 == true && F_PASPOR == false) {
                            $('#wna-paspor').removeClass("hide");
                        } else if (F_PASPOR == true && F_KITAP == false) {
                            $('#wna-kitap').removeClass("hide");
                        } else if (F_KITAP == true) {
                            $('#wna-finish').removeClass("hide");
                        } else {
                            $('#wna-akta-nikah').removeClass("hide");
                        }
                    } else {
                        $('#status-wni').val(0); //untuk tidak di ketahui
                        $('#upload-tt').removeClass("hide")
                        if (F_KTPSAKSI1 == true && F_KTPSAKSI2 == true && F_BAP_POLISI == false) {
                            $('#tt-bap').removeClass("hide");
                        } else if (F_BAP_POLISI == true && F_PERTANGGUNGANMUTLAK == false) {
                            $('#tt-sp').removeClass("hide");
                        } else if (F_PERTANGGUNGANMUTLAK == true) {
                            $('#tt-finish').removeClass("hide");
                        } else {
                            $('#tt-saksi').removeClass("hide")
                        }
                    }
                }
            },
            complete: function (jqXHR, textStatus) {
                $('.loading').hide();
            }
        });
    }
}

$(document).ready(function () {
    document.forms['formUpload'].reset();
    $('.loading').hide();
});
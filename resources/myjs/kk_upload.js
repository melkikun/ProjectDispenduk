function CekNoReg() {
    var noReg = $('input[name=noReg]').val();
    $.ajax({
        type: 'GET',
        url: baseUrl + "kk/ceknoreg",
        data: {request: JSON.stringify(noReg)},
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('#step2-step3').addClass("hide");
            $('#step2-step4').addClass("hide");
            $('#step2-step5').addClass("hide");
            $('#step2-step6').addClass("hide");
            $('#step2-step7').addClass("hide");
            $('.loading').show();
        },
        success: function (response, textStatus, jqXHR) {
            if (response.length == 0) {
                alert("NO REGISTRASI TIDAK TERDAFTAR");
                $('#go-step2').addClass("hide");
                $('#disabled-step2').removeClass("hide");
            } else {
                $('#go-step2').removeClass("hide");
                $('#disabled-step2').addClass("hide");
                $('#status-penduduk').val(response[0].JENISPENDUDUK);
                var F_AKTANIKAH = response[0].F_AKTANIKAH;
                var F_KITAP = response[0].F_KITAP;
                var F_SKPD_DALAMNEGERI = response[0].F_SKPD_DALAMNEGERI;
                var F_SKD_LUARNEGERI = response[0].F_SKD_LUARNEGERI;

                if (response[0].JENISPENDUDUK == 1) {
                    $('#abaikan-wna').addClass("hide");
                    $("#abaikan-wni").removeClass("hide");
                    if (F_SKD_LUARNEGERI == true) {
                        $('#step2-step7').removeClass("hide");
                    } else if (F_SKPD_DALAMNEGERI == true) {
                        $('#step2-step5').removeClass("hide");
                    } else if (F_AKTANIKAH == true) {
                        $('#step2-step4').removeClass("hide");
                    } else {
                        $('#step2-step3').removeClass("hide");
                    }
                } else if (response[0].JENISPENDUDUK == 2) {
                    $('#abaikan-wna').removeClass("hide");
                    $("#abaikan-wni").addClass("hide");
                    if (F_KITAP == true) {
                        $('#step2-step7').removeClass("hide");
                    } else if (F_SKD_LUARNEGERI == true) {
                        $('#step2-step6').removeClass("hide");
                    } else if (F_SKPD_DALAMNEGERI == true) {
                        $('#step2-step5').removeClass("hide");
                    } else if (F_AKTANIKAH == true) {
                        $('#step2-step4').removeClass("hide");
                    } else {
                        $('#step2-step3').removeClass("hide");
                    }
                }
            }
        },
        complete: function (jqXHR, textStatus) {
            $('.loading').hide();
        }
    });
}


function UploadSingleImage(param) {
    var noReg = $('#noReg').val();
    var data = new FormData();
    var jenispenduduk = $('#status-penduduk').val();
    switch (param) {
        case "akta-nikah":
            var file = $('#fAktaNikah')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "kitap":
            var file = $('#fIzinTT')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "dalam-negri":
            var file = $('#fSKPD')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "luar-negri":
            var file = $('#fSKPDLN')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
    }
    $.ajax({
        type: 'POST',
        url: baseUrl + "kk/c_kk/uploadSingleImage",
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
                    case "akta-nikah":
                        alert("berhasil upload");
                        $('#go-step4').click();
                        break;
                    case "dalam-negri":
                        alert("berhasil upload");
                        $('#sukses-upload-surat-lahir').click();
                        $('#go-step5').click();
                        break;
                    case "luar-negri":
                        if (jenispenduduk == 1) {
                            alert("berhasil upload");
                            $('#skip-step6').click();
                        } else {
                            alert("berhasil upload");
                            $('#go-step6').click();
                        }
                        break;
                    case "kitap":
                        alert("berhasil upload");
                        $('#sukses-upload-surat-lahir').click();
                        $('#go-step7').click();
                        break;
                }
            } else {
                alert(response.status);
            }
        },
        complete: function (jqXHR, textStatus) {
            $('.loading').hide();
        }
    });
}

$(document).ready(function () {
    $('.loading').hide();
});
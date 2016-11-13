/**
 *	Nama-nama attribute yang ada dihalaman ini :
 *		fSksck,
 *		fKitap,
 *		fPaspor,
 *		fSKPindah,
 *		fAktaNikah,
 *		fAktaLahir,
 *		fKartuKeluarga,
 *
 *		noReg
 **/

// var baseUrl = "http://localhost/ProjectDispenduk/";
function UploadSingleImage(param) {
    var noReg = $('#noReg').val();
    var data = new FormData();
    var wni = $('#status-wni').val();
    switch (param) {
        case "foto":
            var file = $('input[name="fPasPhoto"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "kk":
            var file = $('input[name="fKartuKeluarga"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "akta-lahir":
            var file = $('input[name="fAktaLahir"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "akta-nikah":
            var file = $('input[name="fAktaNikah"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "pindah":
            var file = $('input[name="fSKPindah"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "paspor":
            var file = $('input[name="fPaspor"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "kitap":
            var file = $('input[name="fKitap"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "skck":
            var file = $('input[name="fSkck"]')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
    }
    $.ajax({
        type: 'POST',
        url: baseUrl + "ktp/c_ktp/uploadSingleImage",
        data: data,
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (xhr) {
            $('.loading').show();
        },
        success: function (response, textStatus, jqXHR) {
            if (response.return == true) {
                switch (param) {
                    case "foto":
                        alert("berhasil upload");
                        $('#lanjut-step4').click();
                        break;
                    case "kk":
                        alert("berhasil upload");
                        $('#lanjut-step5').click();
                        break;
                    case "akta-lahir":
                        alert("berhasil upload");
                        $('#lanjut-step6').click();
                        break;
                    case "akta-nikah":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#lanjut-step7').click();
                        } else {
                            alert("berhasil upload");
                            $('#lanjut-step8').click();
                        }
                        break;
                    case "pindah":
                        alert("berhasil upload");
                        $('#lanjut-step11').click();
                        break;
                    case "paspor":
                        alert("berhasil upload");
                        $('#lanjut-step9').click();
                        break;
                    case "kitap":
                        alert("berhasil upload");
                        $('#lanjut-step10').click();
                        break;
                    case "skck":
                        alert("berhasil upload");
                        $('#lanjut-step11').click();
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

// $(document).ready(function () {
//     document.forms['formUploadKtp'].reset();
//     $('a[data-js-show-step="uploadSteps:4"]').click(function () {
//         var pasFoto = $('input[name=fPasPhoto]')[0].files[0];
//         var noReg = $('#noReg').val();
//         var data = new FormData();

//         var file = $('input[name=fPasPhoto]')[0].files[0];
//         data.append("noReg", noReg);
//         data.append("file", file);
//         data.append("type", "");
//     });
// })

function CekNoReg() {
    var noReg = $('#noReg').val();
    // alert("ssss");
    $.ajax({
        url: baseUrl + "ktp/ceknoreg",
        type: 'GET',
        dataType: 'JSON',
        data: {request: JSON.stringify(noReg)},
        beforeSend: function (xhr) {
            $('#status-wni').val("0");
            $('#lanjut-step3').addClass("hide");
            $('#lanjut-step4').addClass("hide");
            $('#lanjut-step5').addClass("hide");
            $('#lanjut-step6').addClass("hide");
            $('#lanjut-step7').addClass("hide");
            $('#lanjut-step8').addClass("hide");
            $('#lanjut-step9').addClass("hide");
            $('#lanjut-step10').addClass("hide");
            $('#lanjut-step11').addClass("hide");
            $('#cek-no-reg').prop("disabled", true);
            $('#cek-no-reg').text("Loading ...");
            $('.loading').show();
        },
        success: function (response, textStatus, jqXHR) {
            $('#cek-no-reg').prop("disabled", false);
            $('#cek-no-reg').text("Cek No");
            if (response.length != 0) {
                $('button[data-js-show-step="uploadSteps:2"]').removeAttr("disabled");
                $('#status-wni').val(response[0].JENISPENDUDUK);
                if (response[0].JENISPENDUDUK == 1) {
//                    alert("wni");
                    if (response[0].F_PASPHOTO == false) {
                        $('#lanjut-step3').removeClass("hide");
                    } else if (response[0].F_KK == false) {
                        $('#lanjut-step4').removeClass("hide");
                    } else if (response[0].F_AKTA_LAHIR == false) {
                        $('#lanjut-step5').removeClass("hide");
                    } else if (response[0].F_AKTA_NIKAH == false) {
                        $('#lanjut-step6').removeClass("hide");
                    } else if (response[0].F_KET_PINDAH == false) {
                        $('#lanjut-step7').removeClass("hide");
                    } else {
                        $('#lanjut-step11').removeClass("hide");
                    }
                } else {
//                    alert("wna");
                    // $('button[data-js-show-step="uploadSteps:2"]').prop("disabled", true);
                    // $('#status-wni').val(0);
                    // $('#next-step2').removeAttr("disabled");
                    if (response[0].F_PASPHOTO == false) {
                        $('#lanjut-step3').removeClass("hide");
                    } else if (response[0].F_KK == false) {
                        $('#lanjut-step4').removeClass("hide");
                    } else if (response[0].F_AKTA_LAHIR == false) {
                        $('#lanjut-step5').removeClass("hide");
                    } else if (response[0].F_PASPOR == false) {
                        $('#lanjut-step8').removeClass("hide");
                    } else if (response[0].F_KITAP == false) {
                        $('#lanjut-step9').removeClass("hide");
                    } else if (response[0].F_SKCK == false) {
                        $('#lanjut-step10').removeClass("hide");
                    } else {
                        $('#lanjut-step11').removeClass("hide");
                    }
                }
            } else {
                alert("NO REGISTRASI TIDAK TERDAFTAR");
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

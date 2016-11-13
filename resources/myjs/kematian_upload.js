function UploadSingleImage(param) {
    var noReg = $('#noReg').val();
    var wni = $('#status-wni').val();
    var data = new FormData();
    //    console.log(wni);
    switch (param) {
        case "rs":
            var file = $('#fRS')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "kk":
            var file = $('#fKK')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "ktp":
            var file = $('#fKTP')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "akta-lahir":
            var file = $('#fAktaLahir')[0].files[0];
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
        case "kitas":
            var file = $('#fKitas')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
        case "kitap":
            var file = $('#fKitap')[0].files[0];
            data.append("noReg", noReg);
            data.append("file", file);
            data.append("type", param);
            data.append("token_name", $('meta[name="token_name"]').attr("content"));
            break;
    }
    $.ajax({
        type: 'POST',
        url: baseUrl + "kematian/c_kematian/uploadSingleImage",
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
            //alert(wni);
            if (response.return == true) {
                switch (param) {
                    case "rs":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-kk').click();
                        } else {
                            alert("berhasil upload");
                            $('#wna-saksi').click();
                        }
                        break;
                    case "kk":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-ktp').click();
                        }
                        break;
                    case "ktp":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-saksi').click();
                        }
                        break;
                    case "akta-lahir":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-akta-nikah').click();
                        } else if (wni == 2) {
                            alert("berhasil upload");
                            $('#wna-akta-nikah').click();
                        }
                        break;
                    case "akta-nikah":
                        if (wni == 1) {
                            alert("berhasil upload");
                            $('#wni-finish').click();
                        } else if (wni == 2) {
                            alert("berhasil upload");
                            $('#wna-visa').click();
                        }
                        break;
                    case "kitas":
                        alert("berhasil upload");
                        $('#wna-kitap').click();
                        break;
                    case "kitap":
                        alert("berhasil upload");
                        $('#wna-finish').click();
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
        case "visa":
            var paspor = $("#fPaspor")[0].files[0];
            var visa = $("#fVisa")[0].files[0];
            data.append("noReg", noReg);
            data.append("file1", paspor);
            data.append("file2", visa);
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
    }
    $.ajax({
        type: 'POST',
        url: baseUrl + "kematian/c_kematian/uploadDoubleImage",
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
                            $('#wni-akta-lahir').click();
                        } else {
                            alert("berhasil upload");
                            $('#wna-akta-lahir').click();
                        }
                        break;
                    case "visa":
                        alert("berhasil upload");
                        $('#wna-kitas').click();
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
            url: baseUrl + "kematian/ceknoreg",
            data: {
                noReg: JSON.stringify(noReg)
            },
            dataType: 'JSON',
            beforeSend: function (xhr) {
                $('#upload-wni').addClass("hide");
                $('#upload-wna').addClass("hide");
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.length == 0 || response == "") {
                    alert("no registrasi tidak ada");
                    $('#lanjut-step2').addClass("hide");
                    $('#skip-step2').removeClass("hide");
                } else {
//                    alert("no registrasi ada");
                    $('#lanjut-step2').removeClass("hide");
                    $('#skip-step2').addClass("hide");
                    $('#status-wni').val(response[0].NEGARAJENAZAH);
                    var F_KTP = response[0].F_KTP;
                    var F_KK = response[0].F_KK;
                    var F_SURAT_KEMATIAN = response[0].F_SURAT_KEMATIAN;
                    var F_AKTA_LAHIR = response[0].F_AKTA_LAHIR;
                    var F_AKTA_NIKAH = response[0].F_AKTA_NIKAH;
                    var F_KTPSAKSI1 = response[0].F_KTPSAKSI1;
                    var F_KTPSAKSI2 = response[0].F_KTPSAKSI2;
                    var F_VISA = response[0].F_VISA;
                    var F_PASPOR = response[0].F_PASPOR;
                    var F_KITAS = response[0].F_KITAS;
                    var F_KITAP = response[0].F_KITAP;
                    var negaraJenazah = response[0].NEGARAJENAZAH;

                    if (negaraJenazah == 1) {
                        // alert("wni");
                        $('#upload-wni').removeClass("hide");
                        if (F_SURAT_KEMATIAN == false) {
                            $('#wni-rs').removeClass('hide');
                        } else if (F_SURAT_KEMATIAN == true && F_KK == false) {
                            $('#wni-kk').removeClass("hide");
                        } else if (F_KK == true && F_KTP == false) {
                            $('#wni-ktp').removeClass("hide");
                        } else if (F_KTP == true && F_KTPSAKSI1 == false && F_KTPSAKSI2 == false) {
                            $('#wni-saksi').removeClass("hide");
                        } else if (F_KTPSAKSI1 == true && F_KTPSAKSI2 == true && F_AKTA_LAHIR == false) {
                            $('#wni-akta-lahir').removeClass("hide");
                        } else if (F_AKTA_LAHIR == true && F_AKTA_NIKAH == false) {
                            $('#wni-akta-nikah').removeClass("hide");
                        } else if (F_AKTA_NIKAH == true) {
                            $('#wni-finish').removeClass("hide");
                        } else {
                            $('#wni-finish').removeClass("hide");
                        }
                    } else {
//                        alert('wna');
                        $('#upload-wna').removeClass("hide");
                        if (F_SURAT_KEMATIAN == true && F_KTPSAKSI1 == false && F_KTPSAKSI2 == false) {
                            $('#wna-saksi').removeClass("hide");
//                            alert(1);
                        } else if (F_KTPSAKSI1 == true && F_KTPSAKSI2 == true && F_AKTA_LAHIR == false) {
                            $('#wna-akta-lahir').removeClass("hide");
//                            alert(2);
                        } else if (F_AKTA_LAHIR == true && F_AKTA_NIKAH == false) {
                            $('#wna-akta-nikah').removeClass("hide");
//                            alert(3);
                        } else if (F_AKTA_NIKAH == true && F_VISA == false && F_PASPOR == false) {
                            $('#wna-visa').removeClass("hide");
//                            alert(4);
                        } else if (F_VISA == true && F_PASPOR == true && F_KITAS == false) {
                            $('#wna-kitas').removeClass("hide");
//                            alert(5);
                        } else if (F_KITAS == true && F_KITAP == false) {
                            $('#wna-kitap').removeClass("hide");
//                            alert(6);
                        } else if (F_KITAP == true) {
                            $('#wna-finish').removeClass('hide');
//                            alert(7);
                        } else if (F_SURAT_KEMATIAN == false) {
//                            alert(8);
                            $('#wna-rs').removeClass("hide");
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
    $('.loading').hide();
});
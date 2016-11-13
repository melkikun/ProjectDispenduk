/**
 * List, attribute yang ada di halaman ini :
 *      noReg,  
 *      jenisPenduduk,
 *
 *      namaBayi, kelaminBayi, beratBayi, panjangBayi, kelahiranKe, tempatLahirBayi, 
 *      tglLahirBayi, waktuLahirBayi, jenisKelahiranBayi, propinsiBayi, kotaBayi        --> data Bayi 
 *          
 *          
 *
 *      kebangsaanIb, kewarganegaraanIb, pekerjaanIb, umurIb, tglLahirIb, kelurahanIb, 
 *          kecamatanIb, kabupatenIb, propinsiIb, rwIb, rtIb, alamatIb, namaIb, nikIb               --> data ibu                                
 *
 *      kebangsaanAy, kewarganegaraanAy, pekerjaanAy, umurAy, tglLahirAy, kelurahanAy,
 *              kecamatanAy, kabupatenAy, propinsiAy, rwAy, rtAy, alamatAy, namaAy, nikAy           --> data Ayah
 *      
 *
 *      pekerjaanSaksi1, umurSaksi1, kelurahanSaksi1, kecamatanSaksi1, 
 *                          kabupatenSaksi1 propinsiSaksi1 alamatSaksi1, namaSaksi1, nikSaksi1      --> data saksi 1
 *      pekerjaanSaksi2, umurSaksi2, kelurahanSaksi2, kecamatanSaksi2, 
 *                          kabupatenSaksi2 propinsiSaksi2 alamatSaksi2, namaSaksi2, nikSaksi2      --> data saksi 2
 *
 *      nikPelapor, namaPelapor, alamatPelapor, propinsiPelapor, kabupatenPelapor,
 *              kecamatanPelapor, kelurahanPelapor, kelaminPelapor, umurPelapor,
 *              teleponPelapor, pekerjaanPelapor  --> data Pelapor
 *  
 *      tglPencatatanPerkawinan
 *
 *      propinsi, kabupaten, kecamatan, kelurahan           --> District Area / WIlayah Pelayanan
 *
 *      noKK, namaKK (nama kepala keluarga)
 *      
 **/
function submitData() {
//    $('a[data-js-show-step="registrationSteps:9"]').click();
    var statusOrtu = getStatusOrtu();
    var dataBayi = getDataBayi();
    var dataAyahIbu = getDataAyahIbu();
    var dataPelapor = getDataPelapor();
    var dataSaksi = getDataSaksi();
    var kk = getKK();
    var districtArea = getDistrictArea();
    var token_name = $('meta[name="token_name"]').attr("content");
    var token = {
        token_name: token_name
    };
    var request = $.extend({}, statusOrtu, dataBayi, dataAyahIbu, dataPelapor, dataSaksi, kk, districtArea, token);
    var cf = confirm("APA ANDA YAKIN SUBMIT");
    if (cf == true) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "kelahiran/submit",
            dataType: 'JSON',
            data: request, //{request: JSON.stringify(request)},
            beforeSend: function (xhr) {
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.status == true) {
                    $('a[data-js-show-step="registrationSteps:9"]').click();
                    $('#noReg').val(response.nomer);
                } else {
                    alert("gagal register");
                }
            },
            complete: function (jqXHR, textStatus) {
                $('.loading').hide();
            }
        });
    } else {
        return false;
    }
}

function getStatusOrtu() {
    var statusOrtu = "";
    $.each($('input[name=statusOrtu]'), function () {
        if ($(this).is(":checked")) {
            statusOrtu = $(this).val();
        }
    });
    var response = {
        //bayi
        statusOrtu: statusOrtu
    };
    return response;
}

function getDataBayi() {
    var status = getStatusOrtu();
    // alert(status.statusOrtu);
    var response = {};
    var namaBayi = new Array();
    var kelaminBayi = new Array();
    var beratBayi = new Array();
    var panjangBayi = new Array();
    var kelahiranKe = new Array();
    var tanggalLahir = new Array();
    var waktuLahir = new Array();
    var jenisLahir = new Array();
    var penolongLahir = new Array();
    var tempatLahir = new Array();
    var propLahir = new Array();
    var kabLahir = new Array();
    if (status.statusOrtu == "2" || status.statusOrtu == "1") {
        // alert("1/2");
        $('div[id^=panelBayi]').each(function () {
            var jenis_kelamin = "";
            $(this).find('input[name="kelaminBayi"]').each(function () {
                if ($(this).is(":checked")) {
                    jenis_kelamin = $(this).val();
                }
            });
            namaBayi.push($(this).find('input[name="namaBayi"]').val());
            //            kelaminBayi.push($(this).find('input[name="kelaminBayi"]').val());
            kelaminBayi.push(jenis_kelamin);
            beratBayi.push($(this).find('input[name="beratBayi"]').val());
            panjangBayi.push($(this).find('input[name="panjangBayi"]').val());
            kelahiranKe.push($(this).find('input[name="kelahiranKe"]').val());
            tanggalLahir.push($(this).find('input[name="tglLahirBayi"]').val());
            waktuLahir.push($(this).find('input[name="waktuLahirBayi"]').val());
            jenisLahir.push($(this).find('select[name="jenisKelahiranBayi"]').val());
            penolongLahir.push($(this).find('select[name="penolongLahirBayi"]').val());
            tempatLahir.push($(this).find('select[name="tempatLahirBayi"]').val());
            propLahir.push($(this).find('select[name="propinsiBayi"]').val());
            kabLahir.push($(this).find('select[name="kotaBayi"]').val());
        });
        var bayiTidakTerlantar = {
            namaBayi: namaBayi,
            kelaminBayi: kelaminBayi,
            beratBayi: beratBayi,
            panjangBayi: panjangBayi,
            kelahiranKe: kelahiranKe,
            tanggalLahir: tanggalLahir,
            waktuLahir: waktuLahir,
            jenisLahir: jenisLahir,
            penolongLahir: penolongLahir,
            tempatLahir: tempatLahir,
            propLahir: propLahir,
            kabLahir: kabLahir
        };
        response = $.extend(response, bayiTidakTerlantar);
        return response;
    } else {
        // alert("3");
        var jenis_kelamin = "";
        $('input[name="kelaminBayiTerlantar"]').each(function () {
            if ($(this).is(":checked")) {
                jenis_kelamin = $(this).val();
            }
        });
        namaBayi.push(document.getElementsByName("namaBayiTerlantar")[0].value);
        kelaminBayi.push(jenis_kelamin);
        beratBayi.push(document.getElementsByName("beratBayiTerlantar")[0].value);
        panjangBayi.push(document.getElementsByName("panjangBayiTerlantar")[0].value);
        kelahiranKe.push("1");
        tanggalLahir.push(document.getElementsByName("tglLahirBayiTerlantar")[0].value);
        jenisLahir.push("1");
        penolongLahir.push("1");
        waktuLahir.push(document.getElementsByName("waktuLahirBayiTerlantar")[0].value);
        tempatLahir.push("1");
        kabLahir.push(document.getElementsByName("kotaLahirBayiTerlantar")[0].value);
        propLahir: propLahir.push("35");
        var bayiTerlantar = {
            namaBayi: namaBayi,
            kelaminBayi: kelaminBayi,
            beratBayi: beratBayi,
            panjangBayi: panjangBayi,
            kelahiranKe: kelahiranKe,
            tanggalLahir: tanggalLahir,
            waktuLahir: waktuLahir,
            jenisLahir: jenisLahir,
            penolongLahir: penolongLahir,
            tempatLahir: tempatLahir,
            propLahir: propLahir,
            kabLahir: kabLahir
        };
        response = $.extend(response, bayiTerlantar);
    }
    return response;
    //    console.log(response);
}

function getDataAyahIbu() {
    //     UNTUK IBU
    var kwnIbu = "";
    $('input[name="kewarganegaraanIb"]').each(function () {
        if ($(this).is(":checked")) {
            kwnIbu = $(this).val();
        }
    });
    var nikIbu = document.getElementsByName("nikIb")[0].value;
    var namaIbu = document.getElementsByName("namaIb")[0].value; //$('#namaIb').val();
    var alamatIbu = document.getElementsByName("alamatIb")[0].value; //$('#alamatIb').val();
    var rtIbu = document.getElementsByName("rtIb")[0].value;
    var rwIbu = document.getElementsByName("rwIb")[0].value;
    var propIbu = document.getElementsByName("propinsiIb")[0].value; //$('#propinsiIb').val();
    var kabupatenIbu = document.getElementsByName("kabupatenIb")[0].value; //$('#kabupatenIb').val();
    var kecamatanIbu = document.getElementsByName("kecamatanIb")[0].value; //$("#kecamatanIb").val();
    var kelurahanIbu = document.getElementsByName("kelurahanIb")[0].value; //$("#kelurahanIb").val();
    var tglLahirIbu = document.getElementsByName("tglLahirIb")[0].value; //$('#tglLahirIb').val();
    var umurIbu = document.getElementsByName("umurIb")[0].value; //$('#umurIb').val();
    var pekerjaanIbu = document.getElementsByName("pekerjaanIb")[0].value; //$('#pekerjaanIb').val();
    var tglKawinIbu = document.getElementsByName("tglPencatatanPerkawinan")[0].value; //$('#tglPencatatanPerkawinan').val();
    // var kwnIbu = document.querySelector('input[name="kewarganegaraanIb"]:checked').value;
    var kebangsaanIbu = document.getElementsByName("kebangsaanIb")[0].value; //$('#kebangsaanIb').val();
    //    UNTUK AYAH
    var kwnAyah = "";
    $('input[name="kewarganegaraanAy"]').each(function () {
        if ($(this).is(":checked")) {
            kwnAyah = $(this).val();
        }
    });
    var nikAyah = document.getElementsByName("nikAy")[0].value; //$('#nikAy').val();
    var namaAyah = document.getElementsByName("namaAy")[0].value; //$('#namaAy').val();
    var alamatAyah = document.getElementsByName("alamatAy")[0].value; //$('#alamatAy').val();
    var rtAyah = document.getElementsByName("rtAy")[0].value;
    var rwAyah = document.getElementsByName("rwAy")[0].value;
    var propAyah = document.getElementsByName("propinsiAy")[0].value; //$('#propinsiAy').val();
    var kabupatenAyah = document.getElementsByName("kabupatenAy")[0].value; //$('#kabupatenAy').val();
    var kecamatanAyah = document.getElementsByName("kecamatanAy")[0].value; //$("#kecamatanAy").val();
    var kelurahanAyah = document.getElementsByName("kelurahanAy")[0].value; //$("#kelurahanAy").val();
    var tglLahirAyah = document.getElementsByName("tglLahirAy")[0].value; //$('#tglLahirAy').val();
    var umurAyah = document.getElementsByName("umurAy")[0].value; //$('#umurAy').val();
    var pekerjaanAyah = document.getElementsByName("pekerjaanAy")[0].value; //$('#pekerjaanAy').val();
    // var kwnAyah = document.querySelector('input[name="kewarganegaraanAy"]:checked').value;
    var kebangsaanAyah = document.getElementsByName("kebangsaanAy")[0].value; //$('#kebangsaanAy').val();
    var response = {
        //ayah
        nikAyah: nikAyah,
        namaAyah: namaAyah,
        alamatAyah: alamatAyah,
        rtAyah: rtAyah,
        rwAyah: rwAyah,
        propAyah: propAyah,
        kabupatenAyah: kabupatenAyah,
        kecamatanAyah: kecamatanAyah,
        kelurahanAyah: kelurahanAyah,
        tglLahirAyah: tglLahirAyah,
        umurAyah: umurAyah,
        pekerjaanAyah: pekerjaanAyah,
        kwnAyah: kwnAyah,
        kebangsaanAyah: kebangsaanAyah,
        //ibu
        nikIbu: nikIbu,
        namaIbu: namaIbu,
        alamatIbu: alamatIbu,
        rtIbu: rtIbu,
        rwIbu: rwIbu,
        propIbu: propIbu,
        kabupatenIbu: kabupatenIbu,
        kecamatanIbu: kecamatanIbu,
        kelurahanIbu: kelurahanIbu,
        tglLahirIbu: tglLahirIbu,
        umurIbu: umurIbu,
        pekerjaanIbu: pekerjaanIbu,
        kwnIbu: kwnIbu,
        kebangsaanIbu: kebangsaanIbu,
        tglKawinIbu: tglKawinIbu
    };
    return response;
}

function getDataPelapor() {
    /*nikPelapor, namaPelapor, alamatPelapor, propinsiPelapor, kabupatenPelapor,
     *              kecamatanPelapor, kelurahanPelapor, kelaminPelapor, umurPelapor,
     *              teleponPelapor, pekerjaanPelapor
     *              */
    var kelaminPelapor = "";
    $('input[name="kelaminPelapor"]').each(function () {
        if ($(this).is(":checked")) {
            kelaminPelapor = $(this).val();
        }
    });
    var nikPelapor = document.getElementsByName("nikPelapor")[0].value; //$('#nikPel').val();
    var namaPelapor = document.getElementsByName("namaPelapor")[0].value; //$('#namaPelapor').val();
    var alamatPelapor = document.getElementsByName("alamatPelapor")[0].value; //$("#alamatPelapor").val();
    var rtPelapor = document.getElementsByName("rtPelapor")[0].value;
    var rwPelapor = document.getElementsByName("rwPelapor")[0].value;
    var propPelapor = document.getElementsByName("propinsiPelapor")[0].value; //$("#propinsiPelapor").val();
    var kabPelapor = document.getElementsByName("kabupatenPelapor")[0].value; //$("#kabupatenPelapor").val();
    var kecPelapor = document.getElementsByName("kecamatanPelapor")[0].value; //$("#kecamatanPelapor").val();
    var kelPelapor = document.getElementsByName("kelurahanPelapor")[0].value; //$("#kelurahanPelapor").val();
    // var kelaminPelapor = document.querySelector('input[name="kelaminPelapor"]:checked').value; //document.getElementsByName("kelaminPelapor")[0].value;//
    var umurPelapor = document.getElementsByName("umurPelapor")[0].value; //$('#umurPelapor').val();
    var pekerjaanPelapor = document.getElementsByName("pekerjaanPelapor")[0].value; //$("#pekerjaan  Pelapor").val();
    var teleponPelapor = document.getElementsByName("teleponPelapor")[0].value; //$("#pekerjaanPelapor").val();
    var response = {
        nikPelapor: nikPelapor,
        namaPelapor: namaPelapor,
        alamatPelapor: alamatPelapor,
        rtPelapor: rtPelapor,
        rwPelapor: rwPelapor,
        propPelapor: propPelapor,
        kabPelapor: kabPelapor,
        kecPelapor: kecPelapor,
        kelPelapor: kelPelapor,
        kelaminPelapor: kelaminPelapor,
        umurPelapor: umurPelapor,
        pekerjaanPelapor: pekerjaanPelapor,
        teleponPelapor: teleponPelapor
    };
    return response;
}

function getDataSaksi() {
    /*      pekerjaanSaksi1, umurSaksi1, kelurahanSaksi1, kecamatanSaksi1, 
     *                          kabupatenSaksi1 propinsiSaksi1 alamatSaksi1 nikSaksi1       --> data saksi 1
     *      pekerjaanSaksi2, umurSaksi2, kelurahanSaksi2, kecamatanSaksi2, 
     *                          kabupatenSaksi2 propinsiSaksi2 alamatSaksi2 nikSaksi2       --> data saksi 2
     */
    var nikSaksi1 = document.getElementsByName("nikSaksi1")[0].value; //$('#nikSaksi1').val();
    var namaSaksi1 = document.getElementsByName("namaSaksi1")[0].value; //$('#namaSaksi1').val();
    var alamatSaksi1 = document.getElementsByName("alamatSaksi1")[0].value; //$("#alamatSaksi1").val();
    var rtSaksi1 = document.getElementsByName("rtSaksi1")[0].value; //$("#alamatSaksi1").val();
    var rwSaksi1 = document.getElementsByName("rwSaksi1")[0].value; //$("#alamatSaksi1").val();
    var propSaksi1 = document.getElementsByName("propinsiSaksi1")[0].value; //$("#propinsiSaksi1").val();
    var kabSaksi1 = document.getElementsByName("kabupatenSaksi1")[0].value; //$("#kabupatenSaksi1").val();
    var kecSaksi1 = document.getElementsByName("kecamatanSaksi1")[0].value; //$("#kecamatanSaksi1").val();
    var kelSaksi1 = document.getElementsByName("kelurahanSaksi1")[0].value; //$("#kelurahanSaksi1").val();
    var umurSaksi1 = document.getElementsByName("umurSaksi1")[0].value; //$('#umurSaksi1').val();
    var pekerjaanSaksi1 = document.getElementsByName("pekerjaanSaksi1")[0].value; //$("#pekerjaanSaksi1").val();
    var nikSaksi2 = document.getElementsByName("nikSaksi2")[0].value; //$('#nikSaksi2').val();
    var namaSaksi2 = document.getElementsByName("namaSaksi2")[0].value; //$('#namaSaksi2').val();
    var alamatSaksi2 = document.getElementsByName("alamatSaksi2")[0].value; //$("#alamatSaksi2").val();
    var rtSaksi2 = document.getElementsByName("rtSaksi2")[0].value; //$("#alamatSaksi1").val();
    var rwSaksi2 = document.getElementsByName("rwSaksi2")[0].value; //$("#alamatSaksi1").val();
    var propSaksi2 = document.getElementsByName("propinsiSaksi2")[0].value; //$("#propinsiSaksi2").val();
    var kabSaksi2 = document.getElementsByName("kabupatenSaksi2")[0].value; //$("#kabupatenSaksi2").val();
    var kecSaksi2 = document.getElementsByName("kecamatanSaksi2")[0].value; //$("#kecamatanSaksi2").val();
    var kelSaksi2 = document.getElementsByName("kelurahanSaksi2")[0].value; //$("#kelurahanSaksi2").val();
    var umurSaksi2 = document.getElementsByName("umurSaksi2")[0].value; //$('#umurSaksi2').val();
    var pekerjaanSaksi2 = document.getElementsByName("pekerjaanSaksi2")[0].value; //$("#pekerjaanSaksi2").val();
    var response = {
        //saksi1
        nikSaksi1: nikSaksi1,
        namaSaksi1: namaSaksi1,
        alamatSaksi1: alamatSaksi1,
        rtSaksi1: rtSaksi1,
        rwSaksi1: rwSaksi1,
        propSaksi1: propSaksi1,
        kabSaksi1: kabSaksi1,
        kecSaksi1: kecSaksi1,
        kelSaksi1: kelSaksi1,
        umurSaksi1: umurSaksi1,
        pekerjaanSaksi1: pekerjaanSaksi1,
        //saksi2
        nikSaksi2: nikSaksi2,
        namaSaksi2: namaSaksi2,
        alamatSaksi2: alamatSaksi2,
        rtSaksi2: rtSaksi2,
        rwSaksi2: rwSaksi2,
        propSaksi2: propSaksi2,
        kabSaksi2: kabSaksi2,
        kecSaksi2: kecSaksi2,
        kelSaksi2: kelSaksi2,
        umurSaksi2: umurSaksi2,
        pekerjaanSaksi2: pekerjaanSaksi2
    };
    return response;
}

function getKK() {
    //noKK, namaKK (nama kepala keluarga)
    var kk = document.getElementsByName("noKK")[0].value; //$("#noKK").val();
    var namaKK = document.getElementsByName("namaKK")[0].value; //$('#namaKK').val();
    var response = {
        kk: kk,
        namaKK: namaKK
    };
    return response;
}

function getDistrictArea() {
    //propinsi, kabupaten, kecamatan, kelurahan
    var propinsi = document.getElementsByName("propinsi")[0].value; //$("#prop").val();
    var kabupaten = document.getElementsByName("kabupaten")[0].value; //$("#kab").val();
    var kecamatan = document.getElementsByName("kecamatan")[0].value; //$("#kab").val();
    var kelurahan = document.getElementsByName("kelurahan")[0].value; //$("#kel").val();
    var response = {
        propinsi: propinsi,
        kabupaten: kabupaten,
        kecamatan: kecamatan,
        kelurahan: kelurahan
    };
    return response;
}

function CekNik(param) {
    //    console.log(param);
    var nik = "";
    if (param == "ayah") {
        nik = document.getElementsByName("nikAy")[0].value;
    } else if (param == "ibu") {
        nik = document.getElementsByName("nikIb")[0].value; //$('#nikIb').val();
    } else if (param == "saksi1") {
        nik = document.getElementsByName("nikSaksi1")[0].value; //$('#nikSaksi1').val();
    } else if (param == "saksi2") {
        nik = document.getElementsByName("nikSaksi2")[0].value; //$('#nikSaksi2').val();
    } else if (param == "pelapor") {
        nik = document.getElementsByName("nikPelapor")[0].value; //$('#nikPel').val();
    }
    $.ajax({
        type: 'GET',
        url: baseUrl + "ceknik",
        data: {
            nik: JSON.stringify(nik)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('.loading').show();
            if (param == "ibu") {
//                alert("NIK IBU TIDAK TERDAFTAR");
                $('input[name=namaIb]').val("");
                $('input[name=alamatIb]').val("");
                $('input[name=rtIb]').val("");
                $('input[name=rwIb]').val("");
                $('input[name=tglLahirIb]').val("");
                $('input[name=umurIb]').val("");
                $('input[name=kebangsaanIb]').val("");
            } else if (param == "ayah") {
//                alert("NIK AYAH TIDAK TERDAFTAR");
                $('input[name=namaAy]').val("");
                $('input[name=alamatAy]').val("");
                $('input[name=rtAy]').val("");
                $('input[name=rwAy]').val("");
                $('input[name=tglLahirAy]').val("");
                $('input[name=umurAy]').val("");
                $('input[name=kebangsaanAy]').val("");
            } else if (param == "pelapor") {
//                alert("NIK PELAPOR TIDAK TERDAFTAR");
                $('input[name=namaPelapor]').val("");
                $('input[name=alamatPelapor]').val("");
                $('input[name=rtPelapor]').val("");
                $('input[name=rwPelapor]').val("");
                $('input[name=umurPelapor]').val("");
                $('input[name=teleponPelapor]').val("");
            } else if (param == "saksi1") {
//                alert("NIK SAKSI1 TIDAK TERDAFTAR");
                $('input[name=namaSaksi1]').val("");
                $('input[name=alamatSaksi1]').val("");
                $('input[name=rtSaksi1]').val("");
                $('input[name=rwSaksi1]').val("");
                $('input[name=umurSaksi1]').val("");
            } else if (param == "saksi2") {
//                alert("NIK SAKSI2 TIDAK TERDAFTAR");
                $('input[name=namaSaksi2]').val("");
                $('input[name=alamatSaksi2]').val("");
                $('input[name=rtSaksi2]').val("");
                $('input[name=rwSaksi2]').val("");
                $('input[name=umurSaksi2]').val("");
            }
        },
        success: function (response, textStatus, jqXHR) {
            //            alert(response.length);
            if (response.length != 0) {
                if (param == "ibu") {
                    if (response[0].JENIS_KLMIN == 2) {
                        $('input[name=namaIb]').val(response[0].NAMA_LGKP);
                        $('input[name=alamatIb]').val(response[0].ALAMAT);
                        $('input[name=rtIb]').val(response[0].NO_RT);
                        $('input[name=rwIb]').val(response[0].NO_RW);
                        $('select[name=propinsiIb]').val(response[0].NO_PROP).selectpicker('refresh');
                        ChangePropinsix("kabupatenIb", response[0].NO_PROP, response[0].NO_KAB);
                        ChangeKabupatenx("kecamatanIb", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC);
                        ChangeKecamatanx("kelurahanIb", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC, response[0].NO_KEL);
                        $('input[name=tglLahirIb]').val(response[0].TGL_LHR);
                        $('input[name=umurIb]').val(response[0].UMUR);
                        $('select[name=pekerjaanIb]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                        $('input[name=tglPencatatanPerkawinan]').val(response[0].TGL_KAWIN);
                        $('input[name="kewarganegaraanIb"]').each(function () {
                            if ($(this).val() == "1") {
                                $(this).prop("checked", true);
                            }
                        });
                        $('input[name=kebangsaanIb]').val("INDONESIA");
                        if (response[0].STAT_KWN == 2) {
                            $('#div-data-ayah').removeClass("hide");
                        } else {
                            $('#div-data-ayah').addClass("hide");
                        }
                    } else {
                        alert("IBU HARUS BERJENIS KELAMIN PEREMPUAN");
                    }
                } else if (param == "ayah") {
                    if (response[0].JENIS_KLMIN == 1) {
                        $('input[name=namaAy]').val(response[0].NAMA_LGKP);
                        $('input[name=alamatAy]').val(response[0].ALAMAT);
                        $('input[name=rtAy]').val(response[0].NO_RT);
                        $('input[name=rwAy]').val(response[0].NO_RW);
                        $('select[name=propinsiAy]').val(response[0].NO_PROP).selectpicker('refresh');
                        ChangePropinsix("kabupatenAy", response[0].NO_PROP, response[0].NO_KAB);
                        ChangeKabupatenx("kecamatanAy", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC);
                        ChangeKecamatanx("kelurahanAy", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC, response[0].NO_KEL);
                        $('input[name=tglLahirAy]').val(response[0].TGL_LHR);
                        $('input[name=umurAy]').val(response[0].UMUR);
                        $('select[name=pekerjaanAy]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                        $('input[name="kewarganegaraanAy"]').each(function () {
                            if ($(this).val() == "1") {
                                $(this).prop("checked", true);
                            }
                        });
                        $('input[name=kebangsaanAy]').val("INDONESIA");
                    } else {
                        alert("AYAH HARUS BERJENIS KELAMIN LAKI-LAKI");
                    }
                } else if (param == "pelapor") {
                    $('input[name=namaPelapor]').val(response[0].NAMA_LGKP);
                    $('input[name=alamatPelapor]').val(response[0].ALAMAT);
                    $('input[name=rtPelapor]').val(response[0].NO_RT);
                    $('input[name=rwPelapor]').val(response[0].NO_RW);
                    $('select[name=propinsiPelapor]').val(response[0].NO_PROP).selectpicker('refresh');
                    ChangePropinsix("kabupatenPelapor", response[0].NO_PROP, response[0].NO_KAB);
                    ChangeKabupatenx("kecamatanPelapor", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC);
                    ChangeKecamatanx("kelurahanPelapor", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC, response[0].NO_KEL);
                    $('input[name="kelaminPelapor"]').each(function () {
                        if ($(this).val() == response[0].JENIS_KLMIN) {
                            $(this).prop("checked", true);
                        }
                    });
                    $('input[name=umurPelapor]').val(response[0].UMUR);
                    $('select[name=pekerjaanPelapor]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                    $('input[name=teleponPelapor]').val();
                } else if (param == "saksi1") {
                    $('input[name=namaSaksi1]').val(response[0].NAMA_LGKP);
                    $('input[name=alamatSaksi1]').val(response[0].ALAMAT);
                    $('input[name=rtSaksi1]').val(response[0].NO_RT);
                    $('input[name=rwSaksi1]').val(response[0].NO_RW);
                    $('select[name=propinsiSaksi1]').val(response[0].NO_PROP).selectpicker('refresh');
                    ChangePropinsix("kabupatenSaksi1", response[0].NO_PROP, response[0].NO_KAB);
                    ChangeKabupatenx("kecamatanSaksi1", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC);
                    ChangeKecamatanx("kelurahanSaksi1", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC, response[0].NO_KEL);
                    $('input[name=umurSaksi1]').val(response[0].UMUR);
                    $('select[name=pekerjaanSaksi1]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                } else if (param == "saksi2") {
                    $('input[name=namaSaksi2]').val(response[0].NAMA_LGKP);
                    $('input[name=alamatSaksi2]').val(response[0].ALAMAT);
                    $('input[name=rtSaksi2]').val(response[0].NO_RT);
                    $('input[name=rwSaksi2]').val(response[0].NO_RW);
                    $('select[name=propinsiSaksi2]').val(response[0].NO_PROP).selectpicker('refresh');
                    ChangePropinsix("kabupatenSaksi2", response[0].NO_PROP, response[0].NO_KAB);
                    ChangeKabupatenx("kecamatanSaksi2", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC);
                    ChangeKecamatanx("kelurahanSaksi2", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC, response[0].NO_KEL);
                    $('input[name=umurSaksi2]').val(response[0].UMUR);
                    $('select[name=pekerjaanSaksi2]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                }
            }
        },
        complete: function (jqXHR, textStatus) {
            $('.loading').hide();
            //            if (param == "ibu" || param == "ayah") {
            //                var status_nik_ibu = $('#status-nik-ibu').val();
            //                var status_nik_ayah = $('#status-nik-ayah').val();
            //                if (status_nik_ibu == "1" && status_nik_ayah == "1") {
            //                    $('#go-step6').removeClass("hide");
            //                    $('#disabled-step5').addClass("hide");
            //                } else {
            //                    $('#go-step6').addClass("hide");
            //                    $('#disabled-step5').removeClass("hide");
            //
            //                }
            //            } else if (param == "pelapor") {
            //                var status_pelapor = $('#status-nik-pelapor').val();
            //                if (status_pelapor == "1") {
            //                    $('#go-step7').removeClass("hide");
            //                    $('#disabled-step6').addClass("hide");
            //                }
            //            } else if (param == "saksi1" || param == "saksi2") {
            //                var status_nik_saksi1 = $('#status-nik-saksi1').val();
            //                var status_nik_saksi2 = $('#status-nik-saksi2').val();
            //                if (status_nik_saksi1 == "1" && status_nik_saksi2 == "1") {
            //                    $('#go-step8').removeClass("hide");
            //                    $('#disabled-step7').addClass("hide");
            //                } else {
            //                    $('#go-step8').addClass("hide");
            //                    $('#disabled-step7').removeClass("hide");
            //
            //                }
            //            }
        }
    });
}

function ChangePropinsix(param, propinsi, kabupaten) {
    var request = {
        propinsi: propinsi
    };
    $.ajax({
        type: 'GET',
        url: baseUrl + "getkabupaten",
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=' + param + ']').empty();
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
            $('select[name=' + param + ']').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=' + param + ']').selectpicker('refresh');
        }
    });
}

function ChangeKabupatenx(param, propinsi, kabupaten, kecamatan) {
    //    var kabupaten = $('select[name=kabupatenPemohon]').val();
    //    var propinsi = $('select[name=propinsiPemohon]').val();
    var request = {
        kabupaten: kabupaten,
        propinsi: propinsi
    };
    $.ajax({
        type: 'GET',
        url: baseUrl + "getkecamatan",
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=' + param + ']').empty();
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
            $('select[name=' + param + ']').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=' + param + ']').selectpicker('refresh');
            //            ChangeKecamatanPemohon();
        }
    });
}

function ChangeKecamatanx(param, propinsi, kabupaten, kecamatan, kelurahan) {
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
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=' + param + ']').empty();
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
            $('select[name=' + param + ']').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=' + param + ']').selectpicker('refresh');
        }
    });
}

function CekKK() {
    var kk = document.getElementById("noKK").value;
    if (kk !== "") {
        $.ajax({
            type: 'GET',
            url: baseUrl + "cekk",
            data: {
                kk: JSON.stringify(kk)
            },
            dataType: 'JSON',
            beforeSend: function (xhr) {
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.length == 0 || response == "") {
                    alert("KK Belum Ada");
                    $('#kk-success').addClass("hide");
                    $('#kk-failed').removeClass("hide");
                    $('#propinsi').val("");
                    $('#kabupaten').val("");
                    $('#kecamatan').val("");
                    $('#kelurahan').val("");
                } else {
                    $('#kk-failed').addClass("hide");
                    $('#kk-success').removeClass("hide");
                    $('#namaKK').val(response[0].NAMA_LGKP_AYAH);
                    $('#propinsi').val(response[0].NO_PROP);
                    $('#kabupaten').val(response[0].NO_KAB);
                    $('#kecamatan').val(response[0].NO_KEC);
                    $('#kelurahan').val(response[0].NO_KEL);
                }
            },
            complete: function (jqXHR, textStatus) {
                $('.loading').hide();
            }
        });
    }
}

function ChangePropinsi(param) {
    var propinsi = "";
    var kabupaten = "";
    switch (param) {
        case "ibu":
            propinsi = $('select[name=propinsiIb]').val();
            kabupaten = "kabupatenIb";
            break;
        case "ayah":
            propinsi = $('select[name=propinsiAy]').val();
            kabupaten = "kabupatenAy";
            break;
        case "pemohon":
            propinsi = $('select[name=propinsiPemohon]').val();
            kabupaten = "kabupatenPemohon";
            break;
        case "saksi1":
            propinsi = $('select[name=propinsiSaksi1]').val();
            kabupaten = "kabupatenSaksi1";
            break;
        case "saksi2":
            propinsi = $('select[name=propinsiSaksi2]').val();
            kabupaten = "kabupatenSaksi2";
            break;
        case "bayi":
            alert("change bayi");
            break;
    }
    var request = {
        propinsi: propinsi
    };
    $.ajax({
        type: 'GET',
        url: baseUrl + "getkabupaten",
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=' + kabupaten + ']').empty();
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
            $('select[name=' + kabupaten + ']').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=' + kabupaten + ']').selectpicker('refresh');
            //            ChangeKabupatenPemohon();
            ChangeKabupaten(param);
        }
    });
}

function ChangeKabupaten(param) {
    var propinsi = "";
    var kabupaten = "";
    var kecamatan = "";
    switch (param) {
        case "ibu":
            propinsi = $('select[name=propinsiIb]').val();
            kabupaten = $('select[name=kabupatenIb]').val();
            kecamatan = "kecamatanIb";
            break;
        case "ayah":
            propinsi = $('select[name=propinsiAy]').val();
            kabupaten = $('select[name=kabupatenAy]').val();
            kecamatan = "kecamatanAy";
            break;
        case "pemohon":
            propinsi = $('select[name=propinsiPemohon]').val();
            kabupaten = $('select[name=kabupatenPemohon]').val();
            kecamatan = "kecamatanPemohon";
            break;
        case "saksi1":
            propinsi = $('select[name=propinsiSaksi1]').val();
            kabupaten = $('select[name=kabupatenSaksi1]').val();
            kecamatan = "kecamatanSaksi1";
            break;
        case "saksi2":
            propinsi = $('select[name=propinsiSaksi2]').val();
            kabupaten = $('select[name=kabupatenSaksi2]').val();
            kecamatan = "kecamatanSaksi2";
            break;
    }
    var request = {
        kabupaten: kabupaten,
        propinsi: propinsi
    };
    $.ajax({
        type: 'GET',
        url: baseUrl + "getkecamatan",
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=' + kecamatan + ']').empty();
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
            $('select[name=' + kecamatan + ']').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=' + kecamatan + ']').selectpicker('refresh');
            ChangeKecamatan(param);
        }
    });
}

function ChangeKecamatan(param) {
    var propinsi = "";
    var kabupaten = "";
    var kecamatan = "";
    var kelurahan = "";
    switch (param) {
        case "ibu":
            propinsi = $('select[name=propinsiIb]').val();
            kabupaten = $('select[name=kabupatenIb]').val();
            kecamatan = $('select[name=kecamatanIb]').val();
            kelurahan = "kelurahanIb";
            break;
        case "ayah":
            propinsi = $('select[name=propinsiAy]').val();
            kabupaten = $('select[name=kabupatenAy]').val();
            kecamatan = $('select[name=kecamatanAy]').val();
            kelurahan = "kelurahanAy";
            break;
        case "pemohon":
            propinsi = $('select[name=propinsiPemohon]').val();
            kabupaten = $('select[name=kabupatenPemohon]').val();
            kecamatan = $('select[name=kecamatanPemohon]').val();
            kelurahan = "kelurahanPemohon";
            break;
        case "saksi1":
            propinsi = $('select[name=propinsiSaksi1]').val();
            kabupaten = $('select[name=kabupatenSaksi1]').val();
            kecamatan = $('select[name=kecamatanSaksi1]').val();
            kelurahan = "kelurahanSaksi1";
            break;
        case "saksi2":
            propinsi = $('select[name=propinsiSaksi2]').val();
            kabupaten = $('select[name=kabupatenSaksi2]').val();
            kecamatan = $('select[name=kecamatanSaksi2]').val();
            kelurahan = "kelurahanSaksi2";
            break;
    }
    var request = {
        kecamatan: kecamatan,
        kabupaten: kabupaten,
        propinsi: propinsi
    };
    $.ajax({
        type: 'GET',
        url: baseUrl + "gekelurahan",
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('select[name=' + kelurahan + ']').empty();
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
            $('select[name=' + kelurahan + ']').append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('select[name=' + kelurahan + ']').selectpicker('refresh');
        }
    });
}

function ChangeDistrictKecamatan() {
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
        data: {
            request: JSON.stringify(request)
        },
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
/*codingan mas ahmad*/
var arrBayi = new Array();
var statusOrtu;
$(document).ready(function () {
    document.forms['formRegLahir'].reset();
    $('.loading').hide();
});

function statusOrtuOnClick(radio) {
    var panelInfoAsing = document.getElementById("panelInformasiAsing");
    var panelInfoWni = document.getElementById("panelInformasiWni");
    var panelInfoTerlantar = document.getElementById("panelInformasiTerlantar");
    var btnInfoLanjutTerlantar = document.getElementById("btnInformasiLanjutTerlantar");
    var btnInfoLanjutNonTerlantar = document.getElementById("btnInformasiLanjutNonTerlantar");
    if (radio.value == 1) {
        statusOrtu = 1;
        panelInfoTerlantar.style = "display:none";
        panelInfoWni.style = "display:block";
        panelInfoAsing.style = "display:none";
        btnInfoLanjutNonTerlantar.style = "display:inline-block";
        btnInfoLanjutTerlantar.style = "display:none";
    } else if (radio.value == 2) {
        statusOrtu = 2;
        panelInfoWni.style = "display:none";
        panelInfoTerlantar.style = "display:none";
        panelInfoAsing.style = "display:block";
        btnInfoLanjutNonTerlantar.style = "display:inline-block";
        btnInfoLanjutTerlantar.style = "display:none";
        //              $('input[name=statusOrtu]').attr('checked',false);
    } else if (radio.value == 3) {
        statusOrtu = 3;
        panelInfoWni.style = "display:none";
        panelInfoAsing.style = "display:none";
        panelInfoTerlantar.style = "display:block";
        btnInfoLanjutTerlantar.style = "display:inline-block";
        btnInfoLanjutNonTerlantar.style = "display:none";
    }
}

function tambahDataBayi() {
    var panelBayi = document.getElementById("panelDataBayi");
    var elPanel = document.createElement("div");
    var elPanelHeader = document.createElement("h4");
    elPanelHeader.appendChild(document.createTextNode("Data Bayi Ke - " + (arrBayi.length + 1)));
    elPanel.appendChild(elPanelHeader);
    var elRow1 = document.createElement("div");
    var elRow2 = document.createElement("div");
    var elRow3 = document.createElement("div");
    var elRow4 = document.createElement("div");
    var elC1R1 = document.createElement("div");
    var lblC1R1 = document.createElement("label");
    var elC2R1 = document.createElement("div");
    var lblC2R1 = document.createElement("label");
    var elC1R2 = document.createElement("div");
    var lblC1R2 = document.createElement("label");
    var elC2R2 = document.createElement("div");
    var lblC2R2 = document.createElement("label");
    var elC3R2 = document.createElement("div");
    var lblC3R2 = document.createElement("label");
    var elC4R2 = document.createElement("div");
    var lblC4R2 = document.createElement("label");
    var elC5R2 = document.createElement("div");
    var lblC5R2 = document.createElement("label");
    var elC1R3 = document.createElement("div");
    var lblC1R3 = document.createElement("label");
    var elC2R3 = document.createElement("div");
    var lblC2R3 = document.createElement("label");
    var elC3R3 = document.createElement("div");
    var lblC3R3 = document.createElement("label");
    var elC1R4 = document.createElement("div");
    var lblC1R4 = document.createElement("label");
    var elC2R4 = document.createElement("div");
    var lblC2R4 = document.createElement("label");
    elPanel.id = "panelBayi" + arrBayi.length;
    elPanel.className = "panel panel-default";
    elRow1.className = "row";
    elRow2.className = "row";
    elRow3.className = "row";
    elRow4.className = "row";
    elC1R1.className = "col-md-6 form-group";
    elC2R1.className = "col-md-6 form-group";
    elC1R2.className = "col-md-2 form-group";
    elC2R2.className = "col-md-2 form-group";
    elC3R2.className = "col-md-2 form-group";
    elC4R2.className = "col-md-3 form-group";
    elC5R2.className = "col-md-3 form-group";
    elC1R3.className = "col-md-3 form-group p-custom-arrow";
    elC2R3.className = "col-md-3 form-group p-custom-arrow";
    elC3R3.className = "col-md-3 form-group p-custom-arrow";
    elC1R4.className = "col-md-3 form-group p-custom-arrow";
    elC2R4.className = "col-md-3 form-group p-custom-arrow";
    elC3R2.style = "width:120px";
    lblC1R1.className = "control-label p-label-required";
    lblC2R1.className = "control-label p-label-required";
    lblC1R2.className = "control-label p-label-required";
    lblC2R2.className = "control-label p-label-required";
    lblC3R2.className = "control-label p-label-required";
    lblC4R2.className = "control-label p-label-required";
    lblC5R2.className = "control-label p-label-required";
    lblC1R3.className = "control-label p-label-required";
    lblC2R3.className = "control-label p-label-required";
    lblC3R3.className = "control-label p-label-required";
    lblC1R4.className = "control-label p-label-required";
    lblC2R4.className = "control-label p-label-required";
    var txtC1R1 = document.createTextNode("Nama Lengkap");
    var txtC2R1 = document.createTextNode("JenisKelamin");
    var txtC1R2 = document.createTextNode("Berat");
    var txtC2R2 = document.createTextNode("Panjang");
    var txtC3R2 = document.createTextNode("Kelahiran Ke-");
    var txtC4R2 = document.createTextNode("Tanggal Lahir");
    var txtC5R2 = document.createTextNode("Waktu Lahir");
    var txtC1R3 = document.createTextNode("Jenis Kelahiran");
    var txtC2R3 = document.createTextNode("Penolong Kelahiran");
    var txtC3R3 = document.createTextNode("Tempat Dilahirkan");
    var txtC1R4 = document.createTextNode("Propinsi Kelahiran");
    var txtC2R4 = document.createTextNode("Kota/Kab Kelahiran");
    lblC1R1.appendChild(txtC1R1);
    lblC2R1.appendChild(txtC2R1);
    lblC1R2.appendChild(txtC1R2);
    lblC2R2.appendChild(txtC2R2);
    lblC3R2.appendChild(txtC3R2);
    lblC4R2.appendChild(txtC4R2);
    lblC5R2.appendChild(txtC5R2);
    lblC1R3.appendChild(txtC1R3);
    lblC2R3.appendChild(txtC2R3);
    lblC3R3.appendChild(txtC3R3);
    lblC1R4.appendChild(txtC1R4);
    lblC2R4.appendChild(txtC2R4);
    elC1R1.appendChild(lblC1R1);
    elC2R1.appendChild(lblC2R1);
    elC1R2.appendChild(lblC1R2);
    elC2R2.appendChild(lblC2R2);
    elC3R2.appendChild(lblC3R2);
    elC4R2.appendChild(lblC4R2);
    elC5R2.appendChild(lblC5R2);
    elC1R3.appendChild(lblC1R3);
    elC2R3.appendChild(lblC2R3);
    elC3R3.appendChild(lblC3R3);
    elC1R4.appendChild(lblC1R4);
    elC2R4.appendChild(lblC2R4);
    elRow1.appendChild(elC1R1);
    elRow1.appendChild(elC2R1);
    elRow2.appendChild(elC1R2);
    elRow2.appendChild(elC2R2);
    elRow2.appendChild(elC3R2);
    elRow2.appendChild(elC4R2);
    elRow2.appendChild(elC5R2);
    elRow3.appendChild(elC1R3);
    elRow3.appendChild(elC2R3);
    elRow3.appendChild(elC3R3);
    elRow4.appendChild(elC1R4);
    elRow4.appendChild(elC2R4);
    var igC1R1 = document.createElement("div");
    var igC2R1 = document.createElement("div");
    var igC1R2 = document.createElement("div");
    var igC2R2 = document.createElement("div");
    var igC3R2 = document.createElement("div");
    var igC4R2 = document.createElement("div");
    var igC5R2 = document.createElement("div");
    var igC1R3 = document.createElement("label");
    var igC2R3 = document.createElement("label");
    var igC3R3 = document.createElement("label");
    var igC1R4 = document.createElement("label");
    var igC2R4 = document.createElement("label");
    igC1R1.className = "input-group p-has-icon";
    igC2R1.className = "p-form-cg pt-form-inline";
    igC1R2.className = "input-group";
    igC2R2.className = "input-group";
    igC3R2.className = "input-group";
    igC4R2.className = "input-group p-has-icon";
    igC5R2.className = "input-group p-has-icon";
    igC1R3.className = "input-group p-custom-arrow";
    igC2R3.className = "input-group p-custom-arrow";
    igC3R3.className = "input-group p-custom-arrow";
    igC1R4.className = "input-group p-custom-arrow";
    igC2R4.className = "input-group p-custom-arrow";
    elC1R1.appendChild(igC1R1);
    elC2R1.appendChild(igC2R1);
    elC1R2.appendChild(igC1R2);
    elC2R2.appendChild(igC2R2);
    elC3R2.appendChild(igC3R2);
    elC4R2.appendChild(igC4R2);
    elC5R2.appendChild(igC5R2);
    elC1R3.appendChild(igC1R3);
    elC2R3.appendChild(igC2R3);
    elC3R3.appendChild(igC3R3);
    elC1R4.appendChild(igC1R4);
    elC2R4.appendChild(igC2R4);
    var inNamaBayi = document.createElement("input");
    inNamaBayi.type = "text";
    inNamaBayi.name = "namaBayi";
    inNamaBayi.className = "form-control";
    inNamaBayi.required = "required";
    var elPfcb1 = document.createElement("div");
    elPfcb1.className = "p-field-cb";
    var elIgIcon1 = document.createElement("span");
    elIgIcon1.className = "input-group-icon";
    var elIPencil1 = document.createElement("i");
    elIPencil1.className = "fa fa-pencil-square-o";
    elIgIcon1.appendChild(elIPencil1);
    igC1R1.appendChild(inNamaBayi);
    igC1R1.appendChild(elPfcb1);
    igC1R1.appendChild(elIgIcon1);
    var elRadio1 = document.createElement("div");
    elRadio1.className = "radio";
    var elLabel1 = document.createElement("label");
    var inKelaminBayi = document.createElement("input");
    inKelaminBayi.type = "radio";
    inKelaminBayi.name = "kelaminBayi";
    inKelaminBayi.value = 1;
    inKelaminBayi.required = "required";
    inKelaminBayi.className = "form-control";
    var elPCheckIcon1 = document.createElement("span");
    elPCheckIcon1.className = "p-check-icon";
    var elPCheckBlock1 = document.createElement("span");
    elPCheckBlock1.className = "p-check-block";
    var elPLabel1 = document.createElement("span");
    elPLabel1.className = "p-label";
    elPLabel1.appendChild(document.createTextNode("Laki-Laki"));
    elPCheckIcon1.appendChild(elPCheckBlock1);
    elLabel1.appendChild(inKelaminBayi);
    elLabel1.appendChild(elPCheckIcon1);
    elLabel1.appendChild(elPLabel1);
    elRadio1.appendChild(elLabel1);
    igC2R1.appendChild(elRadio1);
    var elRadio2 = document.createElement("div");
    elRadio2.className = "radio";
    var elLabel2 = document.createElement("label");
    inKelaminBayi = document.createElement("input");
    inKelaminBayi.type = "radio";
    inKelaminBayi.name = "kelaminBayi";
    inKelaminBayi.value = 2;
    inKelaminBayi.required = "required";
    inKelaminBayi.className = "form-control";
    var elPCheckIcon2 = document.createElement("span");
    elPCheckIcon2.className = "p-check-icon";
    var elPCheckBlock2 = document.createElement("span");
    elPCheckBlock2.className = "p-check-block";
    var elPLabel2 = document.createElement("span");
    elPLabel2.className = "p-label";
    elPLabel2.appendChild(document.createTextNode("Perempuan"));
    elPCheckIcon2.appendChild(elPCheckBlock2);
    elLabel2.appendChild(inKelaminBayi);
    elLabel2.appendChild(elPCheckIcon2);
    elLabel2.appendChild(elPLabel2);
    elRadio2.appendChild(elLabel2);
    igC2R1.appendChild(elRadio2);
    var inBeratBayi = document.createElement("input");
    inBeratBayi.type = "text";
    inBeratBayi.setAttribute("data-js-input-type", "number");
    inBeratBayi.setAttribute("maxlength", "2");
    inBeratBayi.className = "form-control";
    inBeratBayi.name = "beratBayi";
    inBeratBayi.required = "required";
    var elPfcb2 = document.createElement("div");
    elPfcb2.className = "p-field-cb";
    var elIgAddOn1 = document.createElement("span");
    elIgAddOn1.className = "input-group-addon";
    var elPAddOn1 = document.createElement("span");
    elPAddOn1.className = "p-addon-bg";
    elPAddOn1.appendChild(document.createTextNode("Kg"));
    elIgAddOn1.appendChild(elPAddOn1);
    igC1R2.appendChild(inBeratBayi);
    igC1R2.appendChild(elPfcb2);
    igC1R2.appendChild(elIgAddOn1);
    var inPanjangBayi = document.createElement("input");
    inPanjangBayi.className = "form-control";
    inPanjangBayi.type = "text";
    inPanjangBayi.name = "panjangBayi";
    inPanjangBayi.required = "required";
    inPanjangBayi.setAttribute("data-js-input-type", "number");
    inPanjangBayi.setAttribute("maxlength", "2");
    var elPfcbC2R2 = document.createElement("div");
    elPfcbC2R2.className = "p-field-cb";
    var elIgAddOnC2R2 = document.createElement("span");
    elIgAddOnC2R2.className = "input-group-addon";
    var elPAddOnC2R2 = document.createElement("span");
    elPAddOnC2R2.className = "p-addon-bg";
    elPAddOnC2R2.appendChild(document.createTextNode("Cm"));
    elIgAddOnC2R2.appendChild(elPAddOnC2R2);
    igC2R2.appendChild(inPanjangBayi);
    igC2R2.appendChild(elPfcbC2R2);
    igC2R2.appendChild(elIgAddOnC2R2);
    var inKelahiranKe = document.createElement("input");
    inKelahiranKe.type = "number";
    inKelahiranKe.className = "form-control";
    inKelahiranKe.name = "kelahiranKe";
    inKelahiranKe.required = "required";
    inKelahiranKe.setAttribute("data-js-input-type", "number");
    inKelahiranKe.setAttribute("maxlength", "1");
    var elPfcbC3R2 = document.createElement("div");
    elPfcbC3R2.className = "p-field-cb";
    igC3R2.appendChild(inKelahiranKe);
    igC3R2.appendChild(elPfcbC3R2);
    var inTglLahirBayi = document.createElement("input");
    inTglLahirBayi.className = "form-control";
    inTglLahirBayi.name = "tglLahirBayi";
    inTglLahirBayi.placeholder = "date,,";
    inTglLahirBayi.type = "text";
    inTglLahirBayi.required = "required";
    inTglLahirBayi.setAttribute("data-js-datetimepick", "true");
    inTglLahirBayi.setAttribute("data-date-format", "DD.MMM.YYYY");
    var elIgStateC4R2 = document.createElement("span");
    elIgStateC4R2.className = "input-group-state";
    var elPPositionC4R2 = document.createElement("span");
    elPPositionC4R2.className = "p-position";
    var elPTextC4R2 = document.createElement("span");
    elPTextC4R2.className = "p-text";
    var elPVTextC4R2 = document.createElement("span");
    elPVTextC4R2.className = "p-valid-text";
    var elFaCekC4R2 = document.createElement("i");
    elFaCekC4R2.className = "fa fa-check";
    var elPETextC4R2 = document.createElement("span");
    elPETextC4R2.className = "p-error-text";
    var elFaTimeC4R2 = document.createElement("i");
    elFaTimeC4R2.className = "fa fa-times";
    elPVTextC4R2.appendChild(elFaCekC4R2);
    elPETextC4R2.appendChild(elFaTimeC4R2);
    elPTextC4R2.appendChild(elPVTextC4R2);
    elPTextC4R2.appendChild(elPETextC4R2);
    elPPositionC4R2.appendChild(elPTextC4R2);
    elIgStateC4R2.appendChild(elPPositionC4R2);
    var elPfcbC4R2 = document.createElement("span");
    elPfcbC4R2.className = "p-field-cb";
    var elIGIconC4R2 = document.createElement("sppan");
    elIGIconC4R2.className = "input-group-icon";
    var elICalendarC4R2 = document.createElement("i");
    elICalendarC4R2.className = "fa fa-calendar";
    elIGIconC4R2.appendChild(elICalendarC4R2);
    igC4R2.appendChild(inTglLahirBayi);
    igC4R2.appendChild(elIgStateC4R2);
    igC4R2.appendChild(elPfcbC4R2);
    igC4R2.appendChild(elIGIconC4R2);
    var inWaktuLahirBayi = document.createElement("input");
    inWaktuLahirBayi.className = "form-control";
    inWaktuLahirBayi.name = "waktuLahirBayi";
    inWaktuLahirBayi.type = "text";
    inWaktuLahirBayi.required = "required";
    inWaktuLahirBayi.setAttribute("data-js-datetimepick", "true");
    inWaktuLahirBayi.setAttribute("data-date-format", "HH:mm");
    var elIgStateC5R2 = document.createElement("span");
    elIgStateC5R2.className = "input-group-state";
    var elPPositionC5R2 = document.createElement("span");
    elPPositionC5R2.className = "p-position";
    var elPTextC5R2 = document.createElement("span");
    elPTextC5R2.className = "p-text";
    var elPVTextC5R2 = document.createElement("span");
    elPVTextC5R2.className = "p-valid-text";
    var elICheckC5R2 = document.createElement("i");
    elICheckC5R2.className = "fa fa-check";
    var elPETextC5R2 = document.createElement("span");
    elPETextC5R2.className = "p-error-text";
    var elITimesC5R2 = document.createElement("i");
    elITimesC5R2.className = "fa fa-times";
    elPETextC5R2.appendChild(elITimesC5R2);
    elPVTextC5R2.appendChild(elICheckC5R2);
    elPTextC5R2.appendChild(elPVTextC5R2);
    elPTextC5R2.appendChild(elPETextC5R2);
    elPPositionC5R2.appendChild(elPTextC5R2);
    elIgStateC5R2.appendChild(elPPositionC5R2);
    var elPfcbC5R2 = document.createElement("span");
    elPfcbC5R2.className = "p-field-cb";
    var elIGIconC5R2 = document.createElement("span");
    elIGIconC5R2.className = "input-group-icon";
    var elICalendarC5R2 = document.createElement("i");
    elICalendarC5R2.className = "fa fa-calendar";
    elIGIconC5R2.appendChild(elICalendarC5R2);
    igC5R2.appendChild(inWaktuLahirBayi);
    igC5R2.appendChild(elIgStateC5R2);
    igC5R2.appendChild(elPfcbC5R2);
    igC5R2.appendChild(elIGIconC5R2);
    var inJenisLahirBayi = document.createElement("select");
    inJenisLahirBayi.className = "selectpicker form-control";
    inJenisLahirBayi.name = "jenisKelahiranBayi";
    inJenisLahirBayi.required = "required";
    inJenisLahirBayi.title = "pilih salah satu";
    var elOpt1C1R3 = document.createElement("option");
    elOpt1C1R3.value = 1;
    elOpt1C1R3.appendChild(document.createTextNode("Tunggal"));
    var elOpt2C1R3 = document.createElement("option");
    elOpt2C1R3.value = 2;
    elOpt2C1R3.appendChild(document.createTextNode("Kembar 2"));
    var elOpt3C1R3 = document.createElement("option");
    elOpt3C1R3.value = 3;
    elOpt3C1R3.appendChild(document.createTextNode("Kembar 3"));
    var elOpt4C1R3 = document.createElement("option");
    elOpt4C1R3.value = 4;
    elOpt4C1R3.appendChild(document.createTextNode("Kembar 4"));
    var elOpt5C1R3 = document.createElement("option");
    elOpt5C1R3.value = 5;
    elOpt5C1R3.appendChild(document.createTextNode("Lainnya"));
    inJenisLahirBayi.appendChild(elOpt1C1R3);
    inJenisLahirBayi.appendChild(elOpt2C1R3);
    inJenisLahirBayi.appendChild(elOpt3C1R3);
    inJenisLahirBayi.appendChild(elOpt4C1R3);
    inJenisLahirBayi.appendChild(elOpt5C1R3);
    var elPfcbC1R3 = document.createElement("div");
    elPfcbC1R3.className = "p-field-cb";
    var elPSArrowC1R3 = document.createElement("span");
    elPSArrowC1R3.className = "p-select-arrow";
    var elICaretDownC1R3 = document.createElement("i");
    elICaretDownC1R3.className = "fa fa-caret-down";
    elPSArrowC1R3.appendChild(elICaretDownC1R3);
    igC1R3.appendChild(inJenisLahirBayi);
    igC1R3.appendChild(elPfcbC1R3);
    igC1R3.appendChild(elPSArrowC1R3);
    var inPenolongLahirBayi = document.createElement("select");
    inPenolongLahirBayi.className = "selectpicker form-control";
    inPenolongLahirBayi.name = "penolongLahirBayi";
    inPenolongLahirBayi.title = "pilih salah satu";
    inPenolongLahirBayi.required = "required";
    var elOpt1C2R3 = document.createElement("option");
    elOpt1C2R3.value = 1;
    elOpt1C2R3.appendChild(document.createTextNode("Dokter"));
    var elOpt2C2R3 = document.createElement("option");
    elOpt2C2R3.value = 2;
    elOpt2C2R3.appendChild(document.createTextNode("Bidan/Perawat"));
    var elOpt3C2R3 = document.createElement("option");
    elOpt3C2R3.value = 3;
    elOpt3C2R3.appendChild(document.createTextNode("Dukun"));
    var elOpt4C2R3 = document.createElement("option");
    elOpt4C2R3.value = 4;
    elOpt4C2R3.appendChild(document.createTextNode("Lainnya"));
    inPenolongLahirBayi.appendChild(elOpt1C2R3);
    inPenolongLahirBayi.appendChild(elOpt2C2R3);
    inPenolongLahirBayi.appendChild(elOpt3C2R3);
    inPenolongLahirBayi.appendChild(elOpt4C2R3);
    var elPfcbC2R3 = document.createElement("div");
    elPfcbC2R3.className = "p-field-cb";
    var elPSArrowC2R3 = document.createElement("span");
    elPSArrowC2R3.className = "p-select-arrow";
    var elICaretDownC2R3 = document.createElement("i");
    elICaretDownC2R3.className = "fa fa-caret-down";
    elPSArrowC2R3.appendChild(elICaretDownC2R3);
    igC2R3.appendChild(inPenolongLahirBayi);
    igC2R3.appendChild(elPfcbC2R3);
    igC2R3.appendChild(elPSArrowC2R3);
    var inTempatLahirBayi = document.createElement("select");
    inTempatLahirBayi.name = "tempatLahirBayi";
    inTempatLahirBayi.className = "selectpicker form-control";
    inTempatLahirBayi.required = "required";
    inTempatLahirBayi.title = "pilih salah satu";
    var elOpt1C3R3 = document.createElement("option");
    elOpt1C3R3.value = 1;
    elOpt1C3R3.appendChild(document.createTextNode("RS / RumahBersalin"));
    var elOpt2C3R3 = document.createElement("option");
    elOpt2C3R3.value = 2;
    elOpt2C3R3.appendChild(document.createTextNode("Puskesmas"));
    var elOpt3C3R3 = document.createElement("option");
    elOpt3C3R3.value = 3;
    elOpt3C3R3.appendChild(document.createTextNode("Polindes"));
    var elOpt4C3R3 = document.createElement("option");
    elOpt4C3R3.value = 4;
    elOpt4C3R3.appendChild(document.createTextNode("Rumah"));
    var elOpt5C3R3 = document.createElement("option");
    elOpt5C3R3.value = 5;
    elOpt5C3R3.appendChild(document.createTextNode("Lainnya"));
    inTempatLahirBayi.appendChild(elOpt1C3R3);
    inTempatLahirBayi.appendChild(elOpt2C3R3);
    inTempatLahirBayi.appendChild(elOpt3C3R3);
    inTempatLahirBayi.appendChild(elOpt4C3R3);
    inTempatLahirBayi.appendChild(elOpt5C3R3);
    var elPfcbC3R3 = document.createElement("div");
    elPfcbC3R3.className = "p-field-cb";
    var elPSArrowC3R3 = document.createElement("span");
    elPSArrowC3R3.className = "p-select-arrow";
    var elICaretDownC3R3 = document.createElement("i");
    elICaretDownC3R3.className = "fa fa-caret-down";
    elPSArrowC3R3.appendChild(elICaretDownC3R3);
    igC3R3.appendChild(inTempatLahirBayi);
    igC3R3.appendChild(elPfcbC3R3);
    igC3R3.appendChild(elPSArrowC3R3);
    var inPropinsiBayi = document.createElement("select");
    inPropinsiBayi.name = "propinsiBayi";
    inPropinsiBayi.className = "selectpicker form-control";
    inPropinsiBayi.required = "required";
    inPropinsiBayi.title = "pilih salah satu";
    inPropinsiBayi.setAttribute("data-live-search", "true");
    inPropinsiBayi.setAttribute("onchange", "ChangePropinsiBayi(" + arrBayi.length + ");");
    inPropinsiBayi.setAttribute("id", "selectPropBayi" + arrBayi.length);
    //    var elOpt1C1R4 = document.createElement("option");
    //    elOpt1C1R4.value = 32;
    //    elOpt1C1R4.appendChild(document.createTextNode("DKI JAKARTA"));
    //    var elOpt2C1R4 = document.createElement("option");
    //    elOpt2C1R4.value = 33;
    //    elOpt2C1R4.appendChild(document.createTextNode("JAWA BARAT"));
    //    var elOpt3C1R4 = document.createElement("option");
    //    elOpt3C1R4.value = 34;
    //    elOpt3C1R4.appendChild(document.createTextNode("JAWA TENGAH"));
    //    var elOpt4C1R4 = document.createElement("option");
    //    elOpt4C1R4.value = 35;
    //    elOpt4C1R4.appendChild(document.createTextNode("JAWA TIMUR"));
    //
    //    inPropinsiBayi.appendChild(elOpt1C1R4);
    //    inPropinsiBayi.appendChild(elOpt2C1R4);
    //    inPropinsiBayi.appendChild(elOpt3C1R4);
    //    inPropinsiBayi.appendChild(elOpt4C1R4);
    loadPropinsi(arrBayi.length);
    var elPfcbC1R4 = document.createElement("div");
    elPfcbC1R4.className = "p-field-cb";
    var elPSArrowC1R4 = document.createElement("span");
    elPSArrowC1R4.className = "p-select-arrow";
    var elICaretDownC1R4 = document.createElement("i");
    elICaretDownC1R4.className = "fa fa-caret-down";
    elPSArrowC1R4.appendChild(elICaretDownC1R4);
    igC1R4.appendChild(inPropinsiBayi);
    igC1R4.appendChild(elPfcbC1R4);
    igC1R4.appendChild(elPSArrowC1R4);
    var inKotaBayi = document.createElement("select");
    inKotaBayi.name = "kotaBayi";
    inKotaBayi.className = "selectpicker form-control";
    inKotaBayi.required = "required";
    inKotaBayi.title = "pilih salah satu";
    inKotaBayi.setAttribute("data-live-search", "true");
    //    inKotaBayi.setAttribute("onchange", "ChangePropinsiBayi(" + arrBayi.length + ");");
    inKotaBayi.setAttribute("id", "selectKotaBayi" + arrBayi.length);
    //    var elOpt1C2R4 = document.createElement("option");
    //    elOpt1C2R4.value = 1;
    //    elOpt1C2R4.appendChild(document.createTextNode("Surabaya"));
    //    var elOpt2C2R4 = document.createElement("option");
    //    elOpt2C2R4.value = 1;
    //    elOpt2C2R4.appendChild(document.createTextNode("Gresik"));
    //
    //    inKotaBayi.appendChild(elOpt1C2R4);
    //    inKotaBayi.appendChild(elOpt2C2R4);
    loadkabupaten(arrBayi.length);
    var elPfcbC2R4 = document.createElement("div");
    elPfcbC2R4.className = "p-field-cb";
    var elPSArrowC2R4 = document.createElement("span");
    elPSArrowC2R4.className = "p-select-arrow";
    var elICaretDownC4R3 = document.createElement("i");
    elICaretDownC4R3.className = "fa fa-caret-down";
    elPSArrowC2R4.appendChild(elICaretDownC4R3);
    igC2R4.appendChild(inKotaBayi);
    igC2R4.appendChild(elPfcbC2R4);
    igC2R4.appendChild(elPSArrowC2R4);
    elPanel.appendChild(elRow1);
    elPanel.appendChild(elRow2);
    elPanel.appendChild(elRow3);
    elPanel.appendChild(elRow4);
    panelBayi.appendChild(elPanel);
    arrBayi.push([
        [''],
        ['']
    ]);
    $('#panelDataBayi').fpInit();
    $('.selectpicker').selectpicker();
    if (arrBayi.length == 1) {
        var btnBayiLanjutOn = document.getElementById("btnBayiLanjutOn");
        var btnBayiLanjutOff = document.getElementById("btnBayiLanjutOff");
        btnBayiLanjutOn.style = "display:inline-block";
        btnBayiLanjutOff.style = "display:none";
    }
}

function kurangiDataBayi() {
    if (arrBayi.length > 0) {
        var n = arrBayi.length - 1;
        var pb = document.getElementById("panelBayi" + n);
        pb.parentNode.removeChild(pb);
        arrBayi.pop();
    }
    if (arrBayi.length == 0) {
        var btnBayiLanjutOn = document.getElementById("btnBayiLanjutOn");
        var btnBayiLanjutOff = document.getElementById("btnBayiLanjutOff");
        btnBayiLanjutOn.style = "display:none";
        btnBayiLanjutOff.style = "display:inline-block";
    }
}

function ChangePropinsiBayi(param) {
    var propinsi = $('#selectPropBayi' + param).val();
    var request = {
        propinsi: propinsi
    };
    $.ajax({
        type: 'GET',
        url: baseUrl + "getkabupaten",
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('#selectKotaBayi' + param).empty();
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
            $('#selectKotaBayi' + param).append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('#selectKotaBayi' + param).selectpicker('refresh');
        }
    });
}

function loadPropinsi(param) {
    //    param = 0
    $.ajax({
        url: baseUrl + 'getpropinsi',
        type: 'GET',
        dataType: 'JSON',
        // data: {param1: 'value1'},
        beforeSend: function (xhr) {
            $('#selectPropBayi' + param).empty();
        },
        success: function (response, textStatus, xhr) {
            var option = "";
            $.each(response, function (key, value) {
                if (value.NO_PROP == 35) {
                    option += "<option value='" + value.NO_PROP + "' selected=''>" + value.NAMA_PROP + "</option>";
                } else {
                    option += "<option value='" + value.NO_PROP + "'>" + value.NAMA_PROP + "</option>";
                }
            });
            $('#selectPropBayi' + param).append(option);
        },
        complete: function (xhr, textStatus) {
            $('#selectPropBayi' + param).selectpicker('refresh');
        }
    });
}

function loadkabupaten(param) {
    var request = {
        propinsi: 35
    };
    $.ajax({
        type: 'GET',
        url: baseUrl + "getkabupaten",
        data: {
            request: JSON.stringify(request)
        },
        dataType: 'JSON',
        beforeSend: function (xhr) {
            $('#selectKotaBayi' + param).empty();
        },
        success: function (response, textStatus, jqXHR) {
            var option = "";
            $.each(response, function (key, value) {
                if (value.NO_KAB == 25) {
                    option += "<option value='" + value.NO_KAB + "' selected=''>" + value.NAMA_KAB + "</option>";
                } else {
                    option += "<option value='" + value.NO_KAB + "'>" + value.NAMA_KAB + "</option>";
                }
            });
            $('#selectKotaBayi' + param).append(option);
        },
        complete: function (jqXHR, textStatus) {
            $('#selectKotaBayi' + param).selectpicker('refresh');
        }
    });
}

//function cetakNo(){
//    window.open(baseUrl, "")
//}
/**
 * List, nama attribute yang ada di halaman ini :
 * 		noReg,	
 *      jenisPenduduk, 			-- value = 1 (wni) | 2(orang asing)
 *		alasanPermohonan,
 *		jenisPernikahan,
 *		noKitap, tglAkhirKitap,   	--> Keterangan Izin Tinggal Tetap
 *
 *		nikKepala, namaKepala, alamatKepala, propinsiKepala, 
 *			kabupatenKepala, kecamatanKepala,  kelurahanKepala,
 *			kdPosKepala, rtKepala, rwKepala, tlpKepala, pekerjaanKepala.   --> data Kepala Keluarga
 *		
 *		nikAnggota, namaAnggota, kkAnggota   --> data Anggota Keluarga  
 * 		
 *		hubunganKeluarga(arrAnggota[ke-i])             --> data hubungan keluarga
 *
 *		propinsi, kabupaten, kecamatan, kelurahan		 --> data district area/ wil.Pemerintahan
 *
 **/

function getData() {
    var penduduk = getDataPenduduk();
    var pelapor = getDatapelapor();
    var jenazah = getDataJenazah();
    var ayahIbu = getDataAyahIbu();
    var saksi = getDataSaksi();
    var district = getDistrictArea();

    var request = $.extend({}, penduduk, pelapor, jenazah, ayahIbu, saksi, district);
    var token_name = $('meta[name="token_name"]').attr("content");
    var cf = confirm("APA ANDA YAKIN SUBMIT");
    if (cf == true) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "kematian/submit",
            dataType: 'JSON',
            data: {token_name: token_name, request: JSON.stringify(request)}, //{request: JSON.stringify(request)},
            beforeSend: function (xhr) {
                $('.loading').show();
            },
            success: function (response, textStatus, jqXHR) {
                if (response.status == true) {
                    $('a[data-js-show-step="registrationSteps:7"]').click();
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

function getDataPenduduk() {
    var statusPenduduk = "";
    $.each($('input[name=jenisPenduduk]'), function () {
        if ($(this).is(":checked")) {
            statusPenduduk = $(this).val();
        }
    });
    var response = {
        statusPenduduk: statusPenduduk
    };
    return response;
}

function getDatapelapor() {
    var nikPelapor = document.getElementsByName("nikPelapor")[0].value; //$('#nikPel').val();
    var namaPelapor = document.getElementsByName("namaPelapor")[0].value; //$('#namaPelapor').val();
    var alamatPelapor = document.getElementsByName("alamatPelapor")[0].value; //$("#alamatPelapor").val();
    var rtPelapor = document.getElementsByName("rtPelapor")[0].value;
    var rwPelapor = document.getElementsByName("rwPelapor")[0].value;
    var propPelapor = document.getElementsByName("propinsiPelapor")[0].value; //$("#propinsiPelapor").val();
    var kabPelapor = document.getElementsByName("kabupatenPelapor")[0].value; //$("#kabupatenPelapor").val();
    var kecPelapor = document.getElementsByName("kecamatanPelapor")[0].value; //$("#kecamatanPelapor").val();
    var kelPelapor = document.getElementsByName("kelurahanPelapor")[0].value; //$("#kelurahanPelapor").val();
    var tgllahirPelapor = document.getElementsByName("tglLahirPelapor")[0].value;
    var umurPelapor = document.getElementsByName("umurPelapor")[0].value; //$('#umurPelapor').val();
    var teleponPelapor = document.getElementsByName("teleponPelapor")[0].value; //$("#pekerjaanPelapor").val();
    var pekerjaanPelapor = document.getElementsByName("pekerjaanPelapor")[0].value; //$("#pekerjaan  Pelapor").val();

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
        tgllahirPelapor: tgllahirPelapor,
        umurPelapor: umurPelapor,
        pekerjaanPelapor: pekerjaanPelapor,
        teleponPelapor: teleponPelapor
    };
    return response;
    console.log(response);
}

function getDataJenazah() {
    var kelaminJenazah = "";
    $('input[name="kelaminJenazah"]').each(function () {
        if ($(this).is(":checked")) {
            kelaminJenazah = $(this).val();
        }
    });
    var nikJenazah = $('input[name=nikJenazah]').val();
    var kkJenazah = $('input[name=kkJenazah]').val();
    var namaJenazah = $('input[name=namaJenazah]').val();
    var alamatJenazah = $('input[name=alamatJenazah]').val();
    var rtJenazah = $('input[name=rtJenazah]').val();
    var rwJenazah = $('input[name=rwJenazah]').val();
    var propinsiJenazah = $('select[name=propinsiJenazah]').val();
    var kabupatenJenazah = $('select[name=kabupatenJenazah]').val();
    var kecamatanJenazah = $('select[name=kecamatanJenazah]').val();
    var kelurahanJenazah = $('select[name=kelurahanJenazah]').val();
    var anakKe = $('input[name=kelahiranKe]').val();
    var tglLahirJenazah = $('input[name=tglLahirJenazah]').val();
    var umurJenazah = $('input[name=umurJenazah]').val();
    var propinsiKelahiranJenazah = $('select[name=propinsiKelahiranJenazah]').val();
    var kabupatenKelahiranJenazah = $('select[name=kabupatenKelahiranJenazah]').val();
    var agamaJenazah = $('select[name=agamaJenazah]').val();
    var pekerjaanJenazah = $('select[name=pekerjaanJenazah]').val();
    var tglKematian = $('input[name=tglKematian]').val();
    var jamKematian = $('input[name=waktuKematian]').val();
    var tempatKematian = $('input[name=tempatKematian]').val();
    var penyebabKematian = $('select[name=sebabKematian]').val();
    var yangMenerangkan = $('select[name=menerangkanKematian]').val();

    var response = {
        nikJenazah: nikJenazah,
        kkJenazah: kkJenazah,
        namaJenazah: namaJenazah,
        alamatJenazah: alamatJenazah,
        rtJenazah: rtJenazah,
        rwJenazah: rwJenazah,
        propinsiJenazah: propinsiJenazah,
        kabupatenJenazah: kabupatenJenazah,
        kecamatanJenazah: kecamatanJenazah,
        kelurahanJenazah: kelurahanJenazah,
        anakKe: anakKe,
        tglLahirJenazah: tglLahirJenazah,
        umurJenazah: umurJenazah,
        propinsiKelahiranJenazah: propinsiKelahiranJenazah,
        kabupatenKelahiranJenazah: kabupatenKelahiranJenazah,
        agamaJenazah: agamaJenazah,
        pekerjaanJenazah: pekerjaanJenazah,
        tglKematian: tglKematian,
        jamKematian: jamKematian,
        tempatKematian: tempatKematian,
        penyebabKematian: penyebabKematian,
        yangMenerangkan: yangMenerangkan,
        kelaminJenazah: kelaminJenazah
    };
    return response;
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

    //    UNTUK AYAH
    var kwnAyah = "";
    $('input[name="kewarganegaraanAy"]').each(function () {
        if ($(this).is(":checked")) {
            kwnAyah = $(this).val();
        }
    });
    var nikAyah = document.getElementsByName("nikAy")[0].value; //$('#nikAy').val();
    var namaAyah = document.getElementsByName("namaAy")[0].value; //$('#namaAy').val();
    var rtAyah = document.getElementsByName("rtAy")[0].value;
    var rwAyah = document.getElementsByName("rwAy")[0].value;
    var alamatAyah = document.getElementsByName("alamatAy")[0].value; //$('#alamatAy').val();
    var propAyah = document.getElementsByName("propinsiAy")[0].value; //$('#propinsiAy').val();
    var kabupatenAyah = document.getElementsByName("kabupatenAy")[0].value; //$('#kabupatenAy').val();
    var kecamatanAyah = document.getElementsByName("kecamatanAy")[0].value; //$("#kecamatanAy").val();
    var kelurahanAyah = document.getElementsByName("kelurahanAy")[0].value; //$("#kelurahanAy").val();
    var tglLahirAyah = document.getElementsByName("tglLahirAy")[0].value; //$('#tglLahirAy').val();
    var umurAyah = document.getElementsByName("umurAy")[0].value; //$('#umurAy').val();
    var pekerjaanAyah = document.getElementsByName("pekerjaanAy")[0].value; //$('#pekerjaanAy').val();

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
        kwnIbu: kwnIbu
    };
    return response;
}

function getDataSaksi() {
    /*		pekerjaanSaksi1, umurSaksi1, kelurahanSaksi1, kecamatanSaksi1, 
     *							kabupatenSaksi1 propinsiSaksi1 alamatSaksi1 nikSaksi1		--> data saksi 1
     *		pekerjaanSaksi2, umurSaksi2, kelurahanSaksi2, kecamatanSaksi2, 
     *							kabupatenSaksi2 propinsiSaksi2 alamatSaksi2 nikSaksi2		--> data saksi 2
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
    var umurSaksi1 = document.getElementsByName("umurSaksi1")[0].value; //$("#kecamatanSaksi1").val();
    var pekerjaanSaksi1 = document.getElementsByName("pekerjaanSaksi1")[0].value; //$("#kelurahanSaksi1").val();


    var nikSaksi2 = document.getElementsByName("nikSaksi2")[0].value; //$('#nikSaksi2').val();
    var namaSaksi2 = document.getElementsByName("namaSaksi2")[0].value; //$('#namaSaksi2').val();
    var alamatSaksi2 = document.getElementsByName("alamatSaksi2")[0].value; //$("#alamatSaksi2").val();
    var rtSaksi2 = document.getElementsByName("rtSaksi2")[0].value; //$("#alamatSaksi1").val();
    var rwSaksi2 = document.getElementsByName("rwSaksi2")[0].value; //$("#alamatSaksi1").val();
    var propSaksi2 = document.getElementsByName("propinsiSaksi2")[0].value; //$("#propinsiSaksi2").val();
    var kabSaksi2 = document.getElementsByName("kabupatenSaksi2")[0].value; //$("#kabupatenSaksi2").val();
    var kecSaksi2 = document.getElementsByName("kecamatanSaksi2")[0].value; //$("#kecamatanSaksi2").val();
    var kelSaksi2 = document.getElementsByName("kelurahanSaksi2")[0].value; //$("#kelurahanSaksi2").val();
    var umurSaksi2 = document.getElementsByName("umurSaksi2")[0].value; //$("#kecamatanSaksi1").val();
    var pekerjaanSaksi2 = document.getElementsByName("pekerjaanSaksi2")[0].value; //$("#kelurahanSaksi1").val();


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
        pekerjaanSaksi2: pekerjaanSaksi2,
    };
    return response;
}

function getDistrictArea() {
    //propinsi, kabupaten, kecamatan, kelurahan
    var propinsi = document.getElementsByName("propinsiJenazah")[0].value; //$("#prop").val();
    var kabupaten = document.getElementsByName("kabupatenJenazah")[0].value; //$("#kab").val();
    var kecamatan = document.getElementsByName("kecamatanJenazah")[0].value; //$("#kab").val();
    var kelurahan = document.getElementsByName("kelurahanJenazah")[0].value; //$("#kel").val();
    var response = {
        propinsi: propinsi,
        kabupaten: kabupaten,
        kecamatan: kecamatan,
        kelurahan: kelurahan
    };
    return response;
}

function CekNik(param) {
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
    } else if (param == "jenazah") {
        nik = document.getElementsByName("nikJenazah")[0].value; //$('#nikPel').val();
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
            $('a[data-js-show-step-force="registrationSteps:4"]').addClass("hide");
        },
        success: function (response, textStatus, jqXHR) {
            if (response.length != 0) {
                if (param == "ibu") {
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
                } else if (param == "ayah") {
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
                    $('input[name=teleponPelapor]').val("");
                    $('input[name=tglLahirPelapor]').val(response[0].TGL_LHR);

                    $('a[data-js-show-step-force="registrationSteps:4"]').removeClass("hide");
                    $('#btn-skip-step4').addClass("hide");
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
                } else if (param == "jenazah") {
                    $('input[name=namaJenazah]').val(response[0].NAMA_LGKP);
                    $('input[name=alamatJenazah]').val(response[0].ALAMAT);
                    $('input[name=rtJenazah]').val(response[0].NO_RT);
                    $('input[name=rwJenazah]').val(response[0].NO_RW);
                    $('select[name=propinsiJenazah]').val(response[0].NO_PROP).selectpicker('refresh');
                    ChangePropinsix("kabupatenJenazah", response[0].NO_PROP, response[0].NO_KAB);
                    ChangeKabupatenx("kecamatanJenazah", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC);
                    ChangeKecamatanx("kelurahanJenazah", response[0].NO_PROP, response[0].NO_KAB, response[0].NO_KEC, response[0].NO_KEL);
                    $('input[name="kelaminJenazah"]').each(function () {
                        if ($(this).val() == response[0].JENIS_KLMIN) {
                            $(this).prop("checked", true);
                        }
                    });
                    $('input[name=umurJenazah]').val(response[0].UMUR);
                    $('select[name=pekerjaanJenazah]').val(response[0].JENIS_PKRJN).selectpicker('refresh');
                    $('input[name=tglLahirJenazah]').val(response[0].TGL_LHR);
                    $('select[name=agamaJenazah]').val(response[0].AGAMA).selectpicker('refresh');
                    $('#nik-jenazah').val(1);
                    $('input[name=kkJenazah]').val(response[0].NO_KK);
                }
            } else {
                if (param == "ibu") {
                    alert("NIK IBU TIDAK TERDAFTAR");
                    $('input[name=namaIb]').val("");
                    $('input[name=alamatIb]').val("");
                    $('input[name=rtIb]').val("");
                    $('input[name=rwIb]').val("");
                    $('input[name=tglLahirIb]').val("");
                    $('input[name=umurIb]').val("");
                    $('input[name=kebangsaanIb]').val("");
                } else if (param == "ayah") {
                    alert("NIK AYAH TIDAK TERDAFTAR");
                    $('input[name=namaAy]').val("");
                    $('input[name=alamatAy]').val("");
                    $('input[name=rtAy]').val("");
                    $('input[name=rwAy]').val("");
                    $('input[name=tglLahirAy]').val("");
                    $('input[name=umurAy]').val("");
                    $('input[name=kebangsaanAy]').val("");
                } else if (param == "pelapor") {
                    alert("NIK PELAPOR TIDAK TERDAFTAR");
                    $('input[name=namaPelapor]').val("");
                    $('input[name=alamatPelapor]').val("");
                    $('input[name=rtPelapor]').val("");
                    $('input[name=rwPelapor]').val("");
                    $('input[name=umurPelapor]').val("");
                    $('input[name=teleponPelapor]').val("");
                    $('a[data-js-show-step-force="registrationSteps:4"]').addClass("hide");
                    $('#btn-skip-step4').removeClass("hide");

                } else if (param == "saksi1") {
                    alert("NIK SAKSI1 TIDAK TERDAFTAR");
                    $('input[name=namaSaksi1]').val("");
                    $('input[name=alamatSaksi1]').val("");
                    $('input[name=rtSaksi1]').val("");
                    $('input[name=rwSaksi1]').val("");
                    $('input[name=umurSaksi1]').val("");
                } else if (param == "saksi2") {
                    alert("NIK SAKSI2 TIDAK TERDAFTAR");
                    $('input[name=namaSaksi2]').val("");
                    $('input[name=alamatSaksi2]').val("");
                    $('input[name=rtSaksi2]').val("");
                    $('input[name=rwSaksi2]').val("");
                    $('input[name=umurSaksi2]').val("");
                } else if (param == "jenazah") {
                    alert("on progress");
                }
            }
        },
        complete: function (jqXHR, textStatus) {
            if (param == "jenazah") {
                var status = cekStatusJenazah();
                console.log(status);
                if (status == true) {
                    $('button[data-js-show-step-force="registrationSteps:5"]').prop("disabled", false);
                } else {
                    $('button[data-js-show-step-force="registrationSteps:5"]').prop("disabled", true);
                }
            }
            $('.loading').hide();
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

function ChangeKecamatan(param) {
    var propinsi = "";
    var kabupaten = "";
    var kecamatan = "";
    var kelurahan = "";
    switch (param) {
        case "pelapor":
            propinsi = $('select[name=propinsiPelapor]').val();
            kabupaten = $('select[name=kabupatenPelapor]').val();
            kecamatan = $('select[name=kecamatanPelapor]').val();
            kelurahan = "kelurahanPelapor";
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
        case "pelapor":
            propinsi = $('select[name=propinsipelapor]').val();
            kabupaten = "kabupatenPelapor";
            break;
        case "saksi1":
            propinsi = $('select[name=propinsiSaksi1]').val();
            kabupaten = "kabupatenSaksi1";
            break;
        case "saksi2":
            propinsi = $('select[name=propinsiSaksi2]').val();
            kabupaten = "kabupatenSaksi2";
            break;
        case "jenazah":
            propinsi = $('select[name=propinsiJenazah]').val();
            kabupaten = "kabupatenJenazah";
            break;
        case "propinsi_kelahiran":
            propinsi = $('select[name=propinsiKelahiranJenazah]').val();
            kabupaten = "kabupatenKelahiranJenazah";
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
            if (param != "propinsi_kelahiran")
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
        case "pelapor":
            propinsi = $('select[name=propinsiPelapor]').val();
            kabupaten = $('select[name=kabupatenPelapor]').val();
            kecamatan = "kecamatanPelapor";
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
        case "jenazah":
            propinsi = $('select[name=propinsiJenazah]').val();
            kabupaten = $('select[name=kabupatenJenazah]').val();
            kecamatan = "kecamatanJenazah";
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
        case "pelapor":
            propinsi = $('select[name=propinsiPelapor]').val();
            kabupaten = $('select[name=kabupatenPelapor]').val();
            kecamatan = $('select[name=kecamatanPelapor]').val();
            kelurahan = "kelurahanPelapor";
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
        case "jenazah":
            propinsi = $('select[name=propinsiJenazah]').val();
            kabupaten = $('select[name=kabupatenJenazah]').val();
            kecamatan = $('select[name=kecamatanJenazah]').val();
            kelurahan = "kelurahanJenazah";
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

function CekKK() {
    var kk = document.getElementsByName("kkJenazah")[0].value;
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
                } else {
                    $('#kk-jenazah').val(1);
                }
            },
            complete: function (jqXHR, textStatus) {
                var status = cekStatusJenazah();
                console.log(status);
                if (status == true) {
                    $('button[data-js-show-step-force="registrationSteps:5"]').prop("disabled", false);
                } else {
                    $('button[data-js-show-step-force="registrationSteps:5"]').prop("disabled", true);
                }
                $('.loading').hide();
            }
        });
    }
}

function cekStatusJenazah() {
    var response = false;
    var statusNikJenazah = $('#nik-jenazah').val();
    var statusKkJenazah = $('#kk-jenazah').val();
    if (statusKkJenazah == "1" && statusNikJenazah == "1") {
        response = true;
    } else {
        response = false;
    }
    return response;
}

$(document).ready(function () {
    $('.loading').hide();
});
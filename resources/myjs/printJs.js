function PrintNomorRegistrasi() {
    var noReg = encodeURIComponent($('#noReg').val());
    var url = "ktp/print?noReg=" + noReg;
    var x = screen.width / 2 - 700 / 2;
    var y = screen.height / 2 - 450 / 2;
    window.open(baseUrl + url, 'sharegplus', 'height=485,width=700,left=' + x + ',top=' + y);
}
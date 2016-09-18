$('.date-picker').datepicker({
    rtl: App.isRTL(),
    autoclose: true
});

// deklarasi path url host
var url = window.location.origin+"/fti-unwaha/admin/";

//fungsi goback
function goBack()
{
    window.history.back();
}

// Fungsi Popup Window
function popupWindow(win,trget){
    var winWidth, winHeight =400;
    newWindow = window.open(win,trget,'toolbar=no,location=no,scrollbars=no,resizable=yes,width='+winWidth+',height='+winHeight+',left=0,top=0');
    newWindow.focus();
}

/**
* Modal Function
* pondokkode - Web Project Development
*/

/** modal delete */
// Modal Delete User
$(".modal-delete-user").click(function(){ // Click to only happen on announce links
     $("#id_user_modal").val($(this).data('id'));
     document.getElementById("nama_user").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteUser').modal('show');
});

// Modal Delete Berita
$(".modal-delete-berita").click(function(){ // Click to only happen on announce links
     $("#id_berita_modal").val($(this).data('id'));
     document.getElementById("judul_berita").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteBerita').modal('show');
});

// Modal Delete Artikel
$(".modal-delete-artikel").click(function(){ // Click to only happen on announce links
     $("#id_artikel_modal").val($(this).data('id'));
     document.getElementById("judul_artikel").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteArtikel').modal('show');
});

// Modal Delete Agenda
$(".modal-delete-agenda").click(function(){ // Click to only happen on announce links
     $("#id_agenda_modal").val($(this).data('id'));
     document.getElementById("judul_agenda").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteAgenda').modal('show');
});

// Modal Delete Pengumuman
$(".modal-delete-pengumuman").click(function(){ // Click to only happen on announce links
     $("#id_pengumuman_modal").val($(this).data('id'));
     document.getElementById("judul_pengumuman").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeletePengumuman').modal('show');
});

// Modal Delete Siswa
$(".modal-delete-guru").click(function(){ // Click to only happen on announce links
     $("#id_guru_modal").val($(this).data('id'));
     document.getElementById("nama").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteGuru').modal('show');
});

// Modal Delete Siswa
$(".modal-delete-siswa").click(function(){ // Click to only happen on announce links
     $("#id_siswa_modal").val($(this).data('id'));
     document.getElementById("nama").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteSiswa').modal('show');
});

// Modal Delete File
$(".modal-delete-file").click(function(){ // Click to only happen on announce links
     $("#id_file_modal").val($(this).data('id'));
     $("#status_file_modal").val($(this).data('status'));
     document.getElementById("judul_file").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteFile').modal('show');
});

// Modal Delete Testimoni
$(".modal-delete-testimoni").click(function(){ // Click to only happen on announce links
     $("#id_testimoni").val($(this).data('id'));
     var nama = $(this).data('nama');
     document.getElementById("nama_testimoni").innerHTML = addslashes(nama);
     $('#ModalDeleteTestimoni').modal('show');
});

// Modal Delete album
$(".modal-delete-album").click(function(){ // Click to only happen on announce links
     $("#id_album").val($(this).data('id'));
     document.getElementById("nama_album").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteAlbum').modal('show');
});

// Modal Delete foto galeri
$(".modal-delete-foto").click(function(){ // Click to only happen on announce links
     $("#id_foto_galeri").val($(this).data('id'));
     document.getElementById("nama_foto").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteFoto').modal('show');
});

// Modal Delete Banner
$(".modal-delete-banner").click(function(){ // Click to only happen on announce links
     $("#id_banner").val($(this).data('id'));
     document.getElementById("nama_banner").innerHTML = addslashes($(this).data('nama'));
     $('#ModalDeleteBanner').modal('show');
});

/** modal aktivasi **/
// Modal Aktivasi User
$(".modal-aktivasi-user").click(function(){ // Click to only happen on announce links
     $("#id_user_modal").val($(this).data('id'));
     $("#status_user_modal").val($(this).data('status'));
     document.getElementById("user_nama").innerHTML = $(this).data('nama');
     $('#ModalAktivasiUser').modal('show');
});

// Modal Aktivasi Berita
$(".modal-aktivasi-berita").click(function(){ // Click to only happen on announce links
     $("#id_berita_modal").val($(this).data('id'));
     $("#status_berita_modal").val($(this).data('status'));
     document.getElementById("berita_judul").innerHTML = $(this).data('nama');
     $('#ModalAktivasiBerita').modal('show');
});

// Modal Aktivasi Artikel
$(".modal-aktivasi-artikel").click(function(){ // Click to only happen on announce links
     $("#id_artikel_modal").val($(this).data('id'));
     $("#status_artikel_modal").val($(this).data('status'));
     document.getElementById("artikel_judul").innerHTML = $(this).data('nama');
     $('#ModalAktivasiArtikel').modal('show');
});

// Modal Aktivasi Agenda
$(".modal-aktivasi-agenda").click(function(){ // Click to only happen on announce links
     $("#id_agenda_modal").val($(this).data('id'));
     $("#status_agenda_modal").val($(this).data('status'));
     document.getElementById("agenda_judul").innerHTML = $(this).data('nama');
     $('#ModalAktivasiAgenda').modal('show');
});

// Modal Aktivasi Pengumuman
$(".modal-aktivasi-pengumuman").click(function(){ // Click to only happen on announce links
     $("#id_pengumuman_modal").val($(this).data('id'));
     $("#status_pengumuman_modal").val($(this).data('status'));
     document.getElementById("pengumuman_judul").innerHTML = $(this).data('nama');
     $('#ModalAktivasiPengumuman').modal('show');
});

/**
* Aksi Modal Function
* pondokkode - Web Project Development
*/
// Aksi Delete User
function DeleteUser(id_user)
{
    window.location.href = base_url+"admin/master/user/delete/"+id_user;
}

// Aksi Delete Berita
function DeleteBerita(id_berita)
{
    window.location.href = base_url+"admin/posting/berita/delete/"+id_berita;
}

// Aksi Delete Artikel
function DeleteArtikel(id_artikel)
{
    window.location.href = base_url+"admin/posting/artikel/delete/"+id_artikel;
}

// Aksi Delete Artikel
function DeleteAgenda(id_agenda)
{
    window.location.href = base_url+"admin/info/agenda/delete/"+id_agenda;
}

// Aksi Delete pengumuman
function DeletePengumuman(id_pengumuman)
{
    window.location.href = base_url+"admin/info/pengumuman/delete/"+id_pengumuman;
}

// Aksi Delete Guru
function DeleteGuru(nip)
{
    window.location.href = base_url+"admin/akademik/guru/delete/"+nip;
}

// Aksi Delete Siswa
function DeleteSiswa(nisn)
{
    window.location.href = base_url+"admin/akademik/siswa/delete/"+nisn;
}

// Aksi Delete Artikel
function DeleteFile(id_file, status)
{
    window.location.href = base_url+"admin/file/delete/"+id_file+"/"+status;
}

// Aksi Delete Testimoni
function DeleteTestimoni(id_testimoni)
{
    window.location.href = base_url+"admin/testimoni/delete/"+id_testimoni;
}

// Aksi Delete album
function DeleteAlbum(id_album)
{
    window.location.href = base_url+"admin/galeri/delete/"+id_album;
}

// Aksi Delete foto galeri
function DeleteFoto(id_foto_galeri,id_album)
{
    window.location.href = base_url+"admin/galeri/delete_picture/"+id_foto_galeri+"/"+id_album;
}

// Aksi Delete Banner
function DeleteBanner(id_banner)
{
    window.location.href = base_url+"admin/setting/banner/delete/"+id_banner;
}

// Aksi Aktivasi User
function AktivasiUser(id_user, status)
{
    window.location.href = base_url+"admin/master/user/activated/"+id_user+"/"+status;
}

// Aksi Aktivasi Berita
function AktivasiBerita(id_berita, status)
{
    window.location.href = base_url+"admin/posting/berita/activated/"+id_berita+"/"+status;
}

// Aksi Aktivasi Berita
function AktivasiArtikel(id_artikel, status)
{
    window.location.href = base_url+"admin/posting/artikel/activated/"+id_artikel+"/"+status;
}

// Aksi Aktivasi Berita
function AktivasiAgenda(id_agenda, status)
{
    window.location.href = base_url+"admin/info/agenda/activated/"+id_agenda+"/"+status;
}

// Aksi Aktivasi Berita
function AktivasiPengumuman(id_pengumuman, status)
{
    window.location.href = base_url+"admin/info/pengumuman/activated/"+id_pengumuman+"/"+status;
}

function addslashes(string) {
    return string.replace(/\\/g, '\\\\').
        replace(/\u0008/g, '\\b').
        replace(/\t/g, '\\t').
        replace(/\n/g, '\\n').
        replace(/\f/g, '\\f').
        replace(/\r/g, '\\r').
        replace(/'/g, '\\\'').
        replace(/"/g, '\\"');
}

/**
* chart visitor
* pondokkode - Web Project Development
*/
// Get data chart
function GetToday(tgl)
{
    var dataString = 'tgl='+ tgl;
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_today",
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function(data){
        var jam = data.jam;
        var total = data.total;
        show_chart('Pengunjung Hari Ini',jam, total);
    }
    });
}

function GetWeek(tgl1, tgl2)
{
    var dataString = 'tgl1='+ tgl1 + '&tgl2='+ tgl2;
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_week",
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function(data){
        var tgl = data.tgl;
        var total = data.total;
        show_chart('Pengunjung Minggu Ini',tgl, total);
    }
    });
}

function GetMonth(tgl)
{
    var dataString = 'tgl='+ tgl;
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_month",
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function(data){
        var tgl = data.tgl;
        var total = data.total;
        show_chart('Pengunjung Bulan Ini',tgl, total);
    }
    });
}

function GetAllTime()
{
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_all",
    cache: false,
    dataType: 'json',
    success: function(data){
        var tgl = data.tgl;
        var total = data.total;
        show_chart('Pengunjung Setiap Tahun',tgl, total);
    }
    });
}

function show_chart(text, kat, total)
{
    $('#container').highcharts({

        title: {
            text: text,
            x: -20 //center
        },
        subtitle: {
            text: 'Source: http://fti.unwaha.ac.id',
            x: -20
        },
        xAxis: {
            categories: kat
        },
        yAxis: {
            title: {
                text: 'Total Pengunjung'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Pengunjung',
            data: total
        }]
    });
}

// Collapse all tree akses menu load
$('.tree-toggle', $('#tree_1 > li > ul')).addClass("closed");
$('.branch', $('#tree_1 > li > ul')).removeClass("in");

/**
* Toastr Function
* pondokkode - Web Project Development
*/
function PesanNotif(tipe, judul, pesan)
{
    var shortCutFunction = tipe;
    var msg = pesan;
    var title = judul || '';
    var showDuration = "1000";
    var hideDuration = "1000";
    var timeOut = "5000";
    var extendedTimeOut = "1000";
    var showEasing = "swing";
    var hideEasing = "linear";
    var showMethod = "slideDown";
    var hideMethod = "slideUp";

    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-bottom-right' || 'toast-top-right',
        onclick: null
    };

    if (showDuration.length) {
        toastr.options.showDuration = showDuration;
    }

    if (hideDuration.length) {
        toastr.options.hideDuration = hideDuration;
    }

    if (timeOut.length) {
        toastr.options.timeOut = timeOut;
    }

    if (extendedTimeOut.length) {
        toastr.options.extendedTimeOut = extendedTimeOut;
    }

    if (showEasing.length) {
        toastr.options.showEasing = showEasing;
    }

    if (hideEasing.length) {
        toastr.options.hideEasing = hideEasing;
    }

    if (showMethod.length) {
        toastr.options.showMethod = showMethod;
    }

    if (hideMethod.length) {
        toastr.options.hideMethod = hideMethod;
    }

    if (!msg) {
        msg = getMessage();
    }

    $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

    var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
    $toastlast = $toast;
}

/**
* Toastr Function
* pondokkode - Web Project Development
*/
function loginGagal(tipe, judul, pesan)
{
    var shortCutFunction = tipe;
    var msg = pesan;
    var title = judul || '';
    var showDuration = "1000";
    var hideDuration = "1000";
    var timeOut = "5000";
    var extendedTimeOut = "1000";
    var showEasing = "swing";
    var hideEasing = "linear";
    var showMethod = "slideDown";
    var hideMethod = "slideUp";

    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-top-right',
        onclick: null
    };

    if (showDuration.length) {
        toastr.options.showDuration = showDuration;
    }

    if (hideDuration.length) {
        toastr.options.hideDuration = hideDuration;
    }

    if (timeOut.length) {
        toastr.options.timeOut = timeOut;
    }

    if (extendedTimeOut.length) {
        toastr.options.extendedTimeOut = extendedTimeOut;
    }

    if (showEasing.length) {
        toastr.options.showEasing = showEasing;
    }

    if (hideEasing.length) {
        toastr.options.hideEasing = hideEasing;
    }

    if (showMethod.length) {
        toastr.options.showMethod = showMethod;
    }

    if (hideMethod.length) {
        toastr.options.hideMethod = hideMethod;
    }

    if (!msg) {
        msg = getMessage();
    }

    $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

    var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
    $toastlast = $toast;
}


/**
* Toastr Function
* pondokkode - Web Project Development
*/
function LoginSiswa(tipe, judul, pesan)
{
    var shortCutFunction = tipe;
    var msg = pesan;
    var title = judul || '';
    var showDuration = "1000";
    var hideDuration = "1000";
    var timeOut = "5000";
    var extendedTimeOut = "1000";
    var showEasing = "swing";
    var hideEasing = "linear";
    var showMethod = "slideDown";
    var hideMethod = "slideUp";

    toastr.options = {
        closeButton: false,
        debug: false,
        positionClass: 'toast-top-left',
        onclick: null
    };

    if (showDuration.length) {
        toastr.options.showDuration = showDuration;
    }

    if (hideDuration.length) {
        toastr.options.hideDuration = hideDuration;
    }

    if (timeOut.length) {
        toastr.options.timeOut = timeOut;
    }

    if (extendedTimeOut.length) {
        toastr.options.extendedTimeOut = extendedTimeOut;
    }

    if (showEasing.length) {
        toastr.options.showEasing = showEasing;
    }

    if (hideEasing.length) {
        toastr.options.hideEasing = hideEasing;
    }

    if (showMethod.length) {
        toastr.options.showMethod = showMethod;
    }

    if (hideMethod.length) {
        toastr.options.hideMethod = hideMethod;
    }

    if (!msg) {
        msg = getMessage();
    }

    $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

    var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
    $toastlast = $toast;
}

/* Write here your custom javascript codes */
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

function Search(tipe, judul, pesan)
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

 var MSfullWidth = function() {
   return {
     initMSfullWidth: function() {
       var slider = new MasterSlider();
       slider.setup('masterslider' , {
          width:1024,
          height:500,
          fullwidth:true,
          centerControls:false,
          speed:20,
          view: 'flow',
          autoplay: true,
          loop:true,
       });
       slider.control('arrows');
       slider.control('bullets' , {autohide:false})
     },
   };
 }();

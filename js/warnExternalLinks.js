function externalWarningPopup(targetUrl) {
    $('#dialog-confirm').data('targetUrl', targetUrl);
    Avgrund.show("#dialog-confirm");
}
function closeDialog() {
    Avgrund.hide();
    Cookies.set('external_links', 'warned');
    window.open($('#dialog-confirm').data('targetUrl'), "_blank");
}
function cancelDialog() {
    Avgrund.hide();
    Cookies.set('external_links', 'warned');
}
$(document).ready(function() {
    var warningState;
    $('a[rel!="ext"]').click(function() {
        return true;
    });
    $('a[rel="ext"]').click(function(e) {
        window.onbeforeunload = null;
        $(this).attr("target", "_BLANK");
        warningState = Cookies.get('external_links');
        if (warningState == 'warned') {
            return true;
        } else {
            externalWarningPopup(e.target.href);
            return false;
        }
    });

});



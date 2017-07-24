function externalWarningPopup(targetUrl) {
    $('#dialog-confirm').data('targetUrl', targetUrl);
    $('#dialog-confirm').dialog("open");
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
    $('#dialog-confirm').dialog({
        modal: true,
        autoOpen: false,
        closeText: "",
        draggable: false,
        resizable: false,
        title: "Tip",
        width: 400,
        buttons: {
            "OK": function() {
                $(this).dialog( "close" );
                Cookies.set('external_links', 'warned');
                window.open($(this).data('targetUrl'), "_blank");
            },
            Cancel: function() {
                $(this).dialog( "close" );
                Cookies.set('external_links', 'warned');
            }
        }
    });
    var dialog = $('#dialog-confirm').dialog();
    dialog.data( "uiDialog" )._title = function(title) {
        title.html( this.options.title );
    };
    dialog.dialog('option', 'title', '<img src="/image/icons/info.svg" style="width: 35px; height: 35px; margin-bottom: -7px;"/>');
});



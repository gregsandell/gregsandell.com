$( document ).ready(function() {

    var height = Math.max($(".left").height(), $(".right").height());
    $(".middle").height(height);
    $(".right").height(height);
    
    $('#add').click(function() {
        if ($('#newGrocery').val() != '') {
            $('.grocery').append(
                $('<li>').text($('#newGrocery').val())
            );
            $('#newGrocery').val('');
        }
    });
});

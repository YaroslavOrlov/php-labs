$(function () {
    var newDay;
    $('.touch').click(function (e) {
        if (e.target != undefined && !isNaN($(e.target).text())) {
            $('#toggle-note').toggle(function () {
                newDay = $(e.target).text();
                $('.notes').empty();
                $.post('addtobase.php',
                    {
                        'note': $('#note').val(),
                        'day': newDay,
                        'month': $('#select_month').val(),
                        'year': $('#select_year').val()
                    },
                    function (data) {
                        $('.notes').html(data);
                    }
                );
            });
        }
    });
    $('.add-note').click(function () {
        $('#form-note').css('display', 'block');
    });
    $('.delete-note').click(function(){
        $.post('deletefrombase.php',
            {
                'note': $('#note').val(),
                'day': newDay,
                'month': $('#select_month').val(),
                'year': $('#select_year').val()
            },
            function () {
                $('#note').val('');
                $('.notes').empty();
                $('.note').css('display', 'none');
            }
        );
    });
    $('#form-note').submit(function (e) {
        e.preventDefault();
        $.post('addtobase.php',
            {
                'note': $('#note').val(),
                'day': newDay,
                'month': $('#select_month').val(),
                'year': $('#select_year').val()
            },
            function (data) {
                $('.notes').empty();
                if(data) {
                    $('.notes').append(data);
                }
            }
        );

        $('#note').val('');
        $(this).css('display', 'none');
    });
    $('#note-cancel').click(function(e){
        e.preventDefault();
        $('#form-note').css('display', 'none');
        $('#note').val('');
    });
});
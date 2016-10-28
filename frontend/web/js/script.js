$(document).ready(function(){
    $(document).on('click', '.add_waiting', function(e){
        var title = $("input[name='Waiting[title]']").val(),
            link = $("input[name='Waiting[link]']").val(),
            number = $("input[name='Waiting[track_number]']").val(),
            price = $("input[name='Waiting[price]']").val(),
            csrf = $("input[name='_csrf']").val();


        //console.log(emailB);

        if(title != '' && link != '' && number != '' && price != ''){

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "/waiting/waiting/create/",
                data: 'Waiting[title]=' + title + '&_csrf=' + csrf + '&Waiting[link]=' + link + '&Waiting[track_number]=' + number + '&Waiting[price]=' + price,
                success: function (data) {
                    //console.log(data);
                    $('.table_overflow').html(data);
                    $("input[type='text']").val('');
                }
            });

            return false;
        }
        return false;
    });


    $(document).on('click', '.btnEditWaiting', function (e) {
        var title = $("input[name='Waiting_title']").val(),
            link = $("input[name='Waiting_link']").val(),
            number = $("input[name='Waiting_track_number']").val(),
            price = $("input[name='Waiting_price']").val(),
            id = $("input[name='Waiting_id']").val()
            csrf = $("input[name='_csrf']").val();


        //console.log(emailB);

        if(title != '' && link != '' && number != '' && price != ''){

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "/waiting/waiting/edit/",
                data: 'Waiting[title]=' + title + '&_csrf=' + csrf + '&Waiting[link]=' + link + '&Waiting[track_number]=' + number + '&Waiting[price]=' + price + '&id=' + id,
                success: function (data) {
                    //console.log(data);
                    $('.table_overflow').html(data);
                    $('.waiting__popup').slideUp('fast');
                }
            });

            return false;
        }
        return false;
    });


    $(document).on('click', '.link_delete', function(){
        var id = $(this).attr('data-id');
        var csrf = $(this).attr('data-csrf');
        $(this).closest('tr').slideUp('fast');
        $.ajax({
            type: 'POST',
            url: "/waiting/waiting/del/",
            data: 'id=' + id + '&_csrf=' + csrf,
            success: function (data) {
                //console.log(data);
            }
        });

    });

    $(document).on('click', '.link__waiting_edit', function(){
        var id = $(this).attr('data-id');
        var csrf = $(this).attr('data-csrf');
        $.ajax({
            type: 'POST',
            url: "/waiting/waiting/update_modal/",
            data: 'id=' + id + '&_csrf=' + csrf,
            success: function (data) {
                //console.log(data);
                $('.popup__form').html(data);
            }
        });
    });

});

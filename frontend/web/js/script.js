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
            id = $("input[name='Waiting_id']").val(),
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


    $(document).on('click', '.waiting_delete', function(){
        var conf = confirm('123');
        if (conf == true) {
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
        }

        return false;
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

    $(document).on('click', '.link__stock_edit', function(){
        var id = $(this).attr('data-id');
        var csrf = $(this).attr('data-csrf');
        $.ajax({
            type: 'POST',
            url: "/stock/stock/update_modal/",
            data: 'id=' + id + '&_csrf=' + csrf,
            success: function (data) {
                console.log(data);
                $('.edit-stock').html(data);
            }
        });
    });

    $(document).on('click', '.editStockBtn', function (e) {
        var title = $("input[name='stock-title']").val(),
            link = $("input[name='stock-link']").val(),
            price = $("input[name='stock-price']").val(),
            id = $("input[name='stock-id']").val(),
            csrf = $("input[name='_csrf']").val();

        if(title != '' && link != '' && price != '') {

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "/stock/stock/update/",
                data: 'Stock[title]=' + title + '&_csrf=' + csrf + '&Stock[link]=' + link + '&Stock[price]=' + price + '&id=' + id,
                success: function (data) {
                    //console.log(data);
                    $('.table_overflow').html(data);
                    $('.stock__popup_edit').slideUp('fast');
                }
            });

            //return false;
        }
        e.preventDefault();
        return false;
    });


    $(document).on('click', '.createAddress', function(e){
        var first_name = $("input[name='first_name']").val(),
            last_name = $("input[name='last_name']").val(),
            address = $("input[name='address']").val(),
            zip_code = $("input[name='zip_code']").val(),
            city = $("input[name='city']").val(),
            country = $("input[name='country']").val(),
            phone = $("input[name='phone']").val(),
            csrf = $("input[name='_csrf']").val();

        if(first_name != '' && last_name != '' && address != '' && city != '' && country != '' && phone != '') {

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "/address/address/create/",
                data: 'Address[first_name]=' + first_name + '&_csrf=' + csrf + '&Address[last_name]=' + last_name + '&Address[address]=' + address + '&Address[city]=' + city + '&Address[country]=' + country + '&Address[phone]=' + phone + '&Address[zip_code]=' + zip_code,
                success: function (data) {
                    //console.log(data);
                    $('.stock__popup_address_add').hide();
                    $('.stock__popup_address').show();
                    $('.choose-address__list').prepend(data);
                    /*$('.table_overflow').html(data);
                    $('.stock__popup_edit').slideUp('fast');*/
                }
            });

            return false;
        }
        e.preventDefault();
        return false;
    });


});

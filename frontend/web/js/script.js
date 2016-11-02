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
        var conf = confirm('Are you sure you want to delete?');
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
                //console.log(data);
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
                   // console.log(data);
                    $('.table_overflow').html(data);
                    $('.stock__popup_edit').slideUp('fast');
                    checkedTrue();
                    packed();
                }
            });



            //return false;
        }
        e.preventDefault();
        return false;
    });


    $(document).on('click', '.editAddress', function(){
        var idAddress = $(this).attr('data-id');
        var csrf = $(this).attr('data-csrf');

        $.ajax({
            type: 'POST',
            url: "/address/address/modal_edit/",
            data: 'id=' + idAddress + '&_csrf=' + csrf,
            success: function (data) {
                // console.log(data);
                $('.addressForm').html(data);
                $('.stock__popup_address_add').show();
            }
        });

    });

//Добавление адреса
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
    //Редактирование адреса
    $(document).on('click', '.editAddressBtn', function(e){
        var first_name = $("input[name='first_name']").val(),
            last_name = $("input[name='last_name']").val(),
            address = $("input[name='address']").val(),
            zip_code = $("input[name='zip_code']").val(),
            city = $("input[name='city']").val(),
            country = $("input[name='country']").val(),
            phone = $("input[name='phone']").val(),
            id = $("input[name='id']").val(),
            csrf = $("input[name='_csrf']").val();

        if(first_name != '' && last_name != '' && address != '' && city != '' && country != '' && phone != '') {

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "/address/address/update/",
                data: 'Address[first_name]=' + first_name + '&_csrf=' + csrf + '&Address[last_name]=' + last_name + '&Address[address]=' + address + '&Address[city]=' + city + '&Address[country]=' + country + '&Address[phone]=' + phone + '&Address[zip_code]=' + zip_code + '&id=' + id,
                success: function (data) {
                    $('.stock__popup_address_add').hide();
                    var result = JSON.parse(data);
                    $('#address' + result.id).html(result.html);
                    /*$('.table_overflow').html(data);
                    $('.stock__popup_edit').slideUp('fast');*/
                }
            });

            return false;
        }
        e.preventDefault();
        return false;
    });


    $(document).on('click', '.addAddresToForm', function(e){
        $('.radio').each(function(){
            if($(this).prop('checked')){
                var idaddress = $(this).val();
                var textaddress = $(this).next().next().text();
                $('.address__text').html(textaddress);
                $("input[name='Packed[address_id]']").val(idaddress);
            }
        });
        $('.stock__popup_address').hide();
        e.preventDefault();
        return false;
    });

    $(document).on('click', '.checkAllStock', function () {
        $('.table__send__wr').show();
        var packedId = $("input[name='packed_id']").val();
        if(packedId == ''){
            generateNumber();
        }
        if ($(this).prop('checked')) {
            $('.stockCheck').prop("checked", true);
        }
        else {
            $('.stockCheck').prop("checked", false);
        }


        packed();
    });

    $(document).on('click', '.checkPackedAll', function () {

        if ($(this).prop('checked')) {
            $('.checkPacked').prop("checked", true);
        }
        else {
            $('.checkPacked').prop("checked", false);
        }
        checkPacked()
    });

    $(document).on('click', '.checkPacked', function () {
        checkPacked()
    });





    //Обработчик события при выборе товара при заказе
    $(document).on('click', '.stockCheck', function(){
        $('.table__send__wr').show();
        var packedId = $("input[name='packed_id']").val();
        if(packedId == ''){
            generateNumber();
        }
        //console.log(packedId);
        //generateNumber();
        packed()
    });

    //Добавляем коммент
    $(document).on('click', '.addCommentForm', function(e){
        var comment = $("textarea[name='comment']").val();
        $('.comment_text').html(comment);
        $("input[name='Packed[comment]']").val(comment);
        $('.stock__popup_comment').hide();
        e.preventDefault();
        return false;
    });
});


//Собираем все нажатые чекбоксы при формировании заказа
function propChecked() {
    var id = '';
    $('.stockCheck').each(function () {
        if ($(this).prop('checked')) {
            id += $(this).val() + ',';
        }
    });
    return id;
}

//Выставить чекбоксы после редактирования
function checkedTrue(){
    var id = $("input[name='Packed[idStock]']").val();
    var idArr = id.split(',');
    $('.stockCheck').each(function () {
        var idCur = $(this).val();
        if ($.inArray(idCur, idArr) != -1) {
            $(this).prop('checked', true);
        }
    });

}

function price(){
    var price = 0;
    $('.price__count').each(function(){
        price = price + parseInt($(this).text(),10);
    });
    $('.summPrice').html(price);
    $("input[name='Packed[price]']").val(price);
}

function generateNumber(){
    $.ajax({
        type: 'POST',
        url: "/packed/packed/create/",
        data: '',
        success: function (data) {
            var result = JSON.parse(data);
            $("input[name='packed_id']").val(result.id);
            $("input[name='Packed[number]']").val(result.number);
            $('.span__tarck__number').html(result.number);

            //console.log(result);
        }
    });
    //tarck__number
}

//фрмируем заказ

function packed(){
    var id = propChecked();

    $.ajax({
        type: 'POST',
        url: "/stock/stock/packed/",
        data: 'id=' + id,
        success: function (data) {
            //console.log(data);
            $('.packedInfo').html(data);
            price();
        }
    });

    $("input[name='Packed[idStock]']").val(id);
}


//Packed собираем id всех нажаных чекбоксов и кладем их в input формы
function checkPacked(){
    var id = '';
    $('.checkPacked').each(function(){
        if ($(this).prop('checked')) {
            id += $(this).val() + ',';
        }
    });

    $('#id-packed').val(id);
}
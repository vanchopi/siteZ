$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
});
Element = {
    delete: function(element,attribute,url) {
        $.ajax({
            url: url,
            method: 'POST',
            data: {attribute:attribute},
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function(res){
                element.parent().parent().remove();
            },
            error: function(msg){
                console.log(msg);
            }
        });
    },
    edit: function(url) {
        $.ajax({
            url: url,
            type: "POST",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function ($list) {
                //$('#editmodal').append($list);
                if ($('#editmodal').append($list)) {
                    Categories.sort('.selectcategory','.selectscategory');
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    },
    del: function(element,url) {
        $.ajax({
            url: url,
            type: "POST",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function ($list) {
                element.parent().parent().remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    }
}
function removeFile(elem) {
    return elem.parentNode ? elem.parentNode.removeChild(elem) : elem;
}
$(document).ready(function() {
    $('#button_textarea').click(function() {
        var text = $('.newstext').text();
        TextCreate.search_img(text);

    });
    $("[data-toggle='tooltip']").tooltip();
    // --------- Сортировка таблицы --------- //
    $('.sort li a').click(function(event) {
        var column = $(this).attr('data-column');
        var reverse = $(this).attr('reverse');
        if (reverse == '0') {
            sortTable(column,true);
            $(this).attr('reverse','1');
        }
        else {
            sortTable(column,false);
            $(this).attr('reverse','0');
        }
    });
    Categories.sort('.selectcategory','.selectscategory');
    Categories.sort('.selectscategory','.selectsscategory');

    /*
    $('.selectscategory option').each(function(index, el) {
        Categories.sort('.selectsscategory');

        //Categories.change('.selectsscategory','.selectscategory',$(this));
        var parent_category = $('.selectcategory').val();
        var children_category = $(this).attr('data-id');
        if (parent_category != children_category) {
            $(this).css('display','none');
        }
        else {
            $(this).css('display','');
        }
    });
    */
    /*
    $('.selectsscategory option').each(function(index, el) {
        var parent_category = $('.selectscategory').val();
        var children_category = $(this).attr('data-id');
        if (parent_category != children_category) {
            $(this).css('display','none');
        }
        else {
            $(this).css('display','');
        }
    });
    */
    $('.selectcategory').bind('change', function() { 

        //var parent_category = $(this).val();

        //Categories.change('.selectscategory',true,parent_category,'.selectsscategory');

        
        var parent_category = $(this).val();
        var count = 0;
        var all = 0;
        $('.selectscategory option').each(function(index, el) {
            var children_category = $(this).attr('data-id');
            all++;
            if (parent_category != children_category) {
                $(this).css('display','none');
                $(this).removeAttr('selected');
                count++;
            }
            else {
                $(this).css('display','');
                $(this).attr('selected','');
            }
        });
        if (all == count) {
            $('.selectscategory').append('<option class="emptycategory" value="0" selected>Отсутствует под-категория</option>')
            $('.selectscategory').attr('disabled','');
        }
        else {
            $('.selectscategory').removeAttr('disabled');
            $('.emptycategory').remove();
        }
        $('.selectscategory').change();
        
    });
    $('.selectsscategory').bind('change', function() {

    });
    
    $('.selectscategory').bind('change', function() { 
        //var parent_category = $(this).val();
        //Categories.sort('.selectsscategory');
        //Categories.change('.selectsscategory',false,parent_category,'.selectsscategory');
        
        
        var parent_category = $(this).val();
        var count = 0;
        var all = 0;
        $('.selectsscategory option').each(function(index, el) {
            var children_category = $(this).attr('data-id');
            all++;
            if (parent_category != children_category) {
                $(this).css('display','none');
                $(this).removeAttr('selected');
                count++;
            }
            else {
                $(this).css('display','');
                $(this).attr('selected','');
            }
        });
        if (all == count) {
            $('.selectsscategory').append('<option class="emptycategory" value="0" selected>Отсутствует под-категория</option>')
            $('.selectsscategory').attr('disabled','');
        }
        else {
            $('.selectsscategory').removeAttr('disabled');
            $('.emptycategory').remove();
        }
        
    });
    // ------- ДОБАВЛЕНИЕ ДЛЯ ТЭГОВ ------- //
    $('.add_option').click(function() {
        var option = $('.optionname option:selected').text();
        var option_id = $('.optionname option:selected').val();
        var item = option.split(',');
        if (!item[1]) {
            item[1] = '';
        }
        $('.alltextblock').append('<section><span>'+item[0]+': </span><input type="hidden" name="option_id[]" value="'+option_id+'"><input class="form-control" type="text" name="value[]"><span>'+item[1]+'</span></section>');
    });
    // ------- УДАЛЕНИЕ ДЛЯ ТЭГОВ ------- //
    $('.del_option').click(function() {
        $('.alltextblock').children(':last-child').remove();
    });
    /*
    $('#editmodal').on('click','.add_option', function() {
        var option = $('.optionname option:selected').text();
        var option_id = $('.optionname option:selected').val();
        var item = option.split(',');
        $('.alltextblock').append('<section><span>'+item[0]+': </span><input type="hidden" name="option_id[]" value="'+option_id+'"><input class="form-control" type="text" name="value[]"><span>'+item[1]+'</span></section>');
    });
    $('#editmodal').on('click','.del_option', function() {
        $('.alltextblock').children(':last-child').remove();
    });
    */
    $('#editmodal').on('click','.save_option', function() {
        var title = $('.title_option').val();
        var unit = $('.unit_option').val();
        var url = $(this).attr('url-action');
        $('#editmodal').modal('hide');
        $.ajax({
            url: url,
            /* Возникла ошибка 500 ../save_... решило, было без ../ */
            method: 'POST',
            data: {title:title,unit:unit},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(param)
            {
                $('.optionname').append('<option value="'+param[0]+'">'+param[1]+','+param[2]+'</option>');//добавляем к существующему списку новый параметр
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
    // --- Изменение --- //
    $('.edit').click(function () {
        var url = $(this).attr('url');
        Element.edit(url);
    });
    // --- Удаление --- //
    $('.delete').click(function () {
        var url = $(this).attr('url');
        var element = $(this);
        $(this).addClass('delete_load');
        Element.del(element,url);
    });
    // --- Удаление одного изображения --- //
    $('.deleteimage').click(function() {
        $(this).parent().children('img').css('opacity','.4');
        //$(this).parent().children('.preloadimage').css('display','');
        $(this).css('display','none');
        var loader = $(this).parent().parent();
        loader.addClass('delete_load');
        var src = $(this).attr('data-src');
        var id = $(this).attr('data-id');
        var section = $(this).parent();
        var key = $(this).attr('data-key');
        var text = $('.newstext').val();//наш текст
        $.ajax({
            url: 'deleteimage',
            type: "POST",
            data: {src:src,id:id},
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function ($list) {
                section.remove();
                loader.removeClass('delete_load');
                if (text) {
                    $('.nowimage-'+key).remove();
                    text = text.replace('[img-'+key+']', '');
                    $('.newstext').val(text);
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });
    // --- Удаление одного изображения --- //
    $('#editmodal').on('click','.deleteimage', function() {
        $(this).parent().children('img').css('opacity','.4');
        //$(this).parent().children('.preloadimage').css('display','');
        $(this).css('display','none');
        var loader = $(this).parent().parent();
        loader.addClass('delete_load');
        var src = $(this).attr('data-src');
        var id = $(this).attr('data-id');
        var section = $(this).parent();
        var key = $(this).attr('data-key');
        var text = $('.newstext').val();//наш текст
        $.ajax({
            url: 'allscategories/deleteimage',
            type: "POST",
            data: {src:src,id:id},
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function ($list) {
                section.parent().parent().remove();
                loader.removeClass('delete_load');
                $('.after_delete_image').css('display','');
                if (text) {
                    $('.nowimage-'+key).remove();
                    text = text.replace('[img-'+key+']', '');
                    $('.newstext').val(text);
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });
    /*
    $('#editmodal').on('click','.deleteimage', function() {
        $(this).parent().children('img').css('opacity','.4');
        $(this).parent().children('.preloadimage').css('display','');
        $(this).css('display','none');
        var src = $(this).attr('data-src');
        var id = $(this).attr('data-id');
        var section = $(this).parent();
        $.ajax({
            url: 'deleteimage',
            type: "POST",
            data: {src:src,id:id},
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function ($list) {
                section.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });
    */
    $('.changestatus').bind('change', function() {
        var value = $(this).val();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var element = $(this);
        element.parent().parent().addClass('delete_load');
        $.ajax({
            url: url,
            method: 'POST',
            data: {value:value,id:id},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                element.parent().parent().removeClass('delete_load');
                alert('Изменения внесены');
            },
            error: function(msg) {
                console.log(msg);// если ошибка, то можно посмотреть в консоле
            }
        });
        
    });


    /*

    $('.tcon-checkbox').change(function() {
        var element = document.getElementById('option');
        if(element.checked){
            var ms=document.createElement("link");ms.id="link_black";ms.rel="stylesheet";ms.href="../css/black.css";document.getElementsByTagName("head")[0].appendChild(ms);
            removeFile(document.getElementById('link_white'));
            $.cookie("color-theme", "checked", { expires : 100 });
        }
        else {
            var ms=document.createElement("link");ms.id="link_white";ms.rel="stylesheet";ms.href="../css/white.css";document.getElementsByTagName("head")[0].appendChild(ms);
            removeFile(document.getElementById('link_black'));
            $.removeCookie('color-theme');
        }
    })
    */
    /*
    $('#question').on('click','.answer', function() {
        $(this).addClass('answer-take');
        var id = Number($('.question').attr('data-id')) + 1;
        //$('.question').css('display','');
        var progress = Number($('.progress-bar').attr('aria-valuenow')) + Number($('.progress-bar').attr('aria-inc'));
        var title_value = Number($('.progress-bar').attr('title-value')) + 1;
        $('#preloader').css('display', '');
        $(this).parent().parent().parent().parent().remove();

        $.ajax({
            url: 'next',
            type: "POST",
            data: {id:id},
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function ($list) {
                $('#preloader').css('display', 'none');
                if ($list == 'OK') {
                    $('.question').first().remove();
                    $('.progress-bar').attr('aria-valuenow',progress);
                    $('.progress-bar').css('width',progress+'%');
                    $('#question').append('Спасибо');
                }
                else {
                    $('.question').first().remove();
                    $('.progress-bar').attr('aria-valuenow',progress);
                    $('.progress-bar').attr('title-value',title_value);
                    $('.progress-bar').css('width',progress+'%');
                    $('#question .title span').text(title_value);
                    $('#question').append($list);
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });
    */
    // --- Select Опубликовать комментарий --- //
    $('.public_question').bind('change', function() {
        var value = $(this).val();
        var id = $(this).attr('data-id');
        var element = $(this).parent();
        $.ajax({
            url: '../public',
            method: 'POST',
            data: {value:value,id:id},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                element.addClass('success-change-public');
                setTimeout(function() {
                    element.removeClass('success-change-public');
                }, 2000);
                //alert('Изменения внесены');
            },
            error: function(msg) {
                console.log(msg);// если ошибка, то можно посмотреть в консоле
            }
        });
    });
    
    // --- Удаление контактов --- //
    $('.del_question').click(function(){
        var element = $(this);
        var attribute = {};
        var url = $(this).attr('data-url');
        attribute['del_id'] = $(this).attr('data-id');
        Element.delete(element,attribute,url);
    });
    /* Событие скрытия модального окна, удаление элементов */
    $("#editmodal").on('hide.bs.modal', function(){
        $(this).children().remove();
    });
    /*
    $('#editmodal').on('click','.add_textblock', function() {
        getPoints();
        var str = '';
        for (var i = 0; i < 5; i++) {
            str += '<input type="text" class="form-control pointblock">';
        }
        $('.alltextblock').append('<div class="answerblock"><input type="text" class="form-control textblock" name="answers[]" placeholder="Ответ"><section><span>Баллы:</span>'+str+'</section></div>');
    
    });
    $('#editmodal').on('click','.del_textblock', function() {
        $('.alltextblock').children(':last-child').remove();
    });
    */
    /*
    $('.add_textblock').click(function() {
        getPoints();
        var str = '';
        for (var i = 0; i < 5; i++) {
            str += '<input type="text" class="form-control pointblock">';
        }
        $('.alltextblock').append('<div class="answerblock"><input type="text" class="form-control textblock" name="answers[]" placeholder="Ответ"><section><span>Баллы:</span>'+str+'</section></div>');
    });
    */
    // --- Добавить изображение --- //
    $('.add_imageblock').click(function() {
        $('.news_image_section').append('<input type="file" class="form-control news_image" name="preview[]" multiple>');
    });
    // --- Удалить изображение --- //
    $('.del_imageblock').click(function() {
        $('.news_image_section').children(':last-child').remove();
    });
    // ------- ДОБАВИТЬ ТЭГ ------- //
    $('.add_tag').click(function() {
        $('.alltextblock').append('<div class="answerblock"><input type="text" class="form-control textblock" name="tag[]" placeholder="Тэг"></div>');
    });
    // ------- УДАЛИТЬ ТЭГ ------- //
    $('.del_tag').click(function() {
        $('.alltextblock').children(':last-child').remove();
    });


// ------- ДЛЯ ВСТАВКИ В ТЕКСТ ------- //
    jQuery.fn.extend({
    insertAtCaret: function(myValue){
      return this.each(function(i) {
        if (document.selection) {
          //For browsers like Internet Explorer
          this.focus();
          sel = document.selection.createRange();
          sel.text = myValue;
          this.focus();
        }
        else if (this.selectionStart || this.selectionStart == '0') {
          //For browsers like Firefox and Webkit based
          var startPos = this.selectionStart;
          var endPos = this.selectionEnd;
          var scrollTop = this.scrollTop;
          this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
          this.focus();
          this.selectionStart = startPos + myValue.length;
          this.selectionEnd = startPos + myValue.length;
          this.scrollTop = scrollTop;
        } else {
          this.value += myValue;
          this.focus();
        }
      })
    }
    });
    // --- Вспомогательные кнопки --- //
    $('.add_next').click(function() {
        $('.newstext').insertAtCaret("[следующая]");
    });
    $('.add_after').click(function() {
        $('.newstext').insertAtCaret("[через]");
    });
    $('.add_bold').click(function() {
        $('.newstext').insertAtCaret("[B*]");
        $('.newstext').insertAtCaret("[*B]");
    });
    // ------- ДОБАВИТЬ ТЕКСТОВЫЙ БЛОК В НОВОСТЯХ ------- //
    $('#editmodal').on('click','.add_tag', function() {
        $('.alltextblock').append('<div class="answerblock"><input type="text" class="form-control textblock" name="tag[]" placeholder="Тэг"></div>');
    });
    // ------- УДАЛИТЬ ТЕКСТОВЫЙ БЛОК В НОВОСТЯХ ------- //
    $('#editmodal').on('click','.del_tag', function() {
        $('.alltextblock').children(':last-child').remove();
    });



    // ------- УДАЛИТЬ ТЕКСТОВЫЙ БЛОК В НОВОСТЯХ ------- //
    /*
    $('.del_textblock').click(function() {
        $('.alltextblock').children(':last-child').remove();
    });
    $('#editmodal').on('submit','.editform', function() {
        getPoints();
    });
    $('.addform').submit(function(event) {
        getPoints();
    });
    */
    $('.nowimage').change(function() {
        var key = $(this).attr('data-key');
        $('.nowimage-'+key).val($(this).val());
    });
    $('.newsimagesection').on('click','.add_img', function() {
        var text = $('.newstext').val();//наш текст
        var position = $('.newsimagestyle').val();//позиция 
        //var count = Number($('.image-group select').length) + 1;
        var count = Number($('.newsimagesection .group-image-news').length);//при добавлении
        var count_now = Number($('.image-group .nowimage').length);//уже добавленных
        count = count + count_now;
        alert(count);
        text = text.replace('[img-'+count+']', '');
        $('.newstext').val(text);
        $('.newstext').insertAtCaret('[img-'+count+']');
        //$('.newstext').val();//в тексте позиция
        $(this).parent().children('.newsimage').addClass('selected');

        $(this).parent().children('button').removeClass('add_img');
        $(this).parent().children('button').addClass('del_img');
        $(this).parent().children('button').text('Удалить');
        $(this).parent().children('button').attr('data-name','[img-'+count+']');

        $(this).parent().children('.newsimageposition').val(position);
        var new_section = $('<section class="group-image-news"><input type="file" class="form-control newsimage" name="preview[]"><input type="hidden" class="form-control newsimageposition" name="position[]"><button type="button" class="btn btn-default btn-xs icon add_img">Добавить</button></section>');//интуп
        $('.newsimagesection').append(new_section);
    });
    $('.newsimagesection').on('click','.del_img', function() {
        var text = $('.newstext').val();//наш текст
        var tag = $(this).attr('data-name');
        text = text.replace(''+tag+'', '');
        $('.newstext').val(text);
        $(this).parent().remove();
    });
    $('.newsimagesection').on('change','.newsimage', function() {
        //alert($(this).val());
        //$(this).parent().append('<input type="file" class="form-control newsimage" name="preview[]">');
        //var new_section = $('<section><input type="file" class="form-control newsimage" name="preview[]"><input type="text" class="form-control newsimageposition" name="position[]"></section>');//интуп
        //$('.newsimageposition').val(position);
        //$(this).attr('disabled','');//забликировать элемент 
        //$(this).css('display','none');
        
        //$('.newsimagesection').append(new_section);//добавить новое изображение 
    });

    $('#editmodal').on('change','.selectcategory', function() { 
        var parent_category = $(this).val();
        var count = 0;
        var all = 0;
        $('.selectscategory option').each(function(index, el) {
            var children_category = $(this).attr('data-id');
            all++;
            if (parent_category != children_category) {
                $(this).css('display','none');
                $(this).removeAttr('selected');
                count++;
            }
            else {
                $(this).css('display','');
                $(this).attr('selected','');
            }
        });
        if (all == count) {
            $('.selectscategory').append('<option class="emptycategory" value="0" selected>Отсутствует под-категория</option>')
            $('.selectscategory').attr('disabled','');
        }
        else {
            $('.selectscategory').removeAttr('disabled');
            $('.emptycategory').remove();
        }
    });
    $('#editmodal').on('change','.selectscategory', function() { 
        
    });




    
});

/*
function getPoints() {
    var points = '';
    $('.pointblock').each(function(index, el) {
        points += $(this).val();
        var i = index+1;
        if (i%5!=0) {
            points+=',';
        }
        else {
            points+=';';
        }
    });
    $('.array_points').val(points);
}
*/
/*
function addUser(data) {
    $('#users .title').text('Online:');
    $('#users .user').append('<div>'+data['name']+'</div>');
}

function updatePoints(data) {
    $('#gamespoints tr td:nth-child(3)').each(function(index, el) {
        var oldpoint = Number($(this).text());
        var newpoint = Number(oldpoint) + Number(data[index]);
        $(this).text(newpoint);
    });
    $('.gamepointprogress .progress-bar').each(function(index, el) {
        var oldpoint = Number($(this).attr('aria-valuenow'));
        var newpoint = Number(oldpoint) + Number(data[index]);
        $(this).attr('aria-valuenow',newpoint);
        $(this).css('width',newpoint+'px');
    });
}
*/

function sortTable(column,reverse){
    var rows = $('.table tbody tr').get();
    if (reverse != true) {
        rows.sort(function(a, b) {
            var A = $(a).children('td').eq(column).text().toUpperCase();
            var B = $(b).children('td').eq(column).text().toUpperCase();
            if(A < B) {
              return -1;
            }
            if(A > B) {
              return 1;
            }
            return 0;
        });
    }
    else {
        rows.sort(function(a, b) {
            var A = $(a).children('td').eq(column).text().toUpperCase();
            var B = $(b).children('td').eq(column).text().toUpperCase();
            if(A > B) {
              return -1;
            }
            if(A < B) {
              return 1;
            }
            return 0;
        });
    }
    $.each(rows, function(index, row) {
        $('.table').children('tbody').append(row);
    });
}

//Categories.sort('.selectsscategory');

//Categories.change('.selectsscategory','.selectscategory',$(this));

Categories = {
    sort: function(parent,child) {
        $(''+child+' option').each(function(index, el) {
            var parent_category = $(parent).val();
            var children_category = $(this).attr('data-id');
            if (parent_category != children_category) {
                $(this).css('display','none');
            }
            else {
                $(this).css('display','');
            }
        });
    },
    change: function(element,haschild,parent_category,child) {
            var count = 0;
            var all = 0;
            $(''+element+' option').each(function(index, el) {
                var children_category = $(this).attr('data-id');
                all++;
                if (parent_category != children_category) {
                    $(this).css('display','none');
                    $(this).removeAttr('selected');
                    count++;
                }
                else {
                    $(this).css('display','');
                    $(this).attr('selected','');
                    console.log($(this).val());
                }
            });
            if (all == count) {
                $(element).append('<option class="emptycategory" value="0" selected>Отсутствует под-категория</option>')
                $(element).attr('disabled','');
                if (haschild == true) {
                    //$('.sscategory_item').css('display', 'none');
                    $(child).append('<option class="emptycategory" value="0" selected>Отсутствует под-категория</option>')
                    $(child).attr('disabled','');
                }
                    //$(child).append('<option class="emptycategory" value="0" selected>Отсутствует под-категория</option>')
                    //$(child).attr('disabled','');
            }
            else {
                //$('.sscategory_item').css('display', '');
                $(element).removeAttr('disabled');
                $('.emptycategory').remove();
            }
    }
}

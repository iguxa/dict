$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.link-home').addClass('un_border');
function preloader(block) {
        $(block).html('<div class="prereloader"><img id="imgcode" src="/prereload/load.gif"></div>');
}

function readPage(page)
{
    $.ajax({
        url:'/page?page='+page,
        beforeSend: preloader('.change_item')
        }).done(function(data){

        $('.change_item').html(data);
        location.hash = page;

    })
}
$(document).on('click','.pagination a',function(e)
{
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];

        window.act = page;
        console.log(page);


    readPage(page);
});
$(document).on('click','.btn_edit',function()
{
    var id = $(this).attr('data-item'),
        buttons = $('.btn_edit,.btn_delete'),
        act_inner_description = $('.id_'+ id +' .word-description'),
        value = act_inner_description.html(),
        edit_value;
    console.log(id);

    buttons.prop("disabled", true);

    act_inner_description.html('<textarea class="edit_textarea">'+value+'</textarea>');
    $(this).parent().append('<button class="btn_save" title="сохранить"><i class="far fa-save"></i></button>');
    $('.btn_save').click(function() {
        edit_value = $('.edit_textarea').val();
        var result = confirm('Сохранить?');
        if (result)
        {
        $.ajax({
            type:'POST',
            url:'/edit_letter',
            data:{id:id,value:edit_value}
        }).done(function(data){
            console.log(data);
        });
        act_inner_description.html(edit_value);
        }
        else{
            act_inner_description.html(value);
        }
        $(this).remove();
        buttons.prop("disabled", false);
    });

    console.log(value);
});

$(document).on('click','.btn_delete',function()
{
    var result = confirm('Удалить?');
    if (result){
        var id = $(this).attr('id'),
            sum_art = $('.word').length;
        $.ajax({
            type:'POST',
            url:'/delete_letter',
            data:{id:id},
            beforeSend: preloader('.change_item')
        }).done(function(data){
            console.log(data);
        });
        //Определяем куда перенести после удаления
        if(window.act){
            //проверка сколько записей на странице
            if(sum_art === 1) window.act = window.act - 1;
            readPage(window.act)
        }
        else readPage(1);
    }
    else{
        return false;
    }

});
$(document).on('click','.link-search',function()
{
    $("div").removeClass('un_border');
    $(this).addClass('un_border');
    $.ajax({
        url:'/search',
        beforeSend: preloader('.change_item')
    }).done(function(data){
        console.log(data);
        $('.change_item').html(data);
    })

});
$(document).on('click','.link-home',function()
{
    $("div").removeClass('un_border');
    $(this).addClass('un_border');
    $.ajax({
        url:'/page',
        beforeSend: preloader('.change_item')
    }).done(function(data){
        console.log(data);
        $('.change_item').html(data);
    })
});
$(document).on('click','.btn_search',function()
{
    var latter = $('.search_input_inner').val();
    $.ajax({
        url:'/search_letter',
        type:'POST',
        data:{latter:latter},
        beforeSend: preloader('.search_result')
    }).done(function(data){
        console.log(data);
        $('.search_result').html(data);
    })
});
$(document).on('click','.link-add',function()
{
    $("div").removeClass('un_border');
    $(this).addClass('un_border');
    $.ajax({
        url:'/add_word',
        beforeSend: preloader('.change_item')
    }).done(function(data){
        console.log(data);
        $('.change_item').html(data);
    })
});
$(document).on('submit','.add-form',function()
{
    var data = $('.add-form').serialize();
    $.ajax({
        url:'/adder_word',
        type:'POST',
        data:data,
        beforeSend: preloader('.change_item')
    }).done(function(data){
        console.log(data);
        $('.change_item').html(data);
    });
    return false;
});
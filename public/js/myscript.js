$(document).ready(function(){
	//alert('it works');
});
$(document).ready(function(){
	$('button').click(function(){
		//alert('Куда жмешь? нельзя ещё ничего купить о_0');
	})
});

//******** гармошка *********
$(document).ready(function(){
	$('.items_name a').click(function(){

		$(this).parent().parent().children(".items_list").slideToggle();
		return false;

	})
})

$(document).ready(function(){
	$(".fancybox").fancybox({
	//        padding: 0,
	        helpers: {
	            overlay: {
	                locked: false
	            }
	        }
	    });
	    
	    $(".gallery a").fancybox({
	//        padding: 0,
	        helpers: {
	            overlay: {
	                locked: false
	            }
	        }
	    });

	    $('a.i1').fancybox({
	//        padding: 0,
	        helpers: {
	            overlay: {
	                locked: false
	            }
	        }
	    });

});

$(document).ready(function(){
	$('.item_del_wrp').click(function(){
		$(this).parent().remove();
		var order=JSON.parse($.cookie('basket'));//получаем массив с объектами из куки
		var item_id=$(this).attr('data-id');//получаем id товара
        for(var i=0;i<order.length; i++) {
            if(order[i].item_id==item_id)
            {
                order.splice(i,1); //удаляем из массива объект
            }
        }
        $.cookie('basket',JSON.stringify(order),{ path: '/' });
        count_order(); //обновляем корзину
        if(order.length < 1) {location.reload()}; //если нет ни одного заказа, то перезагружаем страницу
        toastr.success("ТОвар удален из корзины");
	})
})

/*$(document).ready(function() { 
	   // $(".clubs_left").resize(function () {     
	    var  ht = $('.clubs_left').height();                
	    $(".main_cont").css('height',ht);
	    alert('good'); 
     
})*/

$(document).ready(function(){

	$('.plus').click(function(){
		var k = $('input.kol').val();
		k++;
		$('input.kol').val(k);
	})

})
$(document).ready(function(){

	$('.minus').click(function(){
		var k = $('input.kol').val();
		k--;
		if(k<=1)
		{
			k=1;
		}
		$('input.kol').val(k);
	})

})


$(document).ready(function(){
	/* 
		Количество товаров в корзине, вызываем при загрузке
	*/
	count_order();
	/*
		Отправка товара в корзину.
		Добавление в куки массив данных
	*/
	$('.size_item').click(function(event) {
		var element = $(this);
		if (!element.hasClass('select')) {
			$('.size_item').removeClass('select');
			element.addClass('select');
		}
	});
	$('.basket-add').click(function() {
        var item_id = parseInt($(this).attr('data-id'));
        var price = parseInt($('.price').html());
        var amount = $('.kol').val();
        var img = $('.out-image').attr('src');
        var title = $('.desc_name span').html();
        var options = $('.size_item.select').val();

        if (!options) { options = ''; }
        var tshort_num = $('.tshort-num').val();
        if (!tshort_num) { tshort_num = ''; }
        var tshort_name = $('.tshort-name').val();
        if (!tshort_name) { tshort_name = ''; }
        var order=$.cookie('basket');

        !order ? order=[]: order=JSON.parse(order);
        if(order.length==0) {
            order.push({'item_id': item_id, 'price':price,'amount':amount,'img':img,'title':title,'options':options, 'tshort_num':tshort_num,'tshort_name':tshort_name});
        }
        else {
            var flag=false;
            for(var i=0; i<order.length; i++) {
                if(order[i].item_id==item_id && order[i].tshort_name == tshort_name) {
                    order[i].amount=order[i].amount+1;
                    flag=true;
                }
            }
            if(!flag) {
                order.push({'item_id': item_id, 'price':price,'amount':amount,'img':img,'title':title,'options':options, 'tshort_num':tshort_num,'tshort_name':tshort_name});
            }
        }
        $.cookie('basket',JSON.stringify(order),{ path: '/' });
        count_order();
        toastr.success("Товар был добавлен в корзину");
        var tshort_num = $('.tshort-num').val('');
        var tshort_name = $('.tshort-name').val('');
    });
	$('.basket-clear').click(function(event) {
		$.removeCookie('basket', { path: '/' });
		toastr.success("Корзина очищена");
		location.reload()
	});
});



/* 
	Количество товаров в корзине
*/
function count_order()
{
    var order=$.cookie('basket'); 
    order ? order=JSON.parse(order): order=[];
    var count=0;

    if(order.length>0)
    {
        for(var i=0; i<order.length; i++)
        {
            count=count+parseInt(order[i].amount);
        }
    }
    $('.count_order').html(count);
}
/*
	top menu
*/
$(document).ready(function(){

	var h_hght = 250; // высота шапки
	var h_mrg = 0;    // отступ когда шапка уже не видна
	                 
	$(function(){
	 
	    var elem = $('.head_menu');
	    var top = $(this).scrollTop();	    
	     
	    if(top > h_hght){
	        elem.css('top', h_mrg);

	    }           
	     
	    $(window).scroll(function(){
	        top = $(this).scrollTop();
	        elem.addClass('bg_top');
	        $('.m_wrp a').addClass('wtc');
	        
	        if (top+h_mrg < h_hght) {
	            elem.css('top', (h_hght-top));
	            elem.removeClass('bg_top');
	            $('.m_wrp a').removeClass('wtc');
	        } else {
	            elem.css('top', h_mrg);
	        }
	    }); 
	});
})
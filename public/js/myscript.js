$(document).ready(function(){
	//alert('it works');
});
$(document).ready(function(){
	$('button').click(function(){
		alert('Куда жмешь? нельзя ещё ничего купить о_0');
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
		$(this).parent().remove()
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
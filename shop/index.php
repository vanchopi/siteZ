<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<!--<link rel="stylesheet/less" type="text/css" href="less/normalize.less">	
	<link rel="stylesheet/less" type="text/css" href="less/styles.less">-->
	<script src="js/less.min.js" type="text/javascript"></script>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
   	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" id="fancybox_css-css" href="fancybox/source/jquery.fancybox.css" type="text/css" media="all">
	<title>«Ресторан Тамада» - онлайн бронирование и предоплата</title>
</head>



<body>

 

   <!-- <form method="post" action="http://test.robokassa.ru/Index.aspx" class="booking">
	    <!-- для реального режима измените action формы на "https://merchant.roboxchange.com/Index.aspx" -->     
	   <!-- <input type="hidden" name="MrchLogin" value="-- Ваш логин в системе --" />
	    <input type="hidden" name="OutSum" value="-- Сумма платежа, разделитель дробной части - точка --" />
	    <input type="hidden" name="InvId" value="-- Уникальный номер транзакции в Вашем магазине -- " />
	    <input type="hidden" name="Desc" value="-- Описание, например: покупка коньков -- " />
	    <input type="hidden" name="SignatureValue" value="{SIGNATURE}" />	     
	    <input type="submit" value="Оплатить" />
     
    </form>-->

<div class="empty"></div> 

<div class="first_wrap">
	<div class="wrap_top">
		
		<div class="top_txt">
			<span >
				Предлагаем Вам  воспользоваться услугой  онлайн бронирования  ресторана
			</span>
		</div>
		
		<div class="top_dish">

		</div>
	
	</div>	

	<div class="wrap_f">

	   	<p>
	   		<span class="top_txt">Об оплате </span>      <br /> <br />
	   		<span class="top_txt_1">Как оплатить? </span><br /> <br />
	   		<span class="points">
	   			1. Выбрать необхобходимую сумму для предоплаты или указать свою; <br />
		   		2. Указать свои контактные данные; <br />
		   		3. Выбрать необходимый зал и стол, указав время и количество гостей; <br />
		   		4. Произвести оплату на сайте платежной системы "ROBOKASSA",<br> где Вам будут доступны различные способы оплаты; <br />
		   		5. После оплаты с Вами свяжется администратор ресторана<br> для подтверждения Вашей брони.   <br /> <br /> 
	   		</span>
	   		<span class="process_t">
	   			Процесс оплаты займет у Вас не более 5 минут ! <br> Минимальная сумма предоплаты: 1000 рублей. <br /><br />	   		
	   		</span>	   		
	   		<br>
	   		<span class="plese_t">
		   		Бронирование возможно только при условии, что выбранный Вами стол и зал является свободным. Рекомендуем Вам – перед тем как начать бронирование, уточнить у администратора – наличие свободных столов.
Если окажется что выбранный Вами (самостоятельно) стол будет занят, то администратор предложит Вам другой вариант . <br /> 
		   	</span>	
		   	<br>
		   	<span class="phone">
		   		(Администратор) +7 (928) 903-46-36<br> 
	   		</span>
	   		
	   		
	   	</p>
	
<div class="gallery">

                    <a rel="grouop" href="img/1floor.jpg">
            		    <div class="book_img">
                            <span>Расположение залов и столов</span>
                        </div>
                    </a>
                    <a rel="grouop" class="lightbox" href="img/2floor.jpg" style="display:none">
                        <img src="img/2flor.jpg" style="padding-top: 15px; margin:0px !important;" alt="" />
                    </a>
                    <a rel="grouop" class="lightbox" href="img/0floor.jpg" style="display:none">
                        <img src="img/0floor.jpg" style="padding-top: 15px; margin:0px !important;" alt="" />
                    </a>
</div> 

<br><br>

<div class="send_next">

		<p class="ch">Выберите необходимый номинал:</p>
		<br/>
		<div class="forms_wrap">
	    	<div class="left_bt">
		    	<div>
			    	<form method="POST" action="/shop/checkout/index.php#anchor" class="form_next">
			    		<input name="mode_sum" value="1000" id="sum1000" type="hidden"></input>
			    		<input class="bt_submit" type="submit" name="sum" value="1000 рублей" />

			    	</form>
		    	</div>

		    	<br/>

		    	<div>
					 <form method="POST" action="/shop/checkout/index.php#anchor" class="form_next">
			    		<input name="mode_sum" value="5000" id="sum5000" type="hidden"></input>
			    		<input class="bt_submit" type="submit" name="sum" value="5000 рублей" />

			    	</form>   		
		    	</div>
		    	
	    	</div>

	    	

	    	<div class="right_bt">
		    	
	    		<div>
					 <form method="POST" action="/shop/checkout/index.php#anchor" class="form_next">
			    		<input name="mode_sum" value="3000" id="sum3000" type="hidden"></input>
			    		<input class="bt_submit" type="submit" name="sum" value="3000 рублей"/>

			    	</form>   		
		    	</div>
		    	
		    	<br/>

		    	<div>
					 <form method="POST" action="/shop/checkout/index.php#anchor" class="form_next">
			    		<input name="mode_sum" value="10000" id="sum10000" type="hidden"></input>
			    		<input class="bt_submit" type="submit" name="sum" value="10000 рублей" />

			    	</form>   		
		    	</div>
	    	</div>
	    	<br/>	    	
	    	<br/>
	    	<div>
				 <form method="POST" action="/shop/checkout/index.php#anchor" class="form_next">
				 	<div>
		    			<input class="sum formblock" placeholder="Другая сумма:" name="mode_sum" id="sum" value="" type="text"></input>
		    		</div>
		    		<br/>
		    		<div>
		    			<input class="bt_submit1" type="submit" name="sum" value="ок" />
		    		</div>
		    	</form>   		
	    	</div>
	    	<br/>
	    </div>	
    </div>	

   </div>
</div>    

</body>

<script type="text/javascript">
	$(document).ready(function(){
		
		var error = 0;

		$('input#sum').keyup( function(){

			var id = $(this).attr('id');
         	var val = $(this).val();

         	if(val != '' && val >= 1 )
                {
                	error = 2;
                   $(this).addClass('not_error');
                   $(this).css('cssText','border: 2px solid rgb(120, 187, 15)');
                  // alert('good');
                }
                
                else
                {
                	error = 1;
                	$(this).removeClass('not_error').addClass('error');
                	$(this).css('cssText','border: 2px solid red');
                }

                return error;

		});

		$('.bt_submit1').click(function(){
			//alert('1');
	             	
		          if(error==2 )
		          {
		          	//alert('данные заполнены корректно')
		          }
		          else
		          {
		          	alert('минимальный номинал 1000 рублей');
		          	return false;
		          }  

	    });  
	})
</script>

<script type="text/javascript">
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
</script>


</html>
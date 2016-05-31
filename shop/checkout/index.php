<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<!--<link rel="stylesheet/less" type="text/css" href="less/normalize.less">	
	<link rel="stylesheet/less" type="text/css" href="less/styles.less">-->
	<script src="js/less.min.js" type="text/javascript"></script>
	<script src="js/myscript.js" type="text/javascript"></script>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
   	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" id="fancybox_css-css" href="fancybox/source/jquery.fancybox.css" type="text/css" media="all">
	<title>«Ресторан Тамада» - онлайн бронирование и предоплата</title>
</head>



<body>
  
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

  </div> 
  <a class="anc" href="#anchor" style="display:none">.</a>
  <a name="anchor"></a>  
 <div class="wrap_book">
	  <div class="booking">
		    <form method="post" action="http://restoran-tamada.ru/shop/checkout/save.php" class="booking" autocomplete="on">
		    	<div >
		    		<input name="mode" value="order" id="checkout-form-mode" type="hidden"></input>
		    	</div>

		    	<div>
		    		<input id="checkout-form-sum" name="mode_sum" type="hidden" value="<?php echo $_POST['mode_sum'];?>"></input>
		    	</div>

		    	<div class="h_space">
		    		<span class="nametxt formblock n1">Как вас зовут*</span><input class="namef vt formblock" name="name" id="name" placeholder="Имя" value="" type="text"></input>
		    	</div>
		    	<div class="h_space">
		    		<span class="nametxt formblock">Ваш контактный телефон*</span><input class="namef vt phone formblock" name="phone" id="phone" placeholder="8(xxx)xxx xx xx" value="" type="text"></input>
		    	</div>
		    	
		    	<div class="h_space">
		    		<span class="nametxt formblock n1">Зал и стол*</span><input class="namef vt formblock" name="hall" id="hall" placeholder="" value="" type="text"></input>
		    	</div>
		    	
		    	<div class="h_space">
		    		<span class="nametxt formblock n1">Дата и время*</span><input class="namef vt formblock" name="data" id="date" placeholder="дд.мм.гггг чч:мм" value="" type="text"></input>
		    	</div>
		    	<div class="h_space">
		    		<span class="nametxt formblock">Количество<br> персон*</span><input class="namef vt formblock" name="npersons" id="npersons" placeholder="" value="" type="text"></input>
		    	</div>
		    	<div class="h_space">
		    		<span class="nametxt formblock n1">Коментарии</span><input class="namef vt formblock" name="comment" id="comment" placeholder="" value="" type="text"></input>
		    	</div>
		    

          <div class="bt_wrp">
              <div class="back_bt_wrap">
                <a href="http://restoran-tamada.ru/shop">
                    <div class="sum_return">
                      
                      <div class="back_bt">
                      </div>
                      <span>Вернуться к выбору суммы</span>
                    </div>
                </a>
              </div>

    		    	<div class="ok_wrap">
    		    		<input class="bt_ok" type="submit" name="robokassa" value="Продолжить оплату " />
    		    	</div>
          </div>

		    </form>

		    		<br/><br/>

		    		
		</div>

	  <div class="right_txt">	    

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

				    <br/><br/>
				    <div class="book_txt">
				    	<span>Пожалуйста, заполните корректно форму бронирования.<br> Поля отмеченные звездочкой обязательны к заполнению.</span>
				    	<br/><br/>	
				    	<span>Мы гарантируем 100% конфиденциальность.<br> Ваши контакты нужны нам исключительно для связи с Вами и не будут переданы третьим лицам. </span>
				    	<br/><br/>	
				    	<span>После успешной оплаты ожидайте звонка<br> от администратора ресторана. </span>
				    	<br/><br/>		    	
					</div>
			</div>

		</div>	

	    <div class="b_i_wrp">
			<div class="b_i_show">
		    	
				<img class="floor1" src="img/1flor.jpg"  style="" alt="" />
				<img class="floor2" src="img/2flor.jpg" style="" alt="" />
		    	<!--<a class="lightbox lightbox-enabled" href="img/1flor.jpg">
		    		
		    	</a>
		    	
		    	<a class="lightbox lightbox-enabled" href="img/2flor.jpg">
		    		
		    	</a>-->
			</div>		
		</div>
	    
	</div>

</div>

</body>

<script type="text/javascript">
	/*$('.book_img').click(function(){

		$('.b_i_wrp').show();

	})*/
</script>
<script type="text/javascript">
	/*$('.b_i_wrp').click(function(){
		$('.b_i_wrp').hide();
	})*/
</script>


<script type="text/javascript">
  $(document).ready(function(){

    if($('a.anc').click()!==false) {
    
      $('a.anc').trigger('click');
  }

   

})
</script>


<script type="text/javascript">

	$(document).ready(function(){
	
	var error = 0;
	
		/*$('input#name, input#phone, input#hall, input#date, input#npersons, input#comment ').keyup( function(){*/
			//alert('1');

			

         	

         	$('input#name').keyup( function(){
				//alert('good');
				var id = $(this).attr('id');
         		var val = $(this).val();

				var rv_name = /^[a-zA-Zа-яА-Я]+$/;
				//alert(val);


				if(val.length >= 2 && val != '' && rv_name.test(val))
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

            $('input#phone').keyup(function(){
            	var id = $(this).attr('id');
         		var val = $(this).val();

            	var rv_phone = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;

            	if(val != '' && rv_phone.test(val))
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

            }) ;

            $('input#hall').keyup(function(){

            	//var rv_hall= /^[1|\2]$/;
            	var id = $(this).attr('id');
         		var val = $(this).val();

            	if(val.length > 0 && val !=='')
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

             $('input#date').keyup(function(){
             	
             	var id = $(this).attr('id');
         		var val = $(this).val();

            	var rv_date = /([0-9])$/;

            	if( val.length > 2 && val != '' && rv_date.test(val))
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

             $('input#npersons').keyup(function(){

             	var id = $(this).attr('id');
         		var val = $(this).val();

            	var rv_npersons = /([1-9])$/;

            	if( val != '' && rv_npersons.test(val))
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

             $('input#comment').keyup(function(){

             	var id = $(this).attr('id');
         		var val = $(this).val();

            	var rv_comment = /^([a-zA-Zа-яА-Я])/;

            	if( val != '' && rv_comment.test(val))
                {
                	
                   $(this).addClass('not_error');
                   $(this).css('cssText','border: 2px solid rgb(120, 187, 15)');
                  // alert('good');
                }
                
                else
                {
                	
                	$(this).removeClass('not_error').addClass('error');
                	$(this).css('cssText','border: 2px solid red');
                }

                

            });             

                    
			
		
		
		$('.bt_ok').click(function(){
			//alert('1');
	             	
		          if(error==2 )
		          {
		          	//alert('данные заполнены корректно')
		          }
		          else
		          {
		          	alert('заполните корректно поля')
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
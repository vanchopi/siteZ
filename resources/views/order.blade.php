@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			Оформление заказа
		</div>
	    <hr>

	    <div class="main pd_n">	    			    
		   
	    	<div class="basket_cont">
	    		<div class="oredre_wrap">
	    			
	    			<div class="left_part">
	    				<form action='https://merchant.roboxchange.com/Index.aspx' method="GET" class="booking" autocomplete="on">
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Фамилия*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="Фамилия">
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Имя*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="Имя">
		    					</div>
		    				</div>

							<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Отчество*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="Отчество">
		    					</div>
		    				</div>

		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>E-mail*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="E-mail">
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Телефон*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="8 (800) 555 35 35">
		    					</div>
		    				</div>

		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Адрес*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="Адрес">
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Индекс*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="Индекс">
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Регион*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="Регион">
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Страна*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
		    						<input placeholder="Страна">
		    					</div>
		    				</div>
		    				<div class="bt_next">
		    					<input class="bt_submit" name="robokassa" value="Продолжить оплату " type="submit">
		    				</div>
		    			</form>	

	    			</div>
	    			
	    			<div class="right_part">
	    				<div class="text_wrp">
	    					<div>
	    						<span>
	    							Пожалуйста, заполните корректно форму бронирования.
Поля отмеченные звездочкой обязательны к заполнению.
<br><br>Мы гарантируем 100% конфиденциальность.
Ваши контакты нужны нам исключительно для связи с Вами и не будут переданы третьим лицам. 
	    						</span>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>

	    </div>

</div>
@stop
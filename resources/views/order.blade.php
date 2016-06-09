@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			Оформление заказа
		</div>
	    <hr>

	    <div class="main pd_n">	    			    
		   
	    	<div class="basket_cont">
	    		<div class="oredre_wrap" ng-app="CheckApp">
	    			
	    			<div class="left_part" ng-controller="ValidationCtrl">
						{{ Form::open(array('route' => 'ordersadd', 'name' => 'order', 'class' => 'addform', 'method' => 'post')) }}
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Фамилия*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<input type="text"name="sname" placeholder="Фамилия" ng-model="sname" value-input required>
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Имя*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<input type="text" name="fname" placeholder="Имя" ng-model="fname" value-input required>
		    					</div>
		    				</div>

							<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Отчество*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<input type="text" name="lname" placeholder="Отчество" ng-model="lname" value-input required>
		    					</div>
		    				</div>

		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>E-mail*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<input type="text" name="email" placeholder="Email" ng-model="email" value-input required>
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Телефон*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<input type="hidden" name="phone" ng-model="user.phone" required>
									<div class="input-group" ng-class="{'input-success':order.phone.$valid}">
										<span class="input-group-addon">+7</span>
										<input class="input-phone" type="text" name="phone" placeholder="(xxx) xxx-xxxx" phone-input ng-model="user.phone" ng-minlength="14" required>
									</div>
		    					</div>
		    				</div>

		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Адрес*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<input type="text" name="address" placeholder="Адрес" ng-model="address" value-input required>
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Индекс*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<input type="hidden" name="address_index" ng-model="user.address_index" required>
									<input class="input-index" ng-class="{'input-success':order.address_index.$valid}" type="text" name="address_index" placeholder="xxxxxx" index-input ng-model="user.address_index" ng-minlength="6" required>
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Регион*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<select name="oc_country_id" ng-init="oc_country_id='1'" ng-model="oc_country_id" required>
										@foreach($oc_countries as $oc_country)
											<option value="{{$oc_country->oc_country_id}}">{{$oc_country->oc_country_title}}</option>
										@endforeach
									</select>
		    					</div>
		    				</div>
		    				<div class="field_line">
		    					<div class="field_title">
		    						<div>
		    							<span>Страна*</span>
		    						</div>
		    					</div>

		    					<div class="field_field">
									<select name="country">
										<option value="0" selected>Россия</option>
									</select>
		    					</div>
		    				</div>
		    				<div class="submitbutton">
								<button type="submit" class="btn btn-default" ng-disabled="order.$invalid">Перейти к оплате</button>
		    				</div>
						{{ Form::close() }}
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
<script src="{{asset('js/angular/angular.min.js')}}"></script>
<script src="{{asset('js/angular/angular-route.min.js')}}"></script>
<script src="{{asset('js/angular/controllers.js')}}"></script>
@endsection
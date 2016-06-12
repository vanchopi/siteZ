@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			Корзина
		</div>
	    <hr>

	    <div class="main pd_n">	    			    
		    <div class="basket_cont">
				@if(empty($orders))
					<h3>Корзина пуста</h3>
				@else
			    	<div class="basket_wrap">

			    		<div class="basket_title">
			    			<div class="title_desc">
			    				<div>Наименование</div>
			    			</div>

			    			<div class="title_quant">
			    				<div>Колличество</div>
			    			</div>

			    			<div class="title_cost">
			    				<div>Цена</div>
			    			</div>

			    		</div>



						@foreach($orders as $order)
							<div class="bask_item">
								<div class="item_descript_wpr">
									<div class="img_cont">
										<div class="img_wrp">
											<img src="{{$order->img}}">
										</div>
									</div>
									<div class="text1">
										<div class="name">
											<div>{{$order->title}}</div>
										</div>
										@if(isset($order->options))
											<div class="size">
												<div class="ib">{{$order->options}}</div>
											</div>
										@endif
										@if(!empty($order->tshort_num))
											<div class="desc">
												<div>Номер: {{$order->tshort_num}}</div>
												<div>Фамилия: {{$order->tshort_name}}</div>
											</div>
										@endif
									</div>
								</div>

								<div class="item_quant_wrp">
									<div>{{$order->amount}}</div>
								</div>

								<div class="item_cost_wrp">
									<div>{{$order->price}}₽</div>
								</div>

								<div class="item_del_wrp" data-id="{{$order->item_id}}">delete
								</div>
								<hr>
							</div>
						@endforeach
						<hr>
			    	</div>
					<div class="total-price" style="text-align: center;">Общая цена: {{$total}}</div>
			    	<div class="bt_go">
				    	<a href="{{route('order.create')}}">
				    		<div class="go">
				    			<div>Оформить заказ</div>
				    		</div>
			    		</a>
						<a href="#!" class="basket-clear">
							<div class="go">
								<div>Очистить корзину</div>
							</div>
						</a>
		    		</div>
				@endif

			</div>

	    </div>

</div>
@endsection
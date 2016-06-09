@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			<a href="{{route('site.items.category',$item->category_title)}}">{{$item->category_title}}</a>
			@if (isset($item->s_category_title))
				| <a href="{{route('site.items.scategory',[$item->category_title,$item->s_category_title])}}">{{$item->s_category_title}}</a>
			@endif
			@if (isset($item->s_s_category_title))
				| <a href="{{route('site.items.all',[$item->category_title,$item->s_category_title,$item->s_s_category_title])}}">{{$item->s_s_category_title}}</a>
			@endif
			| {{$item->title}}
		</div>
	    <hr>

	    <div class="main pd_n">
	    	@include('club-menu')		    
		    <div class="main_cont">

				<a href="{{route('site.items.category',$item->category_title)}}">{{$item->category_title}}</a>
				@if (isset($item->s_category_title))
					| <a href="{{route('site.items.scategory',[$item->category_title,$item->s_category_title])}}">{{$item->s_category_title}}</a>
				@endif
				@if (isset($item->s_s_category_title))
					| <a href="{{route('site.items.all',[$item->category_title,$item->s_category_title,$item->s_s_category_title])}}">{{$item->s_s_category_title}}</a>
				@endif
				| {{$item->title}}
			    	<div class="goods_wrap">

			    		<div class="goods_img_wrp">
			    			<div class="img_bar">
			    				<div class="gallery">
				    				<div class="first_wrp">
					    				<div class="first_img">
					    					<a rel="grouop" href="{{asset('img/items/'.explode(';',$item->preview)[0])}}">
					    						<img class="out-image" src="{{asset('img/items/'.explode(';',$item->preview)[0])}}">
					    					</a>
					    				</div>
					    			</div>
				    				<div class="next_wrp">
										@foreach(explode(';',$item->preview) as $key => $image)
											@if($key != 0)
												<div class="second_wrp">
													<div class="mini_img">
														<a rel="grouop" href="{{asset('img/items/'.$image)}}">
															<img src="{{asset('img/items/'.$image)}}">
														</a>
													</div>
												</div>
											@endif
										@endforeach
					    			</div>		
			    				</div>
			    			</div>
			    		</div>


			    		<div class="desc_wrp">
				    		<div class="desc_name">
				    			<span>{{$item->title}}</span>
					    	</div>

				    		<div class="goods_description">			    			
				    			<span>Описание :</span>
				    			<p>{{$item->text}}</p>

				    		</div>

				    		<div class="cost">
				    			<span>Цена : <span class="price">{{$item->price}}</span> ₽</span>
				    		</div>
				    		<div class="quant">
				    			<span class="ib">Колличество : </span>
				    			<div class="plus ib">
				    				<img src="{{asset('/img/plus.png')}}">
				    			</div>
				    			<span class="ib">/</span>
				    			<div class="minus ib">
				    				<img src="{{asset('/img/minus.png')}}">
				    			</div>
				    			<div value="1" class="num ib">
				    				<div>
				    					<input class="kol" value="1" placeholder="1">
				    				</div>
				    			</div>
				    			<div class="size">
				    				<a href="#">- таблица размеров -</a>
				    			</div>
				    		</div>
							@if($options->contains(1))
								<section class="support size">
									<h4>Размер</h4>
									<div class="support_buttons">
										@foreach($option_values as $key => $values)
											@if($values->option_id == 1)
												@if($key == 0)
													<button class="size_item select" value="{{$values->option_title}}: {{$values->value}} {{$values->option_unit}}" data-type="size">{{$values->value}}</button>
												@else
													<button class="size_item" value="{{$values->option_title}}: {{$values->value}} {{$values->option_unit}}" data-type="size">{{$values->value}}</button>
												@endif
											@endif
										@endforeach
									</div>
								</section>
							@endif
							@if($options->contains(1))
				    		<div class="size_bar">
								@foreach($option_values as $values)
									@if($values->option_id == 3)
										<div class="item">
											<div>{{$values->value}}</div>
										</div>
									@endif
								@endforeach
				    		</div>
							@endif

							@if ($item->category_id == 1 || $item->category_id == 2)
								<div class="get_num nm">
									<input placeholder="Нанести №" class="tshort-num">
								</div>

								<div class="get_num snm">
									<input placeholder="Нанести фамилию" class="tshort-name">
								</div>
							@endif

				    		<div class="bt_add">
								<div class="add">
									<div class="basket-add" data-id="{{$item->id}}">Добавить в корзину</div>
								</div>
				    		</div>

				    	</div>	
			    	</div>		    	
			</div>

	    </div>

</div>
@endsection
@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			Корзина
		</div>
	    <hr>

	    <div class="main pd_n">	    			    
		    <div class="basket_cont">		    		     				    	
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

			    		<hr>

			    		<div class="bask_item">
				    		<div class="item_descript_wpr">
				    			<div class="img_cont">
				    				<div class="img_wrp">
				    					<img src="/img/1.jpg">
				    				</div>
				    			</div>
				    			<div class="text1">
									<div class="name">
										<div>Поло "Крокодил Гена"</div>
									</div>
									<div class="size">
										<span class="ib">Размер : </span><div class="ib">M</div>	
									</div>	
									<div class="desc">
										<div>Good feature</div>
									</div>
				    			</div>
				    		</div>

				    		<div class="item_quant_wrp">
				    			<div>5</div>
				    		</div>

				    		<div class="item_cost_wrp">
				    			<div>1 999₽</div>
				    		</div>

				    		<div class="item_del_wrp">
				    		</div>
				    		<hr>
				    	</div>

				    	<div class="bask_item">
				    		<div class="item_descript_wpr">
				    			<div class="img_cont">
				    				<div class="img_wrp">
				    					<img src="/img/2.jpg">
				    				</div>
				    			</div>
				    			<div class="text1">
									<div class="name">
										<div>Поло "Крокодил Гена"</div>
									</div>
									<div class="size">
										<span class="ib">Размер : </span><div class="ib">XL</div>	
									</div>	
									<div class="desc">
										<div>Good feature</div>
									</div>
				    			</div>
				    		</div>

				    		<div class="item_quant_wrp">
				    			<div>4</div>
				    		</div>

				    		<div class="item_cost_wrp">
				    			<div>1 999₽</div>
				    		</div>

				    		<div class="item_del_wrp">
				    		</div>
				    		<hr>
				    	</div>	

			    	</div>
			    	<div class="bt_go">
				    	<a href="/order/">
				    		<div class="go">
				    			<div>Оформить заказ</div>
				    		</div>
			    		</a>
		    		</div>

			</div>

	    </div>

</div>
@stop
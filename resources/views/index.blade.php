@extends("layout")
@section("content")

<div class="content_slider">
	<a href="#">
		<img id="1" src="{{asset('/img/slide.jpg')}}" class="sld img_none active_img">
		<img id="2" src="{{asset('/img/slide1.jpg')}}" class="sld img_none">
		<img id="3" src="{{asset('/img/slide1.jpg')}}" class="sld img_none">
	</a>
	<div class="control">
		<div class="arrow_left">
			<img src="/img/left.png">
		</div>
		<div class="arrow_right">
			<img src="/img/right.png">
		</div>
	</div>
</div>

<div class="content_wrap">
	     <div class="tx">
	     	Новинки
	     </div>
	     <div class="items_wrp">
	     	<div class="item">
		     	<div class="wrp_item">
		     		<div class="img_wrp">
		     			<a href="/good">
		     				<img src="{{asset('/img/t-shirt.jpg')}}">
		     			</a>
		     		</div>	
		     		<div class="c_desc">
		     			<span>Описание</span>
						<div class="fee">1000 ₽</div>
		     		</div>
		     		<div class="buy">
		     			<button>Купить</button>
		     		</div>
		     	</div>		
	     	</div>
	     	<div class="item">
	     		<div class="wrp_item">
	     			<div class="img_wrp">
		     			<img src="{{asset('/img/t-shirt1.jpg')}}">
		     		</div>	
		     		<div class="c_desc">
		     			<span>Описание</span>
						<div class="fee">1000 ₽</div>
		     		</div>
		     		<div class="buy">
		     			<button>Купить</button>
		     		</div>
		     	</div>	
	     	</div>
	     	<div class="item">
	     		<div class="wrp_item">
	     			<div class="img_wrp">
		     			<img src="{{asset('/img/t-shirt.jpg')}}">
		     		</div>	
		     		<div class="c_desc">
		     			<span>Описание</span>
						<div class="fee">1000 ₽</div>
		     		</div>
		     		<div class="buy">
		     			<button>Купить</button>
		     		</div>
		     	</div>	
	     	</div>
	     	<div class="item">
	     		<div class="wrp_item">
	     			<div class="img_wrp">
		     			<img src="{{asset('/img/t-shirt1.jpg')}}">
		     		</div>	
		     		<div class="c_desc">
		     			<span>Описание</span>
						<div class="fee">1000 ₽</div>
		     		</div>
		     		<div class="buy">
		     			<button>Купить</button>
		     		</div>
		     	</div>	
	     	</div>

	     	<div class="control">
				<div class="arrow_left_it">
					<img src="/img/left.png">
				</div>
				<div class="arrow_right_it">
					<img src="/img/right.png">
				</div>
			</div>

	     </div>

	     <div class="txt1">
	     	Товары
	     </div>

	     <div class="main">
	     	<div class="main_vk">
	     		<script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>
					<!-- VK Widget -->
					<div id="vk_groups"></div>
					<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode: 0, width: "320", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 55451509);
				</script>
	     	</div>

	     	<div class="main_cont">

				@foreach($items as $item)
					<div class="item">
						<div class="wrp_item">
							<div class="img_wrp">
								<a href="{{route('site.items.one',$item->title)}}"><img src="{{asset('img/items/'.explode(';',$item->preview)[0])}}"></a>
							</div>
							<div class="c_desc">
								<span><a href="{{route('site.items.one',$item->title)}}">{{$item->title}}</a></span>
								<div class="fee">{{$item->price}} ₽</div>
							</div>
							<div class="buy">

								<button>Купить</button>
							</div>
						</div>
					</div>
				@endforeach

	     	</div>

	     </div>
</div>
@endsection
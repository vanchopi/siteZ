@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			{{$categories->category_title}}

		</div>
	    <hr>

	    <div class="main pd_n">


				{{--@foreach($collection as $club)--}}
				{{--<div class="club_items">--}}
					{{--<div class="items_name">--}}
						{{--<a href="">{{$categ[$club]['s_category_title']}}</a>--}}
					{{--</div>--}}
					{{--<div class="items_list">--}}
						{{--<ul>--}}
							{{--@foreach($sscategories_need as $item)--}}
								{{--@if ($item->s_category_id == $club)--}}
								{{--<li>--}}
									{{--<a href="">{{$item->s_s_category_title}}</a>--}}
								{{--</li>--}}
								{{--@endif--}}
							{{--@endforeach--}}
						{{--</ul>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--@endforeach--}}


				<!-- <div class="club_items">
					<div class="items_name">
						<a href="">Германия</a>
					</div>
					<div class="items_list">
						<ul>
							<li>
								<a href="">Бавария</a>
							</li>
							<li>
								<a href="">Боруссия Дортмунд</a>
							</li>
							<li>
								<a href="">Боруссия Мюнхенгладбах</a>
							</li>
							<li>
								<a href="">Шальке</a>
							</li>
							<li>
								<a href="">Штутгарт</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="club_items">
					<div class="items_name">
						<a href="">Италия</a>
					</div>
					<div class="items_list">
						<ul>
							<li>
								<a href="">Ювентус</a>
							</li>
							<li>
								<a href="">Рома</a>
							</li>
							<li>
								<a href="">Наполи</a>
							</li>
							<li>
								<a href="">Лацио</a>
							</li>
							<li>
								<a href="">Интер</a>
							</li>
							<li>
								<a href="">Милан</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="club_items">
					<div class="items_name">
						<a href="">Франция</a>
					</div>
					<div class="items_list">
						<ul>
							<li>
								<a href="">ПСЖ</a>
							</li>
							<li>
								<a href="">Лион</a>
							</li>
							<li>
								<a href="">Марсель</a>
							</li>
							<li>
								<a href="">Лиль</a>
							</li>
							<li>
								<a href="">Сент-этьен</a>
							</li>
						</ul>
					</div>
				</div>


			</div> -->

			@include('club-menu')

		    <div class="main_cont">

				@foreach($scategories_need as $item)
					<div class="item">
						<a href="{{route('site.items.scategory',[$categories->category_title,$item->s_category_title])}}">
						<div class="wrp_item">
							<div class="img_wrp ">
								<img src="{{asset('/img/categories/'.$item->s_category_preview)}}" class="rad_cl">
							</div>
							<div class="c_desc ct">
								<span>{{$item->s_category_title}}</span>
							</div>
						</div>
						</a>
					</div>
				@endforeach
			     	
			</div>

	    </div>

</div>
@endsection
@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			<a href="{{route('site.items.category',$categories->category_url_title)}}">{{$categories->category_title}}</a>
			@if (isset($scategories->s_category_title))
				| <a href="{{route('site.items.scategory',[$categories->category_url_title,$scategories->s_category_url_title])}}">{{$scategories->s_category_title}}</a>
			@endif
		</div>
	    <hr>
	    <div class="main pd_n">
	    	@include('club-menu')
			<div class="main_cont">
				@foreach($sscategories_need as $item)
					<div class="item">
						<a href="{{route('site.items.all',[$categories->category_url_title,$scategories->s_category_url_title,$item->s_s_category_url_title])}}">
							<div class="wrp_item">
								<div class="img_wrp ">
									<img src="{{asset('/img/categories/'.$item->s_s_category_preview)}}" class="rad_cl">
								</div>
								<div class="c_desc ct">
									<span>{{$item->s_s_category_title}}</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach

			</div>

	    </div>

</div>
@endsection
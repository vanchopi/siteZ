@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			{{$categories->category_title}}
			@if (isset($scategories->s_category_title))
				| {{$scategories->s_category_title}}
			@endif
		</div>
	    <hr>
	    <div class="main pd_n">
	    	@include('club-menu')
			<div class="main_cont">
				@foreach($sscategories_need as $item)
					<div class="item">
						<a href="{{route('site.items.all',[$categories->category_id,$scategories->s_category_id,$item->s_s_category_id])}}">
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
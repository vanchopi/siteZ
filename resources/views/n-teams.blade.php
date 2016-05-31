@extends("layout")
@section("content")



<div class="content_wrap">

		<div class="tx_l">
			Сборные
		</div>
	    <hr>

	    <div class="main pd_n">
	    	{{--@include('club-menu')		    --}}
		    <div class="main_cont">
		    	
			     	<!--<div class="item">
				     	<div class="wrp_item">
				     		<a href="">
					     		<div class="img_wrp ">
					     			<img src="/img/Russia.png" class="rad_cl">
					     		</div>	
					     	</a>	
				     		<div class="c_desc ct">
				     			<span>Россия</span>
				     		</div>			     		
				     	</div>		
			     	</div>-->
		     	
			     	<div class="item">
				     	<div class="wrp_item">
					     	<a href="/item/">
					     		<div class="img_wrp"> 
					     			<img src="{{asset('/img/Spain.png')}}" class="rad_cl">
					     		</div>
					     	</a>		
				     		<div class="c_desc ct">
				     			<span>Испания</span>
				     		</div>			     		
				     	</div>		
			     	</div>
			    
			     	<div class="item">
				     	<div class="wrp_item">
				     		<div class="img_wrp">
				     			<img src="{{asset('/img/Germany.png')}}" class="rad_cl">
				     		</div>	
				     		<div class="c_desc ct">
				     			<span>Германия</span>
				     		</div>			     		
				     	</div>		
			     	</div>
			     	<div class="item">
				     	<div class="wrp_item">
				     		<div class="img_wrp"> 
				     			<img src="{{asset('/img/Italy.png')}}" class="rad_cl">
				     		</div>	
				     		<div class="c_desc ct">
				     			<span>Италия</span>
				     		</div>			     		
				     	</div>		
			     	</div>
			    
			     	
			     	
			</div>

	    </div>

</div>
@stop
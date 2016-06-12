@extends("layout")
@section("content")



    <div class="content_wrap">

        <div class="tx_l">
            <a href="{{route('site.items.category',$categories->category_title)}}">{{$categories->category_title}}</a>
            @if (isset($scategories->s_category_title))
                | <a href="{{route('site.items.scategory',[$categories->category_title,$scategories->s_category_title])}}">{{$scategories->s_category_title}}</a>
            @endif
            @if (isset($sscategories->s_s_category_title))
                | <a href="{{route('site.items.all',[$categories->category_title,$scategories->s_category_title,$sscategories->s_s_category_title])}}">{{$sscategories->s_s_category_title}}</a>
            @endif
        </div>
        <hr>
        <div class="main pd_n">
            @include('club-menu')
            <div class="main_cont">
                @foreach($items as $item)
                    <div class="item">
                        <div class="wrp_item">
                            <a href="{{route('site.items.one',$item->title)}}">
                                <div class="img_wrp">
                                    <a href="{{route('site.items.one',$item->title)}}">
                                        <img src="{{asset('img/items/'.explode(';',$item->preview)[0])}}">
                                    </a>
                                </div>
                            </a>
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
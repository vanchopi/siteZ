@extends("layout")
@section("content")



    <div class="content_wrap">

        <div class="tx_l">
            {{$categories->category_title}}
            @if (isset($scategories->s_category_title))
                | {{$scategories->s_category_title}}
            @endif

            @if (isset($sscategories->s_s_category_title))
                | {{$sscategories->s_s_category_title}}
            @endif
        </div>
        <hr>
        <div class="main pd_n">
            @include('club-menu')
            <div class="main_cont">
                @foreach($items as $item)
                    <div class="item">
                        <div class="wrp_item">
                            <a href="{{route('site.items.one',$item->id)}}">
                                <div class="img_wrp">
                                    <img src="{{asset('img/items/'.explode(';',$item->preview)[0])}}">
                                </div>
                            </a>
                            <div class="c_desc">
                                <span>{{$item->title}}</span>
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
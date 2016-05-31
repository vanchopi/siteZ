@extends('home.app')
@section('content')
<div class="container" ng-app>
    @if(Session::has('message'))
    <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
    @endif
    <div class="add-form">
        <h3 class="text-center">Заказ №{{$check->order_id}}</h3>
        <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 col-xs-12 checkblock">
        @foreach($items as $key => $item)
            <div class="checkitem">
                <h4>{{$item->title}}</h4>
                <section>
                    @foreach(explode(';',$item->preview) as $images)
                        <img src="{{asset('images/items/'.$images)}}" alt="">
                    @endforeach
                </section>
                <table class="table">
                    <thead>
                    <tr>
                        <td>Дополнительные параметры</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(explode(',',$option[$key]) as $value)
                        <tr>
                            <td>{{$value}}</td>
                        </tr>
                    @endforeach
                        <tr class="text-right">
                            <td>Цена: {{$item->price}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
        
            <div class="allprice">Общая цена <span>{{$check->check_price}}</span></div>
        </div>
    </div>
</div>
@endsection
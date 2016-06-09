@extends('home.app')
@section('content')
    <div class="container" ng-app>
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="add-form">
            <h3 class="text-center">Заказ №{{$check->order_id}}</h3>
            <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 col-xs-12 checkblock">
                @foreach(explode(';',$check->check_items_id) as $key => $item)
                    <div class="checkitem">
                        <h4>{{$items[$item][0]->title}}</h4>
                        <section>
                            @foreach(explode(';',$items[$item][0]->preview) as $images)
                                <img src="{{asset('img/items/'.$images)}}" alt="">
                            @endforeach
                        </section>

                        <table class="table">
                            <thead>
                                @if(isset(explode(';',$check->check_items_count)[$key]))
                                    @if(!empty(explode(';',$check->check_items_count)[$key]))
                                        <tr>
                                            <td>Количество: {{explode(';',$check->check_items_count)[$key]}}</td>
                                        </tr>
                                    @endif
                                @endif
                                <tr>
                                    <td style="text-align: center">Дополнительные параметры</td>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset(explode(';',$check->check_options_id)[$key]))
                                @if(!empty(explode(';',$check->check_options_id)[$key]))
                                    <tr>
                                        <td>{{explode(';',$check->check_options_id)[$key]}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="text-align: center">Отсутствуют</td>
                                    </tr>
                                @endif
                            @endif
                            @if(isset(explode(';',$check->check_tshort_num)[$key]))
                                @if(!empty(explode(';',$check->check_tshort_num)[$key]))
                                    <tr>
                                        <td>Номер: {{explode(';',$check->check_tshort_num)[$key]}}</td>
                                    </tr>
                                @endif
                            @endif
                            @if(isset(explode(';',$check->check_tshort_name)[$key]))
                                @if(!empty(explode(';',$check->check_tshort_name)[$key]))
                                    <tr>
                                        <td>Фамилия: {{explode(';',$check->check_tshort_name)[$key]}}</td>
                                    </tr>
                                @endif
                            @endif
                                <tr class="text-right">
                                    <td>Цена: {{$items[$item][0]->price}}</td>
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
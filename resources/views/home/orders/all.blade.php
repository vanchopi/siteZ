@extends('home.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Все заказы</h3>
            <ul class="support-action sort">Сортировать по
                <li><a data-column="1">Имени</a></li>
                <li><a data-column="2">Номеру</a></li>
                <li><a data-column="3">Статусу</a></li>
                <li><a data-column="4">Дате</a></li>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Имя заказчика</td>
                    <td>Номер телефона</td>
                    <td>Статус</td>
                    <td>Дата заказа</td>
                    <td>Данные</td>
                    <td>Заказ</td>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->sname}} {{$order->fname}}</td>
                        <td>+7 {{$order->phone}}</td>
                        <td>
                            <select class="form-control changestatus" data-id="{{$order->id}}" data-url="{{route('changestatus')}}">
                                @if($order->status == 0)
                                    <option value="0" selected>Обрабатывается</option>
                                    <option value="1">Обработан</option>
                                    <option value="2">Комлектуется</option>
                                    <option value="3">Отправлен</option>
                                @elseif($order->status == 1)
                                    <option value="0">Обрабатывается</option>
                                    <option value="1" selected>Обработан</option>
                                    <option value="2">Комлектуется</option>
                                    <option value="3">Отправлен</option>
                                @elseif($order->status == 2)
                                    <option value="0">Обрабатывается</option>
                                    <option value="1">Обработан</option>
                                    <option value="2" selected>Комлектуется</option>
                                    <option value="3">Отправлен</option>
                                @elseif($order->status == 3)
                                    <option value="0">Обрабатывается</option>
                                    <option value="1">Обработан</option>
                                    <option value="2">Комлектуется</option>
                                    <option value="3" selected>Отправлен</option>
                                @endif
                            </select>
                        </td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('order.show',$order->id)}}">Посмотреть</a>
                        </td>
                        <td>
                            {!! link_to_route('check.showonwindow','Перейти',[$order->check_id]) !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="add-form" ng-app="CheckApp">
                <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1 col-xs-12" ng-controller="ValidationCtrl">
                    {{ Form::open(array('route' => 'ordersadd', 'name' => 'order', 'class' => 'form-horizontal addform', 'method' => 'post', 'files'=>true)) }}
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Фамилия</label>
                                <input type="text" class="form-control" name="sname" placeholder="Фамилия" ng-model="sname" value="Поскачей" value-input required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Имя</label>
                                <input type="text" class="form-control" name="fname" placeholder="Имя" ng-model="fname" value="Дмитрий" value-input required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Отчество</label>
                                <input type="text" class="form-control" name="lname" placeholder="Отчество" ng-model="lname" value="Игоревич" value-input required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" ng-model="email" value="dposkachei@gmail.com" value-input required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Телефон</label>
                                <input class="form-control" type="hidden" name="phone" ng-model="user.phone" required>
                                <div class="input-group" ng-class="{'input-success':order.phone.$valid}">
                                    <span class="input-group-addon">+7</span>
                                    <input class="form-control input-phone" type="text" name="phone" placeholder="(xxx) xxx-xxxx" phone-input ng-model="user.phone" ng-minlength="14" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Страна</label>
                                <select class="form-control" name="country">
                                    <option value="0" selected>Россия</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Регион</label>
                                <select class="form-control" name="oc_country_id" ng-init="oc_country_id='1'" ng-model="oc_country_id" required>
                                    @foreach($oc_countries as $oc_country)
                                        <option value="{{$oc_country->oc_country_id}}">{{$oc_country->oc_country_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Индекс</label>
                                <input class="form-control" type="hidden" name="address_index" ng-model="user.address_index" required>
                                <input class="form-control input-index" ng-class="{'input-success':order.address_index.$valid}" type="text" name="address_index" placeholder="xxxxxx" index-input ng-model="user.address_index" ng-minlength="6" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Адрес</label>
                                <input type="text" class="form-control" name="address" placeholder="Адрес" ng-model="address" value="Мечникова" value-input required>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="form-group submitbutton">
                                <button type="submit" class="btn btn-default" ng-disabled="order.$invalid">Сохранить</button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
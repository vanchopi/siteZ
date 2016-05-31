@extends('home.app')
@section('content')
<div class="container" ng-app="CheckApp">
    @if(Session::has('message'))
    <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
    @endif
    <div class="add-form">
        <h3 class="text-center">Настройки сайта</h3>
        <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1 col-xs-12" ng-controller="ValidationCtrl">
            {{ Form::open(array('route' => 'settings.save.site', 'name' => 'add', 'class' => 'form-horizontal addform', 'method' => 'post', 'files'=>true)) }}
            <div class="form-group">
                <label class="control-label">Основной телефон</label>
                <input class="form-control" type="hidden" name="phone_first" ng-model="user.phone">
                <div class="input-group" ng-class="{'input-success':order.phone_first.$valid}">
                    <span class="input-group-addon">+7</span>
                    <input class="form-control input-phone" type="text" name="phone_first" placeholder="(xxx) xxx-xxxx" phone-input value-input ng-model="user.phone_first" value="{{$site_settings->phone_first}}" ng-minlength="14">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Дополнительный телефон</label>
                <input class="form-control" type="hidden" name="phone_second" ng-model="user.phone_second">
                <div class="input-group" ng-class="{'input-success':order.phone_second.$valid}">
                    <span class="input-group-addon">+7</span>
                    <input class="form-control input-phone" type="text" name="phone_second" placeholder="(xxx) xxx-xxxx" phone-input value-input ng-model="user.phone_second" value="{{$site_settings->phone_second}}" ng-minlength="14">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" class="form-control" name="email" value="@if(isset($site_settings->email)) {{$site_settings->email}} @endif">
            </div>
            <div class="form-group">
                <label class="control-label">Количество выводимых товаров на странице</label>
                <input type="text" class="form-control" name="limit_items" placeholder="10" value="{{$site_settings->limit_items}}">
            </div>
            <div class="form-group">
                <label class="control-label">Публиковать товары, которых нет в наличии?</label>
                <select class="form-control" name="publish_items">
                    @if($site_settings->publish_items == 0)
                    <option value="0" selected>Да</option>
                    <option value="1">Нет</option>
                    @else
                    <option value="0">Да</option>
                    <option value="1" selected>Нет</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Текст при оформлении товара</label>
                <textarea class="form-control" name="check_text" rows="5" placeholder="Любой текст">{{$site_settings->check_text}}</textarea>
            </div>
            <div class="modal-footer">
                <div class="form-group submitbutton">
                    <button type="submit" class="btn btn-default" ng-disabled="add.$invalid">Сохранить</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
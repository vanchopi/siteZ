@extends('home.app')
@section('content')
<div class="container" ng-app>
    @if(Session::has('message'))
    <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
    @endif
    <div class="add-form">
        <h3 class="text-center">Настройки панели управления</h3>
        <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1 col-xs-12">
            {{ Form::open(array('route' => 'settings.save.home', 'name' => 'add', 'class' => 'form-horizontal addform', 'method' => 'post', 'files'=>true)) }}
            <div class="form-group">
                <label class="control-label">Количество выводимых товаров</label>
                <input type="text" class="form-control" name="limit" value="{{$settings->limit}}">
            </div>
            <div class="form-group">
                <label class="control-label">Каким цветом подсвечивать уведомление #4fbe79</label>
                <input type="text" class="form-control" name="color" value="{{$settings->color}}">
            </div>
            <div class="form-group">
                <label class="control-label">Значение по-умолчанию при добавление нового товара</label>
                <select class="form-control" name="status">
                    @if($settings->status == 0)
                    <option value="0" selected>Есть в наличии</option>
                    <option value="1">Нет в наличии</option>
                    @else
                    <option value="0">Есть в наличии</option>
                    <option value="1" selected>Нет в наличии</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Push-уведомления</label>
                <select class="form-control" name="push">
                    @if($settings->push == 0)
                    <option value="0" selected>Включить</option>
                    <option value="1">Выключить</option>
                    @else
                    <option value="0">Включить</option>
                    <option value="1" selected>Выключить</option>
                    @endif
                </select>
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
@extends('home.app')
@section('content')
<div class="container" ng-app>
    @if(Session::has('message'))
    <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
    @endif
    <div class="add-form">
        <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 col-xs-12 form-container">
            <h3 class="text-center">Добавить товар</h3>
            {{ Form::open(array('route' => 'item.add', 'name' => 'add', 'class' => 'form-horizontal addform', 'method' => 'post', 'files'=>true)) }}
            <div class="form-group">
                <label class="control-label">Категория</label>
                <select class="form-control selectcategory" name="category_id" data-toggle="tooltip" title="Выберите нужную категорию" required>
                    @foreach($categories as $item)
                    <option value="{{$item->category_id}}">{{$item->category_title}}</option>
                    @endforeach
                </select>
                <label class="control-label">Под-категория</label>
                <section>
                    <select class="form-control selectscategory" name="s_category_id" required>
                        @foreach($scategories as $item)
                        <option value="{{$item->s_category_id}}" data-id="{{$item->category_id}}">{{$item->s_category_title}}</option>
                        @endforeach
                    </select>
                </section>
                <label class="control-label sscategory_item">Под-под-категория</label>
                <section class="sscategory_item">
                    <select class="form-control selectsscategory" name="s_s_category_id" required>
                        @foreach($sscategories as $item)
                            <option value="{{$item->s_s_category_id}}" data-id="{{$item->s_category_id}}">{{$item->s_s_category_title}}</option>
                        @endforeach
                    </select>
                </section>
            </div>
            <div class="form-group">
                <label class="control-label">Название</label>
                <input type="text" class="form-control" name="title" placeholder="Название" ng-model="title" required>
            </div>
            <div class="form-group">
                <label class="control-label">Текст</label>
                <textarea class="form-control" name="text" rows="5" placeholder="Текст" ng-model="text" required></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Изображение</label>
                <button type="button" class="btn btn-default btn-xs adddelicon add_imageblock">+</button>
                <button type="button" class="btn btn-default btn-xs adddelicon del_imageblock">-</button>
                <section class="news_image_section">
                    <input type="file" class="form-control news_image" name="preview[]" multiple>
                </section>
            </div>
            <div class="form-group">
                <label class="control-label">Параметры</label>
                <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="addoption" data-toggle="tooltip" title="Добавить новый параметр, который будет находится в этом списке">Добавить новый параметр</a>
                <select class="form-control optionname" name="options">
                    @foreach($options as $item)
                    <option value="{{$item->option_id}}">{{$item->option_title}} @if($item->option_unit !== ''),{{$item->option_unit}} @endif</option>
                    @endforeach
                </select>
                <label class="control-label">Добавить/Удалить</label>
                <button type="button" class="btn btn-default btn-xs adddelicon add_option">+</button>
                <button type="button" class="btn btn-default btn-xs adddelicon del_option">-</button>
                <div class="alltextblock">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Цена</label>
                <input type="text" class="form-control" name="price" placeholder="Цена" ng-model="price" data-toggle="tooltip" title="Введите цену товара. Только числа, валюта вставиться потом" required>
            </div>
            <div class="form-group select">
                <label class="control-label">Статус</label>
                <select class="form-control" name="status">
                    @if($settings->status == 0)
                    <option value="0" selected>Есть в наличии</option>
                    <option value="1" >Нет в наличии</option>
                    @else
                    <option value="0" >Есть в наличии</option>
                    <option value="1" selected>Нет в наличии</option>
                    @endif
                </select>
            </div>
            <div class="modal-footer">
                <div class="form-group submitbutton">
                    <button type="submit" class="btn btn-primary" ng-disabled="add.$invalid">Сохранить</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
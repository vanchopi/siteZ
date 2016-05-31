@extends('home.app')
@section('content')
<div class="container" ng-app>
    @if(Session::has('message'))
    <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
    @endif
    <div class="add-form">
        <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 col-xs-12 form-container">
            <h3 class="text-center">Добавить новость</h3>
            {{ Form::open(array('route' => 'news.add', 'name' => 'add', 'class' => 'form-horizontal addform', 'method' => 'post', 'files'=>true)) }}
            <div class="form-group">
                <label class="control-label">Раздел</label>
                <select class="form-control" name="category_id" ng-init="category_id='1'" ng-model="category_id" required>
                    @foreach($categories as $category)
                    <option value="{{$category->news_categories_id}}">{{$category->news_categories_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Заголовок</label>
                <input type="text" class="form-control" name="title" placeholder="Заголовок" ng-model="title" value-input required>
            </div>
            <div class="form-group">
                <label class="control-label">Текст</label>
                <button type="button" class="btn btn-default btn-xs icon add_after">Через строку</button>
                <button type="button" class="btn btn-default btn-xs icon add_next">Следующая строка</button>
                <button type="button" class="btn btn-default btn-xs icon add_bold">Жирный текст</button>
                <textarea class="form-control newstext" name="text" rows="10" placeholder="Текст"></textarea>
            </div>
            <div class="form-group newsimagesection">
                <label class="control-label">Изображение</label>
                <select class="form-control newsimagestyle" name="newsimagestyle">
                    <option value="0">Слева от текста</option>
                    <option value="1">Справа от текста</option>
                    <option value="2">По центру</option>
                </select>
                <section class="group-image-news">
                    {{--POSITION--}}
                    <input type="hidden" class="form-control newsimageposition" name="position[]">
                    <input type="file" class="form-control newsimage" name="preview[]">
                    <button type="button" class="btn btn-default btn-xs icon add_img">Добавить</button>
                </section>
            </div>
            <div class="form-group">
                <label class="control-label">Тэги</label>
                <button type="button" class="btn btn-default btn-xs icon add_tag">+</button>
                <button type="button" class="btn btn-default btn-xs icon del_tag">-</button>
                <div class="alltextblock">
                    <div class="answerblock">
                        <input type="text" class="form-control textblock" name="tag[]"  placeholder="Тэг">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Дата</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <div class="form-group select">
                <label class="control-label">Статус</label>
                <select class="form-control" name="publish">
                    <option value="0" selected>Опубликовать</option>
                    <option value="1" >Не публиковать</option>
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
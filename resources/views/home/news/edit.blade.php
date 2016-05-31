@extends('home.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="add-form" ng-app="CheckApp">
            <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 col-xs-12 form-container" ng-controller="ValidationCtrl">
                <h3 class="text-center">Изменить новость</h3>
                {{ Form::open(array('url' => 'home/editnews','name'=>'edit', 'class' => 'form-horizontal editform', 'method' => 'post', 'files'=>true)) }}
                    <div class="form-group">
                        <label class="control-label">Раздел</label>
                        <select class="form-control" name="category_id" required>
                            @foreach($categories as $category)
                                @if($news->category_id == $category->news_categories_id)
                                    <option value="{{$category->news_categories_id}}" selected>{{$category->news_categories_title}}</option>
                                @else
                                    <option value="{{$category->news_categories_id}}">{{$category->news_categories_title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Заголовок</label>
                        <input type="text" class="form-control" name="title" placeholder="Заголовок" ng-model="title" value-input value="{{$news->title}}" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Текст</label>
                        <button type="button" class="btn btn-default btn-xs icon add_after">Через строку</button>
                        <button type="button" class="btn btn-default btn-xs icon add_next">Следующая строка</button>
                        <button type="button" class="btn btn-default btn-xs icon add_bold">Жирный текст</button>
                        <textarea class="form-control newstext" name="text" rows="10" placeholder="Текст">{{$news->text}}</textarea>
                    </div>
                    <div class="form-group newsimagesection">
                        <label class="control-label">Изображение</label>

                        <select class="form-control newsimagestyle" name="newsimagestyle">
                            <option value="0">Слева от текста</option>
                            <option value="1">Справа от текста</option>
                            <option value="2">По центру</option>
                        </select>
                        @foreach(explode(';',$news->positions) as $key => $position)
                            <section>
                                <input type="hidden" class="form-control newsimageposition nowimage-{{$key+1}}" name="position[]" value="{{$position}}">
                            </section>
                        @endforeach
                        <section class="group-image-news">
                            <input type="hidden" class="form-control newsimageposition" name="position[]">
                            <input type="file" class="form-control newsimage" name="preview[]">
                            <button type="button" class="btn btn-default btn-xs icon add_img">Добавить</button>
                        </section>

                    </div>
                    <div class="form-group">
                        <div class="image-group">
                            @if(!empty($news->preview))
                            @foreach(explode(';',$news->preview) as $key => $image)
                                <section>
                                    <img src="{{asset('images/news/'.$image)}}" data-key="{{$key+1}}">

                                    <select class="form-control nowimage" data-key="{{$key+1}}">
                                        @if($positions[$key] == 0)
                                            <option value="0" selected>Слева от текста</option>
                                            <option value="1">Справа от текста</option>
                                            <option value="2">По центру</option>
                                        @elseif($positions[$key] == 1)
                                            <option value="0">Слева от текста</option>
                                            <option value="1" selected>Справа от текста</option>
                                            <option value="2">По центру</option>
                                        @else
                                            <option value="0">Слева от текста</option>
                                            <option value="1">Справа от текста</option>
                                            <option value="2" selected>По центру</option>
                                        @endif
                                    </select>
                                    <button type="button" class="close deleteimage" data-id="{{$news->id}}" data-key="{{$key+1}}" data-src="{{$image}}">&times;</button>
                                </section>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Тэги</label>
                        <button type="button" class="btn btn-default btn-xs icon add_tag">+</button>
                        <button type="button" class="btn btn-default btn-xs icon del_tag">-</button>
                        <div class="alltextblock">
                            <div class="answerblock">
                                @foreach(explode(';',$news->tags) as $tag)
                                    <input type="text" class="form-control textblock" name="tag[]" value="{{$tag}}" placeholder="Тэг">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Дата</label>
                        <input type="date" class="form-control" name="date" value="{{$news->date}}" required>
                    </div>
                    <div class="form-group select">
                        <label class="control-label">Статус</label>
                        <select class="form-control" name="publish">
                            @if($news->publish == 0)
                                <option value="0" selected>Опубликован</option>
                                <option value="1" >Не публиковать</option>
                            @else
                                <option value="0">Опубликовать</option>
                                <option value="1" selected>Не опубликован</option>
                            @endif
                        </select>
                    </div>
                    <div class="modal-footer">
                    <div class="form-group submitbutton">
                        <input type="hidden" name="id" value="{{$news->id}}">
                        <button type="submit" class="btn btn-primary" ng-disabled="edit.$invalid">Сохранить</button>
                    </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
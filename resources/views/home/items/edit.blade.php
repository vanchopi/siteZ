@extends('home.app')
@section('content')
<div class="container" ng-app>
    @if(Session::has('message'))
    <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
    @endif
    <div class="add-form">
        <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 col-xs-12 form-container">
            <h3 class="text-center">Изменить товар</h3>
            {{ Form::open(array('url' => 'home/edititem', 'name' => 'edit', 'class' => 'form-horizontal editform', 'method' => 'post', 'files'=>true)) }}
            <div class="form-group">
                <label class="control-label">Категория</label>
                <select class="form-control selectcategory" name="category_id" data-toggle="tooltip" title="Выберите нужную категорию" required>
                    @foreach($categories as $category)
                    @if($category->category_id == $item->category_id)
                    <option value="{{$category->category_id}}" selected>{{$category->category_title}}</option>
                    @else
                    <option value="{{$category->category_id}}">{{$category->category_title}}</option>
                    @endif
                    @endforeach
                </select>
                <label class="control-label">Под-категория</label>
                <section>
                    @if ($item->s_category_id == null)
                        <select class="form-control selectscategory" name="s_category_id" disabled>
                            <option class="emptycategory" value="0" selected>Отсутствует под-категория</option>
                            @foreach($scategories as $scategory)
                                <option value="{{$scategory->s_category_id}}" data-id="{{$scategory->category_id}}" style="display:none">{{$scategory->s_category_title}}</option>
                            @endforeach
                        </select>
                    @else
                        <select class="form-control selectscategory" name="s_category_id" required>
                            @foreach($scategories as $scategory)
                                @if($scategory->s_category_id == $item->s_category_id)
                                    <option value="{{$scategory->s_category_id}}" data-id="{{$scategory->category_id}}" selected>{{$scategory->s_category_title}}</option>
                                @else
                                    <option value="{{$scategory->s_category_id}}" data-id="{{$scategory->category_id}}">{{$scategory->s_category_title}}</option>
                                @endif
                            @endforeach
                        </select>
                    @endif
                </section>
                <label class="control-label">Под-под-категория</label>
                <section>
                    @if ($item->s_s_category_id == null)
                        <select class="form-control selectsscategory" name="s_s_category_id" disabled>
                            <option class="emptycategory" value="0" selected>Отсутствует под-категория</option>
                            @foreach($sscategories as $sscategory)
                                <option value="{{$sscategory->s_s_category_id}}" data-id="{{$sscategory->s_category_id}}" style="display:none">{{$sscategory->s_s_category_title}}</option>
                            @endforeach
                        </select>
                    @else
                        <select class="form-control selectsscategory" name="s_s_category_id" required>
                            @foreach($sscategories as $sscategory)
                                @if($sscategory->s_s_category_id == $item->s_s_category_id)
                                    <option value="{{$sscategory->s_s_category_id}}" data-id="{{$sscategory->s_category_id}}" selected>{{$sscategory->s_s_category_title}}</option>
                                @else
                                    <option value="{{$sscategory->s_s_category_id}}" data-id="{{$sscategory->s_category_id}}">{{$sscategory->s_s_category_title}}</option>
                                @endif
                            @endforeach
                        </select>
                    @endif
                </section>

            </div>
            <div class="form-group">
                <label class="control-label">Название</label>
                <input type="text" class="form-control" name="title" placeholder="Название" value="{{$item->title}}" data-toggle="tooltip" title="Введите заголовок товара" required>
            </div>
            <div class="form-group">
                <label class="control-label">Текст</label>
                <textarea class="form-control" name="text" rows="5" placeholder="Текст" required>{{$item->text}}</textarea>
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
                <label class="control-label">Изображения:</label>
                <div class="image-group">
                    @if(!empty($item->preview))
                    @foreach(explode(';',$item->preview) as $image)
                    <section>
                      <img src="{{asset('img/items/'.$image)}}">
                        <button type="button" class="close deleteimage" data-id="{{$item->id}}" data-src="{{$image}}" data-toggle="tooltip" title="Удалить это изображение. Удаление произойдет сразу. Без возможности отменить действие.">&times;</button>
                    </section>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Параметры</label>
                <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('option.add')}}" data-toggle="tooltip" title="Добавить новый параметр, который будет находится в этом списке">Добавить новый параметр</a>
                <select class="form-control optionname" name="options">
                    @foreach($options as $option)
                    <option value="{{$option->option_id}}">{{$option->option_title}} @if($option->option_unit !== ''),{{$option->option_unit}} @endif</option>
                    @endforeach
                </select>
                <label class="control-label">Добавить/Удалить</label>
                <button type="button" class="btn btn-default btn-xs adddelicon add_option">+</button>
                <button type="button" class="btn btn-default btn-xs adddelicon del_option">-</button>
                <div class="alltextblock">
                    @foreach($option_values as $values)
                    <section>
                        <span>{{$values->option_title}}: </span>
                        <input type="hidden" name="option_id[]" value="{{$values->option_id}}">
                        <input class="form-control" type="text" name="value[]" value="{{$values->value}}">
                        <span>{{$values->option_unit}}</span>
                    </section>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Цена</label>
                <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$item->price}}" data-toggle="tooltip" title="Введите цену товара. Только числа, валюта вставиться потом" required>
            </div>
            <div class="form-group select">
                <label class="control-label">Статус</label>
                <select class="form-control" name="status">
                    @if($item->status == '0')
                    <option value="0" selected>Есть в наличии</option>
                    <option value="1" >Нет в наличии</option>
                    @else
                    <option value="1" selected>Нет в наличии</option>
                    <option value="0" >Есть в наличии</option>
                    @endif
                </select>
            </div>
            <div class="modal-footer">
            <div class="form-group submitbutton">
                <input type="hidden" name="id" value="{{$item->id}}">
                <button type="submit" class="btn btn-primary" ng-disabled="edit.$invalid">Сохранить</button>
            </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
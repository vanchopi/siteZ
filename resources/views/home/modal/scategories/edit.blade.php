<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Изменить категорию</h3>
        </div>
        {{ Form::open(array('route' => 'scategory.edit', 'name' => 'edit','class' => 'form-horizontal editform', 'method' => 'post', 'files'=>true)) }}
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Категория</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        @if($category->category_id == $scategory->category_id)
                            <option value="{{$category->category_id}}" selected>{{$category->category_title}}</option>
                        @else
                            <option value="{{$category->category_id}}">{{$category->category_title}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Название</label>
                <input type="text" class="form-control" name="s_category_title" placeholder="Название" value="{{$scategory->s_category_title}}">
            </div>
            <div class="form-group after_delete_image" @if(!empty($scategory->s_category_preview)) style="display: none" @endif>
                <label class="control-label">Изображение</label>
                <section class="news_image_section">
                    <input type="file" class="form-control news_image" name="s_category_preview[]">
                </section>
            </div>
            @if(!empty($scategory->s_category_preview))
            <div class="form-group">
                <label class="control-label">Изображениe:</label>
                <div class="image-group">
                        @foreach(explode(';',$scategory->s_category_preview) as $image)
                            <section>
                                <img src="{{asset('img/categories/'.$image)}}">
                                <button type="button" class="close deleteimage" data-id="{{$scategory->s_category_id}}" data-src="{{$image}}" data-toggle="tooltip" title="Удалить это изображение. Удаление произойдет сразу. Без возможности отменить действие.">&times;</button>
                            </section>
                        @endforeach
                </div>
            </div>
            @endif
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <input type="hidden" name="s_category_id" value="{{$scategory->s_category_id}}">
                <button type="submit" class="btn btn-default" ng-disabled="edit.$invalid">Сохранить</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>






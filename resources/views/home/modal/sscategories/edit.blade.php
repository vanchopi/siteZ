<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Изменить категорию</h3>
        </div>
        {{ Form::open(array('route' => 'sscategory.edit', 'name' => 'edit','class' => 'form-horizontal editform', 'method' => 'post', 'files'=>true)) }}
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Категория</label>
                <select class="form-control selectcategory" name="s_category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->category_id}}">{{$category->category_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Под-категория</label>
                <select class="form-control selectscategory" name="s_category_id">
                    @foreach($scategories as $scategory)
                        @if($sscategory->s_category_id == $scategory->s_category_id)
                            <option value="{{$scategory->s_category_id}}" data-id="{{$scategory->category_id}}" selected>{{$scategory->s_category_title}}</option>
                        @else
                            <option value="{{$scategory->s_category_id}}" data-id="{{$scategory->category_id}}">{{$scategory->s_category_title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Название</label>
                <input type="text" class="form-control" name="s_s_category_title" placeholder="Название" value="{{$sscategory->s_s_category_title}}">
            </div>
            <div class="form-group after_delete_image" @if(!empty($sscategory->s_s_category_preview)) style="display: none" @endif>
                <label class="control-label">Изображение</label>
                <section class="news_image_section">
                    <input type="file" class="form-control news_image" name="s_s_category_preview[]">
                </section>
            </div>
            @if(!empty($sscategory->s_s_category_preview))
                <div class="form-group">
                    <label class="control-label">Изображениe:</label>
                    <div class="image-group">
                        @foreach(explode(';',$sscategory->s_s_category_preview) as $image)
                            <section>
                                <img src="{{asset('img/categories/'.$image)}}">
                                <button type="button" class="close deleteimage" data-id="{{$sscategory->s_s_category_id}}" data-src="{{$image}}" data-toggle="tooltip" title="Удалить это изображение. Удаление произойдет сразу. Без возможности отменить действие.">&times;</button>
                            </section>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <input type="hidden" name="s_s_category_id" value="{{$sscategory->s_s_category_id}}">
                <button type="submit" class="btn btn-default" ng-disabled="edit.$invalid">Сохранить</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>






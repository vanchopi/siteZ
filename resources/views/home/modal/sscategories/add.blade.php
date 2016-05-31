<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Добавить категорию</h3>
        </div>
        {{ Form::open(array('route' => 'sscategory.add', 'name' => 'edit','class' => 'form-horizontal editform', 'method' => 'post', 'files'=>true)) }}
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
                        <option value="{{$scategory->s_category_id}}" data-id="{{$scategory->category_id}}">{{$scategory->s_category_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Название</label>
                <input type="text" class="form-control" name="s_s_category_title" placeholder="Название">
            </div>
            <div class="form-group">
                <label class="control-label">Изображение</label>
                <section class="news_image_section">
                    <input type="file" class="form-control news_image" name="s_s_category_preview[]">
                </section>
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <button type="submit" class="btn btn-default">Сохранить</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>






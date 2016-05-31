<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Изменить категорию</h3>
        </div>
        {{ Form::open(array('route' => 'category.edit', 'name' => 'edit','class' => 'form-horizontal editform', 'method' => 'post', 'files'=>true)) }}
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Название</label>
                <input type="text" class="form-control" name="category_title" placeholder="Название" value="{{$category->category_title}}" ng-model="category_title" required>
            </div>
            <input type="hidden" class="form-control" name="category_id" value="{{$category->category_id}}">
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary" ng-disabled="edit.$invalid">Сохранить</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>






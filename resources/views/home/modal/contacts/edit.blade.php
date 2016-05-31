<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Изменить контакт</h3>
        </div>
        {{ Form::open(array('route' => 'infocontacts.edit', 'name' => 'edit','class' => 'form-horizontal editform', 'method' => 'put', 'files'=>true)) }}
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Заголовок</label>
                <input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{$contact->title}}" ng-model="title" required>
            </div>
            <div class="form-group">
                <label class="control-label">Логин</label>
                <input type="text" class="form-control" name="login" placeholder="Логин" value="{{$contact->login}}" ng-model="login" required>
            </div>
            <div class="form-group">
                <label class="control-label">URL</label>
                <input type="text" class="form-control" name="url" placeholder="URL" value="{{$contact->url}}" ng-model="url" required>
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <input type="hidden" name="id" value="{{$contact->id}}">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary" ng-disabled="edit.$invalid">Сохранить</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>






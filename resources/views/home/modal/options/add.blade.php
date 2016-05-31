<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Добавить параметр</h3>
        </div>
        {{ Form::open(array('route' => 'option.save', 'class' => 'form-horizontal editform', 'method' => 'post', 'files'=>true)) }}
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Наименование параметра</label>
                <input type="text" class="form-control title_option" name="title" placeholder="Наименование параметра" required>
            </div>
            <div class="form-group">
                <label class="control-label">Единица измерения</label>
                <input type="text" class="form-control unit_option" name="unit" placeholder="Единица измерения" required>
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-default save_option" url-action="{{route('option.save')}}">Сохранить</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
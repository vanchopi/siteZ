<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Комментарий №{{$comment->id}}</h3>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr><td>ID</td><td>{{$comment->id}}</td></tr>
                </thead>
                <tbody>
                    <tr><td>Имя</td><td>{{$comment->author}}</td></tr>
                    <tr><td>Email</td><td>{{$comment->email}}</td></tr>
                    <tr><td>Дата комментария</td><td>{{$comment->created_at}}</td></tr>
                </tbody>
            </table>
            <div class="text">
                {{$comment->text}}
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
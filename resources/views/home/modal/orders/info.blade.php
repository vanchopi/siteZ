<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Заказ №{{$order->id}}</h3>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr><td>ID</td><td>{{$order->id}}</td></tr>
                </thead>
                <tbody>
                    <tr><td>Имя</td><td>{{$order->fname}}</td></tr>
                    <tr><td>Фамилия</td><td>{{$order->sname}}</td></tr>
                    <tr><td>Отчество</td><td>{{$order->lname}}</td></tr>
                    <tr><td>Телефон</td><td>+7 {{$order->phone}}</td></tr>
                    <tr><td>Индекс</td><td>{{$order->address_index}}</td></tr>
                    <tr><td>Страна</td><td>{{$order->country}}</td></tr>
                    <tr><td>Область</td><td>{{$order->oc_country_title}}</td></tr>
                    <tr><td>Адрес</td><td>{{$order->address}}</td></tr>
                    <tr><td>Дата заказа</td><td>{{$order->date}}</td></tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <div class="form-group submitbutton">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
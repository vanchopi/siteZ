@extends('home.app')
@section('content')
    <div class="container" ng-app>
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Контакты</h3>
            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('infocontacts.showadd')}}">Добавить новый контакт</a>
            <ul class="support-action sort">Сортировать по
                <li><a data-column="0">Заголовку</a></li>
                <li><a data-column="1">Логину</a></li>
                <li><a data-column="2">Ссылке</a></li>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <td>Заголовок</td>
                    <td>Логин</td>
                    <td>Ссылка</td>
                    <td>Изменить</td>
                    <td>Удалить</td>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->login}}</td>
                        <td>{{$item->url}}</td>
                        <td>
                            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('infocontacts.showedit',$item->id)}}">Изменить</a>
                        </td>
                        <td>
                            <a class="delete" url="{{route('infocontacts.delete',$item->id)}}">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
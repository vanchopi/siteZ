@extends('home.app')
@section('content')
    <div class="container" ng-app>
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Комментарии</h3>
            <ul class="support-action sort">Сортировать по
                <li><a title="Сортировать по id" data-column="0">ID</a></li>
                <li><a title="Сортировать по автору" data-column="1">Автору</a></li>
                <li><a title="Сортировать по email" data-column="2">Email</a></li>
                <li><a title="Сортировать по дате" data-column="2">Дате</a></li>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Автор</td>
                    <td>Email</td>
                    <td>Дата</td>
                    <td>Посмотреть</td>
                    <td>Удалить</td>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('comment.show',$comment->id)}}">Посмотреть</a>
                    </td>
                    <td>
                        <a class="delete" url="">Удалить</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('home.app')
@section('content')
    <div class="container" ng-app>
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Все категории</h3>
            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('newscategory.showadd')}}">Добавить новую категорию</a>
            <ul class="support-action sort">Сортировать по
                <li><a data-column="1">Заголовку</a></li>
            </ul>
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td></td>
                    <td>Изменить</td>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->news_categories_id}}</td>
                        <td>{{$category->news_categories_title}}</td>
                        <td></td>
                        <td>
                            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('newscategory.showedit',$category->news_categories_id)}}">Изменить</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
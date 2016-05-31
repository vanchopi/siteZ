@extends('home.app')
@section('content')
    <div class="container table-container" ng-app>
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Все новости</h3>
            <ul class="support-action sort">Сортировать по
                <li><a title="Сортировать по id" data-column="0">ID</a></li>
                <li><a title="Сортировать по заголовку" data-column="1">Заголовку</a></li>
                <li><a title="Сортировать по категории" data-column="2">Категория</a></li>
                <li><a title="Сортировать по дате" data-column="3">Дате</a></li>
            </ul>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Заголовок</td>
                        <td>Категория</td>
                        <td>Дата</td>
                        <td>Изменить</td>
                        <td>Удалить</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->news_categories_title}}</td>
                            <td>{{$item->date}}</td>
                            <td>
                                {!! link_to_route('news.showeditid','Изменить',[$item->id]) !!}
                            </td>
                            <td>
                                <a class="delete" url="{{route('news.del',$item->id)}}" data-toggle="tooltip" title="Удалить эту новость">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
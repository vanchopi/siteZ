@extends('home.app')
@section('content')
    <div class="container" ng-app>
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Все под-категории</h3>
            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('scategory.showadd')}}">Добавить новую под-категорию</a>
            <ul class="support-action sort">Сортировать по
                <li><a data-column="1">Заголовку</a></li>
                <li><a data-column="2">Категории</a></li>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td>Категория</td>
                    <td>Изображение</td>
                    <td></td>
                    <td>Изменить</td>
                </tr>
                </thead>
                <tbody>
                @foreach($scategory_items as $scategory)
                    <tr>
                        <td>{{$scategory->s_category_id}}</td>
                        <td>{{$scategory->s_category_title}}</td>
                        <td>{{$scategory->category_title}}</td>
                        @if($scategory->s_category_preview != '')
                            <td>Есть</td>
                        @else
                            <td>Отсутствует</td>
                        @endif
                        <td></td>
                        <td>
                            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('scategory.showedit',$scategory->s_category_id)}}">Изменить</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
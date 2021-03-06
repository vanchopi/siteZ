@extends('home.app')
@section('content')
    <div class="container" ng-app>
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Все под-под-категории</h3>
            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('sscategory.showadd')}}">Добавить новую под-под-категорию</a>
            <ul class="support-action sort">Сортировать по
                <li><a data-column="1">Заголовку</a></li>
                <li><a data-column="2">Под-категории</a></li>
                <li><a data-column="3">Категории</a></li>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td>Под-категория</td>
                    <td>Категория</td>
                    <td>Изображение</td>
                    <td></td>
                    <td>Изменить</td>
                </tr>
                </thead>
                <tbody>
                @foreach($scategory_items as $scategory)
                    <tr>
                        <td>{{$scategory->s_s_category_id}}</td>
                        <td>{{$scategory->s_s_category_title}}</td>
                        <td>{{$scategory->s_category_title}}</td>
                        <td>{{$scategory->category_title}}</td>
                        @if($scategory->s_s_category_preview != '')
                            <td>Есть</td>
                        @else
                            <td>Отсутствует</td>
                        @endif
                        <td></td>
                        <td>
                            <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="{{route('sscategory.showedit',$scategory->s_s_category_id)}}">Изменить</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
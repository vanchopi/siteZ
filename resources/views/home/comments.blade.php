@extends('home.app')
@section('content')
    <div class="container" ng-app>
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Комментарии</h3>
            <ul class="support-action">Сортировать по
                <li><a href="">Дате</a></li>
                <li><a href="">Заголовку</a></li>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Автор</td>
                    <td>Текст</td>
                    <td>Дата</td>
                    <td>Изменить</td>
                    <td>Удалить</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ID</td>
                    <td>Автор</td>
                    <td>Текст</td>
                    <td>Дата</td>
                    <td>
                        <a class="edit" data-toggle="modal" data-target="#editmodal" url-action="editmodal" url="">Изменить</a>
                    </td>
                    <td>
                        <a class="delete" url="">Удалить</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('home.app')
@section('content')
    <div class="container" ng-app>
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Все товары</h3>
            <ul class="support-action sort">Сортировать по
                <li><a title="Сортировать по заголовку" data-column="1">Заголовку</a></li>
                <li><a title="Сортировать по категории" data-column="2">Категории</a></li>
                <li><a title="Сортировать по цене" data-column="3">Цене</a></li>
                <li><a title="Сортировать по статусу" data-column="4">Статусу</a></li>
            </ul>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Заголовок</td>
                        <td>Категория</td>
                        <td>Цена</td>
                        <td>Статус</td>
                        <td>Изменить</td>
                        <td>Удалить</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->category_title}}</td>
                            <td>{{$item->price}}</td>
                            @if($item->status == '1')
                                <td class="status-false">Нет в наличии</td>
                            @else
                                <td class="status-true">Есть в наличии</td>
                            @endif
                            <td>
                                {!! link_to_route('item.showeditid','Изменить',[$item->id]) !!}
                            </td>
                            <td>
                                <a class="delete" url="{{route('item.del',$item->id)}}" data-toggle="tooltip" title="Удалить данный товар">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-sm-12 navigation">
                <ul class="pagination">
                    @if (isset($navigation))
                        @if ($page != 1)
                            <li>{!! link_to_route('shopallitems.page', '&laquo;', [$page-1]) !!}</li>
                        @endif
                        @for($i=1;$i <= $navigation;$i++)
                            @if ($page == $i)
                                <li class="active">{!! link_to_route('shopallitems.page', $i, [$i]) !!}</li>
                            @else
                                <li>{!! link_to_route('shopallitems.page', $i, [$i]) !!}</li>
                            @endif
                        @endfor
                        @if ($page != $navigation)
                            <li>{!! link_to_route('shopallitems.page', '&raquo;', [$page+1]) !!}</li>
                        @endif
                    @endif
                </ul>
            </div>
            {{--{{$items->render()}}--}}
            {{--{{$items->count()}}--}}
            {{--{{$items->url('episode')}}--}}
            {{--{{$items->fragment('foo')->links()}}--}}
        </div>
    </div>
@endsection
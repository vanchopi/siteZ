@extends('home.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert recall-success" style="background-color: {{$settings->color}}">{{Session::pull('message')}}</div>
        @endif
        <div class="all-table">
            <!-- class = "all-question" -->
            <h3>Заявки позвонить</h3>


            <ul class="support-action sort">Сортировать по
                <li><a data-column="1">Номеру</a></li>
                <li><a data-column="2">Дате</a></li>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Номер телефона</td>
                    <td>Дата</td>
                    <td>Статус</td>
                    <td></td>
                    <td>Удалить</td>
                </tr>
                </thead>
                <tbody>
                @foreach($phones as $phone)
                    <tr>
                        <td>{{$phone->id}}</td>
                        <td>+7 {{$phone->phone}}</td>
                        <td>{{$phone->created_at}}</td>
                        <td>
                            <select class="form-control changestatus" data-id="{{$phone->id}}" data-url="{{route('changephonestatus')}}">
                                @if($phone->status == 0)
                                    <option value="0" selected>Ждут звонка</option>
                                    <option value="1">Звонок совершен</option>
                                @elseif($phone->status == 1)
                                    <option value="0">Ждут звонка</option>
                                    <option value="1" selected>Звонок совершен</option>
                                @endif
                            </select>
                        </td>
                        <td></td>
                        <td>
                            <a class="delete" url="{{route('phone.del',$phone->id)}}" data-toggle="tooltip" title="Удалить">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
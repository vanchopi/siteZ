@extends('errors.app')
@section('content')
    <div class="container" id="error">
        <div class="title">Oops. Error 404.</div>
        <div class="back"><a href="{{url()->previous()}}">Back</a></div>
    </div>
@endsection
{{-- Страница не найдена --}}
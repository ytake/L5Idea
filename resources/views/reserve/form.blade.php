@extends('layout.default')
@section('content')
    <form method="post" action="{{{route('reserve.post.apply')}}}">
        {!! csrf_field() !!}
        <label for="title">タイトル{{{$errors->first('title')}}}</label>
        <input type="text" name="title" id="title" placeholder="タイトルを入力してください" value="{{{ old('title') }}}">
        <br />
        <label for="content">予約者名{{{$errors->first('name')}}}</label>
        <input type="text" name="name" id="name" placeholder="タイトルを入力してください" value="{{{ old('name') }}}">
        <br />
        <button type="submit">apply</button>
    </form>
@stop

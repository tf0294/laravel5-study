
@extends('layouts.menu')

@section('contents')

    @if (count($errors) > 0)
        <div>error</div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    {!! Form::open(['method' => 'post', 'url' => '/admin/user/complate']) !!}
        <div>ユーザー名: {!! Form::text('user_name') !!}</div>
        <div>ログインID: {!! Form::text('loginid') !!}</div>
        <div>パスワード: {!! Form::password('password') !!}</div>
        <div>{!! Form::submit('登録') !!}</div>
    {!! Form::close() !!}

@endsection

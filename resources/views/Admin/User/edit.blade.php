@extends('layouts.menu')

@section('contents')

@if (count($errors) > 0)
<div> Error. </div>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</P>
    @endforeach
@endif

<div>変更</div>

{!! Form::open(['method' => 'post', 'url' => '/admin/user/edit_complate']) !!}
    {!! Form::hidden('id', $data->id) !!}
    <div>ユーザ名: {!! Form::text('user_name', $data->user_name) !!}</div>
    <div>ログインID: {!! Form::text('loginid', $data->loginid) !!}</div>
    <div>パスワード: ********</div>
    {!! Form::submit('submit') !!}
{!! Form::close() !!}

@endsection

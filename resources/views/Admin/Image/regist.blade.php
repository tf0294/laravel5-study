@extends('layouts.menu')

@section('contents')

<div>画像新規登録</div>

{!! Form::open(['url' => '/admin/image/complate', 'method' => 'post', 'files' => true]) !!}
<div>
    <div>ファイル名: {!! Form::text('name') !!}</div>
    <div>{!! Form::file('data') !!}</div>
    <div>{!! Form::submit('submit') !!}</div>
</div>
{!! Form::close() !!}

@endsection

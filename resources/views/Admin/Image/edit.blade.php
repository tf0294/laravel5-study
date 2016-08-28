@extends('layouts.menu')

@section('contents')

@if (count($errors) > 0)
<div> Error. </div>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</P>
    @endforeach
@endif

<div>変更</div>
{!! Form::open(['url' => '/admin/image/edit_complate', 'method' => 'post', 'files' => true]) !!}
{!! Form::hidden('id', $images->id) !!}
<div>ファイル名: {!! Form::text('name', $images->name) !!}</div>
<div><img src="data:{{ $images->mime_type }};base64,<?php echo base64_encode($images->data); ?>">
<div>{!! Form::file('data') !!}</div>
<div>{!! Form::submit('submit') !!}</div>

{!! Form::close() !!}

@endsection

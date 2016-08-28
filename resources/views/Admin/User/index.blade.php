
@extends('layouts.menu')

@section('contents')
@if (Session::has('success'))
    <p>{{ Session::get('success') }}</p>
@endif

<div>管理ユーザ一覧 ({{ $data->count() }}件/{{ $data->total() }}件)</div>
<div>
    <table border="1">
        <tr>
            <td>id</td>
            <td>ユーザー名</td>
            <td>備考</td>
            <td>登録日</td>
            <td>更新日</td>
            <td></td>
        </tr>
    @if (count($data) > 0)
        @foreach ($data as $admin)
        <tr>
            <td>{{ $admin->id }}</td>
            <td><a href="/admin/user/edit/{{ $admin->id}}">{{ $admin->user_name }}</a></td>
            <td>{{ $admin->notes }}</td>
            <td>{{ $admin->created }}</td>
            <td>{{ $admin->updated }}</td>
            <td><a href="/admin/user/delete/{{ $admin->id }}">削除</a></td>
        </tr>
        @endforeach
    @endif
</div>
<div>
    {!! $data->render() !!}
</div>
@endsection

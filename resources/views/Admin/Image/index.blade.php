@extends('layouts.menu')

@section('contents')

@if (Session::has('success'))
 <p>{{ Session::get('success') }}</p>
@endif

<div>画像一覧({{ $data->count()}}件/{{ $data->total() }}件)</div>
<div>
    <table border="1" width="100%">
        <tr>
            @if (count($data) > 0)
                @foreach ($data as $image)
                <td>
                    <table>
                            <tr>
                                <td colspan="3"><a href="/admin/image/edit/{{ $image->id }}">{{ $image->name }}</a></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <img src="data:{{ $image->mime_type }};base64,<?php echo base64_encode($image->data); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>size: {{ $image->filesize }}</td>
                                <td>{{ $image->mime_type }}</td>
                                <td>[<a href="/admin/image/delete/{{ $image->id }}">削除</a>]</td>
                            </tr>
                    </table>
                </td>
                @endforeach
            @endif
        </tr>
    </table>

</div>
<div>
    {!! $data->render() !!}
</div>
@endsection

<html>
<head><title>test</title></head>
<body>
    <h1>{{ $message }}</h1>

    @if (Session::has('error_message'))
        <p>{{ Session::get('error_message') }}</p>
    @endif

    @if (count($errors) > 0)
        <div>Input Error.</div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    {!! Form::open(['url' => '/admin/login']) !!}
        <div>ログインID：　{!! Form::text('loginid') !!}</div>
        <div>パスワード: {!! Form::password('password') !!}</div>
        <div>{!! Form::submit('submit') !!}</div>
    {!! Form::close() !!}

</body>
</html>

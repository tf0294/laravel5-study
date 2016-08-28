<html>
<head><title>test</title></head>
<body>
<div>
    <ul>
        <li><a href="/admin/logout">ログアウト</a></li>
        <li>管理ユーザ
            <ul>
                <li>{!! link_to('/admin/user', '一覧') !!}</li>
                <li>{!! link_to('/admin/user/regist', '新規登録') !!}</li>
            </ul>
        </li>
        <li>画像管理
            <ul>
                <li>{!! link_to('/admin/image/', '一覧') !!}</li>
                <li>{!! link_to('/admin/image/regist', '新規登録') !!}</li>
            </ul>
        </li>
    </ul>
</div>
<div>
    @yield('contents')
</div>
</body>
</html>

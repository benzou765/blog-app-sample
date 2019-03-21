<!DOCUTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事一覧</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <h2><a href="/">ブログ</a></h2>

            {{-- エラーメッセージ表示 --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        {{-- メインフレーム --}}
        @yield('main')
        {{-- サブフレーム --}}
        @include('front_blog.right_column')
    </div>
</body>
</html>
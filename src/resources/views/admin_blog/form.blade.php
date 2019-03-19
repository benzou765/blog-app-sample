<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ゲームブログ記事投稿フォーム</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>ブログ記事投稿・編集</h2>
            {{-- sesseionにmessageがある場合はメッセージを表示 --}}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                <br>
            @endif

            {{-- バリデートメッセージの表示 --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/admin/post">
                <div class="form-group">
                    <label>日付</label>
                    <input class="form-control" name="post_date" size="20" value="" placeholder="日付を入力して下さい。">
                </div>

                <div class="form-group">
                    <label>オススメ度</label>
                    <input name="recommended" value="3" placeholder="オススメ度を入力して下さい。">
                </div>

                <div class="form-group">
                    <label>タイトル</label>
                    <input name="title" value="" placeholder="タイトルを入力して下さい。">
                </div>

                <div class="form-group">
                    <label>本文</label>
                    <textarea cols="50" rows="15" name="body" placeholder="本文を入力してください。"></textarea>
                </div>

                <input type="submit" class="btn btn-primary btn-sm" value="送信">
                {{--CSRFトークンが生成される--}}
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</body>
</html>
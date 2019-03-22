<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ゲームブログ記事投稿フォーム</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ui/1.12.1/themes/base/jquery-ui.css') }}">
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/ui/1.12.1/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/datepicker-ja.js') }}"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        })
    </script>
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

            {{-- エラーメッセージの表示 --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/admin/post" autocomplete="off">
                <div class="form-group">
                    <label>日付</label>
                    <input type="text" id="datepicker" name="post_date" size="20" value="{{ $input['post_date']??'' }}" placeholder="日付を入力して下さい。">
                </div>

                <div class="form-group">
                    <label>オススメ度</label>
                    <select name="recommended">
                    {{ $recommended = $input['recommended']??3 }}
                    @for($i = 1; $i <= 5; $i++)
                        @if($recommended == $i)
                            <option value="{{ $i }}" selected>
                        @else
                            <option value="{{ $i }}">
                        @endif
                        @for($j = 1; $j <= $i; $j++)
                            ☆
                        @endfor
                        </option>
                    @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label>タイトル</label>
                    <input name="title" value="{{ $input['title']??'' }}" placeholder="タイトルを入力して下さい。">
                </div>

                <div class="form-group">
                    <label>本文</label>
                    <textarea cols="50" rows="15" name="body" placeholder="本文を入力してください。">{{ $input['body']??'' }}</textarea>
                </div>

                <input type="submit" class="btn btn-success btn-sm" value="保存">
                <input type="hidden" name="id" value="{{ $id }}">
                {{ csrf_field() }}
            </form>
            @if ($id)
                <br>
                <form action="/admin/delete" method="POST">
                    <input type="submit" class="btn btn-danger btn-sm" value="削除">
                    <input type="hidden" name=id value="{{ $id }}">
                    {{ csrf_field() }}
                </form>
            @endif
        </div>
    </div>
</div>
</body>
</html>
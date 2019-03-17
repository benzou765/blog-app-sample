<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ブログ記事投稿フォーム</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<h2>ブログ記事投稿・編集</h2>

<form method="POST">
    日付<br>
    <input name="post_date" size="20" value="" placeholder="日付を入力して下さい。"><br><br>

    カテゴリ<br>
    <input name="category" value="" placeholder="カテゴリを入力して下さい。"><br><br>

    タイトル<br>
    <input name="title" value="" placeholder="タイトルを入力して下さい。"><br><br>

    本文<br>
    <textarea cols="50" rows="15" name="body" placeholder="本文を入力してください。"></textarea><br>

    <input type="submit" value="送信">
    {{--CSRFトークンが生成される--}}
    {{ csrf_field() }}
</form>

</body>
</html>
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
            <div class="col-md-8 col-md-offset-2">
                <h2>記事一覧</h2>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    <br>
                @endif

                <a href="/admin/form">
                    <span class="btn btn-primary btn-sm">新規作成</span>
                </a>
                <br>

                @if (count($list) > 0)
                    <br>
                    {{ $list->links() }}
                    <table class="table table-striped">
                        <tr>
                            <th width="120px">日付</th>
                            <th>タイトル</th>
                        </tr>
                        @foreach ($list as $article)
                            <tr>
                                <td>{{ $article->post_date_text }}</td>
                                <td>
                                    <a href="/admin/form/{{ $article->id }}">
                                        {{ $article->title }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <br>
                    <p>記事がありません。</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>

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
            </div>
            <div class="col-md-8 col-md-offset-2">
                @forelse($list as $article)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $article->post_date_text }} {{ $article->title }}</h3>
                        </div>
                        <div class="panel-body">
                            オススメ度：
                            @for($i = 1; $i <= $article->recommended; $i++)
                                ☆
                            @endfor
                        </div>
                        <div class="panel-body">
                            {!! nl2br(e($article->body)) !!}
                        </div>
                        <div class="panel-footer text-right">
                            {{ $article->updated_at->format('Y/m/d H:i:s') }}
                        </div>
                    </div>
                @empty
                    <p>記事がありません</p>
                @endforelse

                {{ $list->links() }}
            </div>
        </div>
    </div>
</body>
</html>

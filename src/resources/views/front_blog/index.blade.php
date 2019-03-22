<!DOCUTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事一覧</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
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
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
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
                        <div class="panel-footer text-right small">
                            更新日：{{ $article->updated_at->format('Y/m/d H:i:s') }}
                        </div>
                    </div>
                @empty
                    <p>記事がありません</p>
                @endforelse

                {{ $list->links() }}
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">月別アーカイブ</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="month_archive">
                            @forelse($month_list as $value)
                                <li>
                                    <a href="/?year={{ $value->year }}&month={{ $value->month }}">
                                        {{ $value->year_month }}
                                    </a>
                                </li>
                            @empty
                                <p>記事がありません</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
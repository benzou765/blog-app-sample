@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メールボックスを確認してください</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            登録したメールアドレスにパスワードリセットのリンクを送付しました。
                        </div>
                    @endif

                    メールボックスを確認してパスワードリセットのリンクが届いているか確認してください。
                    メールが届かなかった場合、 <a href="{{ route('verification.resend') }}">ここをクリック</a>してもう一度送信してください。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

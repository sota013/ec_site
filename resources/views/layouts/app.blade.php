<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cytech EC')</title>
</head>
<body>

    <header>
    <div>
        Cytech EC
    </div>

    <nav>
        <a href="{{ route('products.index') }}">Home</a>
        <a href="{{ route('mypage') }}">マイページ</a>
    </nav>

    <div>
        @auth
            {{ Auth::user()->name_kanji }}

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        @else
            <a href="{{ route('login') }}">ログイン</a>
        @endauth
    </div>
    </header>

    {{-- メインコンテンツ --}}
    <main>
        @yield('content')
    </main>

<footer>
    <nav>
        <a href="{{ route('contact') }}">お問い合わせ</a>
        <a href="{{ route('products.index') }}">Home</a>
        <a href="{{ route('mypage') }}">マイページ</a>
    </nav>

    <p>© Cytech EC</p>
</footer>

</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
</head>
<body>
    <h1>マイページ</h1>

    <p>
        <a href="{{ route('account.edit') }}">アカウント編集</a>
    </p>

    <h2>アカウント情報</h2>

    <p>名前：{{ $user->name_kanji }}</p>
    <p>カナ：{{ $user->name_kana }}</p>
    <p>メールアドレス：{{ $user->email }}</p>

    <h2>出品商品</h2>

    @if ($products->isEmpty())
        <p>出品した商品はありません。</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>
                    {{ $product->product_name }}
                    - {{ number_format($product->price) }}円
                    （在庫：{{ $product->stock }}）

                    <a href="{{ route('mypage.products.show', $product->id) }}">
                        詳細
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href="{{ route('products.create') }}">新規登録</a>
    </p>

    <h2>購入した商品</h2>

    @if ($sales->isEmpty())
        <p>購入した商品はありません。</p>
    @else
        <ul>
            @foreach ($sales as $sale)
                <li>
                    {{ $sale->product->product_name }}
                    - {{ number_format($sale->product->price) }}円
                    （購入個数：{{ $sale->quantity }}個）
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href="{{ route('products.index') }}">商品一覧へ戻る</a>
    </p>

    <p>
        <a href="{{ route('contact') }}">お問い合わせ</a>
    </p>

</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
</head>
<body>

    <h1>商品一覧</h1>

    <p>
        <a href="{{ route('contact') }}">お問い合わせ</a>
    </p>


    <form action="{{ route('products.index') }}" method="GET">
    <input
        type="text"
        name="keyword"
        placeholder="商品名で検索"
        value="{{ $keyword ?? '' }}"
    >
    <button type="submit">検索</button>
</form>

    @forelse ($products as $product)
        <div>
        <h2>
            <a href="{{ route('products.show', $product->id) }}">
                {{ $product->product_name }}
            </a>
        </h2>
            <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" width="200">
            <p>価格：{{ number_format($product->price) }}円</p>
            <p>在庫：{{ $product->stock }}個</p>
            <p>{{ $product->description }}</p>
        </div>
        <hr>
    @empty
        <p>商品が登録されていません。</p>
    @endforelse
</body>
</html>

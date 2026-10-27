
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
</head>
<body>
    <h1>商品登録</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div>
            <label for="product_name">商品名：</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>

        <div>
            <label for="price">価格：</label>
            <input type="number" id="price" name="price" min="0" required>
        </div>

        <div>
            <label for="stock">在庫数：</label>
            <input type="number" id="stock" name="stock" min="0" required>
        </div>

        <div>
            <label for="description">商品説明：</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div>
            <label for="img_path">画像パス：</label>
            <input type="text" id="img_path" name="img_path" placeholder="products/sample.jpg">
        </div>

        <button type="submit">商品を登録する</button>
    </form>

    <p><a href="{{ route('products.index') }}">商品一覧へ戻る</a></p>
</body>
</html>

@extends('layouts.app')

@section('title', '商品編集')

@section('content')

    <h1>商品編集</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>商品名</label><br>
            <input type="text" name="product_name"
                value="{{ old('product_name', $product->product_name) }}" required>
        </p>

        <p>
            <label>価格</label><br>
            <input type="number" name="price"
                value="{{ old('price', $product->price) }}" min="0" required>
        </p>

        <p>
            <label>在庫数</label><br>
            <input type="number" name="stock"
                value="{{ old('stock', $product->stock) }}" min="0" required>
        </p>

        <p>
            <label>商品説明</label><br>
            <textarea name="description" required>{{ old('description', $product->description) }}</textarea>
        </p>

        <p>
            <label>画像パス</label><br>
            <input type="text" name="img_path"
                value="{{ old('img_path', $product->img_path) }}">
        </p>

        <button type="submit">変更を保存する</button>
    </form>

    <p>
        <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </p>

@endsection

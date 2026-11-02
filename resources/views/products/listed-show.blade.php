@extends('layouts.app')

@section('title', '出品商品詳細')

@section('content')

    <h1>出品商品詳細</h1>

    <h2>{{ $product->product_name }}</h2>

    <p>価格：{{ number_format($product->price) }}円</p>
    <p>在庫数：{{ $product->stock }}</p>
    <p>商品説明：{{ $product->description }}</p>

    @if ($product->img_path)
        <p>
            <img src="{{ asset('storage/' . $product->img_path) }}"
                alt="{{ $product->product_name }}"
                width="200">
        </p>
    @endif

    <p>
        <a href="{{ route('products.edit', $product->id) }}">編集</a>
    </p>

<form
    action="{{ route('mypage.products.destroy', $product->id) }}"
    method="POST"
    onsubmit="return confirm('この商品を削除してもよろしいですか？');"
>
    @csrf
    @method('DELETE')

    <button type="submit">商品を削除</button>
</form>

    <p>
        <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </p>

@endsection
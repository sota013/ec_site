@extends('layouts.app')

@section('title', $product->product_name . ' - 商品詳細')

@section('content')

    <h1>商品詳細</h1>

    <img
        src="{{ asset('storage/' . $product->img_path) }}"
        alt="{{ $product->product_name }}"
        width="300"
    >

    <h2>{{ $product->product_name }}</h2>
    <p>価格：{{ number_format($product->price) }}円</p>
    <p>在庫：{{ $product->stock }}個</p>
    <p>商品説明：{{ $product->description }}</p>
    

    <h3>購入</h3>

@if ($product->stock > 0)
    <p>在庫数：{{ $product->stock }}個</p>

    <a href="{{ route('products.purchase.create', $product->id) }}">
        購入画面へ進む
    </a>
@else
    <p>在庫切れのため購入できません。</p>
@endif

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($isLiked)
    <form action="{{ route('products.like', $product->id) }}" method="POST">
        @csrf
        <button type="submit">お気に入り解除</button>
    </form>
@else
    <form action="{{ route('products.like', $product->id) }}" method="POST">
        @csrf
        <button type="submit">お気に入り登録</button>
    </form>
@endif

    <p>
        <a href="{{ route('products.index') }}">商品一覧に戻る</a>
    </p>

@endsection

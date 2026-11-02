@extends('layouts.app')

@section('title', '購入確認')

@section('content')

    <h1>購入確認</h1>

    <h2>{{ $product->product_name }}</h2>

    <img
        src="{{ asset('storage/' . $product->img_path) }}"
        alt="{{ $product->product_name }}"
        width="200"
    >

    <p>価格：{{ number_format($product->price) }}円</p>
    <p>在庫：{{ $product->stock }}個</p>

    @if ($product->stock > 0)
        <form action="{{ route('products.purchase', $product->id) }}" method="POST">
            @csrf

            <label for="quantity">購入数量：</label>
            <input
                type="number"
                id="quantity"
                name="quantity"
                min="1"
                max="{{ $product->stock }}"
                value="1"
                required
            >

            @error('quantity')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <button type="submit">購入を確定する</button>
        </form>
    @else
        <p>在庫切れのため購入できません。</p>
    @endif

    <p>
        <a href="{{ route('products.show', $product->id) }}">商品詳細に戻る</a>
    </p>

@endsection

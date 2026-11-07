@extends('layouts.app')

@section('title', '出品商品編集')

@section('content')

<div class="product-create-container">
    <h1 class="page-title">出品商品編集</h1>
    <form action="{{ route('products.update', $product->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="product-create-form">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_name">商品名</label>
            <input
                type="text"
                id="product_name"
                name="product_name"
                value="{{ old('product_name', $product->product_name) }}"
                required
            >
            @error('product_name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">価格</label>
            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price', $product->price) }}"
                min="0"
                required
            >
            @error('price')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea
                id="description"
                name="description"
                rows="5"
                required
            >{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">在庫数</label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', $product->stock) }}"
                min="0"
                required
            >
            @error('stock')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group product-image-group">
            <label for="img_path">商品画像</label>
            <div class="product-image-content">
                @if ($product->img_path)
                    <img
                        src="{{ asset('storage/' . $product->img_path) }}"
                        alt="現在の商品画像"
                        class="current-product-image"
                    >
                @else
                    <p>画像は登録されていません。</p>
                @endif

                <div>
                    <input
                        type="file"
                        id="img_path"
                        name="img_path"
                        accept="image/jpeg,image/png,image/webp"
                    >
                    @error('img_path')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="product-create-buttons">
            <a href="{{ route('mypage') }}" class="back-link">
                戻る
            </a>
            <button type="submit" class="purchase-button">
                更新
            </button>
        </div>
    </form>
</div>

@endsection　
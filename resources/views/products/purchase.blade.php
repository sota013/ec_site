@extends('layouts.app')

@section('title', '購入画面')

@section('content')

<div class="purchase-container">
    <h1 class="page-title">購入画面</h1>
    <div class="purchase-detail">
        <div class="purchase-info">
            <p>商品名：{{ $product->product_name }}</p>
            <p>説明：{{ $product->description }}</p>
            <div class="purchase-image">
                <img
                    src="{{ asset('storage/' . $product->img_path) }}"
                    alt="{{ $product->product_name }}"
                >
            </div>

            @if ($product->stock > 0)

                <form
                    action="{{ route('products.purchase', $product->id) }}"
                    method="POST"
                    class="purchase-form"
                >
                    @csrf

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        min="1"
                        max="{{ $product->stock }}"
                        value="{{ old('quantity', 1) }}"
                        required
                    >

                    @error('quantity')
                        <p class="error-message">{{ $message }}</p>
                    @enderror

                    <p>金額：￥{{ number_format($product->price) }}</p>
                    <p>残り：{{ $product->stock }}</p>
                    <p>会社：{{ $product->company->company_name ?? '未設定' }}</p>
                    <button type="submit" class="purchase-button">
                        購入する
                    </button>
                    <a
                        href="{{ route('products.show', $product->id) }}"
                        class="back-link"
                    >
                        戻る
                    </a>
                </form>
            @else

                <p>在庫切れのため購入できません。</p>
                <a
                    href="{{ route('products.show', $product->id) }}"
                    class="back-link"
                >
                    戻る
                </a>
            @endif
        </div>
    </div>
</div>

@endsection

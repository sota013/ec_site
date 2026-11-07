@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

<div class="products-container">
    <h1 class="page-title">商品一覧</h1>
    <form action="{{ route('products.index') }}" method="GET" class="search-form">
        <input
            type="text"
            name="keyword"
            placeholder="商品名を入力"
            value="{{ $keyword ?? '' }}"
        >
        <input
            type="number"
            name="min_price"
            placeholder="最低価格"
            value="{{ $minPrice ?? '' }}"
            min="0"
        >

        <span>～</span>

        <input
            type="number"
            name="max_price"
            placeholder="最高価格"
            value="{{ $maxPrice ?? '' }}"
            min="0"
        >

        <button type="submit">検索</button>

    </form>

    <div class="products-table-wrapper">
        <table class="products-table">
            <thead>
                <tr>
                    <th>商品番号</th>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>画像</th>
                    <th>料金(¥)</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <img
                                src="{{ asset('storage/' . $product->img_path) }}"
                                alt="{{ $product->product_name }}"
                                class="product-image"
                            >
                        </td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>
                            <a
                                href="{{ route('products.show', $product->id) }}"
                                class="detail-button"
                            >
                                詳細
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            商品が登録されていません。
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

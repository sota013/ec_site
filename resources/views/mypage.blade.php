@extends('layouts.app')

@section('title', 'マイページ')

@section('content')

<div class="mypage-container">

    <h1 class="page-title">マイページ</h1>

    <section class="mypage-section">
        <div class="section-header">
            <a href="{{ route('account.edit') }}" class="mypage-button">
                アカウント編集
            </a>
        </div>
        <div class="account-info">
            <div class="account-info-left">
                <p>ユーザ名：{{ $user->name }}</p>
                <p>Eメール：{{ $user->email }}</p>
            </div>
            <div class="account-info-right">
                <p>名前：{{ $user->name_kanji }}</p>
                <p>カナ：{{ $user->name_kana }}</p>
            </div>
        </div>
    </section>

    <section class="mypage-section">
        <h2>＜出品商品＞</h2>
        <div class="section-header">
            <a href="{{ route('products.create') }}" class="mypage-button">
                新規登録
            </a>
        </div>

        @if ($products->isEmpty())
            <p>出品した商品はありません。</p>
        @else

            <div class="mypage-table-wrapper">
                <table class="mypage-table">
                    <thead>
                        <tr>
                            <th>商品番号</th>
                            <th>商品名</th>
                            <th>商品説明</th>
                            <th>料金(¥)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>
                                    <a
                                        href="{{ route('mypage.products.show', $product->id) }}"
                                        class="detail-button"
                                    >
                                        詳細
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <section class="mypage-section">
        <h2>＜購入した商品＞</h2>

        @if ($sales->isEmpty())
            <p>購入した商品はありません。</p>
        @else

            <div class="mypage-table-wrapper">
                <table class="mypage-table">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th>商品説明</th>
                            <th>料金(¥)</th>
                            <th>個数</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->product->product_name }}</td>
                                <td>{{ $sale->product->description }}</td>
                                <td>{{ number_format($sale->product->price) }}</td>
                                <td>{{ $sale->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <div class="mypage-links">
        <a href="{{ route('products.index') }}" class="back-link">
            商品一覧へ戻る
        </a>
        <a href="{{ route('contact') }}" class="back-link">
            お問い合わせ
        </a>
    </div>

</div>

@endsection

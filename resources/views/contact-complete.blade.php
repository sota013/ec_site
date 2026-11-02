@extends('layouts.app')

@section('title', 'お問い合わせ完了')

@section('content')

    <h1>お問い合わせ完了</h1>

    <p>お問い合わせを受け付けました。</p>
    <p>お問い合わせいただき、ありがとうございます。</p>

    <p>
        <a href="{{ route('products.index') }}">商品一覧へ戻る</a>
    </p>

@endsection
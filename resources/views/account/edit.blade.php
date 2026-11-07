@extends('layouts.app')

@section('title', 'アカウント情報編集')

@section('content')

<div class="account-edit-container">
    <h1 class="page-title">アカウント情報編集</h1>
    <form action="{{ route('account.update') }}" method="POST" class="account-edit-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">ユーザ名</label>
            <input type="text" id="name" name="name"
                value="{{ old('name', $user->name) }}" required>
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Eメール</label>
            <input type="email" id="email" name="email"
                value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="name_kanji">名前</label>
            <input type="text" id="name_kanji" name="name_kanji"
                value="{{ old('name_kanji', $user->name_kanji) }}" required>
            @error('name_kanji')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="name_kana">カナ</label>
            <input type="text" id="name_kana" name="name_kana"
                value="{{ old('name_kana', $user->name_kana) }}" required>
            @error('name_kana')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="account-edit-buttons">
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

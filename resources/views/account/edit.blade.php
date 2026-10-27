<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アカウント編集</title>
</head>
<body>
    <h1>アカウント編集</h1>

    <form action="{{ route('account.update') }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>名前</label><br>
            <input type="text" name="name_kanji"
                value="{{ old('name_kanji', $user->name_kanji) }}" required>
        </p>

        <p>
            <label>カナ</label><br>
            <input type="text" name="name_kana"
                value="{{ old('name_kana', $user->name_kana) }}" required>
        </p>

        <p>
            <label>メールアドレス</label><br>
            <input type="email" name="email"
                value="{{ old('email', $user->email) }}" required>
        </p>

        <button type="submit">変更を保存する</button>
    </form>

    <p>
        <a href="{{ route('mypage') }}">マイページへ戻る</a>
    </p>
</body>
</html>
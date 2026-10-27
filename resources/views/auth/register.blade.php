
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <h1>会員登録</h1>
    
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

    <form action="{{ route('register.store') }}" method="POST">
    @csrf
        <div>
            <label for="name_kanji">氏名</label>
            <input type="text" id="name_kanji" name="name_kanji" required>
        </div>

        <div>
            <label for="name_kana">フリガナ</label>
            <input type="text" id="name_kana" name="name_kana" required>
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">登録する</button>
    </form>
</body>
</html>

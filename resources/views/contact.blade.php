<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
</head>
<body>
    <h1>お問い合わせ</h1>

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div>
            <label for="name">お名前：</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">メールアドレス：</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="message">お問い合わせ内容：</label>
            <textarea
                id="message"
                name="message"
                rows="6"
                required
            >{{ old('message') }}</textarea>
            @error('message')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">送信する</button>
    </form>

    <p>
    <a href="{{ route('products.index') }}">戻る</a>
    </p>
</body>
</html>
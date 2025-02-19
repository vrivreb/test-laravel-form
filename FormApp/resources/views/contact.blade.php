<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="script" href="{{ asset('js/app.js') }}">
</head>
<body class="container mt-5">
    <image id="toiawase-icon" src="{{ asset('toiawase.png') }}">
    <h2>問い合わせフォーム</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/contact" method="POST">
        @csrf
        <div class="mb-3">
            <label class="required">名前</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="required">メールアドレス</label>
            <input type="email" name="email" class="form-control border rounded-md p-2 w-full @error('email') border-red-500 @enderror" required>
        </div>
        <div class="mb-3">
            <label class="required">メッセージ</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
    </form>
</body>
</html>
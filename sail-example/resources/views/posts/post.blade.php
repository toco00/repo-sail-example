<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->subject }}</title>
</head>
<body>
    <h1>記事ID:{{ $post->id }}</h1>
    <p>現在日付：{{ $today }}</p>
    <p>内容：{{ $post->content }}</p>
</body>
</html>
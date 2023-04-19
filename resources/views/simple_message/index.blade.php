<!DOCTYPE html>
<html lang="ja">
<body>
Hello, Laravel world!
<ul>
    @foreach($messages as $message)
        <li>{{ $message['body'] }}</li>
    @endforeach
</ul>
</body>
</html>

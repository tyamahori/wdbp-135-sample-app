<!DOCTYPE html>
<html lang="ja">
<head>
    <title>sample</title>
</head>
<body>
<ul>
    @foreach($messages as $message)
        <li>{{$message['body']}}</li>
        @if($message['image'])
            <br>
            <img src="{{ \Illuminate\Support\Facades\Storage::url($message['image']) }}">
        @endif
    @endforeach
</ul>
</body>
</html>

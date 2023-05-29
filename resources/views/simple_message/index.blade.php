<!DOCTYPE html>
<html lang="ja">
<body>
Hello, Laravel world!
<ul>
    @foreach($messages as $message)
        {{--        <li>{{ $message['body'] }}</li>--}}
        {{ $message['body'] }}
        @if($message['image'])
            <br>
            <img src="{{ \Illuminate\Support\Facades\Storage::url($message['image']) }}">
        @endif
    @endforeach
</ul>
</body>
</html>

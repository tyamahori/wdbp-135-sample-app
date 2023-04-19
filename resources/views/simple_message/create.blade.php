<form action="{{ route('message.store') }}" method="post">
    @csrf
    <label>
        メッセージ
        <textarea name="body">{{ old('body') }}</textarea>
    </label><br>
    @error('body')
    <div style="color: red">
        {{ implode(',', $errors->get('body')) }}
    </div>
    @enderror
    <button type="submit">登録</button>
</form>

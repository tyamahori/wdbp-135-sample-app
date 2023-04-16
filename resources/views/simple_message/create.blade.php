<form enctype="multipart/form-data" action="{{ route('message.store') }}" method="post">
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
    <label>
        画像
        <input type="file" name="image">
    </label><br>
    @error('image')
    <div style="color: red">
        {{ implode(',', $errors->get('image')) }}
    </div>
    @enderror
    <button type="submit">登録</button>
</form>

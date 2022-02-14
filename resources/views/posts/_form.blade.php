<label>Title:</label>
<input type="text" name = 'title' value="{{ old('title',$post->title ?? null) }}">
<label>Content:</label>
<input type="text" name = 'content' value="{{ old('content',$post->content ?? null) }}">
@if($errors)
{{--    <p style="color: red">{{ session('errors') }}</p>--}}
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@extends('layout')
@section('content')
    <div id="rcorners1">
        <h3>{{ $post->title }}</h3>
        <h>{{ $post->content }}</h>
        <p>Added {{ $post->created_at->diffForhumans() }}</p>
{{--    <p><a href="{{ route('posts.edit',['post' => $post->id]) }}">Edit</a></p>--}}
        <form action="{{ route('posts.edit',['post' => $post->id]) }}">
            <button class="button button1" type="submit">Edit</button>
        </form>
    </div>
@endsection

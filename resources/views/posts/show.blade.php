@extends('layout')
@section('content')
    <div id="rcorners1">
        <h3>{{ $post->title }}</h3>
        <h>{{ $post->content }}</h>
        <p>Added {{ $post->created_at->diffForHumans() }}</p>
{{--    <p><a href="{{ route('posts.edit',['post' => $post->id]) }}">Edit</a></p>--}}
        <h3>Comments</h3>
        @forelse($post->comments as $comment)
            <p>
                {{ $comment->content }}
            </p>
            <p>
                added {{ $comment->created_at->diffForHumans() }}
            </p>
        @empty
            <p>No comments yet!</p>
        @endforelse
    </div>
@endsection

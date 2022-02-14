@extends('layout')

@section('content')
    <h1>Posts!</h1>
    @forelse($posts as $post)
    {{--    <a href="{{ route('posts.edit',['post' => $post->id]) }}">Edit</a>--}}

        <div id="rcorners">
            <p><a href="{{ route('posts.show',['post' => $post->id]) }}">{{ $post->title }}</a></p>
            @if($post->comments_count)
                <p>{{ $post->comments_count }} comments</p>
            @else
                <p>No comments yet!</p>
            @endif

            <table>
                <tr>
                    <td>
                        <form action="{{ route('posts.edit',['post' => $post->id]) }}">
                            <button class="button button1" type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method = "POST" action="{{ route('posts.destroy',['post'=>$post->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="button button1" type="submit">Delete!</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        @empty
            <p style="color: #0f6674">No posts yet!</p>
    @endforelse
@endsection

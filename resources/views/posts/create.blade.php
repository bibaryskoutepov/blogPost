@extends('layout')
@section('content')

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('posts._form')


        <button type="submit" class="button button1">Create!</button>

    </form>

@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>helloworld.loc</title>
</head>
<body>
<ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
    <li><a href="{{ route('posts.index') }}">Blog Posts</a></li>
    <li><a href="{{ route('posts.create') }}">Add Blog Post</a></li>
</ul>
@if(session('created'))
    <p style="color: green">{{ session('created') }}</p>
@elseif(session('updated'))
    <p style="color: greenyellow">{{ session('updated') }}</p>
@elseif(session('deleted'))
    <p style="color: red">{{ session('deleted') }}</p>
@endif
@yield('content')
</body>
</html>

<!doctype html>
<html lang="en">
<style>
    #rcorners {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding: 20px;
        width: 200px;
        height: 150px;
    }
    #rcorners1 {
        border-radius: 25px;
        background: #73AD21;
        padding: 20px;
        width: 200px;
        height: 150px;
    }
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        transition-duration: 0.3s;
        cursor: pointer;
    }
    .button1 {
        background-color: white;
        color: black;
        border: 2px solid #4CAF50;
    }
    .button1:hover {
        background-color: #4CAF50;
        color: white;
    }

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

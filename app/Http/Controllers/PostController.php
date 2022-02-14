<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\BlogPost;
class PostController extends Controller
{
    public function index(){
//        DB::connection()->enableQueryLog();
//        $posts = BlogPost::with('comments')->get();
//        foreach ($posts as $post)
//        {
//            foreach ($post->comments as $comment)
//            {
//                echo $comment->content;
//            }
//        }
//        dd(DB::getQueryLog());
//        comments_count
        return view('posts.index',
            ['posts' => BlogPost::withCount('comments')->get()]
        );
    }

    public function show($id){
        $post = BlogPost::findOrFail($id);
        return view('posts.show',['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request){
        $validatedData = $request->validated();
        $post = BlogPost::create($validatedData);

        $request->session()->flash('created',"Blog Post was created");

        return redirect()
            ->route('posts.show',['post' => $post->id]);

    }

    public function update(PostRequest $request,$id){
        $validatedData = $request->validated();
        $post = BlogPost::findOrFail($id);

        $post->fill($validatedData);
        $post->save();

        $request->session()->flash('updated','Blog Post was updated!');

        return redirect()
            ->route('posts.show',['post' => $post->id]);

    }

    public function edit($id){
        $post = BlogPost::findOrFail($id);
        return view('posts.edit',['post' => $post]);
    }

    public function destroy(Request $request,$id){
        $request->session()->flash('deleted','Blog Post was deleted!');

        BlogPost::destroy($id);

        return redirect()->route('posts.index');
    }
}

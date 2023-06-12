<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
class PostController extends Controller
{
    function index(){
        $posts = Post::latest()->paginate(5);
        return view('posts.index',["posts"=>$posts]);



    }
    function show($id){
        $post = Post::findorfail($id);
        return view('posts.show',["post"=>$post]);

    }
    
    function create(){
        return view('posts.create');
    }

    function store(){
        $post = new Post;
       
        $post->title=request("title");
        $post->description=request("description");
        $post->save();

        return redirect("/posts");

    }

    function edit($id){
        $post=Post::findorfail($id);
        // return "ddd";
        return view('posts.update',["post"=>$post]);


    }
    function update($id){
        $post=Post::findorfail($id);
        $post->title=request("title");
        $post->description=request("description");
        $post->save();
        return view('posts.show',["post"=>$post]);

    }

    function destroy($id){
        $post=Post::findorfail($id);
        $post->delete();
        return redirect('/posts');


    }

    

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct(){
        $this->middleware('auth')->only('create','edit','destroy');
    }
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index',["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view('posts.create',["users"=>$users]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post=Post::create($request->all());
       
           if($request->image){
            $img_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/posts'),$img_name);
            $request->image = $img_name;
            $post->image = $img_name;
            $post->save();
        }
  
     
        return to_route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $users = User::all();
        return view("posts.edit",["post"=>$post,"users"=>$users]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        if($request->image){
            if ($post->image != 'post.jpeg' and !str_contains($post->image, "/tmp")) {
                unlink(public_path('images/posts/' . $post->image));
            }
            $img_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $img_name);
            $request->image = $img_name;
            $post->image = $img_name;
            $post->save();
           

        }
        return to_route('posts.show',["post"=>$post]);

      
     

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image !='post.jpeg'  and !str_contains($post->image,"/tmp")){
            unlink(public_path('images/posts/'. $post->image));
        }
        $post->delete();
        return to_route('posts.index');

    }
}

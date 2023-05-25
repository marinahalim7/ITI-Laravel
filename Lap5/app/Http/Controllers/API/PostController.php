<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Http\Resources\PostResource;
use App\Http\Requests\API\StoreArticleRequest;
class PostController extends Controller
{
   
    public function index()
    {
        return PostResource::collection(Post::all());
    }


    public function store(StoreArticleRequest $request)
    {

        $request['slug'] = Str::slug($request->title, '-');
        $post = Post::create($request->all());

        if ($request->image) {
            $img_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $img_name);
            $request->image = $img_name;
            $post->image = $img_name;
            $post->save();
        }

        return  new PostResource($post);



      
    }

  
    public function show(Post $post)
    {
        return new PostResource($post);
        
       
    }

  
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        if ($request->image) {
            if ($post->image != 'post.jpeg' and !str_contains($post->image, "/tmp")) {
                unlink(public_path('images/posts/' . $post->image));
            }
            $img_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $img_name);
            $request->image = $img_name;
            $post->image = $img_name;
            $post->save();

        }
        return new  PostResource($post);


    }

  
    public function destroy(Post $post)
    {
        $post->delete();
        return new Response('', 204);
    }
}

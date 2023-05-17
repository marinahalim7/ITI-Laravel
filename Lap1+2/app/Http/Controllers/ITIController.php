<?php


namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User; 

class ITIController extends Controller
{
  
    function getPosts()
    {
        $posts = Post::all();
        return view('ITI.DisplayPosts', ['posts' =>$posts]);
    }
 
    function show($id){
        $post = Post::where('id', $id)->first();
        return view('ITI.DisplayPost', ["post" => $post]);

    }

    function createPost()
    {
       
        return view('ITI.CreatePost');
    }

    function save(){
        request()->validate(
            ["title" => "required | max:10",
              "description" => "required"
            ]

        );

        $new_post = new Post();
        $post_info = request()->all();

    
        $image = request()->image;
        if($image){
            $img_name = time().'.'.$image->extension();
            $new_post->image = $img_name;
            $image->move(public_path('images/posts'), $img_name);

        }

       
        $new_post->title = $post_info['title'];
        $new_post->description = $post_info['description'];
      
        $new_post->save();
        //dd($new_post);
        return to_route("posts");
    }

    function delete($id){
        $post = Post::findorfail($id);
        $post->delete();
        return to_route("posts");



    }

    function getUsers(){
        
        $users = User::latest()->paginate(5);
        return view('ITI.Displayusers', ['users' => $users]);
    }

 

    function update($id){
        return view('ITI.UpdatePost',["id"=>$id]);
    }


    function update_db($id){
        var_dump("d");
        request()->validate(
            [
                "title" => "required | max:10",
                "description" => "required"
            ]

        );

        $post_info = request()->all();
        $post = Post::findorfail($id);
        
         $image = request()->image;
         if ($image) {
            var_dump($image);
            $img_name = time() . '.' . $image->extension();
            $post->image = $img_name;
            $image->move(public_path('images/posts'), $img_name);

        }
        
        $post->title = $post_info['title'];
        $post->description = $post_info['description'];
        $post->save();


        return to_route("posts");





    }

}
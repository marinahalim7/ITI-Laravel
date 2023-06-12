<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\API\ArticleRequest;

use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth:sanctum')->only(['store']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= Article::all();
        return  ArticleResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
       $article= Article::create($request->all());

        if ($request->image) {
            $this->save_image($request,$article);
               
        }
        return  Response('created',201);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $old_img=$article->image;
     
        $article->update($request->all());

        if ($request->image) {
            $this->save_image($request,$article);  
            if($old_img){
               $this->unlink_image($old_img);
                
            }    
        }

        
        

        return $article;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if($article->image){
            $this->unlink_image($article->image);
         } 
        $article->delete();
    }


    private function save_image($request,$object){

        $extension = $request->image->extension();
        $img_name=time().'.'.$extension;
        $request->image->move(public_path('images/articles'),$img_name);
        $object->image=$img_name;
        $object->save();    


    }

    private function unlink_image($image){
     //   dd($image);
        unlink(public_path('images/articles/'.$image));

    }

    
}

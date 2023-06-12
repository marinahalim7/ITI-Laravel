<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Displaya listing of the resource.
     */
    public function index()
    {
      
        // $articles=Article::withTrashed()->paginate(5); // to restore active and trashed data;
       $articles=Article::latest()->paginate(10);
       return view('articles.index',["articles"=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'rate'=>'required|numeric'
        ]);
        $data=$request->all();
        $data['user_id']=Auth()->user()->id;
        Article::create($data);
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show',["article"=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.update',["article"=>$article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'rate'=>'required|numeric'
        ]);
        $article->update($request->all());
        return view('articles.show',["article"=>$article]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect ("/articles");
    }
}

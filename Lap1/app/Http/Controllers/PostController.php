<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $posts=[
            ["title"=>"post1","description"=>"POOOSt1"],
            ["title"=>"post2","description"=>"Pooost2"],
            ["title"=>"post3","description"=>"Pooost3"],
        ];
        return view('posts.index',["posts"=>$posts]);



    }
    function show($id){
        $posts=[
            ["title"=>"post1","description"=>"POOOSt1"],
            ["title"=>"post2","description"=>"Pooost2"],
            ["title"=>"post3","description"=>"Pooost3"],
        ];
        return view('posts.show',["post"=>$posts[$id]]);

    }

    

}

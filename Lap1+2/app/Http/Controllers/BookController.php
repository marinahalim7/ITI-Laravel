<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        return view('books.index', ['books' => $books]);
    }

    
     //Show the form for creating a new resource.
    public function create()
    {
        return view('books.create');

       
    }

   
      //Store a newly created resource in storage.
     
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'description'=>'required',
            'num_of_pages'=>'int | min:1'

        ]);
        if($request->image){
            $img_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/books'),$img_name);
            $request->image = $img_name;
        }
        
        Book::create(['title' => $request->title,
                     'description' => $request->description,
                     'num_of_pages' =>$request->num_of_pages,
                     'image' =>$request->image

                    ]);

        return to_route('books.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit',["book"=>$book]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {

       
        if($request->image){
            {
                if($book->image){
                    unlink(public_path('images/books/'.$book->image));
            }
            }
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'num_of_pages' => 'int | min:1'

        ]);
        $book->update($request->all());

        if ($request->image) {
           
            $img_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/books'), $img_name);
            $book->image = $img_name;
            $book->save();
        }

        
        return to_route('books.show', $book->id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        
        $book->delete();
        return to_route('books.index');
        
    }
}

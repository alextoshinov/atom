<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use File;
use Session;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_per_page = \Config::get('database.total_items_per_page');
        $count = Book::all();
        $books = Book::orderBy('id', 'desc')->where('user_id',Auth::id())->paginate($items_per_page);
        return view('books.index')->withBooks($books)->withCount($count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('books.create')->withBooks($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'ISBN' => 'required|string|max:100',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192'
        ]);
        $store_path = \Config::get('app.images_path');
        if ($request->hasFile('cover_image')) {
              $bookfile = $request->file('cover_image');
              $filename = $bookfile->getClientOriginalName();
              $book = new Book();
              $book->user_id = Auth::id();
              $book->name = $request->input('name');
              $book->ISBN = $request->input('ISBN');
              $book->description = $request->input('description');
              $book->cover_image = $filename;
              $bookfile->move(public_path($store_path),$filename);
              $book->save();
              $request->session()->flash('message.level', 'success');
              $request->session()->flash('message.content', 'Book was created successfuly');
         return redirect()->route('books.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->withBook($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'ISBN' => 'required|string|max:100',
            'cover_image' => 'mimes:jpeg,png,jpg,gif,svg|max:8192'
        ]);
        $store_path = \Config::get('app.images_path');
        $book = Book::find($id);
        if ($request->hasFile('cover_image')) {
            $bookfile = $request->file('cover_image');
            $filename = $bookfile->getClientOriginalName();
            $book->cover_image = $filename;
            $bookfile->move(public_path($store_path),$filename);
        } else {
            $book->cover_image = $request->input('old_cover_image');
        }

        $book->user_id = Auth::id();
        $book->name = $request->input('name');
        $book->ISBN = $request->input('ISBN');
        $book->description = $request->input('description');

        $book->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Book was edited successfuly');

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $store_path = \Config::get('app.images_path');
        File::delete($store_path.$book->cover_image);
        $book->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'The Book has deleted successfuly');
        return redirect()->route('books.index');
    }

    public function mybooks()
    {
        $books = Book::where('user_id', Auth::id())->get();
        $user = Auth::user()->first_name.' '.Auth::user()->last_name;
        return view('home', ['books' => $books, 'user' => $user]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        $count = $book->count();
        return view('list-buku', [
            'book'=>$book, 
            'count'=>$count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->first();
        return view('detail-buku', [
            'book' => $book,
            'review'=>$book->reviews,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        return view('edit-buku', [
            'book' => $book
        ]);
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
        $request->validate([
            'title' => 'required|max:255',
            'photo' => 'image',
            'author' => 'required|max:50',
        ]);

        $book = Book::findOrFail($id);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image',
            ]);

            if ($book->photo != 'noimage.jpg'){
                Storage::disk('public')->delete('images/'.$book->photo);
            }
            
            $filenameWithExt = $request->file('photo')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);

                $book->update([
                    'title' => $request['title'],
                    'author' => $request['author'],
                    'photo' => $fileNameToStore,
                ]);

            }
        else{

                $book->update([
                    'title' => $request['title'],
                    'author' => $request['author'],
                ]);
    

            }
            
        
        return redirect()->route('book.list-buku')->with('edit_review', 'Pengeditan Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

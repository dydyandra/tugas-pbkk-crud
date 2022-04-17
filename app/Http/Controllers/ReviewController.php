<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = Review::all();
        $read_count = Review::where('read', '!=', 0)->count();
        $progress = Review::where('read', '=', 0)->count();
        return view('list-review', [
            'review'=>$review, 
            'showRead'=>$read_count,
            'showProgress'=>$progress,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            // 'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'author' => 'required|max:50',
            'started' => 'required',
            'rating' => 'nullable|numeric|between:0,5'
        ]);

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);
            }
            // Else add a dummy image
            else {
            $fileNameToStore = 'noimage.jpg';
        }

        // $path = $request->file('photo')->store('public/images');

        $review = new Review;
        $review->title = $request->title;
        $review->author = $request->author;
        $review->started = $request->started;
        $review->read = $request->read;
        $review->rating = $request->rating;
        $review->photo = $fileNameToStore;
        $review->save();

        // Artikel::create($validatedData);
        return redirect()->route('review.list-review')->with('tambah_review', 'Penambahan Pengguna berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::where('id', $id)->first();
        return view('detail-review', [
            'review' => $review
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
        $review = Review::where('id', $id)->first();
        return view('edit-review', [
            'review' => $review
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
            'started' => 'required',
            'rating' => 'nullable|numeric|between:0,5'
        ]);

        $review = Review::findOrFail($id);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image',
            ]);

            if ($review->photo != 'noimage.jpg'){
                Storage::disk('public')->delete('images/'.$review->photo);
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
            
          
            $review->update([
                'title' => $request['title'],
                'author' => $request['author'],
                'photo' => $fileNameToStore,
                'started' => $request['started'],
                'read' => $request['read'],
                'rating' => $request['rating'],
            ]);
            

        }
    
        else{
            $review->update([
                'title' => $request['title'],
                'author' => $request['author'],
                'started' => $request['started'],
                'read' => $request['read'],
                'rating' => $request['rating'],
            ]);
        }
        
        return redirect()->route('review.list-review')->with('edit_review', 'Pengeditan Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        if ($review->photo != 'noimage.jpg'){
            Storage::disk('public')->delete('images/'.$review->photo);
        }
        $review->delete();
		return redirect()->route('review.list-review')->with('hapus_review', 'Penghapusan data berhasil');
    }
}

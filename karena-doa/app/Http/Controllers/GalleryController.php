<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Gallery';
        $galleries = Gallery::all();

        return view('backend.galleries.index', [
            'title' => $title,
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Gallery';

        return view('backend.galleries.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'image'   => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/galleries', $image->hashName());

        // Gallery::create($validatedData);
        Gallery::create([
            'title'     => $request->title,
            'image'     => $image->hashName(),
        ]);

        //redirect to index
        return redirect('/galleries')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $title = 'Edit Gallery';
        $gallery = Gallery::findOrFail($gallery->id);

        return view('backend.galleries.edit', [
            'title' => $title,
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'title'     => 'required',
            'image'   => 'image|mimes:png,jpg,jpeg,webp|max:1024',
        ]);

        //get data gallery by ID
        $gallery = Gallery::findOrFail($gallery->id);

        if ($request->file('image') == "") {

            $gallery->update([
                'title'     => $request->title,
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/galleries/' . $gallery->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/galleries', $image->hashName());

            $gallery->update([
                'title'     => $request->title,
                'image'     => $image->hashName(),
            ]);
        }

        return redirect('/galleries')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        Storage::disk('local')->delete('public/galleries/' . $gallery->image);
        Gallery::destroy($gallery->id);

        return redirect('/galleries')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

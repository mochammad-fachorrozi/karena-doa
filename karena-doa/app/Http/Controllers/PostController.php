<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Berita';
        $posts = Post::all();

        return view('backend.posts.index', [
            'title' => $title,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Berita';

        return view('backend.posts.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'author'   => 'required',
            'title'   => 'required',
            'slug'   => 'required',
            'image'   => 'required|image|mimes:png,jpg,jpeg,webp|max:1024',
            'body'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // Gallery::create($validatedData);
        Post::create([
            'author'     => $request->author,
            'title'     => $request->title,
            'slug'     => $request->slug,
            'image'     => $image->hashName(),
            'body'     => $request->body,
            'published'     => \Carbon\Carbon::now()->toDateString(),
        ]);

        //redirect to index
        return redirect('/posts')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $title = 'Edit Berita';
        $post = Post::findOrFail($post->id);

        return view('backend.posts.edit', [
            'title' => $title,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'author'   => 'required',
            'title'   => 'required',
            'slug'   => 'required',
            'image'   => 'image|mimes:png,jpg,jpeg,webp|max:1024',
            'body'   => 'required',
        ]);

        //get data post by ID
        $post = post::findOrFail($post->id);

        if ($request->file('image') == "") {

            $post->update([
                'author'     => $request->author,
                'title'     => $request->title,
                'slug'     => $request->slug,
                'body'     => $request->body,
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/posts/' . $post->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            $post->update([
                'author'     => $request->author,
                'title'     => $request->title,
                'slug'     => $request->slug,
                'image'     => $image->hashName(),
                'body'     => $request->body,
            ]);
        }

        return redirect('/posts')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::disk('local')->delete('public/posts/' . $post->image);
        Post::destroy($post->id);

        return redirect('/posts')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

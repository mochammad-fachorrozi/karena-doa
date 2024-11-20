<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Whatsapp;
use App\Models\Orphanage;
use Illuminate\Http\Request;
use App\Models\AccountNumber;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Beranda';
        $orphanage = Orphanage::first();
        $posts = Post::paginate(3);
        $galleries = Gallery::paginate(8);
        $whatsapps = Whatsapp::all();

        return view('frontend.index', [
            'title' => $title,
            'orphanage' => $orphanage,
            'posts' => $posts,
            'galleries' => $galleries,
            'whatsapps' => $whatsapps,
        ]);
    }

    public function about()
    {
        $title = 'Tentang Kami';
        $orphanage = Orphanage::first();
        $whatsapps = Whatsapp::all();
        // dd($orphanage[0]->image2);
        return view('frontend.about', [
            'title' => $title,
            'orphanage' => $orphanage,
            'whatsapps' => $whatsapps,
        ]);
    }

    public function donation()
    {
        $title = 'Donasi';
        $donasis = AccountNumber::all();
        $orphanage = Orphanage::first();
        $whatsapps = Whatsapp::all();

        return view('frontend.donation', [
            'title' => $title,
            'donasis' => $donasis,
            'orphanage' => $orphanage,
            'whatsapps' => $whatsapps,
        ]);
    }

    public function contact()
    {
        $title = 'Kontak Kami';
        $orphanage = Orphanage::first();
        $whatsapps = Whatsapp::all();

        return view('frontend.contact', [
            'title' => $title,
            'orphanage' => $orphanage,
            'whatsapps' => $whatsapps,
        ]);
    }

    public function blog()
    {
        $title = 'Berita dan Artikel';
        $posts = Post::paginate(3);
        $orphanage = Orphanage::first();
        $whatsapps = Whatsapp::all();


        return view('frontend.blog', [
            'title' => $title,
            'posts' => $posts,
            'orphanage' => $orphanage,
            'whatsapps' => $whatsapps,
        ]);
    }

    public function blogDetail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $title = 'Berita dan Artikel';
        $orphanage = Orphanage::first();
        $whatsapps = Whatsapp::all();
        if (!isset($post)) {
            return redirect('not-found');
        }

        return view('frontend.blog-detail', [
            'title' => $title,
            'post' => $post,
            'orphanage' => $orphanage,
            'whatsapps' => $whatsapps,
        ]);
    }

    public function notFound()
    {
        $title = 'Page Not Found';
        $orphanage = Orphanage::first();
        $whatsapps = Whatsapp::all();

        return view('frontend.not-found', [
            'title' => $title,
            'orphanage' => $orphanage,
            'whatsapps' => $whatsapps,
        ]);
    }
}

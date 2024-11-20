@extends('frontend.layouts.app')

@section('meta')
<meta content="Page Not Found, Halaman tidak tersedia, panti asuhan, panti asuhan karena doa" name="keywords">
<meta content="Halaman yang anda tuju tidak tersedia di website panti asuhan karena doa" name="description">
@endsection

@section('content') 

    <!-- 404 Start -->
    <div class="container-fluid py-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Halaman Tidak Tersedia</h1>
                    <p class="mb-4">Mohon maaf, halaman yang anda cari tidak tersedia !</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="/">Kembali ke beranda</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
    
@endsection
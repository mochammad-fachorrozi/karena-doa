@extends('frontend.layouts.app')

@section('meta')
<meta content="panti asuhan, panti asuhan karena doa, karena doa, panti asuhan indonesia, panti asuhan di depok" name="keywords">
<meta content="{{ Str::limit($orphanage->about1, $limit = 245, $end = '...') }}" name="description">
@endsection

@section('content')    

        <!-- Hero Start -->
        <div class="container-fluid py-6 mt-6" style="background-image: url('{{ asset('assets/img/hero.webp') }}'); background-repeat: no-repeat; background-size: cover;">
            <div class="container py-6">
                <div class="row g-5 align-items-center justify-content-center py-6 text-center">
                    <img src="{{ asset('assets/img/logo.webp') }}" alt="logo" class="img-hero">
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- About Satrt -->
        <div class="container-fluid py-6 bg-secondary">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-7 wow fadeInLeft bg-light rounded" data-wow-delay="0.1s">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 my-3">Tentang kami</small>
                        <h1 class="display-5 mb-4">Panti Asuhan Karena Doa</h1>
                        <p class="mb-4 text-dark">{!! $orphanage->about1 !!}</p>
                    </div>
                    <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.1s">
                        <img src="{{ Storage::url('public/orphanages/').$orphanage->image1 }}" class="img-fluid rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Blog Start -->
        <div class="container-fluid blog py-6">
            <div class="container">
                <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Kegiatan</small>
                    <h1 class="display-5 mb-5">Kegiatan Kami</h1>
                </div>
                <div class="row gx-4 justify-content-center">

                    @foreach ($posts as $item)
                        
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item">
                            <div class="overflow-hidden rounded">
                                <img src="{{ Storage::url('public/posts/').$item->image }}" class="img-fluid w-100" alt="Gambar {{ $item->title }}">
                            </div>
                            <div class="blog-content mx-4 d-flex rounded bg-light">
                                <div class="text-dark bg-primary rounded-start">
                                    <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                        <p class="fw-bold my-0 text-white"> {{ date('d', strtotime($item->published)) }}</p>
                                        <p class="fw-bold my-0 text-white">{{ date('M', strtotime($item->published)) }}</p>
                                        <p class="fw-bold my-0 text-white">{{ date('Y', strtotime($item->published)) }}</p>
                                    </div>
                                </div>
                                <a href="/blog/{{ $item->slug }}" class="h5 lh-base my-auto h-100 p-3">{{ Str::limit($item->title, $limit = 40, $end = '...') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Blog End -->


        <!-- Gallery Start -->
        <div class="container-fluid event py-6 bg-secondary">
            <div class="container">
                <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Galery</small>
                    <h1 class="display-5 mb-5 text-white">Galery Kami</h1>
                </div>
                <div class="tab-class text-center">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="row g-4 bg-light rounded pb-4 px-2">

                                        @foreach ($galleries as $item)
                                            
                                        <div class="col-xs-6 col-sm-6 col-md-3">
                                            <div class="event-img position-relative">
                                                <img src="{{ Storage::url('public/galleries/').$item->image }}" class="img-fluid rounded w-100" alt="{{ $item->title }}">

                                                <div class="event-overlay d-flex flex-column p-4">
                                                    <a href="{{ Storage::url('public/galleries/').$item->image }}" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Events End -->


        <!-- Fact Start-->
        <div class="container-fluid faqt py-6">
            <div class="container">
                <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Video</small>
                    <h1 class="display-5 mb-5">Video Kami</h1>
                </div>
                <div class="row g-4 align-items-center justify-content-center">
                    <div class="col-lg-8">
                        <div class="video">
                            <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/{{ $orphanage->youtube }}"
                             data-bs-target="#videoModal">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Video -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact End -->

@endsection
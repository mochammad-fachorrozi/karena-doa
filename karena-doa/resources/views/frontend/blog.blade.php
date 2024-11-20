@extends('frontend.layouts.app')

@section('meta')
<meta content="Blog panti asuhan, Blog panti asuhan karena doa, Berita panti asuhan" name="keywords">
<meta content="{{ $posts[0]->title }}" name="description">
@endsection

@section('content')    


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
                                <img src="{{ Storage::url('public/posts/').$item->image }}" class="img-fluid w-100" alt="">
                            </div>
                            <div class="blog-content mx-4 d-flex rounded bg-light">
                                <div class="text-dark bg-primary rounded-start">
                                    <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                        <p class="fw-bold my-0 text-white">{{ date('d', strtotime($item->published)) }}</p>
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

@endsection
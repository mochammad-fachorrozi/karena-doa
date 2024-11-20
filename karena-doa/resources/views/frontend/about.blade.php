@extends('frontend.layouts.app')

@section('meta')
<meta content="Sejarah panti asuhan, panti asuhan karena doa, Visi dan misi panti asuhan" name="keywords">
<meta content="{{ Str::limit($orphanage->about2, $limit = 245, $end = '...') }}" name="description">
@endsection

@section('content')    

        <!-- Sejarah Satrt -->
        <div id="sejarah" class="container-fluid py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="{{ Storage::url('public/orphanages/').$orphanage->image2 }}" class="img-fluid rounded" alt="gambar sejarah">
                    </div>
                    <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.3s">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Sejarah</small>
                        <h1 class="display-5 mb-4">Panti Asuhan Karena Doa</h1>
                        <p class="mb-4"> {!! $orphanage->about2 !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sejarah End -->


        <!-- visi-misi Satrt -->
        <div id="visi-misi" class="container-fluid py-6 bg-secondary">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-4 wow fadeInLeft" data-wow-delay="0.1s">
                    {{-- <img src="img/about.webp" class="img-fluid rounded" alt=""> --}}
                    <img src="{{ Storage::url('public/orphanages/').$orphanage->image3 }}" class="img-fluid rounded" alt="gambar visi-misi">

                </div>
                <div class="col-lg-6 text-white wow fadeInRight" data-wow-delay="0.3s">
                    <h2 class="display-5 text-center text-white">Visi</h2>
                    <p class="text-center">{!! $orphanage->vision !!} </p>
                    <h2 class="display-5 text-center text-white">Misi</h2>
                    <div class="row text-white justify-content-center">
                        <p>{!! $orphanage->mission !!}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- visi-misi End -->
  

@endsection
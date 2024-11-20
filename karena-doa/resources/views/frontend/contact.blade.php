@extends('frontend.layouts.app')

@section('meta')
<meta content="alamat panti asuhan, alamat panti asuhan karena doa, karena doa, kontak panti asuhan" name="keywords">
<meta content="Beralamat di Jl. H. Sulaiman No. 56 Bedahan, Sawangan, Kota Depok, Jawa Barat. No Telephone (021) 7797 2622 dan NO Whatsapp {{ $whatsapps[0]->phone }}" name="description">
@endsection

@section('content')    

        <!-- Contact Start -->
        <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="p-2 bg-light rounded contact-form">
                    <div class="row g-4">
                        <div class="col-12 ">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Kontak</small>
                            <h1 class="display-5 mb-0">Kontak dan Alamat Kami</h1>
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7929.765991132759!2d106.77184393704836!3d-6.4090702209735735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e8e1e1275c7f%3A0xeeedfae21d6912a9!2sKarena%20Doa%20Orphanage!5e0!3m2!1sen!2sid!4v1696761552426!5m2!1sen!2sid" title="Panti Asuhan Karena Doa" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" class="px-2" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <div class="px-2">
                                <div class="d-inline-flex w-100 border border-primary p-3 rounded mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Alamat</h4>
                                        <p class="text-dark mb-0">Jl. H. Sulaiman No. 56 Bedahan, Sawangan, Kota Depok, Jawa Barat</p>
                                    </div>
                                </div>
                                <div class="d-inline-flex w-100 border border-primary p-3 rounded mb-3">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Telephone</h4>
                                        <p class="text-dark mb-0">(021) 7797 2622</p>
                                    </div>
                                </div>
                                <div class="d-inline-flex w-100 border border-primary p-3 rounded">
                                    <i class="fab fa-whatsapp fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Whatsapp</h4>
                                        @foreach ($whatsapps as $item)
                                        <p class="text-dark mb-1">{{ $item->phone }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Contact End -->

@endsection
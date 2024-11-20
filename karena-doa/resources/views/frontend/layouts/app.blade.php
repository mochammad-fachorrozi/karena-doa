<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{ $title }} | PA Karena Doa</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        @yield('meta')
        
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>

    <body>

                <!-- Spinner Start -->
        {{-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid nav-bar fixed-top">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg p2-4">
                    <a href="/" class="navbar-brand pb-4">
                        <img src="{{ asset('assets/img/logo.webp') }}" alt="logo" width="170">
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                            {{-- <a href="/about" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">Tentang Kami</a> --}}
                            <div class="nav-item dropdown">
                                <a href="/about" class="nav-link {{ request()->is('about*') ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown">Tentang Kami</a>
                                <div class="dropdown-menu bg-light">
                                    <a href="/about#sejarah" class="dropdown-item {{ request()->is('about#sejarah') ? 'active' : '' }}">Sejarah</a>
                                    <a href="/about#visi-misi" class="dropdown-item  {{ request()->is('about#visi-misi') ? 'active' : '' }}">Visi & Misi</a>
                                    <a href="/login" class="dropdown-item">Login</a>
                                </div>
                            </div>
                            <a href="/donation" class="nav-item nav-link {{ request()->is('donation') ? 'active' : '' }}">Donasi</a>
                            <a href="/contact" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Kontak Kami</a>
                            <a href="/blog" class="nav-item nav-link {{ request()->is('blog*') ? 'active' : '' }}">Kegiatan</a>
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu bg-light">
                                    <a href="book.html" class="dropdown-item">Booking</a>
                                    <a href="blog.html" class="dropdown-item">Our Blog</a>
                                    <a href="team.html" class="dropdown-item">Our Team</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div> --}}
                        </div>
                        <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill" data-bs-toggle="modal" data-bs-target="#qrisModal">Donation Now</a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
  
        <!-- Modal -->
        <div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="qrisModalLabel">Donasi Disini </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ Storage::url('public/orphanages/').$orphanage->qris }}" alt="qris" width="400">
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
            </div>
        </div>


        @yield('content')


        
        <!-- Footer Start -->
        <div class="container-fluid footer pt-5 pb-1 mt-5 mb-0 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <img src="{{ asset('assets/img/logo.webp') }}" alt="logo" width="200">
                            
                            <div class="footer-icon d-flex py-4">
                                <a href="https://www.instagram.com/pantiasuhankarenadoa" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.facebook.com/pantiasuhan.karenadoa" class="btn btn-primary btn-sm-square me-2 rounded-circle" ><i class="fab fa-facebook-f"></i></a>
                                <a href="" class="btn btn-primary btn-sm-square rounded-circle me-2"><i class="fab fa-tiktok"></i></a>
                                <a href="https://www.youtube.com/@pantiasuhankarenadoaoffici7019" class="btn btn-primary btn-sm-square me-2 rounded-circle" ><i class="fab fa-youtube"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-3 text-white">Link</h4>
                            <div class="d-flex flex-column align-items-start">
                                <a class="text-body mb-2" href="/"><i class="fa fa-check text-white me-2"></i>Beranda</a>
                                <a class="text-body mb-2" href="/about"><i class="fa fa-check text-white me-2"></i>Tentang Kami</a>
                                <a class="text-body mb-2" href="/donation"><i class="fa fa-check text-white me-2"></i>Donasi</a>
                                <a class="text-body mb-2" href="/contact"><i class="fa fa-check text-white me-2"></i>Kontak Kami</a>
                                <a class="text-body mb-2" href="/blog"><i class="fa fa-check text-white me-2"></i>Kegiatan</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-3 text-white">Kontak Kami</h4>
                            <div class="d-flex flex-column align-items-start">
                                <p class="mb-2"><i class="fa fa-map-marker-alt white me-2"></i>Jl. H. Sulaiman No. 56 Bedahan, Sawangan, Kota Depok, Jawa Barat</p>
                                <p class="mb-2"><i class="fa fa-phone-alt white me-2"></i> (021) 7797 2622 123</p>
                                <p class="mb-2"><i class="fab fa-whatsapp white me-2"></i> {{ $whatsapps[0]->phone }} </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="row align-items-end">
                            <img src="{{ asset('assets/img/footer.webp') }}" width="150" alt="image-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-3">
            <div class="container">
                <div class="row">
                    <span class="text-light text-center"><a href="#"><i class="fas fa-copyright text-light me-2"></i>2023 - Panti Asuhan Karena Doa</a>, All right reserved.</span>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Icon Whatsapp -->
        <a href="https://api.whatsapp.com/send/?phone={{ $whatsapps[0]->phone }}&text&type=phone_number&app_absent=0" class="btn btn-md-square btn-success rounded-circle btn-whatsapp"><i class="fab fa-whatsapp fa-2x"></i></a> 

        <!-- Back to Top -->
        <a href="#" class="btn btn-md-square btn-dark rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a> 


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
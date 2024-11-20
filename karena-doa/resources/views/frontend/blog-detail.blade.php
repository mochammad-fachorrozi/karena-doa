@extends('frontend.layouts.app')

@section('meta')
<meta content="{{ $post->title }}Blog panti asuhan, Blog panti asuhan karena doa" name="keywords">
<meta content="{!! Str::limit($post->body, $limit = 245, $end = '...') !!}" name="description">
@endsection

@section('content')    


        <!-- Blog Detail Start -->
        <div class="container-fluid contact py-6 wow fadeInDown" data-wow-delay="0.1s">
            <div class="container">
                <div class="p-4 bg-light rounded contact-form">
                    <div class="row g-4">
                        <div class="col-md-8 text-dark">
                            <div class="image mb-4">
                                <h1 class="text-primary">{{ $post->title }}</h1>
                                <img src="{{ Storage::url('public/posts/').$post->image }}" class="img-fluid w-100" alt="">
                            </div>
                            <div class="author mb-4">
                                <p class="text-primary">Author by: {{ $post->author }} | Date : {{ date('d m Y', strtotime($post->published)) }}</p>
                            </div>
                            <div class="body">
                                <p>{!! $post->body !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Detail End -->

@endsection
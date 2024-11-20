@extends('frontend.layouts.app')

@section('meta')
<meta content="Donasi panti, donasi panti asuhan, donasi panti asuhan karena doa, nomor rekening panti asuhan karena doa" name="keywords">
<meta content="Donasi di Panti asuhan karena doa bisa melalui no rekening {{ $donasis[0]->bank_name . ' ' .$donasis[0]->bank_account . ' ' . $donasis[0]->name }}" name="description">
@endsection

@section('content')    

    <!-- Donation Start -->
    <div class="container-fluid service py-6">
        <div class="container">
            <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Donasi</small>
                <h1 class="display-5 mb-5">Rekening untuk donasi</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10">

                    <table class="table table-bordered">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th scope="col" style="width: 5%;">No</th>
                                <th scope="col">Bank</th>
                                <th scope="col">Rekening</th>
                                <th scope="col">Atas Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($donasis as $key=>$item)
                            <tr class="text-dark">
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->bank_name }}</td>
                                <td>{{ $item->bank_account }}</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Donation End -->
@endsection
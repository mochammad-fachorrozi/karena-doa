@extends('backend.layouts.app')


@section('content')

<div class="row">
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="card">
      <div class="card-header">
        <a href="{{ url('galleries') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
          <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Nama </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Nama Gambar" autofocus required>
                    
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">image</label>
            <div class="col-sm-9">
              {{-- <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"> --}}
              <input type="file" class=" @error('image') is-invalid @enderror" name="image" id="image" required>

              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </div>
</div>


  @endsection

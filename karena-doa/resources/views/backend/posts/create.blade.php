@extends('backend.layouts.app')


@section('content')

<div class="row">
  <div class="col-md-10">
    <!-- general form elements -->
    <div class="card">
      <div class="card-header">
        <a href="{{ url('posts') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
          <div class="form-group row">
            <label for="author" class="col-sm-3 col-form-label">Penulis </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" placeholder="Nama Penulis" value="{{ old('author') }}" autofocus required>
                    
              @error('author')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Judul </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul" value="{{ old('title') }}" required>
                    
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="slug" class="col-sm-3 col-form-label">Slug </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug" value="{{ old('slug') }}" required>
                    
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">image</label>
            <div class="col-sm-9">
              <input type="file" class=" @error('image') is-invalid @enderror" name="image" id="image" required>

              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="body" class="col-sm-3 col-form-label">Konten </label>
            <div class="col-sm-9">
              <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" placeholder="Masukkan Konten">{{ old('body') }}</textarea>
                    
              @error('body')
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

  @section('script')

  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    console.log(title.value);

    title.addEventListener('change', function() {
      fetch('/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
    .catch(error => console.error('Error:', error))

    });

    CKEDITOR.replace( 'body' );
    </script>
      
  @endsection
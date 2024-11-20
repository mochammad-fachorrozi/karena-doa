@extends('backend.layouts.app')


@section('content')

<div class="row">
  <div class="col-md-10">
    <!-- general form elements -->
    <div class="card">
      <div class="card-header">
        <a href="{{ url('orphanages') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <!-- /.card-header -->

      <!-- form start -->
      <form method="POST" action="{{ route('orphanages.store') }}" enctype="multipart/form-data">
        @csrf
        
          <div class="card-body">
            <div class="form-group row">
              <label for="image1" class="col-sm-3 col-form-label">Gambar Tentang Kami</label>
              <div class="col-sm-9">
                <input type="file" class=" @error('image1') is-invalid @enderror" name="image1" id="image1" required>

                @error('image1')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="about1" class="col-sm-3 col-form-label">Tentang Kami </label>
              <div class="col-sm-9">
                <textarea class="form-control @error('about1') is-invalid @enderror" name="about1" rows="5" placeholder="Masukkan Konten">{{ old('about1') }}</textarea>
                      
                @error('about1')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="image2" class="col-sm-3 col-form-label">Gambar Sejarah</label>
              <div class="col-sm-9">
                <input type="file" class=" @error('image2') is-invalid @enderror" name="image2" id="image2" required>

                @error('image2')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="about2" class="col-sm-3 col-form-label">Sejarah </label>
              <div class="col-sm-9">
                <textarea class="form-control @error('about2') is-invalid @enderror" name="about2" rows="5" placeholder="Masukkan Konten">{{ old('about2') }}</textarea>
                      
                @error('about2')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="image3" class="col-sm-3 col-form-label">Gambar Visi-Misi</label>
              <div class="col-sm-9">
                <input type="file" class=" @error('image3') is-invalid @enderror" name="image3" id="image3" required>

                @error('image3')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="vision" class="col-sm-3 col-form-label">Visi </label>
              <div class="col-sm-9">
                <textarea class="form-control @error('vision') is-invalid @enderror" name="vision" rows="3" placeholder="Masukkan Konten">{{ old('vision') }}</textarea>
                      
                @error('vision')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="mission" class="col-sm-3 col-form-label">Misi </label>
              <div class="col-sm-9">
                <textarea class="form-control @error('mission') is-invalid @enderror" name="mission" rows="3" placeholder="Masukkan Konten">{{ old('mission') }}</textarea>
                      
                @error('mission')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="qris" class="col-sm-3 col-form-label">Gambar Qris</label>
              <div class="col-sm-9">
                <input type="file" class=" @error('qris') is-invalid @enderror" name="qris" id="qris" required>

                @error('qris')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="youtube" class="col-sm-3 col-form-label">Link Youtube </label>
              <div class="col-sm-9">
                <input type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" id="youtube" placeholder="Isi Kode Link" value="{{ old('youtube') }}" required>
                      
                @error('youtube')
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
    CKEDITOR.replace( 'about1' );
    CKEDITOR.replace( 'about2' );
    CKEDITOR.replace( 'vision' );
    CKEDITOR.replace( 'mission' );
  </script>

      
  @endsection
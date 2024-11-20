@extends('backend.layouts.app')

@section('content')

<div class="row">
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="card">
      <div class="card-header">
        <a href="{{ url('whatsapps') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('whatsapps.store') }}">
        @csrf

        <div class="card-body">
          <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">No. Whatsapp </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="No. Whatsapp" autofocus required>
                    
              @error('phone')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" id="status" placeholder="status" value="optional" disabled>
                    
              @error('status')
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

@extends('backend.layouts.app')

@section('content')

<div class="row">
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="card">
      <div class="card-header">
        <a href="{{ url('account-numbers') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('account-numbers.update', $accountNumber->id) }}">
        @csrf
        @method("PUT")

        <div class="card-body">
          <div class="form-group row">
            <label for="bank_name" class="col-sm-3 col-form-label">Nama </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name" placeholder="Nama Gambar" value="{{ old('bank_name', $accountNumber->bank_name) }}" required>
                    
              @error('bank_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="bank_account" class="col-sm-3 col-form-label">No. Rekening</label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" id="bank_account" placeholder="No. Rekening" value="{{ old('bank_account', $accountNumber->bank_account) }}" required>
                    
              @error('bank_account')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Atas Nama </label>
            <div class="col-sm-9">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Gambar" value="{{ old('name', $accountNumber->name) }}" required>
                    
              @error('name')
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

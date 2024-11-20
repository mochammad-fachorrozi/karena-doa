@extends('backend.layouts.app')


@section('style')
<!-- Toastr -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    
@endsection


@section('content')

        <div class="card">
          <div class="card-header">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Berita</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead class="text-center">
              <tr>
                <th style="width: 5%">No</th>
                <th>Penulis</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                
                @foreach ($posts as $key=>$item)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $item->author }}</td>
                  <td>{{ $item->title }}</td>
                  <td class="text-center">
                    <img src="{{ Storage::url('public/posts/').$item->image }}" class="rounded" style="width: 80px">
                  </td>
                  <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $item->slug) }}" method="POST">

                      <a href="{{ route('posts.edit', $item->slug) }}" class="btn btn-success btn-sm me-1"><i class="fas fa-edit"></i></a>

                      @csrf
                      @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm me-1"><i class="fas fa-trash-alt"></i></button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


  @endsection

  @section('script')

  <!-- DataTables  & Plugins -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });


    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
  </script>
      
  @endsection
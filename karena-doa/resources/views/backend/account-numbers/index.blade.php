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
            <a href="{{ route('account-numbers.create') }}" class="btn btn-primary">Tambah No. Rekening</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead class="text-center">
              <tr>
                <th style="width: 5%">No</th>
                <th>Nama Bank</th>
                <th>No. Rekening</th>
                <th>Atas Nama</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                
                @foreach ($accountNumbers as $key=>$item)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $item->bank_name }}</td>
                  <td>{{ $item->bank_account }}</td>
                  <td>{{ $item->name }}</td>
                  <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('account-numbers.destroy', $item->id) }}" method="POST">

                      <a href="{{ route('account-numbers.edit', $item->id) }}" class="btn btn-success btn-sm me-1"><i class="fas fa-edit"></i></a>

                      @csrf
                      @method('DELETE')
                      @if ($item->id == 1)
                          
                      @else
                      <button type="submit" class="btn btn-danger btn-sm me-1"><i class="fas fa-trash-alt"></i></button>
                          
                      @endif
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
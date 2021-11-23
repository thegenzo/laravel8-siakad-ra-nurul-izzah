@extends('layout.app')

@section('title')
Data Guru Kelas {{$kelas->nama_kelas}}
@endsection

@push('addon-style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Guru</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Guru</a></div>
        <div class="breadcrumb-item">Data Guru</div>
        <div class="breadcrumb-item active">Kelas {{$kelas->nama_kelas}}</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Data Guru Kelas {{$kelas->nama_kelas}}</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Guru</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Avatar</th>
                        <th class="text-center">NUPTK</th>
                        <th>Alamat</th>
                        <th class="text-center">Nomor Handphone</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guru as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td class="text-center">{{ $data->jk }}</td>
                        <td class="text-center">
                            <img src="{{ asset('uploads/guru/'.$data->user->avatar) }}" alt="" style="width: 100px;">
                        </td>
                        <td class="text-center">{{ $data->nip }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td class="text-center">{{ $data->no_hp }}</td>
                        <td class="text-center">
                            <a href="{{ route('guru.show', $data->id) }} " class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                                <i class="fas fa-eye" ></i>
                            </a>
                            <a href="{{ route('guru.edit', $data->id) }} " class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-pencil-alt" ></i>
                            </a>
                            <form action="{{ route('guru.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-toggle="tooltip" data-placement="top" title="Hapus">
                                  <i class="fas fa-trash swal-confirm"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="font-weight: bold; font-size: 18px;" class="text-center">Data Guru Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
        <a href="{{ route('guru.index') }}" class="btn btn-md btn-warning">Kembali</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<!-- JS Libraies -->
<script src="{{ asset('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#datatable").dataTable();

        $('.swal-confirm').click(function(event) {
          var form =  $(this).closest("form");
          var id = $(this).data("id");
          event.preventDefault();
          swal({
              title: `Yakin Hapus Data?`,
              text: "Data yang terhapus tidak dapat dikembalikan",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, hapus',
          })
          .then((willDelete) => {
              if (willDelete) {
              form.submit();
              }
          });
      });

    });
</script>
@endpush
@extends('layout.app')

@section('title')
Data Alumni
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
      <h1>Murid</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Murid</a></div>
        <div class="breadcrumb-item active">Data Alumni</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Data Alumni</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Murid</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Avatar</th>
                        <th class="text-center">Kelas</th>
                        <th>Alamat</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alumni as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td class="text-center">{{ $data->jk }}</td>
                        <td class="text-center">
                            <img src="{{ asset('uploads/murid/'.$data->user->avatar) }}" alt="" style="width: 100px;">
                        </td>
                        <td class="text-center">{{ $data->kelas->nama_kelas }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td class="text-center">
                            <a href="{{ route('murid.show', $data->id) }} " class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                                <i class="fas fa-eye" ></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="font-weight: bold; font-size: 18px;" class="text-center">Data Alumni Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
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
    });
</script>
@endpush
@extends('layout.app')

@section('title', 'Guru')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Guru</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Guru</a></div>
        <div class="breadcrumb-item">Data Guru</div>
      </div>
    </div>
    <div class="row">
        <!-- Modal untuk tambah guru -->
        <div class="col">
          <a href="{{ route('guru.create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Guru</a>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Data Guru</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Ruang Kelas</th>
                        <th class="text-center">Lihat Guru</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                        <td class="text-center">
                            <a href="{{ route('guru.kelas', $data->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Guru">
                                <i class="fas fa-eye" ></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="font-weight: bold; font-size: 18px;" class="text-center">Data Kelas Kosong</td>
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

@endpush
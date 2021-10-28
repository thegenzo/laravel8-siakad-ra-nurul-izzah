@extends('layout.app')

@section('title', 'Rapor')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Rapor</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Rapor</a></div>
        <div class="breadcrumb-item">Data Rapor</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Data Kelas</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Ruang Kelas</th>
                        <th class="text-center">Lihat Siswa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                        <td class="text-center">
                            <a href="{{ route('rapor.kelas', $data->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Siswa">
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
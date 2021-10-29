@extends('layout.app')

@section('title', 'Sikap')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Sikap</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Sikap</a></div>
        <div class="breadcrumb-item">Data Sikap</div>
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
                    @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kepsek')
                      @foreach ($kelas as $data)
                      <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td>{{ $data->nama_kelas }}</td>
                          <td class="text-center">
                              <a href="{{ route('sikap.kelas', $data->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Siswa">
                                  <i class="fas fa-eye" ></i>
                              </a>
                          </td>
                      </tr>
                      @endforeach
                    @else
                    <tr>
                      <td class="text-center">1</td>
                      <td>{{ $kelas->nama_kelas }}</td>
                      <td class="text-center">
                        <a href="{{ route('sikap.kelas', $kelas->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Siswa">
                          <i class="fas fa-eye" ></i>
                      </a>
                      </td>
                    </tr>
                    @endif
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
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
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Murid</a></div>
        <div class="breadcrumb-item">Data Alumni</div>
        <div class="breadcrumb-item active">Rapor</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
              <h4>Data Diri {{ $murid->user->name }} </h4>
          </div>
          <div class="card-body">
              <table class="table table-hover">
                  <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td>{{ $murid->user->name }}</td>
                  </tr>
                  <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      @if($murid->jk == 'L')
                      <td>Laki-laki</td>
                      @else
                      <td>Perempuan</td>
                      @endif
                  </tr>
                  <tr>
                      <td>Tempat Lahir</td>
                      <td>:</td>
                      <td>{{ $murid->tempat_lahir }}</td>
                  </tr>
                  <tr>
                      <td>Tanggal Lahir</td>
                      <td>:</td>
                      <td>{{ $murid->tanggal_lahir }}</td>
                  </tr>
                  <tr>
                      <td>Kelas</td>
                      <td>:</td>
                      <td>{{ $murid->kelas->nama_kelas }}</td>
                  </tr>
              </table>
          </div>
      </div>
        @forelse ($rapor as $data)
        <div class="card">
            <div class="card-header">
                <h4>Nilai Rapor di Kelas {{ $data->kelas->nama_kelas }}</h4>
            </div>
            <div class="card-body">
                <table class="table" style="font-size: 18px;">
                    <tr>
                        <td>NEM</td>
                        <td>:</td>
                        <td>{{ $data->nem }}</td>
                    </tr>
                    <tr>
                        <td>Predikat</td>
                        <td>:</td>
                        <td>{{ $data->predikat }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td>{{ $data->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @empty
        <div class="alert alert-info alert-has-icon">
          <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
          <div class="alert-body">
            <div class="alert-title">Info</div>
            Rapor Belum ada
          </div>
        </div>
        @endforelse
        <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
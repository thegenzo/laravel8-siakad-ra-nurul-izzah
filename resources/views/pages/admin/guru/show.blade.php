@extends('layout.app')

@section('title', 'Lihat Guru')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Lihat Guru</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Guru</a></div>
        <div class="breadcrumb-item">Data Guru</div>
        <div class="breadcrumb-item active">Lihat Guru</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
              <h4>Detail Guru</h4>
          </div>
          <div class="card-body">
            <div class="row no-gutters ml-2 mb-2 mr-2">
                <div class="col-md-4">
                    <img src="{{ asset('uploads/guru/'.$guru->user->avatar) }}" class="card-img img-details" alt="...">
                </div>
                <div class="col-md-1 mb-4"></div>
                <div class="col-md-7">
                    <h5 class="card-title card-text mb-2">Nama : {{ $guru->user->name }}</h5>
                    <h5 class="card-title card-text mb-2">NIP : {{ $guru->nip }}</h5>
                    <h5 class="card-title card-text mb-2">Guru Kelas : {{ $guru->kelas->nama_kelas }}</h5>
                    @if ($guru->jk == 'L')
                        <h5 class="card-title card-text mb-2">Jenis Kelamin : Laki-laki</h5>
                    @else
                        <h5 class="card-title card-text mb-2">Jenis Kelamin : Perempuan</h5>
                    @endif
                    <h5 class="card-title card-text mb-2">Nomor Handphone : {{ $guru->no_hp }}</h5>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
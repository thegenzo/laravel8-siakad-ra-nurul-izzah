@extends('layout.app')

@section('title', 'Lihat Murid')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Lihat Murid</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Murid</a></div>
        <div class="breadcrumb-item">Data Murid</div>
        <div class="breadcrumb-item active">Lihat Murid</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
              <h4>Detail Murid</h4>
          </div>
          <div class="card-body">
            <div class="row no-gutters ml-2 mb-2 mr-2">
                <div class="col-md-4">
                    <img src="{{ asset('uploads/murid/'.$murid->user->avatar) }}" class="card-img img-details" alt="...">
                </div>
                <div class="col-md-1 mb-4"></div>
                <div class="col-md-7">
                    <h5 class="card-title card-text mb-2">Nama : {{ $murid->user->name }}</h5>
                    <h5 class="card-title card-text mb-2">Murid Kelas : {{ $murid->kelas->nama_kelas }}</h5>
                    <h5 class="card-title card-text mb-2">NISN : {{ $murid->nisn }}</h5>
                    <h5 class="card-title card-text mb-2">NIS : {{ $murid->nis }}</h5>
                    <h5 class="card-title card-text mb-2">NIK : {{ $murid->nik }}</h5>
                    @if ($murid->jk == 'L')
                        <h5 class="card-title card-text mb-2">Jenis Kelamin : Laki-laki</h5>
                    @else
                        <h5 class="card-title card-text mb-2">Jenis Kelamin : Perempuan</h5>
                    @endif
                    <h5 class="card-title card-text mb-2">Agama : {{ $murid->agama }}</h5>
                    <h5 class="card-title card-text mb-2">Tempat Lahir : {{ $murid->tempat_lahir }}</h5>
                    <h5 class="card-title card-text mb-2">Tanggal Lahir : {{ \Carbon\Carbon::parse($murid->tanggal_lahir)->locale('id')->isoFormat('LL') }}</h5>
                    <h5 class="card-title card-text mb-2">Nama Ayah : {{ $murid->nama_ayah }}</h5>
                    <h5 class="card-title card-text mb-2">Pekerjaan Ayah : {{ $murid->pekerjaan_ayah }}</h5>
                    <h5 class="card-title card-text mb-2">Pendidikan Ayah : {{ $murid->pendidikan_ayah }}</h5>
                    <h5 class="card-title card-text mb-2">Nama Ibu : {{ $murid->nama_ibu }}</h5>
                    <h5 class="card-title card-text mb-2">Pekerjaan Ibu : {{ $murid->pekerjaan_ibu }}</h5>
                    <h5 class="card-title card-text mb-2">Pendidikan Ibu : {{ $murid->pendidikan_ibu }}</h5>
                    <h5 class="card-title card-text mb-2">Alamat : {{ $murid->alamat }}</h5>
                    <h5 class="card-title card-text mb-2">Nomor Handphone : {{ $murid->no_hp }}</h5>
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
@extends('layout.app')

@section('title', 'Tambah Mapel')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Mapel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Mapel</a></div>
        <div class="breadcrumb-item">Data Mapel</div>
        <div class="breadcrumb-item active">Tambah Mapel</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <div class="alert-title">Gagal Simpan Data</div>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif
        <form action="{{ route('mapel.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Masukkan Data Mapel</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <label for="">Nama Mapel</label>
                      <input type="text" class="form-control" placeholder="Masukkan Mapel" name="nama_mapel" id="nama_mapel">
                  </div>
                </div>
            </div>
            <a href="{{ route('mapel.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
            <button class="btn btn-success" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
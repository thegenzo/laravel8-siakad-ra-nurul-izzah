@extends('layout.app')

@section('title', 'Pengumuman')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('/node_modules/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pengumuman</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active">Pengumuman</div>
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
        <form action="{{ route('pengumuman.update') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Tulis Isi Pengumuman</h4>
                </div>
                <div class="card-body">
                  <div class="col-sm-12">
                    <textarea class="summernote" name="isi_pengumuman" id="isi_pengumuman">{{ $pengumuman->isi_pengumuman }}</textarea>
                  </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
@endpush
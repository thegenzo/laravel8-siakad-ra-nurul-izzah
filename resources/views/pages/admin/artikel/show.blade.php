@extends('layout.app')

@section('title', 'Lihat Artikel')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('/node_modules/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Lihat Artikel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Artikel</a></div>
        <div class="breadcrumb-item">Data Artikel</div>
        <div class="breadcrumb-item active">Lihat Artikel</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
            <div class="card-header">
              <h4>{{ $artikel->judul_artikel }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                      <img src="{{ asset('uploads/artikel/'.$artikel->sampul_artikel) }}" alt="..." class="card-img img-details mt-5" id="category-img-tag" >
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <h5>{!! $artikel->deskripsi !!}</h5>
            </div>
        </div>
        <a href="{{ route('artikel.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
@endpush
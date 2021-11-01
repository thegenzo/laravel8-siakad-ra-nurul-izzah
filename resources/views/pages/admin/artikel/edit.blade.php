@extends('layout.app')

@section('title', 'Edit Artikel')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('/node_modules/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Artikel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Artikel</a></div>
        <div class="breadcrumb-item">Data Artikel</div>
        <div class="breadcrumb-item active">Edit Artikel</div>
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
        <form action="{{ route('artikel.update',$artikel->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                  <h4>Data Artikel</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <label for="">Sampul Artikel</label>
                      <input type="file" class="form-control" name="sampul_artikel" id="sampul_artikel" value="">
                      <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                          <img src="{{ asset('uploads/artikel/'.$artikel->sampul_artikel) }}" alt="..." class="card-img img-details mt-5" id="category-img-tag" >
                        </div>
                        <div class="col-sm-4"></div>
                      </div>
                      <small class="text-muted">Sampul Artikel harus berupa file gambar(JPG, JPEG, PNG)</small>
                  </div>
                  <div class="form-group">
                      <label for="">Judul Artikel</label>
                      <input type="text" class="form-control" placeholder="Masukkan Judul Artikel" name="judul_artikel" id="judul_artikel" value="{{ $artikel->judul_artikel }}">
                  </div>
                  <div class="form-group">
                      <label for="">Deskripsi</label>
                      <textarea class="summernote" name="deskripsi" id="deskripsi">{{ $artikel->deskripsi }}</textarea>
                  </div>
                </div>
            </div>
            <a href="{{ route('artikel.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#sampul_artikel").change(function(){
        readURL(this);
    });
</script>
@endpush
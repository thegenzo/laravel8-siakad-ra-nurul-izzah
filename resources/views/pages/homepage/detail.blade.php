@extends('pages.homepage.layout.app')

@section('title', 'Baca Artikel')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
        <div class="col-sm-12">
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
                    <p>{!! $artikel->deskripsi !!}</p>
                </div>
            </div>
            <a href="/" class="btn btn-warning">Kembali</a>
        </div>
    </div>
  </section>
</div>
@endsection

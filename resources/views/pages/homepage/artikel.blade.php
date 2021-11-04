@extends('pages.homepage.layout.app')

@section('title', 'Artikel')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      @forelse ($artikel as $data)
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header">
            <a href="/baca-artikel/baca/{{ $data->id }}"><img src="{{ asset('/uploads/artikel/'.$data->sampul_artikel) }}" alt="" style="width: 300px;"></a>
          </div>
          <div class="card-body">
            <a href="/baca-artikel/baca/{{ $data->id }}"><h4>{{ $data->judul_artikel }}</h4></a>
            <p>{!! Str::limit($data->deskripsi, 20) !!}</p>
          </div>
        </div>
      </div>
      @empty
      <h2>Data Artikel Kosong</h2>
      @endforelse
    </div>
  </section>
</div>
@endsection

@extends('pages.homepage.layout.app')

@section('title', 'Data Guru')

@section('content')
<main id="main" data-aos="fade-in">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Data Guru</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-lg-6 col-md-6 mx-auto d-flex align-items-stretch">
          <div class="member">
            <img src="{{ asset('/uploads/kepsek/'.$kepsek->user->avatar) }}" class="img-fluid" alt="" >
            <div class="member-content">
              <a href="/data-kepsek/detail/{{ $kepsek->id }}"><h4>{{ $kepsek->user->name }}</h4></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @forelse($guru as $data)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="{{ asset('/uploads/guru/'.$data->user->avatar) }}" class="img-fluid" alt="">
            <div class="member-content">
              <a href="/data-guru/detail/{{ $data->id }}"><h4>{{ $data->user->name }}</h4></a>
              <span>Guru Kelas {{ $data->kelas->nama_kelas }}</span>
            </div>
          </div>
        </div>
        @empty
        <h2>Data Guru Kosong</h2>
        @endforelse
      </div>
    </div>
  </section><!-- End Trainers Section -->

</main><!-- End #main -->>
@endsection

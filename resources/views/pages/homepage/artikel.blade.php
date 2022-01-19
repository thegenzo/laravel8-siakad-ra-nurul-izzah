@extends('pages.homepage.layout.app')

@section('title', 'Artikel')

@section('content')
<main id="main" data-aos="fade-in">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Artikel</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Courses Section ======= -->
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @forelse ($artikel as $data)
        <div class="col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="{{ asset('/uploads/artikel/'.$data->sampul_artikel) }}" class="img-fluid" alt="...">
            <div class="course-content">
              <h3><a href="/baca-artikel/baca/{{ $data->id }}">{{ $data->judul_artikel }}</a></h3>
              <p>{!! Str::limit($data->deskripsi, 30) !!}</p>
            </div>
          </div>
        </div> <!-- End Course Item-->
        @empty
        <div class="col-md-4 col-sm-6 d-flex align-items-stretch">
          <h4 class="text-center">Data Kosong</h4>
        </div>
        @endforelse
      </div>

    </div>
  </section><!-- End Courses Section -->

</main><!-- End #main -->
@endsection

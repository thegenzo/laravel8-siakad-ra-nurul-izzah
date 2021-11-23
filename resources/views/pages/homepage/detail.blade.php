@extends('pages.homepage.layout.app')

@section('title', 'Detail Artikel')

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Detail Artikel</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Cource Details Section ======= -->
  <section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-12">
          <img src="{{ asset('/uploads/artikel/'.$artikel->sampul_artikel) }}" class="img-fluid" alt="">
          <h3>{{ $artikel->judul_artikel }}</h3>
          <p>
            {!! $artikel->deskripsi !!}
          </p>
        </div>
        <!-- <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Trainer</h5>
            <p><a href="#">Walter White</a></p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Course Fee</h5>
            <p>$165</p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Available Seats</h5>
            <p>30</p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Schedule</h5>
            <p>5.00 pm - 7.00 pm</p>
          </div>

        </div> -->
      </div>
      <a href="{{ url()->previous() }}" class="btn btn-warning text-white">Kembali</a>
    </div>
  </section><!-- End Cource Details Section -->

</main><!-- End #main -->
@endsection

@extends('pages.homepage.layout.app')

@section('title', 'Struktur Organisasu RA Nurul Izzah')

@section('content')
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Struktur Organisasi</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-12 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="{{ asset('/assets/img/Struktur_Organisasi.jpg') }}" class="img-fluid" alt="">
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

</main><!-- End #main -->
@endsection

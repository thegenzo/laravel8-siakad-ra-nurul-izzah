@extends('pages.homepage.layout.app')

@section('title', 'Profil RA')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Visi Misi dan Tujuan</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-5 mx-auto" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ asset('/assets/img/logo.png') }}" class="img-fluid" alt="">
          </div>
          <div class="row mt-3">
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content mt-3">
                <h3>Visi</h3>
                <h2>Terciptanya Generasi yang Unggul, Berakhlak dan Berbudaya</h2>
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content mt-3">
                <h3>Misi</h3>
                <ul>
                    <li><i class="bi bi-check-circle"></i> Dapat Mengenali Konsep-konsep Dasar</li>
                    <li><i class="bi bi-check-circle"></i> Menggali Potensi Anak Melalui Belajar Senyaman-nyamannya</li>
                    <li><i class="bi bi-check-circle"></i> Mendidik Anak Agar Menjadi Generasi Berakhlakul Karimah</li>
                    <li><i class="bi bi-check-circle"></i> Agar Anak Dapat Mengenal dan Mencintai Budaya yang Sejalan dengan Agama</li>
                </ul>
              </div>
              <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content mt-3">
                <h3>Tujuan</h3>
                <ul>
                    <li><i class="bi bi-check-circle"></i> Membekali Peserta Didik dengan Konsep-konsep Dasar Sehingga Memudahkannya dalam Belajar</li>
                    <li><i class="bi bi-check-circle"></i> Memberikan Kenyamanan dalam Proses Belajar Mengajar Baik Guru dan Anak Didik</li>
                    <li><i class="bi bi-check-circle"></i> Generasi yang Unggul Harus Memiliki Keinginan dan Berakhlakul Karimah</li>
                    <li><i class="bi bi-check-circle"></i> Membekali Anak Didik dengan Pemahaman Agama Sejak Dini dan Dapat Beradaptasi dengan Lingkungannya</li>
                </ul>
              </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->
@endsection

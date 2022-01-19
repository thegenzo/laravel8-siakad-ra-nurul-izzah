@extends('pages.homepage.layout.app')

@section('title', 'Home')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Bermain, Belajar dan Tumbuh Bersama di</h2>
    <h1>RA Nurul Izzah</h1>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="{{ asset('/uploads/kepsek/'.$kepsek->user->avatar) }}" class="img-fluid" alt="">
          <h4 class="fst-italic mt-2">{{ $kepsek->user->name }}</h4>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>Assalamu’alaikum Warahmatullahi Wabarakatuh</h3>
          <p>
              Segala puji bagi Allah SWT Rabb semesta alam, shalawat dan salam tercurah kepada Rasulullah SAW, para sahabat, keluarga dan umatnya sampai akhir zaman.Situasi pandemi Covid-19 sejak hari pertama efektif sekolah pada tahun ajaran 2021-2022 masih belum dapat dipastikan kapan akan berakhir. Namun demikian, RA Nurul Izzah berusaha memberikan pelayanan yang baik kepada siswa dengan memenuhi hak anak untuk mendapatkan pembelajaran dan memastikan siswa belajar. Metode Pembelajaran Jarak Jauh melalui daring dan luring di kelas Zoom dan Video Call maupun dengan menggunakan platform Google Classroom, sebagaimana yang dilakukan dalam kurun waktu 1 tahun terakhir diharapkan dapat digunakan sebagai bagian yang tidak terpisahkan dalam rangka memberikan stimulasi yang optimal terhadap capaian perkembangan siswa. 
          </p>
          <br>
          <p>
              Melalui aplikasi yang masih dalam masa percobaan ini diharapkan dapat membantu para staff RA Nurul Izzah untuk terus memantau perkembangan para peserta didik.
          </p>
          <br>
          <h3>
              Wassalamu’alaikum Warahmatullahi Wabarakatuh 
          </h3>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-1 col-6 text-center"></div>

        <div class="col-lg-2 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ $alumni }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Alumni</p>
        </div>

        <div class="col-lg-2 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ $murid }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Siswa Aktif</p>
        </div>

        <div class="col-lg-2 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ $guru + \App\Models\Kepsek::count() + \App\Models\Admin::count() }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Jumlah GTK</p>
        </div>

        <div class="col-lg-2 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
          <p>Jumlah Ruangan</p>
        </div>

        <div class="col-lg-2 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
          <p>Jumlah Rombel</p>
        </div>

        <div class="col-lg-1 col-6 text-center"></div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Popular Courses Section ======= -->
  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Artikel</h2>
        <p>Artikel Terbaru</p>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        @forelse ($artikel as $data)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="{{ asset('/uploads/artikel/'.$data->sampul_artikel) }}" class="img-fluid" alt="...">
            <div class="course-content">
              <h3><a href="/baca-artikel/baca/{{ $data->id }}">{{ $data->judul_artikel }}</a></h3>
              <p>{!! Str::limit($data->deskripsi, 30) !!}</p>
            </div>
          </div>
        </div> <!-- End Course Item-->
        @empty
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <h4 class="text-center">Data Kosong</h4>
        </div>
        @endforelse

      </div>

    </div>
  </section><!-- End Popular Courses Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
  
        <div class="section-title">
          <h2>Informasi Administrasi</h2>
          <p>RA Nurul Izzah</p>
        </div>
        <div class="row">
          <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes">
              <div class="row">
                {{-- <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0">
                    <h4>NSM</h4>
                    <p>101274720003</p>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0"> 
                    <h4>NPSN</h4>
                    <p>69751829</p>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0">
                    <h4>STATUS MADRASAH</h4>
                    <p>SWASTA (PREDIKAT B)</p>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0">
                    <h4>KATEGORI MADRASAH</h4>
                    <p>Madrasah Akademik (MAN IC)</p>
                  </div>
                </div> --}}
                <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>NSM</h4>
                    <p>101274720003</p>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>NPSN</h4>
                    <p>69751829</p>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>STATUS MADRASAH</h4>
                    <p>SWASTA (PREDIKAT B)</p>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>KATEGORI MADRASAH</h4>
                    <p>Madrasah Akademik (MAN IC)</p>
                  </div>
                </div>
                <div class="col-sm-6 mt-4">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>SK KEMENKUMHAM</h4>
                    <p>AHU-0033129.AH.01.04.Tahun 2016</p>
                    <p>Tanggal 23 Agt 2016</p>
                  </div>
                </div>
                <div class="col-sm-6 mt-4">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>SK IZIN OPERASIONAL</h4>
                    <p>264a.2011 tanggal 1 Juni 2011</p>
                    <p>Tanggal 01 Jun 2011</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>
  
      </div>
    </section><!-- End Popular Courses Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Kontak</h2>
        <p>Kontak Kami</p>
      </div>

      <div class="row mt-5">

        <div class="col-sm-6">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Alamat:</h4>
              <p>Kel. Katobengke Kec. Betoambari Kota Baubau</p>
            </div>
            
            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>ranurulizzah@yahoo.co.id</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Telepon:</h4>
              <p>(0402) 6123-2321</p>
            </div>

            <div class="phone">
              <i class="bi bi-facebook"></i>
              <h4>Facebook:</h4>
              <p>RA_NurulIzzah</p>
            </div>

            <div class="phone">
              <i class="bi bi-twitter"></i>
              <h4>Twitter:</h4>
              <p>@RA_NurulIzzah</p>
            </div>

          </div>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection

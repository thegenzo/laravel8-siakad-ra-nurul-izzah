@extends('pages.homepage.layout.app')

@section('title', 'Profil RA')

@section('content')
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Profil</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-5 mx-auto" data-aos="fade-left" data-aos-delay="100">
          <img src="{{ asset('/assets/img/logo.png') }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>Profil RA Nurul Izzah</h3>
          <table class="table">
              <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td>RA/BA/TA NURUL IZZAH</td>
              </tr>
              <tr>
                  <td>NPSN</td>
                  <td>:</td>
                  <td>69751829</td>
              </tr>
              <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td>JALAN MAWAAMBE</td>
              </tr>
              <tr>
                  <td>Kode Pos</td>
                  <td>:</td>
                  <td>-</td>
              </tr>
              <tr>
                  <td>Desa/Kelurahan</td>
                  <td>:</td>
                  <td>Katobengke</td>
              </tr>
              <tr>
                  <td>Kecamatan/Kota (LN)</td>
                  <td>:</td>
                  <td>Kec. Betoambari</td>
              </tr>
              <tr>
                  <td>Kab.-Kota/Negara (LN)</td>
                  <td>:</td>
                  <td>Kota Baubau</td>
              </tr>
              <tr>
                  <td>Propinsi/Luar Negeri (LN)</td>
                  <td>:</td>
                  <td>Prov. Sulawesi Tenggara</td>
              </tr>
              <tr>
                  <td>Status Sekolah</td>
                  <td>:</td>
                  <td>SWASTA</td>
              </tr>
              <tr>
                  <td>Waktu Penyelenggaraan</td>
                  <td>:</td>
                  <td>-</td>
              </tr>
              <tr>
                  <td>Jenjang Pendidikan</td>
                  <td>:</td>
                  <td>RA</td>
              </tr>
          </table>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->
</main><!-- End #main -->
@endsection

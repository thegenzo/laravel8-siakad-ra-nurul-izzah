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
              <tr>
                <td>Tahun Berdiri</td>
                <td>:</td>
                <td>2003</td>
              </tr>
              <tr>
                <td>Akta Pendiri Yayasan</td>
                <td>:</td>
                <td>03</td>
              </tr>
              <tr>
                <td>SK IZIN OPERASIONAL</td>
                <td>:</td>
                <td>264a.2011 tanggal 1 Juni 2011</td>
              </tr>
              <tr>
                <td>Tanggal SK Izin Operasional</td>
                <td>:</td>
                <td>2011-06-01</td>
              </tr>
              <tr>
                <td>SK KEMENKUMHAM</td>
                <td>:</td>
                <td>AHU-0033129.AH.01.04.Tahun 2016</td>
              </tr>
              <tr>
                <td>Tanggal SK KEMENKUMHAM</td>
                <td>:</td>
                <td>Tanggal 23 Agt 2016</td>
              </tr>
              <tr>
                <td>Status Kelompok Kerja Madrasah (KKM)</td>
                <td>:</td>
                <td>Tidak Masuk KKM</td>
              </tr>
              <tr>
                <td>Komite Lembaga</td>
                <td>:</td>
                <td>Sudah Terbentuk</td>
              </tr>
              <tr>
                <td>Kategori Madrasah</td>
                <td>:</td>
                <td>Madrasah Akademik (MAN IC)</td>
              </tr>
          </table>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->
</main><!-- End #main -->
@endsection

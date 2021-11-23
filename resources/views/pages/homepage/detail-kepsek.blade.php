@extends('pages.homepage.layout.app')

@section('title', 'Detail Kepala Sekolah')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Detail Kepala Sekolah</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ asset('/uploads/kepsek/'.$kepsek->user->avatar) }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $kepsek->user->name }}</td>
                </tr>
                <tr>
                    <td>NUPTK</td>
                    <td>:</td>
                    <td>{{ $kepsek->nip }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if ($kepsek->jk == 'L')
                        Laki-laki
                        @else
                        Perempuan
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $kepsek->alamat }}</td>
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td>:</td>
                    <td>{{ $kepsek->no_hp }}</td>
                </tr>
            </table>

          </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-warning text-white">Kembali</a>
      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->
@endsection

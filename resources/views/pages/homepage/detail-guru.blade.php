@extends('pages.homepage.layout.app')

@section('title', 'Detail Guru')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Detail Guru</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ asset('/uploads/guru/'.$guru->user->avatar) }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $guru->user->name }}</td>
                </tr>
                <tr>
                    <td>NUPTK</td>
                    <td>:</td>
                    <td>{{ $guru->nip }}</td>
                </tr>
                <tr>
                    <td>Guru Kelas</td>
                    <td>:</td>
                    <td>{{ $guru->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if ($guru->jk == 'L')
                        Laki-laki
                        @else
                        Perempuan
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $guru->agama }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td>{{ $guru->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($guru->tanggal_lahir)->locale('id')->isoFormat('LL') }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $guru->alamat }}</td>
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td>:</td>
                    <td>{{ $guru->no_hp }}</td>
                </tr>
            </table>
          </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-warning text-white">Kembali</a>
      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->
@endsection

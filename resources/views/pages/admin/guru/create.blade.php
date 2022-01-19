@extends('layout.app')

@section('title', 'Tambah Guru')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Guru</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Guru</a></div>
        <div class="breadcrumb-item">Data Guru</div>
        <div class="breadcrumb-item active">Tambah Guru</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <div class="alert-title">Gagal Simpan Data</div>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif
        <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Data Akun Guru</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email">
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Konfirmasi Password</label>
                              <input type="password" class="form-control" placeholder="Masukkan Konfirmasi Password" name="konfirmasi_password" id="konfirmasi_password">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="">Avatar</label>
                      <input type="file" class="form-control" name="avatar" id="avatar">
                      <small class="text-muted">Avatar harus berupa file gambar(JPG, JPEG, PNG) (Boleh dikosongkan)</small>
                  </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Profil Guru</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="" selected>Pilih JK</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">Agama</label>
                      <select name="agama" id="agama" class="form-control">
                          <option value="" selected hidden>Pilih Agama</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen Protestan">Kristen Protestan</option>
                          <option value="Kristen Katolik">Kristen Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Buddha">Buddha</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            <option value="" selected>Pilih Kelas</option>
                            @foreach ($kelas as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK)</label>
                        <input type="number" class="form-control" placeholder="Masukkan NUPTK" name="nip" id="nip">
                    </div>
                    <div class="form-group">
                      <label for="">Tempat Lahir</label>
                      <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" id="tempat_lahir">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nomor Handphone" name="no_hp" id="no_hp">
                    </div>
                    <div class="form-group">
                      <label for="">Status Kepegawaian</label>
                      <select name="status_kepegawaian" id="status_kepegawaian" class="form-control">
                        <option value="1">PNS</option>
                        <option value="0">Non PNS</option>
                      </select>
                    </div>
                </div>
            </div>
            <a href="{{ route('guru.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
            <button class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
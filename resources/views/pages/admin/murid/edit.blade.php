@extends('layout.app')

@section('title', 'Edit Murid')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Murid</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Murid</a></div>
        <div class="breadcrumb-item">Data Murid</div>
        <div class="breadcrumb-item active">Edit Murid</div>
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
        <form action="{{ route('murid.update',$murid->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>Data Profil Murid</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="{{ $murid->user->name }}" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="L" {{ $murid->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $murid->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $murid->tempat_lahir }}" name="tempat_lahir" id="tempat_lahir">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" value="{{ $murid->tanggal_lahir }}"name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            @foreach ($kelas as $data)
                            <option value="{{ $data->id }}" {{ $murid->id_kelas == $data->id ? 'selected' : '' }}>{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Orang Tua</label>
                        <input type="text" class="form-control" value="{{ $murid->nama_ortu }}" name="nama_ortu" id="nama_ortu">
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan Orang Tua</label>
                        <input type="text" class="form-control" value="{{ $murid->pekerjaan_ortu }}"name="pekerjaan_ortu" id="pekerjaan_ortu">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ $murid->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone</label>
                        <input type="number" class="form-control" value="{{ $murid->no_hp }}" name="no_hp" id="no_hp">
                    </div>
                </div>
            </div>
            <a href="{{ route('murid.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
            <button class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
@extends('layout.app')

@section('title', 'Tambah Jadwal')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('/node_modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Jadwal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Jadwal</a></div>
        <div class="breadcrumb-item">Data Jadwal</div>
        <div class="breadcrumb-item active">Tambah Jadwal</div>
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
        <form action="{{ route('jadwal.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Masukkan Data Jadwal</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Hari</label>
                        <select name="id_hari" id="id_hari" class="form-control">
                            <option selected hidden>Pilih Hari</option>
                            @foreach($hari as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_hari }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            <option selected hidden>Pilih Kelas</option>
                            @foreach($kelas as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mapel</label>
                        <select name="id_mapel" id="id_mapel" class="form-control">
                            <option selected hidden>Pilih Mapel</option>
                            @forelse($mapel as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                            @empty
                            <option selected disabled>Data Mapel Kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Guru</label>
                        <select name="id_guru" id="id_guru" class="form-control select2">
                            <option selected hidden>Pilih Guru</option>
                            @foreach($guru as $data)
                            <option value="{{ $data->id }}">{{ $data->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jam Mulai</label>
                                <input type="text" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="{{ Date('H:i') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jam Selesai</label>
                                <input type="text" class="form-control" name="jam_selesai" id="jam_selesai" placeholder="{{ Date('H:i') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
            <button class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
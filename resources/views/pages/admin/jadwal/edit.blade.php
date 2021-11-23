@extends('layout.app')

@section('title', 'Edit Jadwal')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('/node_modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Jadwal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Jadwal</a></div>
        <div class="breadcrumb-item">Data Jadwal</div>
        <div class="breadcrumb-item active">Edit Jadwal</div>
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
        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Jadwal</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Hari</label>
                        <select name="id_hari" id="id_hari" class="form-control">
                            @foreach($hari as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $jadwal->id_hari ? 'selected' : '' }}>{{ $data->nama_hari }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            @foreach($kelas as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $jadwal->id_kelas ? 'selected' : '' }}>{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mapel</label>
                        <select name="id_mapel" id="id_mapel" class="form-control">
                            @forelse($mapel as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $jadwal->id_mapel ? 'selected' : '' }}>{{ $data->nama_mapel }}</option>
                            @empty
                            <option selected disabled>Data Mapel Kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Guru</label>
                        <select name="id_guru" id="id_guru" class="form-control select2">
                            @foreach($guru as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $jadwal->id_keid_gurulas ? 'selected' : '' }}>{{ $data->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jam Mulai</label>
                                <input type="text" class="form-control" name="jam_mulai" id="jam_mulai" value="{{ $jadwal->jam_mulai }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jam Selesai</label>
                                <input type="text" class="form-control" name="jam_selesai" id="jam_selesai" value="{{ $jadwal->jam_selesai }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="">Tema</label>
                      <select name="tema" id="tema" class="form-control">
                          <option value="Aku Hamba Allah" {{ $jadwal->tema == 'Aku Hamba Allah' ? 'selected' : '' }}>Aku Hamba Allah</option>
                          <option value="Keluarga Sakinah" {{ $jadwal->tema == 'Keluarga Sakinah' ? 'selected' : '' }}>Keluarga Sakinah</option>
                          <option value="Lingkunganku" {{ $jadwal->tema == 'Lingkunganku' ? 'selected' : '' }}>Lingkunganku</option>
                          <option value="Binatang" {{ $jadwal->tema == 'Binatang' ? 'selected' : '' }}>Binatang</option>
                          <option value="Tanaman Ciptaan Allah" {{ $jadwal->tema == 'Tanaman Ciptaan Allah' ? 'selected' : '' }}>Tanaman Ciptaan Allah</option>
                          <option value="Kendaraan" {{ $jadwal->tema == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                          <option value="Alam Semesta" {{ $jadwal->tema == 'Alam Semesta' ? 'selected' : '' }}>Alam Semesta</option>
                          <option value="Negaraku" {{ $jadwal->tema == 'Negaraku' ? 'selected' : '' }}>Negaraku</option>
                      </select>
                    </div>
                </div>
            </div>
            <a href="{{ route('jadwal.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
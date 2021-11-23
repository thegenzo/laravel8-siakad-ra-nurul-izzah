@extends('layout.app')

@section('title')
Nilai Murid
@endsection

@push('addon-style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('/node_modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/node_modules/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Nilai Murid {{ $murid->user->name }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Nilai</a></div>
        <div class="breadcrumb-item">Nilai Kelas {{ $murid->kelas->nama_kelas }}</div>
        <div class="breadcrumb-item active">Nilai Murid</div>
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
        <div class="card">
            <div class="card-header">
                <h4>Data Diri {{ $murid->user->name }} </h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $murid->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        @if($murid->jk == 'L')
                        <td>Laki-laki</td>
                        @else
                        <td>Perempuan</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>{{ $murid->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $murid->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>{{ $murid->kelas->nama_kelas }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Nilai murid {{ $murid->user->name }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Mapel</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Tes 1</th>
                            <th class="text-center">Tes 2</th>
                            <th class="text-center">Tes 3</th>
                            <th class="text-center">Tes 4</th>
                            <th class="text-center">Tes 5</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nilai as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->mapel->nama_mapel }}</td>
                            <td class="text-center">{{ $data->kelas->nama_kelas }}</td>
                            <td class="text-center">{{ $data->tes1 }}</td>
                            <td class="text-center">{{ $data->tes2 }}</td>
                            <td class="text-center">{{ $data->tes3 }}</td>
                            <td class="text-center">{{ $data->tes4 }}</td>
                            <td class="text-center">{{ $data->tes5 }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="font-weight: bold; font-size: 18px;" class="text-center">Data Nilai Murid {{ $murid->user->name }} Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{ route('nilai.update',$murid->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                  <h4>Masukkan Nilai Murid</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <label for="">Mapel</label>
                      <select name="id_mapel" id="id_mapel" class="form-control select2">
                          @forelse($mapel as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                          @empty
                          <option selected disabled>Seluruh Mapel Sudah Memiliki Nilai</option>
                          @endforelse
                      </select>
                  </div>
                  <div class="row">
                      <div class="col-sm-1"></div>
                      <div class="col-sm-2">
                          <div class="form-group">
                              <label for="">Tes 1</label>
                              <input type="number" class="form-control" name="tes1" id="tes1" placeholder="Nilai Tes 1">
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                              <label for="">Tes 2</label>
                              <input type="number" class="form-control" name="tes2" id="tes2" placeholder="Nilai Tes 2">
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                              <label for="">Tes 3</label>
                              <input type="number" class="form-control" name="tes3" id="tes3" placeholder="Nilai Tes 3">
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                              <label for="">Tes 4</label>
                              <input type="number" class="form-control" name="tes4" id="tes4" placeholder="Nilai Tes 4">
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                              <label for="">Tes 5</label>
                              <input type="number" class="form-control" name="tes5" id="tes5" placeholder="Nilai Tes 5">
                          </div>
                      </div>
                      <div class="col-sm-1"></div>
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
<!-- JS Libraies -->
<script src="{{ asset('/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#datatable").dataTable();
    });
</script>
@endpush
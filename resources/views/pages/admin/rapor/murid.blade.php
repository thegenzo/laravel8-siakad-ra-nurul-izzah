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
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Nilai Mapel murid {{ $murid->user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover" id="TABLE_1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Mapel</th>
                                    <th>Guru</th>
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
                                    <td>{{ $data->guru->user->name }}</td>
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
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Nilai Sikap murid {{ $murid->user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover" id="TABLE_2">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Mapel</th>
                                    <th>Guru</th>
                                    <th class="text-center">Teman</th>
                                    <th class="text-center">Guru</th>
                                    <th class="text-center">Diri Sendiri</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sikap as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $data->mapel->nama_mapel }}</td>
                                    <td>{{ $data->guru->user->name }}</td>
                                    <td class="text-center">{{ $data->sikap1 }}</td>
                                    <td class="text-center">{{ $data->sikap2 }}</td>
                                    <td class="text-center">{{ $data->sikap3 }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" style="font-weight: bold; font-size: 18px;" class="text-center">Data Nilai Sikap Murid {{ $murid->user->name }} Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @forelse ($rapor as $data)
        <div class="card">
            <div class="card-header">
                <h4>Nilai Rapor di Kelas {{ $data->kelas->nama_kelas }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="TABLE_3">
                    <thead>
                        <tr>
                            <th class="text-center">NEM</th>
                            <th>Predikat</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rapor as $data)
                        <tr>
                            <td class="text-center">{{ $data->nem }}</td>
                            <td>{{ $data->predikat }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="font-weight: bold; font-size: 18px;" class="text-center">Data Nilai Rapor Murid {{ $murid->user->name }} Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @empty
        <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <div class="alert-title">Info</div>
              Rapor Belum ada
            </div>
          </div>
        @endforelse
        <form action="/rapor/kelas/{{$kelas->id}}/murid/{{$murid->id}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Masukkan Rapor Murid</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NEM</label>
                        <input type="number" class="form-control" name="nem" id="nem" placeholder="Masukkan NEM Murid">
                    </div>
                    <div class="form-group">
                        <label for="">Predikat</label>
                        <input type="text" class="form-control" name="predikat" id="predikat" placeholder="Masukkan Predikat Murid">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Lulus">Lulus</option>
                            <option value="Pindah di Kelas B1">Pindah di Kelas B1</option>
                            <option value="Pindah di Kelas B2">Pindah di Kelas B2</option>
                        </select>
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
        $("table[id^='TABLE']").dataTable( {
            "scrollY": "200px",
            "scrollCollapse": true,
            "searching": true,
            "paging": true
        });
    });
</script>
@endpush
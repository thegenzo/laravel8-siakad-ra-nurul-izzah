@extends('layout.app')

@section('title')
Ekskul Murid
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
      <h1>Ekskul Murid {{ $murid->user->name }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Ekskul</a></div>
        <div class="breadcrumb-item">Ekskul Kelas {{ $murid->kelas->nama_kelas }}</div>
        <div class="breadcrumb-item active">Ekskul Murid</div>
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
                <h4>Ekskul murid {{ $murid->user->name }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Menyanyi</th>
                            <th class="text-center">Mewarnai</th>
                            <th class="text-center">Olahraga</th>
                            <th class="text-center">Mengaji</th>
                            <th class="text-center">Hafalan Surat Pendek</th>
                            <th class="text-center">Hafalan Hadits</th>
                            <th class="text-center">Hafalan Doa Sehari-hari</th>
                            <th class="text-center">Shalat dan Wudhu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ekskul as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->kelas->nama_kelas }}</td>
                            <td class="text-center">{{ $data->eks1 }}</td>
                            <td class="text-center">{{ $data->eks2 }}</td>
                            <td class="text-center">{{ $data->eks3 }}</td>
                            <td class="text-center">{{ $data->eks4 }}</td>
                            <td class="text-center">{{ $data->eks5 }}</td>
                            <td class="text-center">{{ $data->eks6 }}</td>
                            <td class="text-center">{{ $data->eks7 }}</td>
                            <td class="text-center">{{ $data->eks8 }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" style="font-weight: bold; font-size: 18px;" class="text-center">Data Ekskul Murid {{ $murid->user->name }} Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{ route('ekskul.update', $murid->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                  <h4>Masukkan Ekskul Murid</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Menyanyi</label>
                        <input type="text" class="form-control" id="eks1" name="eks1" placeholder="Masukkan Nilai Eks 1">
                    </div>
                    <div class="form-group">
                        <label for="">Mewarnai</label>
                        <input type="text" class="form-control" id="eks2" name="eks2" placeholder="Masukkan Nilai Eks 2">
                    </div>
                    <div class="form-group">
                        <label for="">Olahraga</label>
                        <input type="text" class="form-control" id="eks3" name="eks3" placeholder="Masukkan Nilai Eks 3">
                    </div>
                    <div class="form-group">
                        <label for="">Mengaji</label>
                        <input type="text" class="form-control" id="eks4" name="eks4" placeholder="Masukkan Nilai Eks 4">
                    </div>
                    <div class="form-group">
                        <label for="">Hafalan Surat Pendek</label>
                        <input type="text" class="form-control" id="eks5" name="eks5" placeholder="Masukkan Nilai Eks 5">
                    </div>
                    <div class="form-group">
                        <label for="">Hafalan Hadits</label>
                        <input type="text" class="form-control" id="eks6" name="eks6" placeholder="Masukkan Nilai Eks 6">
                    </div>
                    <div class="form-group">
                        <label for="">Hafalan Doa Sehari-hari</label>
                        <input type="text" class="form-control" id="eks7" name="eks7" placeholder="Masukkan Nilai Eks 7">
                    </div>
                    <div class="form-group">
                        <label for="">Shalat dan Wudhu</label>
                        <input type="text" class="form-control" id="eks8" name="eks8" placeholder="Masukkan Nilai Eks 8">
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
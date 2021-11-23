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
                      <label for="">NISN</label>
                      <input type="number" class="form-control" value="{{ $murid->nisn }}" name="nisn" id="nisn">
                    </div>
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input type="number" class="form-control" value="{{ $murid->nis }}" name="nis" id="nis">
                    </div>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="number" class="form-control" value="{{ $murid->nik }}" name="nik" id="nik">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="L" {{ $murid->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $murid->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">Agama</label>
                      <select name="agama" id="agama" class="form-control">
                          <option value="Islam" {{ $murid->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                          <option value="Kristen Protestan" {{ $murid->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                          <option value="Kristen Katolik" {{ $murid->agama == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                          <option value="Hindu" {{ $murid->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                          <option value="Buddha" {{ $murid->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
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
                </div>
            </div>
            <div class="card">
              <div class="card-header">
                  <h4>Data Orangtua/Wali</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label for="">Nomor Kartu Keluarga</label>
                              <input type="number" class="form-control" name="no_kk" id="no_kk" value="{{ $murid->no_kk }}">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">NIK Ayah</label>
                              <input type="number" class="form-control" name="nik_ayah" id="nik_ayah" value="{{ $murid->nik_ayah }}">
                          </div>

                          <div class="form-group">
                              <label for="">Nama Ayah</label>
                              <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="{{ $murid->nama_ayah }}">
                          </div>

                          <div class="form-group">
                              <label for="">Pekerjaan Ayah</label>
                              <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ $murid->pekerjaan_ayah }}">
                          </div>

                          <div class="form-group">
                              <label for="">Pendidikan Ayah</label>
                              <input type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" value="{{ $murid->pendidikan_ayah }}">
                          </div>

                          <div class="form-group">
                              <label for="">Alamat</label>
                              <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ $murid->alamat }}</textarea>
                          </div>

                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">NIK Ibu</label>
                              <input type="number" class="form-control" name="nik_ibu" id="nik_ibu" value="{{ $murid->nik_ibu }}">
                          </div>
                          <div class="form-group">
                              <label for="">Nama Ibu</label>
                              <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="{{ $murid->nama_ibu }}">
                          </div>
                          <div class="form-group">
                              <label for="">Pekerjaan Ibu</label>
                              <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ $murid->pekerjaan_ibu }}">
                          </div>
                          <div class="form-group">
                              <label for="">Pendidikan Ibu</label>
                              <input type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" value="{{ $murid->pendidikan_ibu }}">
                          </div>
                          <div class="form-group">
                              <label for="">Nomor Handphone</label>
                              <input type="number" class="form-control" name="no_hp" id="no_hp" value="{{ $murid->no_hp }}">
                          </div>
                      </div>
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
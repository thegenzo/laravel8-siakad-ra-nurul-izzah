@extends('layout.app')

@section('title', 'Edit Admin')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Admin</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Admin</a></div>
        <div class="breadcrumb-item">Data Admin</div>
        <div class="breadcrumb-item active">Edit Admin</div>
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
        <form action="{{ route('admin.update', $admin->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>Data Profil Admin</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="{{ $admin->user->name }}" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="L" {{ $admin->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $admin->jk == 'P' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK)</label>
                        <input type="number" class="form-control" value="{{ $admin->nip }}" name="nip" id="nip">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ $admin->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone</label>
                        <input type="number" class="form-control" value="{{ $admin->no_hp }}" name="no_hp" id="no_hp">
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
            <button class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
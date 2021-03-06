@extends('layout.app')

@section('title', 'Profil')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profil</h1>
    </div>
    <div class="row">
      <div class="col-md-12">
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
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 col-md-6 col-12 col-sm-7">
        <div class="card">
            <form method="POST" action="/profil">
                @csrf
                <div class="card-header">
                  <h4>Edit Profil Anda</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="{{ $kepsek->user->name }}" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="L" {{ $kepsek->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $kepsek->jk == 'P' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">Nomor Induk Keluarga (NIK)</label>
                      
                      <input type="number" class="form-control" name="nik" id="nik" value="{{ $kepsek->nik}}">
                    </div>
                    <div class="form-group">
                      <label for="">Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK)</label>
                        <input type="number" class="form-control" value="{{ $kepsek->nip }}" name="nip" id="nip">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $kepsek->tempat_lahir }}" name="tempat_lahir" id="tempat_lahir">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" value="{{ $kepsek->tanggal_lahir }}" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="form-group">
                      <label for="">Agama</label>
                      <select name="agama" id="agama" class="form-control">
                        <option value="" selected hidden>Pilih Agama</option>
                        <option value="Islam" {{ $kepsek->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen Protestan" {{ $kepsek->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                        <option value="Kristen Katolik" {{ $kepsek->agama == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                        <option value="Hindu" {{ $kepsek->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $kepsek->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ $kepsek->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone</label>
                        <input type="number" class="form-control" value="{{ $kepsek->no_hp }}" name="no_hp" id="no_hp">
                    </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
          </div>
      </div>
      <div class="col-lg-5 col-md-6 col-12 col-sm-5">
        <div class="card">
          <form action="/ubah-avatar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Ubah Foto Profil</h4>
            </div>
            <div class="card-body">
              <input type="file" class="form-control" name="avatar" id="avatar">
              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <img src="{{ asset('uploads/kepsek/'.$kepsek->user->avatar) }}" alt="..." class="card-img img-details mt-5" id="category-img-tag" >
                </div>
                <div class="col-sm-4"></div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-success">Ubah Avatar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#category-img-tag').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#avatar").change(function(){
    readURL(this);
});
</script>
@endpush
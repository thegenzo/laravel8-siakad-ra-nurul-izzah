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
      <div class="col-lg-7 col-md-6 col-12 col-sm-7">
        <div class="card">
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
            <form method="POST" action="/profil">
                @csrf
                <div class="card-header">
                  <h4>Edit Profil Anda</h4>
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
                  <img src="{{ asset('uploads/murid/'.$murid->user->avatar) }}" alt="..." class="card-img img-details mt-5" id="category-img-tag" >
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
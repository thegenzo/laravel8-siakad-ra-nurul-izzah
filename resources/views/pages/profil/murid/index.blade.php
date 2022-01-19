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
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                      <h4>Data Orangtua/Wali</h4>
                  </div>
                  <div class="card-body">
                      <div class="row">
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
                                  <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
                                     @foreach($pekerjaan as $data)
                                     <option value="{{ $data->nama_pekerjaan }}" {{ $data->nama_pekerjaan == $murid->pekerjaan_ayah ? 'selected' : '' }}>{{ $data->nama_pekerjaan }}</option>
                                     @endforeach
                                  </select>
                              </div>
    
                              <div class="form-group">
                                  <label for="">Pendidikan Ayah</label>
                                  <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
                                      @foreach($pendidikan as $data)
                                      <option value="{{ $data->nama_pendidikan }}" {{ $data->nama_pendidikan == $murid->pendidikan_ayah ? 'selected' : '' }}>{{ $data->nama_pendidikan }}</option>
                                      @endforeach
                                  </select>
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
                                  <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
                                      @foreach($pekerjaan as $data)
                                      <option value="{{ $data->nama_pekerjaan }}" {{ $data->pekerjaan_ibu == $murid->pekerjaan_ibu ? 'selected' : '' }}>{{ $data->nama_pekerjaan }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="">Pendidikan Ibu</label>
                                  <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
                                     @foreach($pendidikan as $data)
                                     <option value="{{ $data->nama_pendidikan }}" {{ $data->nama_pendidikan == $murid->pendidikan_ibu ? 'selected' : '' }}>{{ $data->nama_pendidikan }}</option>
                                     @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="">Nomor Handphone</label>
                                  <input type="number" class="form-control" name="no_hp" id="no_hp" value="{{ $murid->no_hp }}">
                              </div>
                          </div>
                      </div>
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
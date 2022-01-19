@extends('layout.app')

@section('title', 'Akun')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Akun</h1>
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
          <form method="POST" action="/akun">
              @csrf
              <div class="card-header">
                <h4>Ubah Password Anda</h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                      <label for="">Email Anda</label>
                      <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email" id="email" disabled>
                  </div>
                  <div class="form-group">
                      <label for="">Password Lama</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="">Password Baru</label>
                      <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="">Masukkan Ulang Password Baru</label>
                      <input type="password" class="form-control" name="password_baru2" id="password_baru2" placeholder="">
                  </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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
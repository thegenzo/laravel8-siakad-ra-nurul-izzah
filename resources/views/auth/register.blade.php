<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('/node_modules/selectric/public/selectric.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ asset('/assets/img/logo.jpg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
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
                <form method="POST" action="/register">
                  @csrf
                  <div class="card">
                    <div class="card-header">
                      <h4>Data Akun Murid</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email">
                      </div>
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="">Password</label>
                                  <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password">
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="">Konfirmasi Password</label>
                                  <input type="password" class="form-control" placeholder="Masukkan Konfirmasi Password" name="konfirmasi_password" id="konfirmasi_password">
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="">Avatar</label>
                          <input type="file" class="form-control" name="avatar" id="avatar">
                          <small class="text-muted">Avatar harus berupa file gambar(JPG, JPEG, PNG) (boleh dikosongkan)</small>
                      </div>
                    </div>
                   </div>
                   <div class="card">
                       <div class="card-header">
                           <h4>Data Profil Murid</h4>
                       </div>
                       <div class="card-body">
                           <div class="form-group">
                               <label for="">Nama</label>
                               <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" id="name">
                           </div>
                           <div class="form-group">
                               <label for="">Jenis Kelamin</label>
                               <select name="jk" id="jk" class="form-control">
                                   <option selected hidden>Pilih JK</option>
                                   <option value="L">Laki-laki</option>
                                   <option value="P">Perempuan</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="">Tempat Lahir</label>
                               <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" id="tempat_lahir">
                           </div>
                           <div class="form-group">
                               <label for="">Tanggal Lahir</label>
                               <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                           </div>
                           <div class="form-group">
                               <label for="">Kelas</label>
                               <select name="id_kelas" id="id_kelas" class="form-control">
                                   <option selected hidden>Pilih Kelas</option>
                                   @foreach ($kelas as $data)
                                   <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="">Nama Orang Tua</label>
                               <input type="text" class="form-control" placeholder="Masukkan Nama Orang Tua" name="nama_ortu" id="nama_ortu">
                           </div>
                           <div class="form-group">
                               <label for="">Pekerjaan Orang Tua</label>
                               <input type="text" class="form-control" placeholder="Masukkan Pekerjaan Orang Tua" name="pekerjaan_ortu" id="pekerjaan_ortu">
                           </div>
                           <div class="form-group">
                               <label for="">Alamat</label>
                               <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                           </div>
                           <div class="form-group">
                               <label for="">Nomor Handphone</label>
                               <input type="number" class="form-control" placeholder="Masukkan Nomor Handphone" name="no_hp" id="no_hp">
                           </div>
                       </div>
                   </div>
                  <div class="form-group">
                    <a href="/login" class="btn btn-warning btn-lg btn-block">Sudah Punya Akun? Login</a>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include('sweetalert::alert')
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('/assets/js/page/auth-register.js') }}"></script>
</body>
</html>
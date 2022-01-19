@extends('layout.app')

@section('title', 'Murid')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Murid</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Murid</a></div>
        <div class="breadcrumb-item">Data Murid</div>
      </div>
    </div>
    <div class="row">
        <!-- Modal untuk tambah murid -->
        <div class="col">
          <a href="{{ route('murid.create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Murid</a>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Data Murid</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Ruang Kelas</th>
                        <th class="text-center">Jumlah Murid</th>
                        <th class="text-center">Lihat Murid</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                        <td class="text-center">{{ \App\Models\Murid::where('id_kelas', $data->id)->where('status_lulus', '0')->count() }}</td>
                        <td class="text-center">
                            <a href="{{ route('murid.kelas', $data->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Murid">
                                <i class="fas fa-eye" ></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="font-weight: bold; font-size: 18px;" class="text-center">Data Kelas Kosong</td>
                    </tr>
                    @endforelse
                    
                    <!-- baris untuk murid yang belum memiliki kelas -->
                    <tr>
                        <td class="text-center">{{ \App\Models\Kelas::count() + 1 }}</td>
                        <td>Belum memiliki kelas</td>
                        <td class="text-center">{{ \App\Models\Murid::where('id_kelas', null)->where('status_lulus', '0')->count() }}</td>
                        <td class="text-center">
                            <a href="pilih-kelas" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Murid">
                              <i class="fas fa-eye" ></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
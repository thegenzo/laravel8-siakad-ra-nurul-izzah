@extends('layout.app')

@section('title', 'Dashboard')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Jadwal Mapel Hari Ini</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Jam Pelajaran</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwal as $data)
                    <tr>
                        <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                        <td>{{ $data->mapel->nama_mapel }}</td>
                        <td>{{ $data->guru->user->name }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="font-weight: bold; font-size: 18px;" class="text-center">Tidak Ada Jadwal Hari Ini</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h4>Pengumuman</h4>
            </div>
            <div class="card-body">
              @if($pengumuman)
              <h3>{!! $pengumuman->isi_pengumuman !!}</h3>
              @else
              <h3>Tidak Ada Pengumuman</h3>
              @endif
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection

@push('addon-script')

@endpush
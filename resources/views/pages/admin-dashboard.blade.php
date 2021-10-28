@extends('layout.app')

@section('title', 'Admin Dashboard')

@push('addon-style')

@endpush

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Admin Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Admin</h4>
            </div>
            <div class="card-body">
              {{ $admin }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Murid</h4>
            </div>
            <div class="card-body">
              {{ $murid }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Alumni</h4>
            </div>
            <div class="card-body">
              {{ $alumni }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Guru</h4>
            </div>
            <div class="card-body">
              {{ $guru }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Jumlah Murid Berdasarkan Jenis Kelamin</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>Jumlah Murid Berdasarkan Kelas</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('node_modules/chart.js/dist/Chart.min.js') }}"></script>
<script>
  // Chartjs untuk jumlah murid berdasarkan jenis kelamin
  var muridL = JSON.parse('<?php echo json_encode($muridL); ?>');
  var muridP = JSON.parse('<?php echo json_encode($muridP); ?>');
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [muridL, muridP],
        backgroundColor: [
          '#fc544b',
          '#6777ef',
        ],
        label: 'Jumlah Murid Berdasarkan Jenis Kelamin'
      }],
      labels: [
        'Laki-laki',
        'Perempuan',
      ],
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    }
  });

  // Chartjs untuk jumlah murid berdasarkan kelas
  var kelasA = JSON.parse('<?php echo json_encode($kelasA); ?>');
  var kelasB1 = JSON.parse('<?php echo json_encode($kelasB1); ?>');
  var kelasB2 = JSON.parse('<?php echo json_encode($kelasB2); ?>');
  var ctx = document.getElementById("myChart2").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [kelasA, kelasB1, kelasB2],
        backgroundColor: [
          '#fc544b',
          '#6777ef',
          '#63ed7a',
        ],
        label: 'Jumlah Murid Berdasarkan Jenis Kelamin'
      }],
      labels: [
        'Kelas A',
        'Kelas B1',
        'Kelas B2',
      ],
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    }
  });
</script>
@endpush
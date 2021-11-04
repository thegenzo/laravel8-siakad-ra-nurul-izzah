@extends('pages.homepage.layout.app')

@section('title', 'Home')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-5">
                    <img src="{{ asset('/assets/img/logo.jpg') }}" alt="" style="width: 500px;">
                </div>
                <div class="col-sm-4"></div>
            </div>
          </div>
        </div>
          <div class="card">
            <div class="card-body">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="{{ asset('/assets/img/news/ra1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="{{ asset('/assets/img/news/ra2.jpeg') }}" alt="Second slide">
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
                
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

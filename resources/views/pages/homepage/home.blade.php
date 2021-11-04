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
      </div>
    </div>
  </section>
</div>
@endsection

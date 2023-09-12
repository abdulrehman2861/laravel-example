@extends('profile.layouts.master')
@section('title', 'Autoglass depot')
@push('styles')
@endpush

@section('content')
    

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info text-center">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/profile/allwork" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success text-center">
            <div class="inner">
              <h3>50<sup style="font-size: 20px"></sup></h3>

              <p>Pending Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/profile/allwork" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-warning text-center">
            <div class="inner">
              <h3>20</h3>

              <p>Onhold Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/profile/allwork" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-danger text-center">
            <div class="inner">
              <h3>100</h3>

              <p>Completed Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/profile/allwork" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
    </div><!-- /.container-fluid -->
  </section>


@endsection

@push('scripts')
@endpush

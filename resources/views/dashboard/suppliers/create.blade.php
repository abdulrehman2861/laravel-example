@extends('dashboard.layouts.master') 

@section('title', 'Autoglass depot')@push('styles') 
<link rel="stylesheet" href="assets/plugins/fullcalendar/main.css">

@endpush 
<style>
    .forms-styles{
        background-clip: border-box;
    background-color: #fff;
    border: 1px solid #d8dbe0;
    border-radius: 0.25rem;
    padding: 23px;
    }
    .text-styles{
        border: 1px solid #ced4da;
        width: 100%;
        border-radius: 0.25rem;
    }
</style>
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <button type="button" class="btn btn-primary">Create Supplier</button>
        <form class="mt-5 forms-styles">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label style="font-size: 18px;" for="sn">Supplier Name</label>
                  <input type="text" class="form-control" id="input1" placeholder="Enter Input 1">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label style="font-size: 18px;" for="cp">Contact Person</label>
                  <input type="text" class="form-control" id="input2" placeholder="Enter Input 2">
                </div>
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label style="font-size: 18px;" for="em">Email </label>
                  <input type="email" class="form-control" id="input3" placeholder="Enter Input 3">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label style="font-size: 18px;" for="ad">Address </label>
                  <input type="text" class="form-control" id="input4" placeholder="Enter Input 4">
                </div>
              </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-size: 18px;" for="ph">Phone</label>
                    <input type="number" class="form-control" id="input3" placeholder="Enter Input 3">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-size: 18px;" for="ph-a">Phone (Alternative)</label>
                    <input type="number" class="form-control" id="input4" placeholder="Enter Input 4">
                  </div>
                </div>
              </div>
              <div class="form-row mt-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-size: 18px;" for="ct">City</label>
                    <input type="text" class="form-control" id="input3" placeholder="Enter Input 3">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-size: 18px;" for="cu">Country</label>
                    <input type="text" class="form-control" id="input4" placeholder="Enter Input 4">
                  </div>
                </div>
              </div>
              <div class="form-row mt-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-size: 18px;" for="we">Website</label>
                    <input type="text" class="form-control" id="input3" placeholder="Enter Input 3">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-size: 18px;" for="fx">Fax</label>
                    <input type="number" class="form-control" id="input4" placeholder="Enter Input 4">
                  </div>
                </div>
              </div>
              <div class="form-row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label style="font-size: 18px;" for="nt">Notes</label><br/>
                        <textarea class="text-styles" name="" id="" rows="10"></textarea>
                    </div>
                </div>
              </div>
          </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection 

@push('scripts') 
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
 
</script>

@endpush

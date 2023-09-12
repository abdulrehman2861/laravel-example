@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@section('content')
<div class="c-body">

    <main class="c-main">

        <div class="container-fluid mb-4">
            <form action="{{ route('dashboard.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="btn btn-primary">Create User <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input class="form-control" value="{{$user->name}}" type="text" name="name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" value="{{$user->email}}" type="email" name="email" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Password <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role <span class="text-danger">*</span></label>
                                    <select class="form-control" name="role" id="role" required="">
                                        <option value="" selected="" disabled="">Select Role</option>



                                        @forelse ($roles as $role)
                                            <option value="{{ $role->name }}" @if($user->getRoleNames()->first() == $role->name) selected="true"  @endif >
                                                {{ $role->name }}
                                            </option>
                                        @empty
                                            <option selected="true" disabled>
                                                No Data Available
                                            </option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="is_active">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="is_active" required="">
                                        <option value="" selected="" disabled="">Select Status</option>
                                        <option value="1" @if($user->status == 1) selected="true"  @endif >Active</option>
                                        <option value="0" @if($user->id == 0) selected="true"  @endif >Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Profile Image <span class="text-danger">*</span></label>
                                    <img style="width: 100px;height: 100px;" class="d-block mx-auto img-thumbnail img-fluid rounded-circle mb-2" src="{{ $user->image ??  $user->short_name}}" alt="Profile Image">
                                    <div class="profil-img" id="profile-image"
                                        style="text-align: center;
    background: #f1f0ef;
    padding: 10px;"><input
                                            class="profile-file-upld" type="file" id="filepond" name="imageFile"
                                            accept="image/png,image/jpg,image/jpeg">
                                        <div class="filepond--drop-label"
                                            style="transform:translate3d(0,0,0);opacity:1"><label
                                                for="filepond--browser-9umsmgqot"
                                                style="    margin-top: 15px;"id="filepond--drop-label-9umsmgqot"
                                                aria-hidden="true">Drag &amp; Drop your files or<span
                                                    class="filepond--label-action" tabindex="0"> Browse</span></label>
                                        </div>
                                        <div class="filepond--list-scroller" style="transform:translate3d(0,0,0)">
                                            <ul class="filepond--list" role="list"></ul>
                                        </div>
                                        <div class="filepond--panel filepond--panel-root" data-scalable="true">
                                            <div class="filepond--panel-top filepond--panel-root"></div>
                                            <div class="filepond--panel-center filepond--panel-root"
                                                style="transform:translate3d(0,8px,0) scale3d(1,.6,1)"></div>
                                            <div class="filepond--panel-bottom filepond--panel-root"
                                                style="transform:translate3d(0,68px,0)"></div>
                                        </div><span class="filepond--assistant" id="filepond--assistant-9umsmgqot"
                                            role="status" aria-live="polite" aria-relevant="additions"></span>
                                        <div class="filepond--drip"></div>
                                        <fieldset class="filepond--data"></fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </main>

</div>
@endsection
@push('scripts')
{{-- <script src="assets/plugins/jquery/jquery.min.js"></script>
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
<script src="../dist/js/demo.js"></script> --}}
@endpush

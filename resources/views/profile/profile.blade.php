@extends('profile.layouts.master')
@section('title', 'Autoglass depot')
@push('styles')
@endpush

@section('content')
    
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{url('assets/images/user1-128x128.jpg')}}
                " alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">Nina Mcintire</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <!--<ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Followers</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
              <div class="text-center">
                <div class="author-box-description">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                    minus quod dignissimos.
                  </p>
                </div>
                <div class="mb-2 mt-3">
                  <div class="text-small font-weight-bold">Follow Hasan On</div>
                </div>
                <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="btn btn-social-icon mr-1 btn-github">
                  <i class="fab fa-github"></i>
                </a>
                <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                  <i class="fab fa-instagram"></i>
                </a>
                <div class="w-100 d-sm-none"></div>
              </div>




            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
              

                <li class="nav-item"><a class="nav-link active" href="#about-us" data-toggle="tab">About Us</a></li>


                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              
            
            
            </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
               <div class="active tab-pane" id="about-us">
                  <!-- About Me Box -->
          <div class="card card-primary">
           <!-- <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>-->
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

              <p class="text-muted">
                <span class="tag tag-danger">UI Design</span>
                <span class="tag tag-success">Coding</span>
                <span class="tag tag-info">Javascript</span>
                <span class="tag tag-warning">PHP</span>
                <span class="tag tag-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
                </div>
                <!-- /.tab-pane -->
                
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>



@endsection

@push('scripts')
@endpush

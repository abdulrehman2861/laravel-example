@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>





<style>
.card-comment {
    padding: 20px;
}

.comment-area textarea {
    padding: 10px;
    width: 100%;
    height: 200px;
    border: 2px solid #eee;
}

.direct-chat-messages {
    border: 5px solid #fff;
    /* margin: 10px; */
    -webkit-transform: translate(0,0);
    transform: translate(0,0);
    height: auto;
    overflow: auto;
    padding: 20px;
    background: #eee;
}




</style>

@endpush

        @section('content')

        <div class="c-body">

            <main class="c-main">

                    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center">
                        <div>
                            Reference: <strong>QT-00001</strong>
                        </div>
                        <span class="inv-button-right" style="    margin-left: auto;                        ">
                        <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none" href="#">
                            <i class="bi bi-printer"></i> Print
                        </a>
                        <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none" href="#">
                            <i class="bi bi-save"></i> Save
                        </a>
                    </span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4 mb-3 mb-md-0">
                                <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                                <div><strong>Allstate Auto Glass</strong></div>
                                <div>United States</div>
                                <div>Email: info@allstateautoglassinc.com</div>
                                <div>Phone: 703-645-2300</div>
                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0">
                                <h5 class="mb-2 border-bottom pb-2">Customer Info:</h5>
                                                                    <div><strong>Cust_3</strong></div>
                                    <div></div>
                                    <div>Email: cust2@test.com</div>
                                    <div>Phone: 55555444</div>
                                                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0">
                                <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                                <div>Invoice: <strong>INV/QT-00001</strong></div>
                                <div>Date: 13 Jan, 2023</div>
                                <div>
                                    Status: <strong>Pending</strong>
                                </div>
                                <div>
                                    Payment Status: <strong></strong>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="align-middle">Product</th>
                                    <th class="align-middle">Sale Price</th>
                                    <th class="align-middle">Quantity</th>
                                    <th class="align-middle">Discount</th>
                                    <th class="align-middle">Tax</th>
                                    <th class="align-middle">Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                   
                                                                    <tr>
                                        <td class="align-middle">
                                            2017,Buick,Cascada,Back Glass <br>
                                            <span class="badge badge-success">
                                                DB12626GTN
                                            </span>
                                        </td>

                                        <td class="align-middle">$33.00</td>

                                        <td class="align-middle">
                                            1
                                        </td>

                                        <td class="align-middle">
                                            $0.00
                                        </td>

                                        <td class="align-middle">
                                            $0.00
                                        </td>

                                        <td class="align-middle">
                                            $33.00
                                        </td>
                                    </tr>
                                                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5 ml-md-auto">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="left"><strong>Discount (%)</strong></td>
                                        <td class="right">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Tax (%)</strong></td>
                                        <td class="right">$0.00</td>
                                    </tr>
                                   
                                    <tr>
                                        <td class="left"><strong>Grand Total</strong></td>
                                        <td class="right"><strong>$33.00</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


















    </div>


    <!-- Construct the card with style you want. Here we are using card-danger -->
<!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
<!-- The contextual class should match the card, so we are using direct-chat-danger -->
<div class="card card-danger direct-chat direct-chat-danger" style="margin: 10px;">
    <!--<div class="card-header">
      <h3 class="card-title">Direct Chat</h3>
      <div class="card-tools">
        <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
        <button type="button" class="btn btn-tool" data-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
          <i class="fas fa-comments"></i>
        </button>
        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
    </div>-->
    <!-- /.card-header -->
    <div class="card-body">
      <!-- Conversations are loaded here -->


      <div class="card-comment">
<h2>Add Comments</h2>
<form action="#" method="post">
    <div class="comment-area">
        <input id="x" type="hidden" name="content">
        <trix-editor input="x"></trix-editor>
    </div>
    <p style="margin-top:20px;"><input class="btn btn-primary" type="submit" value="Submit"></p>
    </form>


      </div>






      <div class="direct-chat-messages">
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">Alexander Pierce</span>
            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="{{url('assets/images/user1-128x128.jpg')}}" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            Is this template really for free? That's unbelievable!
            
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
        <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">Sarah Bullock</span>
            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="{{url('assets/images/user3-128x128.jpg')}}" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            You better believe it!
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">Alexander Pierce</span>
            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="{{url('assets/images/user1-128x128.jpg')}}" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            Working with AdminLTE on a great new app! Wanna join?
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
        <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">Sarah Bullock</span>
            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="{{url('assets/images/user3-128x128.jpg')}}" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            I would love to.
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
      </div>
      <!--/.direct-chat-messages-->
      <!-- Contacts are loaded here -->
      <div class="direct-chat-contacts">
        <ul class="contacts-list">
          <li>
            <a href="#">
              <img class="contacts-list-img" src="{{url('assets/images/user1-128x128.jpg')}}">
              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  Count Dracula
                  <small class="contacts-list-date float-right">2/28/2015</small>
                </span>
                <span class="contacts-list-msg">How have you been? I was...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
          <li>
            <a href="#">
              <img class="contacts-list-img" src="{{url('assets/images/user1-128x128.jpg')}}">
              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  Sarah Doe
                  <small class="contacts-list-date float-right">2/23/2015</small>
                </span>
                <span class="contacts-list-msg">I will be waiting for...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
          <li>
            <a href="#">
              <img class="contacts-list-img" src="{{url('assets/images/user3-128x128.jpg')}}">
              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  Nadia Jolie
                  <small class="contacts-list-date float-right">2/20/2015</small>
                </span>
                <span class="contacts-list-msg">I'll call you back at...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
          <li>
            <a href="#">
              <img class="contacts-list-img" src="{{url('assets/images/user1-128x128.jpg')}}">
              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  Nora S. Vans
                  <small class="contacts-list-date float-right">2/10/2015</small>
                </span>
                <span class="contacts-list-msg">Where is your new...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
          <li>
            <a href="#">
              <img class="contacts-list-img" src="{{url('assets/images/user3-128x128.jpg')}}">
              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  John K.
                  <small class="contacts-list-date float-right">1/27/2015</small>
                </span>
                <span class="contacts-list-msg">Can I take a look at...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
          <li>
            <a href="#">
              <img class="contacts-list-img" src="{{url('assets/images/user3-128x128.jpg')}}">
              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  Kenneth M.
                  <small class="contacts-list-date float-right">1/4/2015</small>
                </span>
                <span class="contacts-list-msg">Never mind I found...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
        </ul>
        <!-- /.contacts-list -->
      </div>
      <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->
   <!-- <div class="card-footer">
      <form action="#" method="post">
        <div class="input-group">
          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
          <span class="input-group-append">
            <button type="button" class="btn btn-primary">Send</button>
          </span>
        </div>
      </form>
    </div> -->
    <!-- /.card-footer-->
  </div>
  <!--/.direct-chat -->

            </main>



        </div>







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

    <script></script>
@endpush

@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@endpush

@section('content')

    <div class="c-body">

        <main class="c-main">

            <div class="container-fluid">

                <livewire:dashboard.report.item-multi />

                {{-- <div wire:id="h9MwSAs1o2QIuyE4Is3A">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">



                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_products" name="permissions[]"
                                                                value="show_products">
                                                            <label class="custom-control-label" for="show_products"></label>
                                                        </div>
                                                    </div>
                                                    <label for="category_id">Category </label>
                                                    <select wire:model.defer="category_id" class="form-control"
                                                        name="category_id" id="category_id"
                                                        onchange="match('' , 'category_id')" disabled="">
                                                        <option value="0" selected="">Select Category</option>
                                                        <option value="3">BACK GLASS</option>
                                                        <option value="2">DOOR GLASS</option>
                                                        <option value="9">OTHER</option>
                                                        <option value="5">QUARTER GLASS</option>
                                                        <option value="8">SERVICES</option>
                                                        <option value="6">SUNROOF</option>
                                                        <option value="7">SUPPLIES</option>
                                                        <option value="4">VENT GLASS</option>
                                                        <option value="1">WINDSHIELD</option>
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group" style="margin-top:25px">
                                                    <label for="subcategories_id">Sub Category </label>
                                                    <select wire:model.defer="subcategories_id" class="form-control"
                                                        name="subcategories_id" id="subcategories_id" disabled="">


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_products" name="permissions[]"
                                                                value="show_products">
                                                            <label class="custom-control-label" for="show_products"></label>
                                                        </div>
                                                    </div>
                                                    <label>Supplier</label>


                                                    <select wire:model.defer="supplier_id" class="form-control"
                                                        name="supplier_id" id="supplier_id" disabled="">
                                                        <option value="">Select Supplier</option>
                                                        <option value="2">xyz Glass manufacturer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_products" name="permissions[]"
                                                                value="show_products">
                                                            <label class="custom-control-label" for="show_products"></label>
                                                        </div>
                                                    </div>
                                                    <label>Warehouse</label>

                                                    <select wire:model.defer="warehouse_id" class="form-control"
                                                        name="warehouse_id" id="warehouse_id" disabled="">
                                                        <option value="">Select Warehouse</option>
                                                        <option value="1">Falls Church</option>
                                                        <option value="2">Manassas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_products" name="permissions[]"
                                                                value="show_products">
                                                            <label class="custom-control-label" for="show_products"></label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-left: -30px">

                                                <label class="form-check-label" for="lowstock">Low Level Stock</label>

                                            </div>

                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_products" name="permissions[]"
                                                                value="show_products">
                                                            <label class="custom-control-label"
                                                                for="show_products"></label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-left: -30px">

                                                <label class="form-check-label" for="backstock">Back Order Stock</label>

                                            </div>



                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary">
                                                <span wire:target="generateReport" wire:loading=""
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                <i wire:target="generateReport" wire:loading.remove=""
                                                    class="bi bi-shuffle"></i>
                                                Filter Report
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <!---->
                                    <!--    -->
                                    <!---->
                                    <div wire:loading.flex=""
                                        class="col-12 position-absolute justify-content-center align-items-center"
                                        style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped text-center mb-0">

                                        <thead>
                                            <tr>



                                                <th class="align-middle">Part No</th>

                                                <th class="align-middle">Shelf</th>
                                                <th class="align-middle">Shop</th>
                                                <th class="align-middle">Price</th>
                                                <th class="align-middle">Cost</th>
                                                <th class="align-middle">Quantity</th>

                                                <th class="align-middle">Supplier</th>
                                                <th class="align-middle">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>




                                            <tr id="tr146963">

                                                <td class="align-middle">
                                                    Test_002
                                                    <div class="input-group">


                                                    </div>
                                                </td>


                                                <td class="align-middle">

                                                    T22

                                                </td>



                                                <td class="align-middle">Falls Church</td>

                                                <td class="align-middle" width="7%">$ 0</td>

                                                <td class="align-middle" width="7%">$ 0</td>

                                                <td class="align-middle">
                                                    <div style="font-size:15px" class=" badge  ">5</div>
                                                </td>



                                                <td class="align-middle">N/A</td>



                                                <td class="align-middle">
                                                    <a href="#" class="btn btn-info btn-sm m-1">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-primary btn-sm m-1">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <button id="delete" class="btn btn-danger btn-sm m-1"
                                                        onclick="
                                    event.preventDefault();
                                    if (confirm('Are you sure? It will delete the data permanently!')) {
                                        document.getElementById('destroy146963').submit()
                                    }
                                    ">
                                                        <i class="bi bi-trash"></i>
                                                        <form id="destroy146963" class="d-none" action="#"
                                                            method="POST">
                                                            <input type="hidden" name="_token"
                                                                value="4V9Q0tc95sJ7lmPxFhoEhhiEaccwxsKrp8MUz9Py"> <input
                                                                type="hidden" name="_method" value="delete">
                                                        </form>
                                                    </button>




                                                </td>

                                            </tr>



                                            <tr id="tr146964">

                                                <td class="align-middle">
                                                    Test_003
                                                    <div class="input-group">


                                                    </div>
                                                </td>


                                                <td class="align-middle">

                                                    T23

                                                </td>



                                                <td class="align-middle">Falls Church</td>

                                                <td class="align-middle" width="7%">$ 35</td>

                                                <td class="align-middle" width="7%">$ 5</td>

                                                <td class="align-middle">
                                                    <div style="font-size:15px" class=" badge  ">4</div>
                                                </td>



                                                <td class="align-middle">N/A</td>



                                                <td class="align-middle">
                                                    <a href="#" class="btn btn-info btn-sm m-1">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-primary btn-sm m-1">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <button id="delete" class="btn btn-danger btn-sm m-1"
                                                        onclick="
                                    event.preventDefault();
                                    if (confirm('Are you sure? It will delete the data permanently!')) {
                                        document.getElementById('destroy146964').submit()
                                    }
                                    ">
                                                        <i class="bi bi-trash"></i>
                                                        <form id="destroy146964" class="d-none" action="#"
                                                            method="POST">
                                                            <input type="hidden" name="_token"
                                                                value="4V9Q0tc95sJ7lmPxFhoEhhiEaccwxsKrp8MUz9Py"> <input
                                                                type="hidden" name="_method" value="delete">
                                                        </form>
                                                    </button>




                                                </td>

                                            </tr>
































                                        </tbody>
                                    </table>



                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

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
@endpush

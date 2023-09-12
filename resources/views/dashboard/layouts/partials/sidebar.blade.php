<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="Auto Glass Logo" class="brand-image img-circle elevation-3"
            style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Auto Glass</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">Auto Glass</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search" />
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                <li class="nav-item">
                    <a href="{{ route('dashboard.home') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Home

                        </p>
                    </a>
                </li>
                @can('access_products')
                <li class="nav-item">
                    <a href="/dashboardsearch" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.product.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            All Items


                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Items Parameters
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subcategory.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.year.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Years</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.make.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Make</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.model.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Models</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.bodystyle.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Body Style</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.glass.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Glasses</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.feature.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Features</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('access_user_management')
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Adjustments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('create_adjustments')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.adjustment.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Adjustment</p>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{ route('dashboard.adjustment.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Adjustments</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan

                @can('access_sales')
                <li class="nav-item">
                    <a href="{{ route('dashboard.workorder.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            All Work Order / Jobs

                        </p>
                    </a>


                </li>
                @endcan

                @can('access_quotations')
                <li class="nav-item">
                    <a href="{{ route('dashboard.quotation.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            All Quotations

                        </p>
                    </a>


                </li>
                @endcan

                @can('access_purchases')
                <li class="nav-item">
                    <a  class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Purchase Order
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create_purchases')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.purchase.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order Parts</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('dashboard.purchase.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.purchase.stock')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Receive Stock</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.purchase.specific.stock')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Receive Specific Part</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Purchase & Returns
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('access_purchase_returns')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.purchase-return.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchase Returns</p>
                            </a>
                        </li>
                        @endcan
                        @can('access_sale_returns')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.sale-return.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>sale Returns</p>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @can('access_sales')
                <li class="nav-item">
                    <a href="{{ route('dashboard.sale.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            All Sales Invoice


                        </p>
                    </a>
                </li>
                @endcan
                @can('access_expenses')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Expenses
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('access_expense_categories')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.expenseCategory.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Expense Categories</p>
                            </a>
                        </li>
                        @endcan
                        <!-- <li class="nav-item"> //TODO:
                            <a href="../tables/data.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Expense</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard.expense.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Expenses</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan

                @can('access_customers')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Customers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('create_customers')
                            <a href="{{ route('dashboard.customer.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Add Customer</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.customerType.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Customer Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.customer.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan




                @can('access_suppliers')
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Suppliers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create_suppliers')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.supplier.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Supplier</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('dashboard.supplier.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suppliers</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Installer
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.installer.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Installer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.installer.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Installer</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.warehouse.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>Warehouse</p>
                    </a>
                </li>

                @can('access_reports')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">



                        <li class="nav-item">
                            <a href="{{url('dashboard/system-statistics')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>System Statistics</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{url('dashboard/item-sold')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item Sold</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('dashboard/items-multi-report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Items Multi Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('dashboard/profit-loss-report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profit / Loss Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('dashboard/payments-report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payments Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('dashboard/sales-report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sales Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('dashboard/purchases-report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchases Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('dashboard/sales-return-report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sales Return Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('dashboard/purchases-return-report')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchases Return Report</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Maintenance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('dashboard/inventory/management')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inventory Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('dashboard/database/management')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Database Management</p>
                            </a>
                        </li>

                    </ul>
                </li>

                @can('access_user_management')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.user.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.user.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.permissions.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles & Permissions</p>
                            </a>
                        </li>

                    </ul>
                </li>

                @endcan

                @can('access_settings')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('access_currencies')
                        <li class="nav-item">
                            <a href="{{route('dashboard.currency.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Currencies</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{route('dashboard.setting.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> System Settings</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
